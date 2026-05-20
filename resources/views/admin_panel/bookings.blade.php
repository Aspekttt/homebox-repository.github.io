@extends('layouts.app')
@section('content')
@if (Auth::user() && Auth::user()->role == "admin")
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-[40px] sm:pt-[60px] lg:pt-[80px] flex flex-col">
    <div class="flex flex-col sm:flex-row justify-between mb-[15px] gap-4">
        <a href="{{ route("admin") }}">
            <button class="text-[14px] sm:text-[16px] text-white bg-[#71C2FF] rounded-[10px] px-4 sm:px-[15px] py-2 sm:py-[10px] transition duration-150 hover:bg-[#179BFF] w-full sm:w-auto">Назад</button>
        </a>
        <div class="relative w-full sm:w-auto">
            <form method="GET" action="{{ route('admin.bookings') }}" class="inline">
                <select name="sort" onchange="this.form.submit()" class="appearance-none bg-[#F3F4F6] border border-[#179BFF]/30 rounded-[10px] px-4 py-2 pr-8 text-[#595959] text-12px sm:text-14px cursor-pointer focus:outline-none focus:border-[#179BFF] transition-colors duration-150 w-full sm:w-auto">
                    <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>Сортировка</option>
                    <option value="id_asc" {{ request('sort') == 'id_asc' ? 'selected' : '' }}>ID (по возрастанию)</option>
                    <option value="id_desc" {{ request('sort') == 'id_desc' ? 'selected' : '' }}>ID (по убыванию)</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Стоимость (сначала дешевые)</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Стоимость (сначала дорогие)</option>
                    <option value="status_asc" {{ request('sort') == 'status_asc' ? 'selected' : '' }}>Статус (А-Я)</option>
                    <option value="status_desc" {{ request('sort') == 'status_desc' ? 'selected' : '' }}>Статус (Я-А)</option>
                    <option value="date_asc" {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Дата создания (сначала старые)</option>
                    <option value="date_desc" {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Дата создания (сначала новые)</option>
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
        <table class="w-full text-center round min-w-[1000px]">
            <thead class="">
                <tr class="transition duration-150 hover:bg-[#71C2FF]/30">
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">ID</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Пользователь</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Контейнер</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Стоимость</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Дата начала</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Дата окончания</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Комментарий</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Статус</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Дата создания</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Дата обновления</th>
                    <th class="p-2 border-[1px] border-[#71C2FF] text-[12px] sm:text-[14px]">Действие</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr class="transition duration-150 hover:bg-[#71C2FF]/30">
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center text-[12px] sm:text-[14px]">{{ $booking->id }}</td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center text-[12px] sm:text-[14px]">
                        {{ $booking->user->name }}<br>
                        <small class="text-gray-500 text-[10px] sm:text-[12px]">{{ $booking->user->email }}</small>
                    </td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center text-[12px] sm:text-[14px]">
                        №{{ $booking->container->number }}<br>
                        <small class="text-gray-500 text-[10px] sm:text-[12px]">{{ $booking->container->residentialComplex->title }}</small>
                    </td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center text-[12px] sm:text-[14px]">{{ number_format($booking->total_price, 0, ',', ' ') }} ₽</td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center text-[12px] sm:text-[14px] whitespace-nowrap">{{ date('d.m.Y', strtotime($booking->start_date)) }}</td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center text-[12px] sm:text-[14px] whitespace-nowrap">{{ date('d.m.Y', strtotime($booking->end_date)) }}</td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-left max-w-[150px] sm:max-w-[200px] truncate text-[12px] sm:text-[14px]">{{ $booking->comment ?: '—' }}</td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center">
                        <span class="px-2 py-1 rounded-full text-[10px] sm:text-xs border-[1px] whitespace-nowrap
                            @if($booking->status == 'Новая') border-[#179BFF] text-[#179BFF]
                            @elseif($booking->status == 'Подтверждена') border-[#00A919] text-[#00A919]
                            @elseif($booking->status == 'Завершена') border-[#58ABEA] text-[#58ABEA]
                            @elseif($booking->status == 'Отменена') border-[#FF9292] text-[#FF9292]
                            @elseif($booking->status == 'Отклонена') border-[#D8A500] text-[#D8A500]
                            @endif">
                            {{ $booking->status }}
                        </span>
                    </td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center text-[12px] sm:text-[14px] whitespace-nowrap">{{ $booking->created_at->format('d.m.Y H:i') }}</td>
                    <td class="p-2 border-[1px] border-[#71C2FF] text-center text-[12px] sm:text-[14px] whitespace-nowrap">{{ $booking->updated_at->format('d.m.Y H:i') }}</td>
                    <td class="p-2 border-[1px] border-[#71C2FF]">
                        @if($booking->status == 'Новая')
                            <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST" class="mb-1">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Подтверждена">
                                <button type="submit" class="text-[11px] sm:text-[14px] text-white bg-[#00A919] w-full rounded-[10px] px-2 sm:px-[10px] py-1 sm:py-[5px] transition duration-150 hover:bg-[#00D520]">Подтвердить</button>
                            </form>
                            <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Отклонена">
                                <button type="submit" class="text-[11px] sm:text-[14px] text-white bg-[#D8A500] w-full rounded-[10px] px-2 sm:px-[10px] py-1 sm:py-[5px] transition duration-150 hover:bg-[#FFC300]">Отклонить</button>
                            </form>
                        @elseif($booking->status == 'Подтверждена')
                            <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST" class="mb-1">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Завершена">
                                <button type="submit" class="text-[11px] sm:text-[14px] text-white bg-[#71C2FF] w-full rounded-[10px] px-2 sm:px-[10px] py-1 sm:py-[5px] transition duration-150 hover:bg-[#179BFF]">Завершить</button>
                            </form>
                            <form action="{{ route('admin.bookings.update-status', $booking->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status" value="Отменена">
                                <button type="submit" class="text-[11px] sm:text-[14px] text-white bg-[#FF6767] w-full rounded-[10px] px-2 sm:px-[10px] py-1 sm:py-[5px] transition duration-150 hover:bg-[#FF4242]">Отменить</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
