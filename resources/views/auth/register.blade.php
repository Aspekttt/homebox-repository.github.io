@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-md mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-4 text-gray-900">
                <h2 class="text-2xl font-bold mb-6 text-center">{{ __('Регистрация') }}</h2>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Имя -->
                    <div>
                        <x-input-label for="name" :value="__('Имя')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Почта -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Почта')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Номер -->
                    <div class="mt-4">
                        <x-input-label for="phone" :value="__('Номер телефона')" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone')" required autocomplete="phone" />
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Пароль -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Пароль')" />
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Подтверждение пароля -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Подтверждение пароля')" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Уже зарегистрированы?') }}
                        </a>

                        <x-primary-button>
                            {{ __('Зарегистрироваться') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
