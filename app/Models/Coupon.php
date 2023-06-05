<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;


class Coupon extends Model
{
    use HasFactory;

    protected $table = 'Coupon';
    protected $fillable = [
        'Username',
        'IDOfferta',
        'IDCoupon',
        'QRCode'
    ];

    public $timestamps = false;
    public function offerta()
    {
        return $this->belongsTo(Offerta::class, 'IDOfferta');
    }

    public function checkIfExists($IDOfferta, $username){
        $coupon = Coupon::where('IDOfferta', $IDOfferta)
            ->where('Utente', $username)
            ->first();

        if ($coupon) {
            //il coupon esiste
            return true;
        } else {
            //il coupon non esiste
            return false;
        }

    }

}
