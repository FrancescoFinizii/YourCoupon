<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Utente extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'utente';
    protected $primaryKey = 'Username';
    public $incrementing = false;
    public $timestamps = false;

    /*
     * By default, Laravel expects your model primary key to be auto incrementing.
     * From what you've posted, it looks like that's not the case with your example.
     *
     * Add this to your model definition:
     * public $incrementing = false;
     *
    */

    protected $fillable = [
        "Username",
        'Password',
        'Livello',
        'Nome',
        'Cognome',
        'Email',
        'Nascita',
        'Genere',
        'Telefono',
        'ProPic'
    ];


    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "manager"][$value],
        );
    }

}
