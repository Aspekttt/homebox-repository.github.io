@extends('layouts.app')
@section('content')
@if (Auth::user() && Auth::user()->role == "admin")
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[40px] sm:pt-[60px] lg:pt-[80px] pb-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">

        <!-- Карточка: Жилые комплексы -->
        <div class="bg-white rounded-[20px] sm:rounded-[25px] border-[1px] border-[#179BFF]/30 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] p-5 sm:p-6 lg:p-8 flex flex-col text-center items-center justify-center">
            <div class="mb-4 sm:mb-6">
                <h3 class="text-[28px] sm:text-[32px] lg:text-[36px] font-bold text-[#179BFF]">{{ $stats['complexes_count'] }}</h3>
                <p class="text-[18px] sm:text-[20px] lg:text-[22px] text-[#595959]">Жилых комплексов</p>
            </div>
            <a href="{{ route('admin.complexes') }}" class="w-full">
                <button class="text-[16px] sm:text-[18px] lg:text-[20px] text-white bg-[#71C2FF] rounded-[20px] px-4 sm:px-5 py-2 sm:py-3 transition duration-150 hover:bg-[#179BFF] w-full">
                    Управление жилыми<br> комплексами
                </button>
            </a>
        </div>

        <!-- Карточка: Пользователи -->
        <div class="bg-white rounded-[20px] sm:rounded-[25px] border-[1px] border-[#179BFF]/30 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] p-5 sm:p-6 lg:p-8 flex flex-col text-center items-center justify-center">
            <div class="mb-4 sm:mb-6">
                <h3 class="text-[28px] sm:text-[32px] lg:text-[36px] font-bold text-[#179BFF]">{{ $stats['users_count'] }}</h3>
                <p class="text-[18px] sm:text-[20px] lg:text-[22px] text-[#595959]">Пользователей</p>
            </div>
            <a href="{{ route('admin.users') }}" class="w-full">
                <button class="text-[16px] sm:text-[18px] lg:text-[20px] text-white bg-[#71C2FF] rounded-[20px] px-4 sm:px-5 py-2 sm:py-3 transition duration-150 hover:bg-[#179BFF] w-full">
                    Управление<br> пользователями
                </button>
            </a>
        </div>

        <!-- Карточка: Активные заявки -->
        <div class="bg-white rounded-[20px] sm:rounded-[25px] border-[1px] border-[#179BFF]/30 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] p-5 sm:p-6 lg:p-8 flex flex-col text-center items-center justify-center">
            <div class="mb-4 sm:mb-6">
                <h3 class="text-[28px] sm:text-[32px] lg:text-[36px] font-bold text-[#179BFF]">{{ $stats['active_bookings'] }}</h3>
                <p class="text-[18px] sm:text-[20px] lg:text-[22px] text-[#595959]">Активных заявок</p>
            </div>
            <a href="{{ route('admin.bookings') }}" class="w-full">
                <button class="text-[16px] sm:text-[18px] lg:text-[20px] text-white bg-[#71C2FF] rounded-[20px] px-4 sm:px-5 py-2 sm:py-3 transition duration-150 hover:bg-[#179BFF] w-full">
                    Управление<br> бронированиями
                </button>
            </a>
        </div>

        <!-- Карточка: Контейнеры -->
        <div class="sm:col-span-2 lg:col-span-1 lg:col-start-2 bg-white rounded-[20px] sm:rounded-[25px] border-[1px] border-[#179BFF]/30 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] p-5 sm:p-6 lg:p-8 flex flex-col text-center items-center justify-center">
            <div class="mb-4 sm:mb-6">
                <h3 class="text-[28px] sm:text-[32px] lg:text-[36px] font-bold text-[#179BFF]">{{ $stats['containers_count'] }}</h3>
                <p class="text-[18px] sm:text-[20px] lg:text-[22px] text-[#595959]">Контейнеров</p>
                <div class="mt-3 pt-3 border-t border-gray-200">
                    <h3 class="text-[28px] sm:text-[32px] lg:text-[36px] font-bold text-[#00A919]">{{ $stats['available_containers'] }}</h3>
                    <p class="text-[18px] sm:text-[20px] lg:text-[22px] text-[#595959]">Доступных</p>
                </div>
            </div>
            <a href="{{ route('admin.containers') }}" class="w-full">
                <button class="text-[16px] sm:text-[18px] lg:text-[20px] text-white bg-[#71C2FF] rounded-[20px] px-4 sm:px-5 py-2 sm:py-3 transition duration-150 hover:bg-[#179BFF] w-full">
                    Управление<br> контейнерами
                </button>
            </a>
        </div>

    </div>
</div>
@endif
@endsection
