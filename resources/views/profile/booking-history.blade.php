@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px]">
            <h3 class="text-[22px] mb-[50px]">Прошлые бронирования</h3>
            <div class="flex flex-col gap-[50px]">
                @foreach ($historyBookings  as $booking)
                @if (1 == 1)
                <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-row">
                    <div class="">
                        <img class="w-full h-full max-w-[450px] min-w-[350px] object-cover rounded-[15px]" src="{{  $booking->container-> image  }}">
                    </div>
                    <div class="flex flex-col w-full justify-between px-[40px] py-[15px]">
                        <div>
                            <div class="flex flex-row gap-4">
                                <h4 class="text-[#58ABEA] border-2 border-[#58ABEA] rounded-[20px] px-[15px] py-[2px] mb-[10px]
                            @if($booking->status == 'Завершена')
                                text-[#179BFF] border-2 border-[#179BFF]
                            @elseif($booking->status == 'Отменена')
                                text-[#FF6767] border-2 border-[#FF6767]
                            @elseif($booking->status == 'Отклонена')
                                text-[#FF9800] border-2 border-[#FF9800]
                            @endif">{{  $booking->status  }}</h4>
                                <h6 class="text-[#595959] text-18px mb-[5px]">Контейнер №{{  $booking->container->number  }}</h6>
                            </div>
                            <div>
                                <p class="text-[#595959] text-16px mb-[15px]">Комплекс “{{  $booking->container->residentialComplex->title  }}”</p>
                            </div>
                        </div><br><br><br><br>
                        <div class="flex flex-row justify-between">
                            <h5 class="text-18px">Дата начала аренды:<br><span class="text-[#595959]">{{  date('d.m.Y', strtotime($booking->start_date))  }}</span></h5>
                            <h5 class="text-18px">Дата окончания аренды:<br><span class="text-[#595959]">{{  date('d.m.Y', strtotime($booking->end_date))  }}</span></h5>
                            <h5 class="text-18px">Итоговая стоимость:<br><span class="text-[#179BFF] text-22px">{{  $booking->total_price  }} ₽</span></h5>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    @endsection

