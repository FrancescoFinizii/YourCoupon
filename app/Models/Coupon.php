<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{

    protected $table = 'coupon';
    public $timestamps = false;
    public $incrementing = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'attivo',
        'OffertaID',
    ];


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, "ClienteID");
    }


    public function offerta()
    {
        return $this->belongsTo(Offerta::class, "OffertaID");
    }
}
