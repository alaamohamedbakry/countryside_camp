<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class campcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $camps = Camp::all();
        return view('camp.index',compact('camps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('camp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'camp_name'=>'required',
            'location'=>'required',
            'group_of'=>'required'
        ]);
        try{
      Camp::create($request->except("_token"));
       return to_route('camp.index')->with('status', 'New camp Added');
        }catch(Exception $e){
            return to_route('camp.index')->with('status',$e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Camp $camp)
    {
        return view('camp.edit',compact('camp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'camp_name'=>'required',
            'location'=>'required',
            'group_of'=>'required'
        ]);
        try{
            $camp = Camp::find($id);
            $camp->camp_name = $request->camp_name;
            $camp->location = $request->location;
            $camp->group_of = $request->group_of;
            $camp->save();
       return to_route('camp.index')->with('status', ' camp edited');
        }catch(Exception $e){
            return to_route('camp.index')->with('status',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Camp $camp)
    {
    try{
        $camp->delete();
        return to_route('camp.index')->with('status','camp deleted successfully');
    }catch(Exception $e){
        return to_route('camp.index')->with('status',$e->getMessage());

    }
    }
    public function get_room(Request $request)
    {
        $request->validate([
            'camp_id' => 'required'
        ]);
        $sub_room = Room::where('camp_id', $request->camp_id)->get();
        return response()->json([
            'sub_room' => $sub_room
        ]);
    }
}
