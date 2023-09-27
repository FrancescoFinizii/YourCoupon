<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Azienda extends Model
{

    protected $table = 'azienda';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'ragioneSociale',
        'sede',
        'tipologia',
        'logo',
        'descrizione',
    ];


    public function offerta() :HasMany
    {
        return $this->hasMany(Offerta::class, "AziendaID");
    }
}
