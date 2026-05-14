<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\residential_complexes;
use App\Models\containers;
use App\Models\bookings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Admin_Controller extends Controller
{
    public function index() {
        $stats = [
            'complexes_count' => residential_complexes::count(),
            'containers_count' => containers::count(),
            'bookings_count' => bookings::count(),
            'users_count' => User::count(),
            'active_bookings' => bookings::whereIn('status', ['Новая', 'Подтверждена'])->count(),
            'available_containers' => containers::where('status', 'Доступный')->count(),
        ];

        return view('admin_panel.admin', compact('stats'));
    }

    public function complexes(Request $request) {
        $query = residential_complexes::query();
        $sort = $request->get('sort', 'default');

        switch ($sort) {
            case 'name_asc':
                $query->orderBy('title', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('title', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $complexes = $query->get();
        return view('admin_panel.complexes', compact('complexes'));
    }

    public function complexesDestroy($id) {
        $complex = residential_complexes::findOrFail($id);
        $complex->delete();

        return redirect()->route('admin.complexes')->with('success', 'Жилой комплекс удален успешно!');
    }

    public function complexesUpdate(Request $request, $id) {
        $complex = residential_complexes::findOrFail($id);

        $request->validate([
            'title' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable',
        ]);

        $complex->title = $request->title;
        $complex->address = $request->address;
        $complex->description = $request->description;
        $complex->image = $request->image;
        $complex->is_active = $request->has('is_active') ? 1 : 0;

        $complex->save();

        return redirect()->route('admin.complexes')->with('success', 'Жилой комплекс обновлен успешно!');
    }

    public function complexesStore(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'address' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string',
        ]);

        residential_complexes::create([
            'title' => $request->title,
            'address' => $request->address,
            'description' => $request->description,
            'image' => $request->image,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.complexes')->with('success', 'Жилой комплекс добавлен успешно!');
    }


    public function containers(Request $request) {
        $query = containers::with('residentialComplex');
        $sort = $request->get('sort', 'default');

        switch ($sort) {
            case 'number_asc':
                $query->orderBy('number', 'asc');
                break;
            case 'number_desc':
                $query->orderBy('number', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('daily_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('daily_price', 'desc');
                break;
            case 'area_asc':
                $query->orderBy('area', 'asc');
                break;
            case 'area_desc':
                $query->orderBy('area', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $containers = $query->get();
        $complexes = residential_complexes::all(); // Для выпадающего списка в модальных окнах

        return view('admin_panel.containers', compact('containers', 'complexes'));
    }

    public function containersStore(Request $request) {
        $request->validate([
            'residential_complex_id' => 'required|exists:residential_complexes,id',
            'number' => 'required|string',
            'size_category' => 'required|string',
            'area' => 'required|numeric',
            'volume' => 'required|numeric',
            'floor_or_location' => 'required|string',
            'description' => 'required|string',
            'daily_price' => 'required|numeric',
            'status' => 'required|string',
            'image' => 'required|string',
        ]);

        containers::create([
            'residential_complex_id' => $request->residential_complex_id,
            'number' => $request->number,
            'size_category' => $request->size_category,
            'area' => $request->area,
            'volume' => $request->volume,
            'floor_or_location' => $request->floor_or_location,
            'description' => $request->description,
            'daily_price' => $request->daily_price,
            'status' => $request->status,
            'image' => $request->image,
        ]);

        return redirect()->route('admin.containers')->with('success', 'Контейнер добавлен успешно!');
    }

    public function containersUpdate(Request $request, $id) {
        $container = containers::findOrFail($id);

        $request->validate([
            'residential_complex_id' => 'required|exists:residential_complexes,id',
            'number' => 'required|string',
            'size_category' => 'required|string',
            'area' => 'required|numeric',
            'volume' => 'required|numeric',
            'floor_or_location' => 'required|string',
            'description' => 'required|string',
            'daily_price' => 'required|numeric',
            'status' => 'required|string',
            'image' => 'nullable|string',
        ]);

        $container->residential_complex_id = $request->residential_complex_id;
        $container->number = $request->number;
        $container->size_category = $request->size_category;
        $container->area = $request->area;
        $container->volume = $request->volume;
        $container->floor_or_location = $request->floor_or_location;
        $container->description = $request->description;
        $container->daily_price = $request->daily_price;
        $container->status = $request->status;

        if ($request->has('image') && $request->image) {
            $container->image = $request->image;
        }

        $container->save();

        return redirect()->route('admin.containers')->with('success', 'Контейнер обновлен успешно!');
    }

    public function containersDestroy($id) {
        $container = containers::findOrFail($id);

        $bookingsCount = bookings::where('container_id', $id)->count();

        if ($bookingsCount > 0) {
            return redirect()->route('admin.containers')->with('error', "Невозможно удалить контейнер №{$container->number}, так как у него есть {$bookingsCount} связанных бронирований!");
        }

        $container->delete();

        return redirect()->route('admin.containers')->with('success', 'Контейнер удален успешно!');
    }


    public function bookings(Request $request) {
        $query = bookings::with(['user', 'container.residentialComplex']);
        $sort = $request->get('sort', 'default');

        switch ($sort) {
            case 'id_asc':
                $query->orderBy('id', 'asc');
                break;
            case 'id_desc':
                $query->orderBy('id', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('total_price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('total_price', 'desc');
                break;
            case 'status_asc':
                $query->orderBy('status', 'asc');
                break;
            case 'status_desc':
                $query->orderBy('status', 'desc');
                break;
            case 'date_asc':
                $query->orderBy('created_at', 'asc');
                break;
            case 'date_desc':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $bookings = $query->get();
        return view('admin_panel.bookings', compact('bookings'));
    }

    public function bookingsUpdateStatus(Request $request, $id)
    {
        $booking = bookings::findOrFail($id);

        $request->validate([
            'status' => 'required|in:Подтверждена,Отклонена,Отменена,Завершена'
        ]);

        $booking->status = $request->status;
        $booking->save();

        $statusMessages = [
            'Подтверждена' => 'Бронирование подтверждено!',
            'Отклонена' => 'Бронирование отклонено!',
            'Отменена' => 'Бронирование отменено!',
            'Завершена' => 'Бронирование завершено!',
        ];

        return redirect()->route('admin.bookings')->with('success', $statusMessages[$request->status]);
    }


    public function users(Request $request) {
        $query = User::query();
        $sort = $request->get('sort', 'default');

        switch ($sort) {
            case 'name_asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $query->orderBy('name', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $users = $query->get();
        return view('admin_panel.users', compact('users'));
    }

    public function Users_Update_Role(Request $request, $id){
        $user = User::findOrFail($id);
        if ($user->id === Auth::id()) {
        return redirect()->back()->with('error', 'Вы не можете изменить свою собственную роль!');
    }
        $user -> role = $request->input("role");
        $user ->save();
        return redirect()->back()->with('success', 'Роль пользователя успешно обновлена!');
    }
}
