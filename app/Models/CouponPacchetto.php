<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponPacchetto extends Model
{
    use HasFactory;

    protected $table = 'coupon_pacchetto';
    protected $fillable = [
        'Utente',
        'Pacchetto',
        'IDCoupon',
        'QRCode'
    ];
    public $timestamps = false;

    public function checkIfExists($IDPacchetto, $username)
    {
        $couponPacchetto = CouponPacchetto::where('Pacchetto', $IDPacchetto)
            ->where('Utente', $username)
            ->first();

        if ($couponPacchetto) {
            //il coupon esiste
            return true;
        } else {
            //il coupon non esiste
            return false;
        }


    }
}
