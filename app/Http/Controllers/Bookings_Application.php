<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookings;
use App\Models\containers;
use Illuminate\Support\Facades\Auth;

class Bookings_Application extends Controller
{
    public function Bookings_Application() {
        $book = bookings::all();
        return view("container_card", compact("book"));
    }

     public function userBookings() {
        $bookings = bookings::where('user_id', Auth::id())->whereIn('status', ['Новая', 'Подтверждена'])->with('container.residentialComplex')->orderBy('created_at', 'desc')->get();
        return view('profile.bookings', compact('bookings'));
    }

    public function bookingHistory() {
        $historyBookings = bookings::where('user_id', Auth::id())->whereIn('status', ['Завершена', 'Отменена', 'Отклонена'])->with('container.residentialComplex')->orderBy('updated_at', 'desc')->get();
        return view('profile.booking-history', compact('historyBookings'));
    }

    public function Bookings_Form( Request $request) {
        $request -> validate([
            "container_id" => "required|exists:containers,id",
            "start_date"=>"required|date",
            "end_date"=>"required|date|after_or_equal:start_date",
            "comment"=>"required|string",
        ]);


        $container = containers::findOrFail($request->container_id);

        $start = new \DateTime($request->start_date);
        $end = new \DateTime($request->end_date);
        $days = $start->diff($end)->days + 1;

        $total_price = $days * $container->daily_price;


        $newrequest = new bookings([
            "user_id"=>Auth::id(),
            "container_id" => $request->container_id,
            "start_date"=>$request->start_date,
            "end_date"=>$request->end_date,
            "comment"=>$request->comment,
            "total_price"=> $total_price,
        ]);

        $newrequest->save();
        return redirect()->back()->with('success', 'Заявка на бронирование отправлена!');
    }

    public function cancelBooking($id) {
        $booking = bookings::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $booking->status = 'Отменена';
        $booking->save();
        return redirect()->back()->with('success', 'Бронирование отменено');
    }
}
