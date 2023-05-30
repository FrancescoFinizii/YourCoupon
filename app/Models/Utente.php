<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Utente extends Model
{
    use HasFactory;
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
}
