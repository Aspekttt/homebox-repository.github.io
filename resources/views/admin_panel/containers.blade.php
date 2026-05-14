@extends('layouts.app')
    @section('content')
    @if (Auth::user() -> role == "admin")
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px] flex flex-col">
            <div class="flex flex-row justify-between mb-[15px]">
                <a href="{{  route("admin")  }}"><button class="text-[16px] text-white bg-[#71C2FF] rounded-[10px] px-[15px] py-[10px] mb-[10px] transition duration-150 hover:bg-[#179BFF]">Назад</button></a>
                <div class="relative">
                    <form method="GET" action="{{ route('admin.containers') }}" class="inline">
                        <select name="sort" onchange="this.form.submit()" class="appearance-none bg-[#F3F4F6] border border-[#179BFF]/30 rounded-[10px] px-4 py-2 pr-8 text-[#595959] text-14px cursor-pointer focus:outline-none focus:border-[#179BFF] transition-colors duration-150">
                            <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Сортировка</option>
                            <option value="number_asc" {{ request('sort') == 'number_asc' ? 'selected' : '' }}>Номер (по возрастанию)</option>
                            <option value="number_desc" {{ request('sort') == 'number_desc' ? 'selected' : '' }}>Номер (по убыванию)</option>
                            <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Цена (по возрастанию)</option>
                            <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Цена (по убыванию)</option>
                            <option value="area_asc" {{ request('sort') == 'area_asc' ? 'selected' : '' }}>Площадь (по возрастанию)</option>
                            <option value="area_desc" {{ request('sort') == 'area_desc' ? 'selected' : '' }}>Площадь (по убыванию)</option>
                            <option value="status_asc" {{ request('sort') == 'status_asc' ? 'selected' : '' }}>Статус (А-Я)</option>
                            <option value="status_desc" {{ request('sort') == 'status_desc' ? 'selected' : '' }}>Статус (Я-А)</option>
                        </select>
                    </form>
                </div>
                <button id="openModalBtn" class="text-[16px] text-white bg-[#00A919] rounded-[10px] px-[15px] py-[10px] mb-[10px] transition duration-150 hover:bg-[#00D520]">Добавить контейнер</button>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-center round">
                    <thead class="">
                        <tr class="text-[14px] transition duration-150 hover:bg-[#71C2FF]/30">
                            <th class="p-2 border-[1px] border-[#71C2FF]">ЖК</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Номер контейнера</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Категория / Размер</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Площадь</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Объём</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Расположение</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Цена за день</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Статус</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Описание</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Фото</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($containers as $container)
                        <tr class="text-[14px] transition duration-150 hover:bg-[#71C2FF]/30">
                            <td class="p-2 border-[1px] border-[#71C2FF] text-left">{{ $container->residentialComplex->title}}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">{{ $container->number }}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">{{ $container->size_category }}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">{{ $container->area }} м²</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">{{ $container->volume }} м³</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">{{ $container->floor_or_location }}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">{{ $container->daily_price }} ₽</td>
                            <td class="p-2 border-[1px] border-[#71C2FF]  text-center">
                                <span class="px-2 py-1 rounded-full text-xs border-[1px]
                                    @if($container->status == 'Доступный') border-[#58ABEA] text-[#58ABEA]
                                    @elseif($container->status == 'Занятый') border-[#00A919] text-[#00A919]
                                    @elseif($container->status == 'Обслуживание') border-[#D8A500] text-[#D8A500]
                                    @elseif($container->status == 'Недоступный') border-[#FF9292] text-[#FF9292]
                                    @endif">
                                    {{ $container->status }}
                                </span>
                            </td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-[12px] text-left">{{ $container->description }}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-[12px] text-left">{{ $container->image }}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF]">
                                <button class="edit-btn text-[14px] text-white bg-[#71C2FF] mb-[5px] w-full rounded-[10px] px-[10px] py-[5px] transition duration-150 hover:bg-[#179BFF]"
                                data-id="{{ $container->id }}"
                                data-complex_id="{{ $container->residential_complex_id }}"
                                data-number="{{ $container->number }}"
                                data-size_category="{{ $container->size_category }}"
                                data-area="{{ $container->area }}"
                                data-volume="{{ $container->volume }}"
                                data-floor="{{ $container->floor_or_location }}"
                                data-description="{{ $container->description }}"
                                data-price="{{ $container->daily_price }}"
                                data-status="{{ $container->status }}"
                                data-image="{{ $container->image }}">
                                Редактировать
                                </button>
                                <form action="containers/{{ $container->id }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить контейнер №{{ $container->number }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[14px] text-white bg-[#FF6767] w-full rounded-[10px] px-[10px] py-[5px] transition duration-150 hover:bg-[#FF4141]">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Модальное окно для добавления контейнера -->
        <div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
            <div class="relative top-10 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-[20px] bg-white">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Добавить контейнер</h3>
                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                </div>

                <form action="{{ route('admin.containers.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Жилой комплекс</label>
                            <select name="residential_complex_id" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                                <option value="">Выберите ЖК</option>
                                @foreach($complexes as $complex)
                                    <option value="{{ $complex->id }}">{{ $complex->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Номер контейнера</label>
                            <input type="text" name="number" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Размерная категория</label>
                            <input type="text" name="size_category" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Площадь (м²)</label>
                            <input type="number" step="0.01" name="area" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Объём (м³)</label>
                            <input type="number" step="0.01" name="volume" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Расположение</label>
                            <input type="text" name="floor_or_location" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Цена за день (₽)</label>
                            <input type="number" step="0.01" name="daily_price" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Статус</label>
                            <select name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                                <option value="Доступный">Доступный</option>
                                <option value="Занятый">Занятый</option>
                                <option value="Недоступный">Недоступный</option>
                                <option value="Обслуживание">Обслуживание</option>
                            </select>
                        </div>

                        <div class="mb-4 col-span-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Описание</label>
                            <textarea name="description" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]"></textarea>
                        </div>

                        <div class="mb-4 col-span-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">URL фотографии</label>
                            <input type="text" name="image" required placeholder="/storage/containers/photo.jpg" class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#00A919] text-white py-2 rounded-[10px] hover:bg-[#00D520] transition duration-150">Сохранить</button>
                </form>
            </div>
        </div>

        <!-- Модальное окно для редактирования контейнера -->
        <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
            <div class="relative top-10 mx-auto p-5 border w-full max-w-2xl shadow-lg rounded-[20px] bg-white">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Редактировать контейнер</h3>
                    <button id="closeEditModalBtn" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                </div>

                <form id="editForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Жилой комплекс</label>
                            <select id="edit_complex_id" name="residential_complex_id" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                                @foreach($complexes as $complex)
                                    <option value="{{ $complex->id }}">{{ $complex->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Номер контейнера</label>
                            <input id="edit_number" type="text" name="number" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Размерная категория</label>
                            <input id="edit_size_category" type="text" name="size_category" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Площадь (м²)</label>
                            <input id="edit_area" type="number" step="0.01" name="area" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Объём (м³)</label>
                            <input id="edit_volume" type="number" step="0.01" name="volume" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Расположение</label>
                            <input id="edit_floor" type="text" name="floor_or_location" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Цена за день (₽)</label>
                            <input id="edit_price" type="number" step="0.01" name="daily_price" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Статус</label>
                            <select id="edit_status" name="status" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                                <option value="Доступный">Доступный</option>
                                <option value="Занятый">Занятый</option>
                                <option value="Недоступный">Недоступный</option>
                                <option value="Обслуживание">Обслуживание</option>
                            </select>
                        </div>

                        <div class="mb-4 col-span-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Описание</label>
                            <textarea id="edit_description" name="description" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]"></textarea>
                        </div>

                        <div class="mb-4 col-span-2">
                            <label class="block text-gray-700 text-sm font-bold mb-2">URL фотографии</label>
                            <input id="edit_image" type="text" name="image" class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#179BFF] text-white py-2 rounded-[10px] hover:bg-[#0E7ACC] transition duration-150">Обновить</button>
                </form>
            </div>
        </div>

    @endif
        <script>
            const openModalBtn = document.getElementById('openModalBtn');
            const addModal = document.getElementById('addModal');
            const closeModalBtn = document.getElementById('closeModalBtn');

            if (openModalBtn) {
                openModalBtn.onclick = function() {
                    addModal.classList.remove('hidden');
                }
            }

            if (closeModalBtn) {
                closeModalBtn.onclick = function() {
                    addModal.classList.add('hidden');
                }
            }

            const editModal = document.getElementById('editModal');
            const closeEditModalBtn = document.getElementById('closeEditModalBtn');
            const editForm = document.getElementById('editForm');
            const editComplexId = document.getElementById('edit_complex_id');
            const editNumber = document.getElementById('edit_number');
            const editSizeCategory = document.getElementById('edit_size_category');
            const editArea = document.getElementById('edit_area');
            const editVolume = document.getElementById('edit_volume');
            const editFloor = document.getElementById('edit_floor');
            const editDescription = document.getElementById('edit_description');
            const editPrice = document.getElementById('edit_price');
            const editStatus = document.getElementById('edit_status');
            const editImage = document.getElementById('edit_image');

            document.querySelectorAll('.edit-btn').forEach(button => {
                button.onclick = function() {
                    const id = this.dataset.id;
                    editForm.action = `containers/${id}`;

                    editComplexId.value = this.dataset.complex_id;
                    editNumber.value = this.dataset.number;
                    editSizeCategory.value = this.dataset.size_category;
                    editArea.value = this.dataset.area;
                    editVolume.value = this.dataset.volume;
                    editFloor.value = this.dataset.floor;
                    editDescription.value = this.dataset.description;
                    editPrice.value = this.dataset.price;
                    editStatus.value = this.dataset.status;
                    editImage.value = this.dataset.image || '';

                    editModal.classList.remove('hidden');
                }
            });

            if (closeEditModalBtn) {
                closeEditModalBtn.onclick = function() {
                    editModal.classList.add('hidden');
                }
            }

            window.onclick = function(event) {
                if (event.target == addModal) {
                    addModal.classList.add('hidden');
                }
                if (event.target == editModal) {
                    editModal.classList.add('hidden');
                }
            }
        </script>
    @endsection

