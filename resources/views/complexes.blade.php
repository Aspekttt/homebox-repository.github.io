@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px]">
            @foreach ($app as $elem)

            <div class="bg-white rounded-[20px] shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-row mb-[100px]">
                <div class="max-w-[333px] max-h-[333px] min-h-[333px] min-w-[333px]">
                    <img class="rounded-[18px] h-full w-full object-cover" src="{{  $elem -> image  }}">
                </div>
                <div class="pl-[40px] pr-[120px] py-[20px] flex flex-col justify-between">
                    <div>
                        <h4 class="text-[22px]">{{  $elem -> title  }}</h4>
                        <h5 class="text-[18px] text-[#595959]">{{  $elem -> address  }}</h5>
                    </div>
                    <p class="text-[18px] text-[#595959]">{{  $elem -> description  }}  </p>
                    <a href="{{ route('complex_card', $elem->id) }}"><button class="px-[20px] py-[10px] text-white text-[18px] bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] float-right" type="button">Смотреть контейнеры</button></a>
                </div>
            </div>

            @endforeach
        </div>
    @endsection

