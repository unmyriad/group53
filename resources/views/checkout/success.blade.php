@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-20 text-center">
    <div class="max-w-md mx-auto bg-white dark:bg-gray-800 p-8 rounded-3xl shadow-xl border border-gray-100 dark:border-gray-700">
        <div class="w-20 h-20 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Payment Successful!</h1>
        <p class="text-gray-600 dark:text-gray-400 mb-8">
            Thank you for your purchase. Your order <strong>#{{ $orderId }}</strong> has been placed successfully and is being processed.
        </p>
        <div class="space-y-4">
            <a href="{{ route('dashboard') }}" class="block w-full py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-bold transition-all shadow-lg hover:shadow-xl">
                Go to Dashboard
            </a>
            <a href="{{ route('shop.index') }}" class="block w-full py-3 text-green-600 hover:text-green-700 font-semibold transition-colors">
                Continue Shopping
            </a>
        </div>
    </div>
</div>
@endsection
