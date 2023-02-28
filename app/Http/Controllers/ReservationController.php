<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\FacilityRoomMaster;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $date = Carbon::now()->format('Y-m-d');

        $users = Auth::user()->last_name . ', ' . Auth::user()->first_name;

        $dataFacility = Facility::all();
        $dataFacilityRoomMaster = FacilityRoomMaster::all();

        $dataReservation = Reservation::where('users_id', auth()->user()->id)->get();

        return view('user.reservation', ['currentDate' => $date, 'user' => $users, 'facility_type' => $dataFacility, 'reservation' => $dataReservation, 'facility_room_master' => $dataFacilityRoomMaster]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'created_date' => 'required',
            'rsvn_no' => 'required',
            'created_by' => 'required',
            'facility_type' => 'required',
            'facility_number' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'status' => 'required'
        ]);

        Reservation::create([
            'created_date' => $validated['created_date'],
            'rsvn_no' => $validated['rsvn_no'],
            'created_by' => $validated['created_by'],
            'facility_type' => $validated['facility_type'],
            'facility_number' => $validated['facility_number'],
            'date_from' => $validated['date_from'],
            'date_to' => $validated['date_to'],
            'time_from' => $validated['time_from'],
            'time_to' => $validated['time_to'],
            'status' => $validated['status'],
            'users_id' => auth()->user()->id
        ]);
    
        return redirect('/reservation')->with('success', 'You created successfully!');
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'created_date' => 'required',
            'rsvn_no' => 'required',
            'created_by' => 'required',
            'facility_type' => 'required',
            'facility_number' => 'required',
            'date_from' => 'required',
            'date_to' => 'required',
            'time_from' => 'required',
            'time_to' => 'required',
            'status' => 'required'
        ]);

        $reservation->update($validated);

        return redirect('/reservation')->with('updated', 'You updated successfully!');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect('/reservation')->with('deleted', 'You deleted successfully!');
    }

    public function approveStatus(Request $request, Reservation $reservation)    
    {
        $reservation->update([
            'status' => 'APPROVED'
        ]);

        return redirect('/approved');
    }

    public function rejectStatus(Request $request, Reservation $reservation)    
    {
        $reservation->update([
            'status' => 'REJECT'
        ]);

        return redirect('/cancellation');
    }
}
