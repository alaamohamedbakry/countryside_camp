<?php

namespace App\Http\Controllers;
use App\Models\Camp;
use App\Models\Room;
use App\Models\User_camp;
use App\Models\Users_camp;
use Exception;
use Illuminate\Http\Request;


class Users_campscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users_camps=Users_camp::all();
        return view('user_camp.index',compact('users_camps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $camp =Camp::all();
        $room=Room::all();
        return view('user_camp.create')->with([
            'camps'=>$camp,
            'room'=>$room
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'camp_id'=>'required|numeric|exists:camps,id',
            'user_name'=>'required',
            'user_password'=>'required',
            'phone_number'=>'required',
            'number_guests'=>'required',
            'city'=>'required',
            'entry_date'=>'required|date',
            'end_date'=>'required|date',
            'rooms_id'=>'required|numeric|exists:rooms,id'
           ]);
           try{
            Users_camp::create([
            'user_name'=>$request->user_name,
            'phone_number'=>$request->phone_number,
            'number_guests'=>$request->number_guests,
            'city'=>$request->city,
             'entry_date'=>$request->entry_date,
             'end_date'=>$request->end_date,
             'user_password'=>$request->user_password,
             'camp_id'=>$request->camp_id,
             'rooms_id'=>$request->rooms_id

          ]);
              return to_route('user_camp.index')->with('status','NEW USER_CAMP ADDED');
          }catch(Exception $a){
              return to_route('user_camp.index')->with('status',$a->getMessage());
          }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user_camp =Users_camp::findOrFail($id);
        $camp = Camp::all();
        $room=Room::all();
         return view('user_camp.edit',compact('camp','user_camp','room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Users_camp $user_camp)
    {
        $request->validate([
            'camp_id'=>'required|numeric|exists:camps,id',
            'user_name'=>'required',
            'phone_number'=>'required',
            'user_password'=>'required',
            'number_guests'=>'required',
            'city'=>'required',
            'entry_date'=>'required',
            'end_date'=>'required',
            'rooms_id'=>'required|numeric|exists:rooms,id'
           ]);
           try{
        $user_camp->update($request->except("_token"));
       return to_route('user_camp.index')->with('status',' USER_CAMP EDITED SUCCESSFULLY');
       }catch(Exception $e){
           return to_route('user_camp.index')->with('status',$e->getMessage());
       }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Users_camp $user_camp)
    {
        try{
            $user_camp->delete();
            return to_route('user_camp.index')->with('status','user_camp deleted successfully');
        }catch(Exception $e){
            return to_route('user_camp.index')->with('status',$e->getMessage());

        }
    }
}
