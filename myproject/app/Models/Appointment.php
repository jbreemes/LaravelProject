<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    use HasFactory;

    protected $fillable = [
        'idappointments', 
        'name', 
        'start_time', 
        'end_time', 
        'created_at', 
        'updated_at', 
        'notes', 
        'klant_id'
    ];


}


