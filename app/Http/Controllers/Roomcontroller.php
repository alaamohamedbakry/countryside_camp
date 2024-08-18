<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Room;
use App\Models\Users_camp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Roomcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room = Room::all();
        return view('room.index', ['room'=>Room::latest()->paginate(20)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $camp = Camp::all();
        return view('room.create')->with('camps', $camp);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_number' => 'required',
            'capcity' => 'required',
            'price' => 'required',
            'number_bed'=>'required',
            'camp_id' => 'required|numeric|exists:camps,id',
        ]);
        try {
            Room::create([
                'room_number'=>$request->room_number,
                'price'=>$request->price,
                'capcity'=>$request->capcity,
                'number_bed'=>$request->number_bed,
                'camp_id'=>$request->camp_id,
            ]);
            return to_route('room.index')->with('status', 'NEW ROOM ADDED');
        } catch (Exception $e) {
            return to_route('room.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::findorfail($id);
        $camp = Camp::orderBy('camp_name')->get();
        return view('room.edit', compact('room'), compact('camp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_number' => 'required',
            'capcity' => 'required',
            'price' => 'required',
            'number_bed'=>'required',
            'camp_id' => 'required|numeric|exists:camps,id',
        ]);
        try {
            $room->update($request->except("_token"));
            return to_route('room.index')->with('status', 'Room UPDATED SUCCESFULLY');
        } catch (Exception $e) {
            return to_route('room.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        try {
            $room->delete();
            return to_route('room.index')->with('status', 'ROOM DELTED SUCCESSFULLY');
        } catch (Exception $e) {
            return to_route('room.index')->with('status', $e->getMessage());
        }
    }
}
