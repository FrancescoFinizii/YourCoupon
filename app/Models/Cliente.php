<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Cliente extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'cliente';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'genere',
        'telefono',
        'dataNascita',
        'foto',
    ];


    public function coupon()
    {
        return $this->hasMany(Coupon::class, "ClienteID");
    }


    /**
     * Get the utente's account.
     */
    public function utente(): MorphOne
    {
        return $this->morphOne(Utente::class, 'utenteable');
    }

}
