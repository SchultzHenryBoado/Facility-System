<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilityRoomMaster extends Model
{
    use HasFactory;

    protected $fillable = ['facility_type', 'facility_number', 'description', 'floor', 'max_capacity', 'status'];
}
