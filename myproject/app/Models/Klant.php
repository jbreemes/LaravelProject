<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Klant extends Authenticatable
{
    use HasFactory, Notifiable;
   
    protected $guard = 'web';
    protected $fillable = ['name', 'idKlant', 'Naam', 'Achternaam', 'Adres', 'Tel', 'wachtwoord', 'email'];
    protected $hidden = ['wachtwoord', 'remember_token'];
    protected $table = 'Klant';
    protected $primaryKey = 'idKlant';

    
}