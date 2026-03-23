@extends('layouts.app', ['title' => 'Reset Password'])

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-green-600 to-teal-600 px-8 py-6 text-center">
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Forgot your password?</h1>
            <p class="text-green-100 text-sm mt-1">Enter your email and we'll send a reset link</p>
        </div>

        {{-- Form --}}
        <div class="px-8 py-8">

            @if (session('status'))
                <div class="mb-5 px-4 py-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-green-700 dark:text-green-300 text-sm font-medium">
                    ✓ {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Email Address</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="email"
                        class="w-full px-4 py-2.5 rounded-xl border @error('email') border-red-400 bg-red-50 dark:bg-red-900/20 @else border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800/50 @enderror text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                    @error('email')
                        <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition-colors shadow-lg hover:shadow-xl">
                    Send Reset Link
                </button>

                <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                    <a href="{{ route('login') }}" class="text-green-600 dark:text-green-400 hover:underline font-medium">← Back to login</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection
