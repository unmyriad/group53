<?php

namespace App\Http\Controllers;


use App\enums\OrderStatus;
use App\Events\DashboardEvent;
use App\Events\StockEvent;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

/**
 * Controller responsible for managing user shopping carts, adding/removing items, and checkout processing.
 */
class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to view your cart');
        }

        $userId = Auth::id();
        $cart = DB::table('carts')->where('user_id', $userId)->first();

        $cartItems = [];
        $total = 0;

        if ($cart) {
            $cartItems = DB::table('cart_items')
                ->join('products', 'cart_items.product_id', '=', 'products.product_id')
                ->where('cart_id', $cart->cart_id)
                ->select('cart_items.*', 'products.product_name', 'products.price', 'products.image_url', 'products.description')->lockForUpdate()
                ->get();

            $total = $cart->total_amount;
        }

        return view('cart_checkout', compact('cartItems', 'total'));
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('message', 'Please login to add items to cart');
        }

        $request->validate([
            'product_id' => 'required|exists:products,product_id',
            'quantity' => 'nullable|integer|min:1'
        ]);

        $quantity = $request->input('quantity', 1);
        $productId = $request->input('product_id');
        $userId = Auth::id();

        $product = DB::table('products')->where('product_id', $productId)->first();

        // Check/Create Cart
        $cart = DB::table('carts')->where('user_id', $userId)->first();
        if (!$cart) {
            $cartId = DB::table('carts')->insertGetId([
                'user_id' => $userId,
                'date_created' => now(),
                'total_amount' => 0
            ]);
        } else {
            $cartId = $cart->cart_id;
        }

        // Check if item exists
        $existingItem = DB::table('cart_items')
            ->where('cart_id', $cartId)
            ->where('product_id', $productId)
            ->first();

        $subtotal = $product->price * $quantity;

        if ($existingItem) {
            $newQuantity = $existingItem->quantity + $quantity;
            $newSubtotal = $product->price * $newQuantity;

            DB::table('cart_items')
                ->where('cart_item_id', $existingItem->cart_item_id)
                ->update([
                    'quantity' => $newQuantity,
                    'subtotal' => $newSubtotal
                ]);
        } else {
            DB::table('cart_items')->insert([
                'cart_id' => $cartId,
                'product_id' => $productId,
                'quantity' => $quantity,
                'subtotal' => $subtotal
            ]);
        }

        $this->recalculateCartTotal($cartId);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,cart_item_id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = DB::table('cart_items')->where('cart_item_id', $request->cart_item_id)->first();
        $product = DB::table('products')->where('product_id', $cartItem->product_id)->first();

        $newSubtotal = $product->price * $request->quantity;

        DB::table('cart_items')
            ->where('cart_item_id', $request->cart_item_id)
            ->update([
                'quantity' => $request->quantity,
                'subtotal' => $newSubtotal
            ]);

        $this->recalculateCartTotal($cartItem->cart_id);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,cart_item_id'
        ]);

        $cartItem = DB::table('cart_items')->where('cart_item_id', $request->cart_item_id)->first();

        if ($cartItem) {
             DB::table('cart_items')->where('cart_item_id', $request->cart_item_id)->delete();
             $this->recalculateCartTotal($cartItem->cart_id);
        }

        return redirect()->route('cart.index')->with('success', 'Item removed from cart!');
    }

    public function checkout()
    {
        return redirect()->route('cart.checkout');
    }

    private function recalculateCartTotal($cartId)
    {

        $total = DB::table('cart_items')->where('cart_id', $cartId)->sum('subtotal');
        DB::table('carts')->where('cart_id', $cartId)->update(['total_amount' => $total]);
    }
}
