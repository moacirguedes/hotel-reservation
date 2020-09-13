<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Room;

class ReservationController extends Controller
{
    public function create()
    {
        $hotel = Hotel::with('rooms')->get()->find(request()->route('hotel'));
        $rooms = $hotel->rooms;

        return view('reservations.create', [
            'hotel' => $hotel,
            'rooms' => $rooms
        ]);
    }

    public function store(Request $request)
    {
        $reservation = new Reservation();
        $user = auth()->user();

        $reservation->check_in = $request->checkin;
        $reservation->check_out = $request->checkout;
        $total_price = 0;
        $reservation->user_id = $user->id;

        $reservation->save();
    
        foreach($request->rooms as $room)
        {
            $room = Room::find($room);
            $total_price += $room->price;
            $reservation->rooms()->attach($room->id);
        }
        
        $reservation->total_price = $total_price;
        $reservation->save();
        
        return redirect('home');
    }

    public function index()
    {
        $reservations = Reservation::with('rooms')->where('user_id', auth()->user()->id)->get();

        return view('reservations.index', [
            'reservations' => $reservations,
        ]);
    }
}
