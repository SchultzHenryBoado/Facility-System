<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    public function index()
    {
        $data = Floor::all();

        return view('admin.floor', ['floor' => $data]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'floor_code' => 'required',
            'floor_number' => 'required'
        ]);

        Floor::create($validated);

        return redirect('/floor')->with('success', 'You created successfully!');
    }

    public function update(Request $request, Floor $floor)
    {
        $validated = $request->validate([
            'floor_code' => 'required',
            'floor_number' => 'required'
        ]);

        $floor->update($validated);

        return redirect('/floor')->with('updated', 'You updated successfully!');
    }

    public function destroy(Floor $floor)
    {
        $floor->delete();

        return redirect('/floor')->with('deleted', 'You deleted successfully!');

    }
}
