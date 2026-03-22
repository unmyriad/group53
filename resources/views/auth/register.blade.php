@extends('layouts.app', ['title' => 'Register'])

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-green-600 to-teal-600 px-8 py-6 text-center">
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Join YouZoo</h1>
            <p class="text-green-100 text-sm mt-1">Create your account and start shopping</p>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('register') }}" class="px-8 py-8 space-y-5">
            @csrf

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="w-full px-4 py-2.5 rounded-xl border @error('name') border-red-400 bg-red-50 dark:bg-red-900/20 @else border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800/50 @enderror text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                @error('name')
                    <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                    class="w-full px-4 py-2.5 rounded-xl border @error('email') border-red-400 bg-red-50 dark:bg-red-900/20 @else border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800/50 @enderror text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                @error('email')
                    <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    class="w-full px-4 py-2.5 rounded-xl border @error('password') border-red-400 bg-red-50 dark:bg-red-900/20 @else border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800/50 @enderror text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                @error('password')
                    <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label for="password-confirm" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800/50 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition-colors shadow-lg hover:shadow-xl">
                Create Account
            </button>

            {{-- Login Link --}}
            <p class="text-center text-sm text-gray-500 dark:text-gray-400 pt-1">
                Already have an account?
                <a href="{{ route('login') }}" class="text-green-600 dark:text-green-400 hover:underline font-semibold">Sign in</a>
            </p>
        </form>
    </div>
</div>
@endsection
