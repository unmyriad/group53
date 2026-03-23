@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-20 text-center">
    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-700">
        <div class="w-20 h-20 bg-yellow-100 dark:bg-yellow-900/30 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Checkout Cancelled</h1>
        <p class="text-gray-600 dark:text-gray-400 mb-8">
            The checkout process was cancelled. No charges were made to your account.
        </p>
        <div class="space-y-4">
            <a href="{{ route('cart.index') }}" class="block w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold transition-all shadow-lg hover:shadow-xl">
                Return to Cart
            </a>
            <a href="{{ route('shop.index') }}" class="block w-full py-3 text-green-600 hover:text-green-700 font-semibold transition-colors">
                Continue Shopping
            </a>
        </div>
    </div>
</div>
@endsection
