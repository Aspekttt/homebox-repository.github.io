@extends('layouts.app')
    @section('content')
    @if (Auth::user() -> role == "admin")
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px] flex flex-col">
            <!-- Верхняя панель -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
                <a href="{{  route('admin')  }}" class="w-full sm:w-auto">
                    <button class="text-[14px] sm:text-[16px] text-white bg-[#71C2FF] rounded-[10px] px-4 sm:px-5 py-2 sm:py-2.5 transition duration-150 hover:bg-[#179BFF] w-full sm:w-auto">Назад</button>
                </a>
                <div class="relative w-full sm:w-auto">
                    <form method="GET" action="{{  route('admin.complexes')  }}" class="inline w-full">
                        <select name="sort" onchange="this.form.submit()" class="appearance-none bg-[#F3F4F6] border border-[#179BFF]/30 rounded-[10px] px-4 py-2 pr-8 text-[#595959] text-[14px] cursor-pointer focus:outline-none focus:border-[#179BFF] transition-colors duration-150 w-full sm:w-auto">
                            <option value="default" {{  request('sort') == 'default' ? 'selected' : ''  }}>Сортировка</option>
                            <option value="name_asc" {{  request('sort') == 'name_asc' ? 'selected' : ''  }}>Название (А-Я)</option>
                            <option value="name_desc" {{  request('sort') == 'name_desc' ? 'selected' : ''  }}>Название (Я-А)</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-4 h-4 text-[#179BFF]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </div>
                    </form>
                </div>
                <button id="openModalBtn" class="text-[14px] sm:text-[16px] text-white bg-[#00A919] rounded-[10px] px-4 sm:px-5 py-2 sm:py-2.5 transition duration-150 hover:bg-[#00D520] w-full sm:w-auto">Добавить жилой комплекс</button>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="w-full text-center round">
                    <thead class="">
                        <tr class="text-[12px] sm:text-[14px] transition duration-150 hover:bg-[#71C2FF]/30">
                            <th class="p-2 sm:p-3 border-[1px] border-[#71C2FF]">Название ЖК</th>
                            <th class="p-2 sm:p-3 border-[1px] border-[#71C2FF]">Адрес ЖК</th>
                            <th class="p-2 sm:p-3 border-[1px] border-[#71C2FF]">Описание ЖК</th>
                            <th class="p-2 sm:p-3 border-[1px] border-[#71C2FF]">Фотография ЖК</th>
                            <th class="p-2 sm:p-3 border-[1px] border-[#71C2FF]">Активность ЖК</th>
                            <th class="p-2 sm:p-3 border-[1px] border-[#71C2FF]">Действие</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complexes as $complex)
                        <tr class="transition duration-150 hover:bg-[#71C2FF]/30">
                            <td class="p-2 sm:p-3 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px] text-left">{{  $complex -> title  }}</td>
                            <td class="p-2 sm:p-3 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px] text-left">{{  $complex -> address  }}</td>
                            <td class="p-2 sm:p-3 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px] text-left max-w-[200px] md:max-w-[300px] truncate" >{{  $complex -> description  }}</td>
                            <td class="p-2 sm:p-3 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px] text-left">{{  $complex -> image  }}</td>
                            <td class="p-2 sm:p-3 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">{{  $complex -> is_active ? 'true' : 'false'  }}</td>
                            <td class="p-2 sm:p-3 border-[1px] border-[#71C2FF]">
                                <button class="edit-btn text-[14px] text-white bg-[#71C2FF] mb-[5px] w-full rounded-[10px] px-[10px] py-[5px] transition duration-150 hover:bg-[#179BFF]"
                                data-id="{{ $complex->id }}"
                                data-title="{{ $complex->title }}"
                                data-address="{{ $complex->address }}"
                                data-description="{{ $complex->description }}"
                                data-image="{{ $complex->image }}"
                                data-is_active="{{ $complex->is_active }}">
                            Редактировать
                        </button>
                                <form action="complexes/{{ $complex->id }}" method="POST" onsubmit="return confirm('Вы уверены, что хотите удалить ЖК «{{ $complex->title }}»?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[12px] sm:text-[14px] text-white bg-[#FF6767] w-full rounded-[10px] px-2 sm:px-3 py-1.5 transition duration-150 hover:bg-[#FF4141]">Удалить</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Модальное окно для добавления ЖК -->
        <div id="addModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-[20px] bg-white">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Добавить жилой комплекс</h3>
                    <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                </div>

                <form action="{{ route('admin.complexes.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Название ЖК</label>
                        <input type="text" name="title" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Адрес ЖК</label>
                        <input type="text" name="address" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Описание ЖК</label>
                        <textarea name="description" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Фотография ЖК</label>
                        <input type="text" name="image" placeholder="/resources/img/complex_0.jpg" class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                        <small class="text-gray-500">Оставьте пустым, если не хотите менять фото</small>
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" checked class="mr-2">
                            <span class="text-gray-700 text-sm font-bold">Активен</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full bg-[#00A919] text-white py-2 rounded-[10px] hover:bg-[#00D520] transition duration-150">Сохранить</button>
                </form>
            </div>
        </div>

        <!-- Модальное окно для редактирования ЖК -->
        <div id="editModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
            <div class="relative top-20 mx-auto p-5 border w-full max-w-md shadow-lg rounded-[20px] bg-white">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-semibold">Редактировать жилой комплекс</h3>
                    <button id="closeEditModalBtn" class="text-gray-400 hover:text-gray-600 text-2xl">&times;</button>
                </div>

                <form id="editForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Название ЖК</label>
                        <input id="edit_title" type="text" name="title" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Адрес ЖК</label>
                        <input id="edit_address" type="text" name="address" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Описание ЖК</label>
                        <textarea id="edit_description" name="description" rows="3" required class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]"></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Текущая фотография</label>
                        <input id="edit_image" type="text" name="image" class="w-full px-3 py-2 border border-gray-300 rounded-[10px] focus:outline-none focus:border-[#179BFF]">
                    </div>

                    <div class="mb-4">
                        <label class="flex items-center">
                            <input id="edit_is_active" type="checkbox" name="is_active" value="1" class="mr-2">
                            <span class="text-gray-700 text-sm font-bold">Активен</span>
                        </label>
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
            const editTitle = document.getElementById('edit_title');
            const editAddress = document.getElementById('edit_address');
            const editDescription = document.getElementById('edit_description');
            const editImage = document.getElementById('edit_image');
            const editIsActive = document.getElementById('edit_is_active');

            document.querySelectorAll('.edit-btn').forEach(button => {
                button.onclick = function() {
                    const id = this.dataset.id;
                    const title = this.dataset.title;
                    const address = this.dataset.address;
                    const description = this.dataset.description;
                    const image = this.dataset.image;
                    const isActive = this.dataset.is_active === '1' || this.dataset.is_active === 1;

                    editTitle.value = title;
                    editAddress.value = address;
                    editDescription.value = description;
                    editImage.value = image;
                    editIsActive.checked = isActive;

                    editForm.action = `complexes/${id}`;

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

