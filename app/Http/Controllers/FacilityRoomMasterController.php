<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityRoomMaster;
use App\Models\Floor;
use Illuminate\Http\Request;

class FacilityRoomMasterController extends Controller
{
    public function index()
    {
        $dataFacilityType = Facility::all();
        $dataFloor = Floor::all();
        $dataFacilityRoomMaster = FacilityRoomMaster::all();
        
        return view('admin.facility_room_master', ['facility' => $dataFacilityType, 'floor' => $dataFloor, 'facility_room_master' => $dataFacilityRoomMaster]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'facility_type' => 'required',
            'facility_number' => 'required',
            'description' => 'required',
            'floor' => 'required',
            'max_capacity' => 'required',
            'status' => 'required'
        ]);

        FacilityRoomMaster::create($validated);

        return redirect('/facility_room_master')->with('success', 'You created successfully!');
    }

    public function update(Request $request, FacilityRoomMaster $facilityRoomMaster)
    {
        $validated = $request->validate([
            'facility_type' => 'required',
            'facility_number' => 'required',
            'description' => 'required',
            'floor' => 'required',
            'max_capacity' => 'required',
            'status' => 'required'
        ]);

        $facilityRoomMaster->update($validated);

        return redirect('/facility_room_master')->with('updated', 'You updated successfully!');
    }

    public function destroy(FacilityRoomMaster $facilityRoomMaster)
    {
        $facilityRoomMaster->delete();

        return redirect('/facility_room_master')->with('deleted', 'You deleted successfully!');
    }
}
