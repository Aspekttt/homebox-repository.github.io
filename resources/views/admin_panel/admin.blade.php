@extends('layouts.app')
    @section('content')
    @if (Auth::user() -> role == "admin")
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px]">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-[25px] border-[1px] border-[#179BFF]/30 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] gap-[10px] mx-[15px] px-[30px] py-[20px] flex flex-col text-center items-center justify-center">
                    <div>
                        <h3 class="text-[24px]">{{ $stats['complexes_count'] }}</h3>
                        <p class="text-[22px]">Жилых комплексов</p>
                    </div><br><br>
                    <a href="{{  route("admin.complexes")  }}"><button class="text-[20px] text-white bg-[#71C2FF] rounded-[20px] px-[25px] py-[10px] mb-[10px] transition duration-150 hover:bg-[#179BFF]">Управление жилыми комплексами</button></a>
                </div>

                <div class="bg-white rounded-[25px] border-[1px] border-[#179BFF]/30 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] gap-[10px] mx-[15px] px-[30px] py-[20px] flex flex-col text-center items-center justify-center">
                    <div>
                    <h3 class="text-[24px]">{{ $stats['users_count'] }}</h3>
                    <p class="text-[22px]">Пользователей</p>
                    </div><br><br>
                    <a href="{{  route("admin.users")  }}"><button class="text-[20px] text-white bg-[#71C2FF] rounded-[20px] px-[25px] py-[10px] mb-[10px] transition duration-150 hover:bg-[#179BFF]">Управление пользователями</button></a>
                </div>

                <div class="bg-white rounded-[25px] border-[1px] border-[#179BFF]/30 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] gap-[10px] mx-[15px] px-[30px] py-[20px] flex flex-col text-center items-center justify-center">
                    <div>
                        <h3 class="text-[24px]">{{ $stats['active_bookings'] }}</h3>
                        <p class="text-[22px]">Активных заявок</p>
                    </div><br><br>
                    <a href="{{  route("admin.bookings")  }}"><button class="text-[20px] text-white bg-[#71C2FF] rounded-[20px] px-[25px] py-[10px] mb-[10px] transition duration-150 hover:bg-[#179BFF]">Управление бронированиями</button></a>
                </div>

                <div class="lg:col-start-2 lg:col-span-1 bg-white rounded-[25px] border-[1px] border-[#179BFF]/30 shadow-[5px_5px_15px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] gap-[10px] mx-[15px] px-[30px] py-[20px] flex flex-col text-center items-center justify-center">
                    <div>
                        <h3 class="text-[24px]">{{ $stats['containers_count'] }}</h3>
                        <p class="text-[22px]">Контейнеров</p>
                        <h3 class="text-[24px]">{{ $stats['available_containers'] }}</h3>
                        <p class="text-[22px]">Доступных</p>
                    </div><br><br>
                    <a href="{{  route("admin.containers")  }}"><button class="text-[20px] text-white bg-[#71C2FF] rounded-[20px] px-[25px] py-[10px] mb-[10px] transition duration-150 hover:bg-[#179BFF]">Управление контейнерами</button></a>
                </div>
            </div>
        </div>
    @endif
    @endsection

