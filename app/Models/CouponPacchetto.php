<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponPacchetto extends Model
{
    protected $table = 'coupon_pacchetto';
    protected $primaryKey = 'IDCoupon';
    public $timestamps = false;

    use HasFactory;
}
