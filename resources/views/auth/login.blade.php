@extends('layouts.app')

@section('content')
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('aasd') }}
        </h2>
    </x-slot>
<div class="py-12">
    <div class="max-w-md mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 text-gray-900">
                <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Вход') }}</h2>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Почта -->
                    <div>
                        <x-input-label for="email" :value="__('Почта')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Пароль -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Пароль')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Запомнить меня -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Запомнить меня') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Забыли пароль?') }}
                            </a>
                        @endif
                    </div>

                    <div class="flex items-center justify-between mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('register') }}">
                                {{ __('Ещё не зарегистрированы?') }}
                            </a>

                            <x-primary-button>
                                {{ __('Войти') }}
                            </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
