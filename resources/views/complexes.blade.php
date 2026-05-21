@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[40px] sm:pt-[60px] lg:pt-[80px]">
    @foreach ($app as $elem)
    <div class="bg-white rounded-[20px] shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col lg:flex-row mb-[40px] sm:mb-[60px] lg:mb-[100px] transition duration-150 hover:border-[#179BFF]/80 hover:shadow-[7px_7px_25px_-5px_#71C2FF] overflow-hidden">

        <!-- Изображение -->
        <div class="w-full lg:w-auto lg:max-w-[333px] lg:min-w-[333px] h-[250px] sm:h-[300px] lg:h-[333px]">
            <img class="w-full h-full object-cover rounded-t-[18px] lg:rounded-l-[18px] lg:rounded-tr-none" src="{{  asset($elem->image)  }}" alt="{{ $elem->title }}">
        </div>

        <!-- Контент -->
        <div class="flex-1 p-5 sm:p-6 lg:p-8 lg:pl-[40px] lg:pr-[120px] lg:py-[20px] flex flex-col justify-between">
            <div>
                <h4 class="text-20px sm:text-22px font-semibold mb-2">Комплекс "{{ $elem->title }}"</h4>
                <h5 class="text-16px sm:text-18px text-[#595959] mb-4">{{ $elem->address }}</h5>
            </div>

            <p class="text-14px sm:text-16px lg:text-18px text-[#595959] mb-4 line-clamp-3">
                {{ Str::limit($elem->description, 200) }}
            </p>

            <div class="flex justify-center sm:justify-end">
                <a href="{{ route('complex_card', $elem->id) }}">
                    <button class="px-5 sm:px-[20px] py-2 sm:py-[10px] text-white text-14px sm:text-18px bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] w-full sm:w-auto" type="button">
                        Смотреть контейнеры
                    </button>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
