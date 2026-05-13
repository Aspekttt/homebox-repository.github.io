@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px]">
            <h3 class="text-[22px] mb-[50px]">Текущие бронирования</h3>
            <div class="flex flex-col gap-[50px]">
                @foreach ($bookings as $booking)
                @if ($booking->status == 'Новая' || $booking->status == 'Подтверждена')
                <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-row">
                    <div class="">
                        <img class="w-full h-full max-w-[450px] min-w-[350px] object-cover rounded-[15px]" src="{{  $booking->container-> image  }}">
                    </div>
                    <div class="flex flex-col w-full justify-between px-[40px] py-[15px]">
                        <div>
                            <div class="flex flex-row justify-between ">
                                <div class="flex flex-row gap-4">
                                    <h4 class="text-[#58ABEA] border-2 border-[#58ABEA] rounded-[20px] px-[15px] py-[2px] mb-[10px]
                                    @if($booking->status == 'Новая')
                                        text-[#58ABEA] border-2 border-[#58ABEA]
                                    @elseif($booking->status == 'Подтверждена')
                                        text-[#00C851] border-2 border-[#00A919]
                                    @endif
                                    ">{{  $booking->status  }}</h4>
                                    <h6 class="text-[#595959] text-18px mb-[5px]">Контейнер №{{  $booking->container-> number  }}</h6>
                                </div>
                                <div>
                                    <form action="{{ route('bookings.cancel', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-white bg-[#FF6767] border-2 border-[#FF6767] rounded-[20px] px-[15px] py-[2px] mb-[10px] transition duration-150 hover:bg-[#FF4242]">
                                        Отменить бронирование
                                    </button>
                            </form>
                                </div>
                            </div>
                            <div>
                                <p class="text-[#595959] text-16px mb-[15px]">Комплекс “{{  $booking->container->residentialComplex-> title  }}”</p>
                            </div>
                        </div><br>
                        <div class="flex flex-row justify-between">
                            <div class="flex flex-col">
                                <h5 class="text-18px">Дата начала аренды:<br><span class="text-[#595959]">{{  date('d.m.Y', strtotime($booking -> start_date))  }}</span></h5><br>
                                <h5 class="text-18px">Дата окончания аренды:<br><span class="text-[#595959]">{{  date('d.m.Y', strtotime($booking -> end_date))  }}</span></h5>
                            </div>
                            <div>
                                <h3 class="text-18px">Стоимость контейнера:<br><span class="text-[#179BFF] text-22px">{{  $booking->container->daily_price  }} ₽ / д.</span></h3><br>
                                <h3 class="text-18px">Итоговая стоимость:<br><span class="text-[#179BFF] text-22px">{{  $booking->total_price  }} ₽</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    @endsection

