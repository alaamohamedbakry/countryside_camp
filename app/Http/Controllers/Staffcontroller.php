<?php

namespace App\Http\Controllers;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Models\Camp;
use App\Models\Staff;
use Exception;
use Illuminate\Http\Request;

class Staffcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $camp = Camp::all();
        return view('staff.create')->with('camps', $camp);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'staff_name' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required|date',
            'camp_id' => 'required|numeric|exists:camps,id'
        ]);
        try {
            Staff::create($request->except("_token"));
            return to_route('staff.index')->with('status', 'ADD NEW STAFF');
        } catch (Exception $e) {
            return to_route('staff.index')->with('status', $e->getMessage());
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $staff = Staff::findorfail($id);
        $camp = Camp::orderBy('camp_name')->get();
        return view('staff.edit', compact('camp'), compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'staff_name' => 'required',
            'phone_number' => 'required',
            'birthdate' => 'required|date',
            'camp_id' => 'required|numeric|exists:camps,id'
        ]);
        try {
            $staff->update($request->except("_token"));
            return to_route('staff.index')->with('status', 'staff edited');
        } catch (Exception $e) {
            return to_route('staff.index')->with('status', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        try {
            $staff->delete();
            return to_route('staff.index')->with('status', 'STAFF DELETED SUCCESSFULLY');
        } catch (Exception $e) {
            return to_route('staff.index')->with('status', $e->getMessage());
        }
    }
}
