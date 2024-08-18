<?php

namespace App\Http\Controllers;

use App\Models\Buildings;
use App\Models\Camp;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;

class BuildingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buildings =Buildings::all();
        return view('buildings.index',compact('buildings'))->with('buildings',$buildings);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $camp =Camp::all();
        $room =Room::all();
        return view('buildings.create',compact('camp'),compact('room'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'building_name'=>'required',
            'camp_id'=>'required|numeric|exists:camps,id',
            'rooms_id'=>'required|numeric|exists:rooms,id'
        ]);
            try {
                Buildings::create([
                    'building_name'=>$request->building_name,
                    'camp_id'=>$request->camp_id,
                    'rooms_id'=>$request->rooms_id
                ]);
                return to_route('buildings.index')->with('status', 'NEW ROOM ADDED');
            } catch (Exception $e) {
                return to_route('buildings.index')->with('status', $e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $buildings=Buildings::findorfail($id);
        $room = Room::all();
        $camp = Camp::orderBy('camp_name')->get();
        return view('buildings.edit', compact('room'), compact('camp'))->with('buildings',$buildings);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buildings $buildings)
    {
        $request->validate([
            'building_name'=>'required',
            'camp_id'=>'required|numeric|exists:camps,id',
            'rooms_id'=>'required|numeric|exists:rooms,id'
        ]);
        try{
      $buildings->update($request->except("_token"));
       return to_route('buildings.index')->with('status', 'buildings EDITED SUCCESSFULLY ');
        }catch(Exception $e){
            return to_route('buildings.index')->with('status',$e->getMessage());
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buildings $buildings)
    {
        //
    }
}
