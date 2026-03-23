@extends('layouts.app', ['title' => 'Verify Your Email'])

@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white dark:bg-[#272e2d] rounded-2xl shadow-xl border border-gray-100 dark:border-gray-700 overflow-hidden">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-green-600 to-teal-600 px-8 py-6 text-center">
            <h1 class="text-2xl font-extrabold text-white tracking-tight">Verify your email</h1>
            <p class="text-green-100 text-sm mt-1">One last step before you can shop!</p>
        </div>

        {{-- Body --}}
        <div class="px-8 py-8 space-y-5">

            @if (session('resent'))
                <div class="px-4 py-3 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-xl text-green-700 dark:text-green-300 text-sm font-medium">
                    ✓ A fresh verification link has been sent to your email address.
                </div>
            @endif

            <div class="flex items-start gap-3 p-4 bg-gray-50 dark:bg-gray-800/50 rounded-xl border border-gray-100 dark:border-gray-700">
                <svg class="w-5 h-5 text-green-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                    Before proceeding, please check your email inbox for a verification link. If you did not receive the email, click the button below to resend it.
                </p>
            </div>

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                    class="w-full py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-xl transition-colors shadow-lg hover:shadow-xl">
                    Resend Verification Email
                </button>
            </form>

            <div class="text-center">
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="text-sm text-gray-500 dark:text-gray-400 hover:text-red-500 dark:hover:text-red-400 transition-colors">Not you? Log out</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
