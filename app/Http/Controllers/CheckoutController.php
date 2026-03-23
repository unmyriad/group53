<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\enums\OrderStatus;
use App\Events\DashboardEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationMail;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = DB::table('carts')->where('user_id', $user->user_id)->first();

        if (!$cart || $cart->total_amount <= 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $cartItems = DB::table('cart_items')
            ->join('products', 'cart_items.product_id', '=', 'products.product_id')
            ->where('cart_id', $cart->cart_id)
            ->select('cart_items.*', 'products.product_name', 'products.price')
            ->get();

        $lineItems = [];
        foreach ($cartItems as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => config('cashier.currency', 'gbp'),
                    'product_data' => [
                        'name' => $item->product_name,
                    ],
                    'unit_amount' => $item->price * 100, // Amount in cents/pence
                ],
                'quantity' => $item->quantity,
            ];
        }

        return $user->checkout($lineItems, [
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);
    }

    public function success(Request $request)
    {
        $user = Auth::user();
        $sessionId = $request->get('session_id');

        if ($sessionId) {
            $stripeSession = $user->stripe()->checkout->sessions->retrieve($sessionId);
            
            if ($stripeSession->payment_status === 'paid') {
                // Since this is a "dummy" checkout, we'll manually trigger the order creation logic here
                // Normally this would be done via Webhooks
                return $this->createOrder($user);
            }
        }

        return redirect()->route('cart.index')->with('error', 'Payment failed or session not found.');
    }

    public function cancel()
    {
        return redirect()->route('cart.index')->with('error', 'Checkout was cancelled.');
    }

    protected function createOrder($user)
    {
        $cart = DB::table('carts')->where('user_id', $user->user_id)->first();
        if (!$cart || $cart->total_amount <= 0) {
             return redirect()->route('cart.index');
        }

        $cartItems = DB::table('cart_items')->where('cart_id', $cart->cart_id)->get();

        // Handle Address (Dummy logic consistent with CartController)
        $address = DB::table('addresses')->where('user_id', $user->user_id)->first();
        if (!$address) {
            $addressId = DB::table('addresses')->insertGetId([
                'user_id' => $user->user_id,
                'address_line' => '123 Dummy St',
                'city' => 'London',
                'postal_code' => 'SW1A 1AA',
                'country' => 'UK',
                'is_default' => 1
            ]);
        } else {
            $addressId = $address->address_id;
        }

        // Create Order
        $orderId = DB::table('orders')->insertGetId([
            'user_id' => $user->user_id,
            'address_id' => $addressId,
            'order_date' => now(),
            'total_price' => $cart->total_amount,
            'status' => 'pending',
            'payment_method' => 'Stripe'
        ]);

        DB::transaction(function () use ($orderId, $cartItems) {
            foreach ($cartItems as $item) {
                $product = DB::table('products')->where('product_id', $item->product_id)->first();
                DB::table('order_items')->insert([
                    'order_id' => $orderId,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price_at_purchase' => $product->price
                ]);
            }
        });

        DB::table('cart_items')->where('cart_id', $cart->cart_id)->delete();
        DB::table('carts')->where('cart_id', $cart->cart_id)->update(['total_amount' => 0]);

        // Send Confirmation Email
        try {
            Mail::to($user->email)->send(new OrderConfirmationMail($orderId, $user->name));
        } catch (\Exception $e) {
            \Log::error("Failed to send order confirmation email: " . $e->getMessage());
        }

        $event = new DashboardEvent();
        $event->orderCount = Order::where("status","!=",OrderStatus::Delivered)->count();
        event($event);

        return view('checkout.success', ['orderId' => $orderId]);
    }
}
