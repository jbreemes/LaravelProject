<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Employee extends Authenticatable
{
    use HasFactory, Notifiable;
   
    protected $table = 'employee';
    protected $guard = 'employee';
    protected $fillable = ['name', 'idemployee', 'password', 'email'];
    protected $hidden = ['password', 'remember_token'];
        
    
}

