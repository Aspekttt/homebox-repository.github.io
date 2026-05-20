@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[40px] sm:pt-[60px] lg:pt-[80px]">
    <h3 class="text-[20px] sm:text-[22px] mb-[30px] sm:mb-[40px] lg:mb-[50px]">Прошлые бронирования</h3>

    @if($historyBookings->isNotEmpty())
        <div class="flex flex-col gap-[30px] sm:gap-[40px] lg:gap-[50px]">
            @foreach ($historyBookings as $booking)
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col md:flex-row overflow-hidden">
                <!-- Изображение -->
                <div class="w-full md:w-auto md:max-w-[350px] md:min-w-[280px] lg:max-w-[450px] lg:min-w-[350px] h-[200px] sm:h-[250px] md:h-auto">
                    <img class="w-full h-full object-cover rounded-t-[15px] md:rounded-l-[15px] md:rounded-tr-none" src="{{ $booking->container->image }}" alt="Контейнер №{{ $booking->container->number }}">
                </div>

                <!-- Контент -->
                <div class="flex flex-col w-full justify-between p-4 sm:p-6 md:p-8 lg:px-[40px] lg:py-[15px]">
                    <div>
                        <div class="flex flex-row flex-wrap items-center gap-2 sm:gap-3 mb-3">
                            <h4 class="border-2 rounded-[20px] px-3 sm:px-4 py-1 text-sm sm:text-base
                                @if($booking->status == 'Завершена')
                                    text-[#179BFF] border-[#179BFF]
                                @elseif($booking->status == 'Отменена')
                                    text-[#FF6767] border-[#FF6767]
                                @elseif($booking->status == 'Отклонена')
                                    text-[#FF9800] border-[#FF9800]
                                @endif">{{ $booking->status }}</h4>
                            <h6 class="text-[#595959] text-base sm:text-lg">Контейнер №{{ $booking->container->number }}</h6>
                        </div>
                        <div>
                            <p class="text-[#595959] text-sm sm:text-base">{{ $booking->container->residentialComplex->address }} Комплекс "{{ $booking->container->residentialComplex->title }}"</p>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-between gap-4 sm:gap-6 mt-6 sm:mt-8">
                        <div class="flex flex-row justify-between sm:justify-start gap-6 sm:gap-8">
                            <div>
                                <h5 class="text-sm font-semibold sm:text-base font-medium text-gray-700">Дата начала аренды:</h5>
                                <span class="text-[#595959] text-sm sm:text-base">{{ date('d.m.Y', strtotime($booking->start_date)) }}</span>
                            </div>
                            <div>
                                <h5 class="text-sm font-semibold sm:text-base font-medium text-gray-700">Дата окончания аренды:</h5>
                                <span class="text-[#595959] text-sm sm:text-base">{{ date('d.m.Y', strtotime($booking->end_date)) }}</span>
                            </div>
                        </div>
                        <div class="text-left sm:text-right">
                            <h5 class="text-sm font-semibold sm:text-base font-medium text-gray-700">Итоговая стоимость:</h5>
                            <span class="text-[#179BFF] text-xl sm:text-2xl font-semibold">{{ number_format($booking->total_price, 0, ',', ' ') }} ₽</span>
                        </div>
                    </div>

                    @if($booking->comment)
                        <div class="mt-4 pt-3 border-t border-gray-100">
                            <p class="text-[#595959] text-sm"><span class="font-medium">Комментарий:</span> {{ $booking->comment }}</p>
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] p-8 sm:p-10 lg:p-12 text-center">
            <svg class="w-16 h-16 sm:w-20 sm:h-20 lg:w-24 lg:h-24 mx-auto text-[#71C2FF] mb-4 sm:mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
            </svg>
            <h4 class="text-[20px] sm:text-[22px] lg:text-[24px] font-semibold mb-2 sm:mb-3">Ваша история бронирований пуста</h4>
            <p class="text-[#595959] text-base sm:text-lg mb-6 sm:mb-8">Здесь будут отображаться завершенные, отмененные или отклоненные заявки</p>
            <a href="{{ route('containers') }}">
                <button class="px-6 sm:px-8 py-2 sm:py-3 text-white text-base sm:text-lg bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF]">
                    Перейти к контейнерам
                </button>
            </a>
        </div>
    @endif
</div>
@endsection
