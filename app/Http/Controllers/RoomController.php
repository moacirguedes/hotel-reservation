<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hotel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index() 
    {
        $hotel = Hotel::with('rooms')->get()->find(request()->route('hotel'));
        $rooms = $hotel->rooms;
    
        return view('rooms.index', [
            'rooms' => $rooms,
            'hotel' => $hotel
        ]);
    }

    public function create()
    {
        $hotel = Hotel::find(request()->route('hotel'));
        return view('rooms.create', ['hotel' => $hotel]);
    }

    public function store(Request $request, Hotel $hotel)
    {
        if (!auth()->user()->isManager)
            die();

        $room = new Room();
        $room->fill($request->all());
        $room->hotel_id = $hotel->id;
        $room->save();

        return redirect()->route('rooms.index', ['hotel' => $hotel->id]);
    }

    public function edit(Hotel $hotel, Room $room)
    {
        return view('rooms.update', [
            'room' => $room,
            'hotel' => $hotel
        ]);
    }

    public function update(Request $request, Hotel $hotel, Room $room)
    {
        if (!auth()->user()->isManager)
            die();

        $room = Room::find($room->id);
        $room->fill($request->all())->save();
        return redirect()->route('rooms.index', ['hotel' => $hotel->id]);
    }

    public function destroy(Hotel $hotel, Room $room)
    {
        if (!auth()->user()->isManager)
            die();

        $room->destroy($room->id);
        return redirect()->route('rooms.index', ['hotel' => $hotel->id]);
    }
}
