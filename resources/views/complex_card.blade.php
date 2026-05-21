@extends('layouts.app')
@section('content')
<!-- Изображение комплекса -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[40px] sm:pt-[60px] lg:pt-[80px]">
    <div>
        <img class="rounded-[20px] sm:rounded-[25px] lg:rounded-[35px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] w-full h-[200px] sm:h-[280px] lg:h-[350px] object-cover" src="{{ $complex->image }}" alt="{{ $complex->title }}">
    </div>
</div>

<!-- Информация о комплексе -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[30px] sm:pt-[40px] lg:pt-[50px]">
    <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col p-[15px] sm:p-[20px] lg:p-[25px]">
        <h5 class="text-[18px] sm:text-[20px] pb-[10px] font-semibold">Комплекс "{{ $complex->title }}"</h5>
        <p class="text-[16px] sm:text-[18px] text-[#595959]">{{ $complex->address }}</p>
    </div>
</div>

<!-- Описание комплекса -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[30px] sm:pt-[40px] lg:pt-[50px]">
    <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] flex flex-col mb-[20px] p-[15px] sm:p-[20px] lg:p-[25px]">
        <h5 class="text-[18px] sm:text-[20px] pb-[10px]">Описание</h5>
        <p class="text-[16px] sm:text-[18px] text-[#595959] leading-relaxed">{{ $complex->description }}</p>
    </div>
</div>

<!-- Контейнеры в комплексе -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[30px] sm:pt-[40px] lg:pt-[50px]">
    <div class="flex flex-col sm:flex-row justify-between items-center mb-[20px] gap-4">
        <h3 class="text-[20px] sm:text-[22px] text-black">Контейнеры в жилом комплексе</h3>

        <form method="GET" action="{{ route('complex_card', $complex->id) }}" class="relative w-full sm:w-auto">
            @if(isset($queryParams) && count($queryParams) > 0)
                @foreach($queryParams as $key => $value)
                    @if(is_array($value))
                        @foreach($value as $item)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
            @endif

            <select name="sort" id="sortSelectForm" class="appearance-none bg-[#F3F4F6] border border-[#179BFF]/30 rounded-[15px] px-4 sm:px-6 py-2 sm:py-3 pr-8 sm:pr-10 text-[14px] sm:text-[16px] text-[#595959] cursor-pointer focus:outline-none focus:border-[#179BFF] transition-colors duration-150 w-full sm:w-auto">
                <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>По умолчанию</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена: по возрастанию</option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена: по убыванию</option>
                <option value="area_asc" {{ request('sort') == 'area_asc' ? 'selected' : '' }}>Площадь: по возрастанию</option>
                <option value="area_desc" {{ request('sort') == 'area_desc' ? 'selected' : '' }}>Площадь: по убыванию</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                <svg class="w-4 h-4 text-[#179BFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </form>
    </div>

    @if(isset($per) && $per->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6 mt-[20px]">
            @foreach ($per as $pere)
            <div class="bg-[#F3F4F6] rounded-[15px] border border-[#595959]/10 shadow-[4px_4px_10px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/30 hover:shadow-[7px_7px_25px_-5px_#71C2FF] flex flex-col h-full">
                <div class="overflow-hidden rounded-t-[14px]">
                    <img class="w-full h-[180px] sm:h-[200px] object-cover transition duration-300 hover:scale-105" src="{{ $pere->{{  asset('image')  }} }}" alt="Контейнер №{{ $pere->number }}">
                </div>
                <div class="p-4 sm:p-5 flex flex-col flex-1">
                    <h4 class="inline-block border-2 rounded-[15px] px-3 sm:px-4 py-1 mb-3 text-sm sm:text-base w-fit
                        @if($pere->status == 'Доступный')
                            text-[#58ABEA] border-[#58ABEA]
                        @elseif($pere->status == 'Занятый')
                            text-[#00A919] border-[#00A919]
                        @elseif($pere->status == 'Недоступный')
                            text-[#FF9292] border-[#FF9292]
                        @elseif($pere->status == 'Обслуживание')
                            text-[#D8A500] border-[#D8A500]
                        @endif">{{ $pere->status }}</h4>

                    <h6 class="text-[#595959] text-base sm:text-lg mb-1">Контейнер №{{ $pere->number }}</h6>
                    <p class="text-[#595959] text-sm sm:text-base mb-3">Комплекс "{{ $pere->residentialComplex->title }}"</p>
                    <p class="text-[#595959] text-base sm:text-lg mb-2">{{ $pere->size_category }}</p>
                    <p class="text-[#595959] text-sm sm:text-base mb-4">Площадь: {{ $pere->area }} м² | Объём: {{ $pere->volume }} м³ | Этаж: {{ $pere->floor_or_location }}</p>

                    <h5 class="text-black text-xl sm:text-2xl mb-4">{{ number_format($pere->daily_price, 0, ',', ' ') }} ₽ / д.</h5>

                    <a href="{{ route('container_card', $pere->id) }}" class="mt-auto">
                        <button class="py-2 sm:py-2.5 text-white text-lg sm:text-xl w-full bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] flex items-center justify-center group" type="button">
                            <span class="ml-[80px]">Подробнее</span>
                            <svg class="ml-[80px] transition-transform duration-300 group-hover:rotate-45" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4C11.4477 4 11 3.55228 11 3C11 2.44772 11.4477 2 12 2L20 2C21.1046 2 22 2.89543 22 4V12C22 12.5523 21.5523 13 21 13C20.4477 13 20 12.5523 20 12V5.39343L3.72798 21.6655C3.33746 22.056 2.70429 22.056 2.31377 21.6655C1.92324 21.2749 1.92324 20.6418 2.31377 20.2512L18.565 4L12 4Z" fill="white"/>
                            </svg>
                        </button>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="bg-white rounded-[20px] border-[1px] border-[#179BFF]/50 shadow-[5px_5px_15px_-5px_#71C2FF] p-8 sm:p-12 text-center mt-5">
            <p class="text-[#595959] text-16px sm:text-18px">В этом жилом комплексе пока нет контейнеров</p>
        </div>
    @endif
</div>

<script>
    document.getElementById('sortSelectForm').addEventListener('change', function() {
        this.form.submit();
    });
</script>
@endsection
