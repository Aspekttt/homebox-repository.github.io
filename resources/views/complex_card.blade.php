@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px]">
            <div>
                <img class="rounded-[35px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] w-full h-[350px] object-cover" src="{{  $complex -> image  }}">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[50px]">
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[25px]">
                <h5 class="text-[20px] pb-[10px]">{{  $complex -> title  }}</h5>
                <p class="text-[18px] text-[#595959]">{{  $complex -> address  }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[50px]">
            <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col mb-[20px] p-[25px]">
                <h5 class="text-[20px] pb-[10px]">Описание</h5>
                <p class="text-[18px] text-[#595959]">{{  $complex -> description  }}</p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[50px]">
            <h3 class="text-black text-[22px] mb-[20px]">Контейнеры в жилом комплексе</h3>
                <div class="">
                    Typo sortirovka
                </div>
                <div class="flex flex-row flex-wrap justify-between mt-[20px]">
                    @foreach ($per as $pere)
                    @if (isset($per) && $per->count() > 0)
                    <div class="bg-[#F3F4F6] rounded-[15px] max-w-[350px] border border-[#595959]/10 shadow-[4px_4px_10px_-5px_#71C2FF]">
                        <div class="">
                            <img class="rounded-t-[14px] min-w-full min-h-full object-cover" src="{{  $pere -> image  }}">
                        </div>
                        <div class="p-[20px] flex flex-col items-start">
                            <h4 class="text-[#58ABEA] border-2 border-[#58ABEA] rounded-[15px] px-[15px] py-[2px] mb-[10px]">{{  $pere -> status  }}</h4>
                            <h6 class="text-[#595959] text-18px mb-[5px]">Контейнер №{{  $pere -> number  }}</h6>
                            <p class="text-[#595959] text-16px mb-[15px]">Комплекс “{{ $pere -> residentialComplex-> title }}”</p>
                            <p class="text-[#595959] text-18px mb-[5px]">{{  $pere -> size_category  }}</p>
                            <p class="text-[#595959] text-16px mb-[20px]">Площадь: {{  $pere -> area  }} м² | Объём: {{  $pere -> volume  }} м³ | Этаж: {{  $pere -> floor_or_location  }} </p>
                            <h5 class="text-black text-24px mb-[20px]">{{  $pere -> daily_price  }} ₽ / д.</h5>
                            <button class="py-2.5 text-white text-2xl w-full bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] flex flex-row items-center justify-center transition duration-150 hover:bg-[#179BFF] group" type="button"><div class="ml-[70px]"><a href="{{ route('container_card', $pere->id) }}">Подробнее</div>
                                <svg class="ml-[50px] transition-transform duration-300 group-hover:rotate-45" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4C11.4477 4 11 3.55228 11 3C11 2.44772 11.4477 2 12 2L20 2C21.1046 2 22 2.89543 22 4V12C22 12.5523 21.5523 13 21 13C20.4477 13 20 12.5523 20 12V5.39343L3.72798 21.6655C3.33746 22.056 2.70429 22.056 2.31377 21.6655C1.92324 21.2749 1.92324 20.6418 2.31377 20.2512L18.565 4L12 4Z" fill="white"/>
                                </svg>
                            </a></button>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
    @endsection

