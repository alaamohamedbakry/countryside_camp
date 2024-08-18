<?php

namespace App\Http\Controllers;

use App\Models\Camp;
use App\Models\Owner;
use Exception;
use Illuminate\Http\Request;

class Ownercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owner=Owner::latest()->get();
        return view('owners.index',compact('owner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $camp =Camp::all();
       return view('owners.create')->with('camps',$camp);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $request->validate([
             'camp_id'=>'required|numeric|exists:camps,id',
             'owner_name'=>'required',
             'phone_number'=>'required'
            ]);
            try{
         Owner::create($request->except("_token"));
        return to_route('owners.index')->with('status','ADD NEW OWNER');
        }catch(Exception $e){
            return to_route('owners.index')->with('status',$e->getMessage());

        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit( String $id)
    {
       $owner =Owner::findOrFail($id);
       $camp = Camp::orderBy('camp_name')->get();
        return view('owners.edit',compact('camp'),compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'camp_id'=>'required|numeric|exists:camps,id',
            'owner_name'=>'required',
            'phone_number'=>'required'
           ]);
           try{
        $owner->update($request->except("_token"));
       return to_route('owners.index')->with('status',' OWNER EDITED SUCCESSFULLY');
       }catch(Exception $e){
           return to_route('owners.index')->with('status',$e->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Owner $owner)
    {
        try{
            $owner->delete();
            return to_route('owners.index')->with('status','owner deleted successfully');
        }catch(Exception $e){
            return to_route('owners.index')->with('status',$e->getMessage());

        }
    }
}
