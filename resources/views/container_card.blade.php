@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px]">
            <div>
                <img class="rounded-[35px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] w-full h-[350px] object-cover" src="{{  $container -> image  }}">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[50px]">
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[25px]">
                <div class="flex flex-row items-center justify-between">
                    <div class="flex flex-col">
                        <div class="flex flex-row">
                            <h4 class="text-[#58ABEA] border-2 border-[#58ABEA] rounded-[15px] px-[20px] py-[2px] mb-[10px]">{{  $container -> status  }}</h4>
                            <h5 class="text-[20px] pb-[10px] ml-[20px]">Контейнер № {{  $container -> number  }}</h5>
                        </div>
                        <p class="text-[18px] text-[#595959]">Комплекс “{{  $container -> residentialComplex -> title  }}”</p>
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
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] p-[25px]">
                <form class="flex flex-col text-center items-center justify-center">
                    <h5 class="text-[20px] pb-[10px]">Заявка на ареду</h5>
                    <label for="">Дата начала аренды</label>
                    <input id="" type="date">

                    <label for="">Дата окончания аренды</label>
                    <input id="" type="date">

                    <label for="">Дата начала аренды</label>
                    <textarea></textarea>

                    <div class="flex felx-row gap-4 items-center">
                        <input id="" type="checkbox">
                        <label for="">Нажимая на кнопку, вы принимаете <span class="text-[#179BFF]"><a href="">политику конфиденциальности</a></span> и <span class="text-[#179BFF]"><a href="">пользовательское соглашение</a></span> сайта</label>
                    </div>
                    <button type="submit" class="py-2.5 px-8 text-white text-2xl bg-[#179BFF] bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] flex flex-row items-center justify-center" type="button">Забронировать</button>
                </form>
            </div>
        </div>

    @endsection

