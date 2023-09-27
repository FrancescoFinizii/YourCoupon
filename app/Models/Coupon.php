<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupon';
    public $timestamps = false;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'QrCode',
        'attivo',
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
