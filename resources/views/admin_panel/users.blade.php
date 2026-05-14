@extends('layouts.app')
    @section('content')
    @if (Auth::user() -> role == "admin")
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[80px] flex flex-col">
            <div class="flex flex-row justify-between mb-[15px]">
                <a href="{{  route("admin")  }}"><button class="text-[16px] text-white bg-[#71C2FF] rounded-[10px] px-[15px] py-[10px] mb-[10px] transition duration-150 hover:bg-[#179BFF]">Назад</button></a>
                <div class="relative">
                    <form method="GET" action="{{ route('admin.users') }}" class="inline">
                        <select name="sort" onchange="this.form.submit()" class="appearance-none bg-[#F3F4F6] border border-[#179BFF]/30 rounded-[10px] px-4 py-2 pr-8 text-[#595959] text-14px cursor-pointer focus:outline-none focus:border-[#179BFF] transition-colors duration-150">
                            <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Сортировка</option>
                            <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Название (А-Я)</option>
                            <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Название (Я-А)</option>
                        </select>
                    </form>
                </div>
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
                        <tr class="transition duration-150 hover:bg-[#71C2FF]/30">
                            <th class="p-2 border-[1px] border-[#71C2FF]">Имя пользователя</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Почта пользователя</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Телефон пользователя</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Роль пользователя</th>
                            <th class="p-2 border-[1px] border-[#71C2FF]">Дата регистрации аккаунта</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="transition duration-150 hover:bg-[#71C2FF]/30">
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">{{  $user -> name  }}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">{{  $user -> email  }}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center" >{{  $user -> phone  }}</td>
                            <td class="p-2 border-[1px] border-[#71C2FF] text-center">
                                <form method="post" action="{{ route('admin.users.role', $user->id) }}">
                                    @csrf
                                    <select class="appearance-none bg-[#F3F4F6] border border-[#179BFF]/30 rounded-[10px] px-4 py-2 pr-8 text-[#595959] text-14px cursor-pointer focus:outline-none focus:border-[#179BFF] transition-colors duration-150" name="role" onchange="this.form.submit()" >
                                        <option value="user" {{ $user -> role == "user" ? "selected" : "" }} >user</option>
                                        <option value="admin" {{ $user -> role == "admin" ? "selected" : "" }} >admin</option>
                                    </select>
                                </form></td></td>
                            <td class="p-2 border-[1px] text-center border-[#71C2FF]">{{  $user -> created_at  }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @endsection
