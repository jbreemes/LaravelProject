<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Afspraak extends Model
{
    protected $table = 'Afspraak';
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'description',
        'start_time',
        'end_time',
        'Klant_idKlant',
        'Admin_idAdmin',
    ];


    


}
