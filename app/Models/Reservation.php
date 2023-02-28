<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['created_date', 'rsvn_no', 'facility_type', 'facility_number', 'date_from', 'date_to', 'time_from', 'time_to', 'status', 'users_id', 'created_by'];
}
