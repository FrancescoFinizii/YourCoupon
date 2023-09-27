<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offerta extends Model
{

    protected $table = 'offerta';

    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'oggetto',
        'emissione',
        'scadenza',
        'prezzo',
        'sconto',
        'foto',
        'descrizione',
    ];


    public function azienda() :BelongsTo
    {
        return $this->BelongsTo(Azienda::class, "AziendaID");
    }



    public function coupon()
    {
        return $this->HasMany(Coupon::class, "OffertaID");
    }
}
