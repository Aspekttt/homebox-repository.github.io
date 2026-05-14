@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px]">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                            @foreach($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif

            <div>
                <img class="rounded-[35px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] w-full h-[350px] object-cover" src="{{  $container -> image  }}">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[50px]">
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[25px]">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <h4 class="border-2 rounded-[15px] px-[20px] py-[2px] mb-[10px]
                                @if($container->status == 'Доступный')
                                    text-[#58ABEA] border-2 border-[#58ABEA]
                                @elseif($container->status == 'Занятый')
                                    text-[#00A919] border-2 border-[#00A919]
                                @elseif($container->status == 'Недоступный')
                                    text-[#FF9292] border-2 border-[#FF9292]
                                @elseif($container->status == 'Обслуживание')
                                    text-[#D8A500] border-2 border-[#D8A500]
                                @endif">{{  $container -> status  }}</h4>
                            <h5 class="text-[20px] pb-[10px] ml-[20px]">Контейнер № {{  $container -> number  }}</h5>
                        </div>
                        <p class="text-[18px] text-[#595959]">Комплекс "{{  $container -> residentialComplex -> title  }}"</p>
                    </div>
                    <h5 class="text-black text-24px">{{  $container -> daily_price  }} ₽ / д.</h5>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[50px]">
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[25px]">
                <h5 class="text-[20px] pb-[10px]">Описание</h5>
                <p class="text-[18px] text-[#595959]">{{  $container -> description  }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[50px]">
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[25px]">
                <h5 class="text-[20px] pb-[10px]">Характеристики</h5>
                <p class="text-[18px] text-[#595959]">Площадь: {{  $container -> area  }} м²</p>
                <p class="text-[18px] text-[#595959]">Объём: {{  $container -> volume  }} м³</p>
                <p class="text-[18px] text-[#595959]">Этаж: {{  $container -> floor_or_location  }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[50px]">
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] p-[25px] mb-5">
                <div class="flex flex-col text-center items-center">
                <form action="{{ route('bookings.store') }}" method="POST" class="flex flex-col">
                @csrf
                    <input type="hidden" name="container_id" value="{{ $container->id }}">


                    <h5 class="text-[20px] pb-[10px]">Заявка на ареду</h5><br>
                    <label class="text-[#595959] mb-2" for="start_date">Дата начала аренды</label>
                    <input class="rounded-[10px]" required name="start_date" id="start_date" type="date"><br>

                    <label class="text-[#595959] mb-2" for="end_date">Дата окончания аренды</label>
                    <input class="rounded-[10px]" required name="end_date" id="end_date" type="date"><br>

                    <label class="text-[#595959] mb-2" for="comment">Комментарий к заявке ( необязательно )</label>
                    <textarea class="rounded-[10px]" id="comment" name="comment"></textarea><br>

                    <div class="flex flex-row gap-4 items-center text-left">
                        <input class="rounded-[4px]" required id="confirm" type="checkbox">
                        <label for="confirm">Нажимая на кнопку, вы<br>принимаете <span class="text-[#179BFF]"><a href="">политику конфиденциальности</a></span><br> и <span class="text-[#179BFF]"><a href="">пользовательское соглашение</a></span> сайта</label>
                    </div><br>
                    <button type="submit" class="py-2.5 px-8 text-white text-2xl bg-[#179BFF] bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] flex flex-row items-center justify-center" type="button">Забронировать</button>
                </form>
                </div>
            </div>
        </div>

    @endsection

