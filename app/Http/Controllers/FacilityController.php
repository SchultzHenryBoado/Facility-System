<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function index()
    {
        $data = Facility::all();

        return view('admin.facility', ['facility' => $data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'facility_code' => 'required',
            'facility_name' => 'required'
        ]);

        Facility::create($validated);

        return redirect('/facility')->with('success', 'You created successfully!');
    }

    public function update(Request $request, Facility $facility)
    { 
        $validated = $request->validate([
            'facility_code' => 'required',
            'facility_name' => 'required'
        ]);

        $facility->update($validated);

        return redirect('/facility')->with('updated', 'You updated successfully!');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return redirect('/facility')->with('deleted', 'You deleted successfully!');
    }
}
