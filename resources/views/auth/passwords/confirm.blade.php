@extends('layouts.app', ['title' => 'Confirm Password'])

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-green-600 to-teal-600 px-8 py-6 text-center">
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Confirm your password</h1>
            <p class="text-green-100 text-sm mt-1">Please verify your identity to continue</p>
        </div>

        {{-- Form --}}
        <form method="POST" action="{{ route('password.confirm') }}" class="px-8 py-8 space-y-5">
            @csrf

            <p class="text-sm text-gray-600 dark:text-gray-400">For your security, please confirm your password before continuing.</p>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-1">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                    class="w-full px-4 py-2.5 rounded-xl border @error('password') border-red-400 bg-red-50 dark:bg-red-900/20 @else border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800/50 @enderror text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
                @error('password')
                    <p class="mt-1.5 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition-colors shadow-lg hover:shadow-xl">
                Confirm Password
            </button>

            @if (Route::has('password.request'))
                <p class="text-center text-sm">
                    <a href="{{ route('password.request') }}" class="text-green-600 dark:text-green-400 hover:underline font-medium">Forgot your password?</a>
                </p>
            @endif
        </form>
    </div>
</div>
@endsection
