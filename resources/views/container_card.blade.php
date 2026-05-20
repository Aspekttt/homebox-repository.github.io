@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[40px] sm:pt-[60px] lg:pt-[80px]">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <div>
        <img class="rounded-[20px] sm:rounded-[25px] lg:rounded-[35px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] w-full h-[200px] sm:h-[280px] lg:h-[350px] object-cover" src="{{ $container->image }}" alt="Контейнер №{{ $container->number }}">
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[30px] sm:pt-[40px] lg:pt-[50px]">
    <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[15px] sm:p-[20px] lg:p-[25px]">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex flex-col">
                <div class="flex flex-row flex-wrap items-center gap-2 sm:gap-3">
                    <h4 class="border-2 rounded-[15px] px-3 sm:px-4 py-1 mb-2 text-sm sm:text-base
                        @if($container->status == 'Доступный')
                            text-[#58ABEA] border-[#58ABEA]
                        @elseif($container->status == 'Занятый')
                            text-[#00A919] border-[#00A919]
                        @elseif($container->status == 'Недоступный')
                            text-[#FF9292] border-[#FF9292]
                        @elseif($container->status == 'Обслуживание')
                            text-[#D8A500] border-[#D8A500]
                        @endif">{{ $container->status }}</h4>
                    <h5 class="text-[18px] sm:text-[20px] pb-[10px]">Контейнер №{{ $container->number }}</h5>
                </div>
                <p class="text-[16px] sm:text-[18px] text-[#595959]">Комплекс "{{ $container->residentialComplex->title }}"</p>
            </div>
            <h5 class="text-[20px] sm:text-[24px] text-black font-semibold">{{ number_format($container->daily_price, 0, ',', ' ') }} ₽ / д.</h5>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[30px] sm:pt-[40px] lg:pt-[50px]">
    <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[15px] sm:p-[20px] lg:p-[25px]">
        <h5 class="text-[18px] sm:text-[20px] pb-[10px] font-semibold">Описание</h5>
        <p class="text-[16px] sm:text-[18px] text-[#595959] leading-relaxed">{{ $container->description }}</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[30px] sm:pt-[40px] lg:pt-[50px]">
    <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[15px] sm:p-[20px] lg:p-[25px]">
        <h5 class="text-[18px] sm:text-[20px] pb-[10px] font-semibold">Характеристики</h5>
        <div class="grid grid-cols-1 gap-2">
            <p class="text-[16px] sm:text-[18px] text-[#595959]">Площадь: <span class="font-medium text-black">{{ $container->area }} м²</span></p>
            <p class="text-[16px] sm:text-[18px] text-[#595959]">Объём: <span class="font-medium text-black">{{ $container->volume }} м³</span></p>
            <p class="text-[16px] sm:text-[18px] text-[#595959]">Этаж: <span class="font-medium text-black">{{ $container->floor_or_location }}</span></p>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[30px] sm:pt-[40px] lg:pt-[50px] pb-[50px]">
    <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] p-[15px] sm:p-[20px] lg:p-[25px]">
        <div class="flex flex-col text-center items-center">
            @auth
                <form action="{{ route('bookings.store') }}" method="POST" class="flex flex-col w-full max-w-md mx-auto">
                    @csrf
                    <input type="hidden" name="container_id" value="{{ $container->id }}">

                    <h5 class="text-[20px] sm:text-[24px] pb-[10px] font-semibold text-black mb-4">Заявка на аренду</h5>

                    <div class="mb-4 text-center">
                        <label class="text-[#595959] mb-2 block" for="start_date">Дата начала аренды</label>
                        <input class="rounded-[10px] border border-gray-300 p-2 w-full focus:outline-none focus:border-[#179BFF]" required name="start_date" id="start_date" type="date">
                    </div>

                    <div class="mb-4 text-center">
                        <label class="text-[#595959] mb-2 block" for="end_date">Дата окончания аренды</label>
                        <input class="rounded-[10px] border border-gray-300 p-2 w-full focus:outline-none focus:border-[#179BFF]" required name="end_date" id="end_date" type="date">
                    </div>

                    <div class="mb-4 text-center">
                        <label class="text-[#595959] mb-2 block" for="comment">Комментарий к заявке (необязательно)</label>
                        <textarea class="rounded-[10px] border border-gray-300 p-2 w-full focus:outline-none focus:border-[#179BFF]" id="comment" name="comment" rows="3"></textarea>
                    </div>

                    <div class="flex flex-row gap-3 items-start text-left mb-6">
                        <input class="rounded-[4px] mt-1" required id="confirm" type="checkbox">
                        <label for="confirm" class="text-sm sm:text-base">Нажимая на кнопку, вы принимаете <span class="text-[#179BFF]"><a href="">политику конфиденциальности</a></span> и <span class="text-[#179BFF]"><a href="">пользовательское соглашение</a></span> сайта</label>
                    </div>

                    <button type="submit" class="py-2.5 px-8 text-white text-lg sm:text-2xl bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] w-full">Забронировать</button>
                </form>
            @else
                <div class="text-center py-8">
                    <svg class="w-16 h-16 sm:w-20 sm:h-20 mx-auto text-[#71C2FF] mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <h5 class="text-[20px] sm:text-[24px] font-semibold mb-3">Для бронирования необходимо войти в аккаунт</h5>
                    <p class="text-[#595959] mb-6 text-sm sm:text-base">Только авторизованные пользователи могут оставлять заявки на аренду контейнеров</p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="{{ route('login') }}">
                            <button class="px-6 py-2 text-white bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] w-full sm:w-auto">Войти</button>
                        </a>
                        <a href="{{ route('register') }}">
                            <button class="px-6 py-2 text-[#71C2FF] border-2 border-[#71C2FF] bg-white rounded-lg transition duration-150 hover:bg-[#F3F4F6] w-full sm:w-auto">Зарегистрироваться</button>
                        </a>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>
@endsection
