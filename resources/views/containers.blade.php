@extends('layouts.app')
    @section('content')
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px] flex flex-row gap-8">
            <div class="min-w-[350px]">
                <form method="GET" action="{{ route('containers') }}" id="filterForm">
                <div class="flex justify-center items-left flex-col">
                    <details open class="bg-[#F3F4F6] rounded-[20px] px-[20px] block overflow-hidden mb-[30px]  transition-colors duration-150">
                        <summary class="block text-black text-xl py-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Жилой комплекс</summary>
                            <div class="ml-1">
                                <div class="flex flex-row items-center pb-[15px] gap-2">
                                    <input id="complex_all" type="checkbox" value="all" name="complexes[]" class="rounded-[3px] complex-checkbox"
                                    {{ (!request()->has('complexes') || in_array('all', request()->get('complexes', []))) ? 'checked' : '' }}>
                                    <label for="complex_all" >Все</label>
                                </div>
                                @foreach($residentialComplexes as $complex)
                                <div class="flex flex-row items-center gap-2 pb-[15px]">
                                    <input id="complex_{{ $complex->id }}" type="checkbox" value="{{ $complex->id }}" name="complexes[]" class="rounded-[3px] complex-checkbox"
                                    {{ request()->has('complexes') && in_array($complex->id, request()->get('complexes', [])) ? 'checked' : '' }}>
                                    <label for="complex_{{ $complex->id }}">{{ $complex->title }}</label>
                                </div>
                                @endforeach
                            </div>
                    </details>

                    <details open class="bg-[#F3F4F6] rounded-[20px] px-[20px] block overflow-hidden mb-[30px]  transition-colors duration-150">
                        <summary class="block text-black text-xl py-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Размер, м²</summary>
                        <div class="flex flex-row mb-[20px]">
                            <input type="number" name="area_from" placeholder="От" value="{{ request('area_from') }}" class="w-full rounded-l-[10px] border border-gray-300 p-2 focus:outline-none focus:border-[#179BFF]">
                            <input type="number" name="area_to" placeholder="До" value="{{ request('area_to') }}" class="w-full rounded-r-[10px] border border-gray-300 p-2 focus:outline-none focus:border-[#179BFF]">
                        </div>
                    </details>

                    <details open class="bg-[#F3F4F6] rounded-[20px] px-[20px] block overflow-hidden mb-[30px]  transition-colors duration-150">
                        <summary class="block text-black text-xl py-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Цена, ₽</summary>
                        <div class="flex flex-row mb-[20px]">
                            <input type="number" name="price_from" placeholder="От" value="{{ request('price_from') }}" class="w-full rounded-l-[10px] border border-gray-300 p-2 focus:outline-none focus:border-[#179BFF]">
                            <input type="number" name="price_to" placeholder="До" value="{{ request('price_to') }}" class="w-full rounded-r-[10px] border border-gray-300 p-2 focus:outline-none focus:border-[#179BFF]">
                        </div>
                    </details>

                    <details open class="bg-[#F3F4F6] rounded-[20px] px-[20px] block overflow-hidden mb-[30px]  transition-colors duration-150">
                        <summary class="block text-black text-xl py-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Статус</summary>
                        <div class="ml-1">
                                <div class="flex flex-row items-center gap-2">
                                    <input id="status_any" type="checkbox" value="any" name="statuses[]" class="rounded-[3px] status-checkbox"
                                    {{ (!request()->has('statuses') || in_array('any', request()->get('statuses', []))) ? 'checked' : '' }}>
                                    <label for="status_any" >Любой</label>
                                </div>
                                <div class="flex flex-row items-center gap-2 py-[5px]">
                                    <input id="status_available" type="checkbox" value="Доступный" name="statuses[]" class="rounded-[3px] status-checkbox"
                                    {{ request()->has('statuses') && in_array('Доступный', request()->get('statuses', [])) ? 'checked' : '' }}>
                                    <label for="status_available" >Доступный</label>
                                </div>
                                <div class="flex flex-row items-center gap-2 py-[5px]">
                                    <input id="status_occupied" type="checkbox" value="Занятый" name="statuses[]" class="rounded-[3px] status-checkbox"
                                    {{ request()->has('statuses') && in_array('Занятый', request()->get('statuses', [])) ? 'checked' : '' }}>
                                    <label for="status_occupied" >Занятый</label>
                                </div>
                                <div class="flex flex-row items-center gap-2 py-[5px]">
                                    <input id="status_unavailable" type="checkbox" value="Недоступный" name="statuses[]" class="rounded-[3px] status-checkbox"
                                    {{ request()->has('statuses') && in_array('Недоступный', request()->get('statuses', [])) ? 'checked' : '' }}>
                                    <label for="status_unavailable" >Недоступный</label>
                                </div>
                                <div class="flex flex-row items-center gap-2 pb-[20px]">
                                    <input id="status_maintenance" type="checkbox" value="Обслуживание" name="statuses[]" class="rounded-[3px] status-checkbox"
                                    {{ request()->has('statuses') && in_array('Обслуживание', request()->get('statuses', [])) ? 'checked' : '' }}>
                                    <label for="status_maintenance" >Обслуживание</label>
                                </div>
                            </div>
                    </details>

                    <details open class="bg-[#F3F4F6] rounded-[20px] px-[20px] block overflow-hidden mb-[30px]  transition-colors duration-150">
                        <summary class="block text-black text-xl py-[20px] cursor-pointer hover:text-[#595959] transition-colors duration-150 summary">Доступность на даты</summary>
                        <div class="flex flex-row mb-[20px]">
                            <input type="date" name="date_from" placeholder="С" value="{{ request('date_from') }}" class="w-full rounded-l-[10px] border border-gray-300 p-2 focus:outline-none focus:border-[#179BFF]">
                            <input type="date" name="date_to" placeholder="До" value="{{ request('date_to') }}" class="w-full rounded-r-[10px] border border-gray-300 p-2 focus:outline-none focus:border-[#179BFF]">
                        </div>
                    </details>
                    <button type="button" id="resetFilters" class="flex flex-row bg-[#71C2FF] text-white rounded-[20px] p-[15px] text-[18px] gap-6 items-center justify-center transition duration-150 hover:bg-[#179BFF] group">Сбросить фильтры
                        <svg class="transition-transform duration-300 group-hover:-rotate-45" width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.52186 7H7C7.55229 7 8 7.44771 8 8C8 8.55228 7.55228 9 7 9H3C1.89543 9 1 8.10457 1 7V3C1 2.44771 1.44772 2 2 2C2.55228 2 3 2.44771 3 3V5.67541C4.1421 4.05017 5.70859 2.75709 7.53982 1.94481C9.78743 0.947842 12.3043 0.732653 14.6885 1.3336C17.0727 1.93454 19.1868 3.31697 20.6934 5.26017C21.9949 6.939 22.7781 8.95275 22.9594 11.0552C23.0068 11.6054 22.5477 12.0518 21.9954 12.0491C21.4432 12.0464 20.999 11.5951 20.9404 11.0459C20.764 9.39335 20.132 7.81481 19.1057 6.49104C17.8743 4.90272 16.1463 3.77276 14.1975 3.28156C12.2487 2.79036 10.1915 2.96625 8.35437 3.78115C6.82323 4.46031 5.51853 5.55071 4.57994 6.92229C4.56157 6.94914 4.54218 6.97505 4.52186 7Z" fill="white"/>
                        <path d="M21 18.3246C19.8579 19.9498 18.2914 21.2429 16.4602 22.0552C14.2126 23.0522 11.6957 23.2673 9.31152 22.6664C6.9273 22.0654 4.81316 20.683 3.30663 18.7398C2.00506 17.061 1.22186 15.0472 1.04064 12.9448C0.993209 12.3946 1.45229 11.9482 2.00456 11.9509C2.55684 11.9536 3.00103 12.4049 3.05963 12.954C3.23597 14.6066 3.86797 16.1852 4.89426 17.509C6.12566 19.0973 7.85371 20.2272 9.80251 20.7184C11.7513 21.2096 13.8085 21.0337 15.6456 20.2188C17.1768 19.5397 18.4815 18.4493 19.4201 17.0777C19.4384 17.0509 19.4578 17.0249 19.4781 17H17C16.4477 17 16 16.5523 16 16C16 15.4477 16.4477 15 17 15H21C22.1046 15 23 15.8954 23 17V21C23 21.5523 22.5523 22 22 22C21.4477 22 21 21.5523 21 21V18.3246Z" fill="white"/>
                        </svg>
                    </button>
                    <input type="hidden" name="sort" value="{{ request('sort', 'default') }}">
                </div>
                </form>
            </div>
            <div class="w-full">
                <div class="">
                    <form method="GET" action="{{ route('containers') }}" class="relative">
                        @foreach($queryParams as $key => $value)
                            @if(is_array($value))
                                @foreach($value as $item)
                                    <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                                @endforeach
                            @else
                                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                            @endif
                        @endforeach
                        <select name="sort" id="sortSelectForm" class="appearance-none bg-[#F3F4F6] border border-[#179BFF]/30 rounded-[15px] px-6 py-3 pr-10 text-[#595959] text-16px cursor-pointer focus:outline-none focus:border-[#179BFF] transition-colors duration-150">
                            <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>По умолчанию</option>
                                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена: по возрастанию</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена: по убыванию</option>
                                <option value="area_asc" {{ request('sort') == 'area_asc' ? 'selected' : '' }}>Площадь: по возрастанию</option>
                                <option value="area_desc" {{ request('sort') == 'area_desc' ? 'selected' : '' }}>Площадь: по убыванию</option>
                        </select>
                    </form>
                </div>
                <div class="flex flex-row flex-wrap justify-between mt-[20px]">
                    @foreach ($per as $pere)
                    <div class="bg-[#F3F4F6] rounded-[15px] max-w-[400px] border border-[#595959]/10 shadow-[4px_4px_10px_-5px_#71C2FF] transition duration-150 hover:border-[#179BFF]/30 hover:shadow-[7px_7px_25px_-5px_#71C2FF]">
                        <div class="">
                            <img class="rounded-t-[14px] min-w-full min-h-full object-cover" src="{{  $pere -> image  }}">
                        </div>
                        <div class="p-[20px] flex flex-col items-start">
                            <h4 class="border-2 rounded-[20px] px-[15px] py-[2px] mb-[10px]
                                @if($pere->status == 'Доступный')
                                    text-[#58ABEA] border-2 border-[#58ABEA]
                                @elseif($pere->status == 'Занятый')
                                    text-[#00A919] border-2 border-[#00A919]
                                @elseif($pere->status == 'Недоступный')
                                    text-[#FF9292] border-2 border-[#FF9292]
                                @elseif($pere->status == 'Обслуживание')
                                    text-[#D8A500] border-2 border-[#D8A500]
                                @endif">{{  $pere -> status  }}</h4>
                            <h6 class="text-[#595959] text-18px mb-[5px]">Контейнер №{{  $pere -> number  }}</h6>
                            <p class="text-[#595959] text-16px mb-[15px]">Комплекс “{{ $pere -> residentialComplex-> title }}”</p>
                            <p class="text-[#595959] text-18px mb-[5px]">{{  $pere -> size_category  }}</p>
                            <p class="text-[#595959] text-16px mb-[20px]">Площадь: {{  $pere -> area  }} м² | Объём: {{  $pere -> volume  }} м³ | Этаж: {{  $pere -> floor_or_location  }} </p>
                            <h5 class="text-black text-24px mb-[20px]">{{  $pere -> daily_price  }} ₽ / д.</h5>
                            <a class="w-full" href="{{ route('container_card', $pere->id) }}"><button class="py-2.5 text-white text-2xl w-full bg-[#179BFF] bg-[#71C2FF] rounded-lg transition duration-150 hover:bg-[#179BFF] flex flex-row items-center justify-center group" type="button"><div class="ml-[70px]">Подробнее</div>
                                <svg class="ml-[50px] transition-transform duration-300 group-hover:rotate-45" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4C11.4477 4 11 3.55228 11 3C11 2.44772 11.4477 2 12 2L20 2C21.1046 2 22 2.89543 22 4V12C22 12.5523 21.5523 13 21 13C20.4477 13 20 12.5523 20 12V5.39343L3.72798 21.6655C3.33746 22.056 2.70429 22.056 2.31377 21.6655C1.92324 21.2749 1.92324 20.6418 2.31377 20.2512L18.565 4L12 4Z" fill="white"/>
                                </svg>
                            </button></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <script>
    // Автоматическая отправка формы при изменении любого фильтра
    document.querySelectorAll('#filterForm input, #filterForm select').forEach(element => {
        element.addEventListener('change', function() {
            if (this.type !== 'number') {
                document.getElementById('filterForm').submit();
            }
        });
    });

    // Для числовых полей отправляем форму через 2000ms после завершения ввода
    let timeout;
    document.querySelectorAll('#filterForm input[type="number"]').forEach(element => {
        element.addEventListener('input', function() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                document.getElementById('filterForm').submit();
            }, 2000);
        });
    });

    // Обработка чекбокса "Все" для ЖК
    document.querySelectorAll('.complex-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.value === 'all' && this.checked) {
                document.querySelectorAll('.complex-checkbox').forEach(cb => {
                    if (cb.value !== 'all') cb.checked = false;
                });
            } else if (this.value !== 'all' && this.checked) {
                const allCheckbox = document.querySelector('.complex-checkbox[value="all"]');
                if (allCheckbox) allCheckbox.checked = false;
            }
            document.getElementById('filterForm').submit();
        });
    });

    // Обработка чекбокса "Любой" для статусов
    document.querySelectorAll('.status-checkbox').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.value === 'any' && this.checked) {
                document.querySelectorAll('.status-checkbox').forEach(cb => {
                    if (cb.value !== 'any') cb.checked = false;
                });
            } else if (this.value !== 'any' && this.checked) {
                const anyCheckbox = document.querySelector('.status-checkbox[value="any"]');
                if (anyCheckbox) anyCheckbox.checked = false;
            }
            document.getElementById('filterForm').submit();
        });
    });

    // Сортировка
    document.getElementById('sortSelectForm').addEventListener('change', function() {
        const sortInput = document.querySelector('input[name="sort"]');
        if (sortInput) sortInput.value = this.value;
        document.getElementById('filterForm').submit();
    });

    // Сброс фильтров
    document.getElementById('resetFilters').addEventListener('click', function() {
        window.location.href = '{{ route("containers") }}';
    });
</script>

    @endsection

