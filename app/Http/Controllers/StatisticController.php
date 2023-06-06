<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponPacchetto;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public static function getTotCoupon() {
        $tot = count(Coupon::all());
        $tot += count(CouponPacchetto::all());
        return $tot;
    }
    public static function getCouponFromUser($username){
        $tot = count(Coupon::where('users', $username)->get());
        $tot += count(CouponPacchetto::where('users', $username)->get());
        return $tot;
    }

    public static function getCouponFromOfferta($IDOfferta){
        $tot = count(Coupon::where('IDOfferta', $IDOfferta)->get());
        $tot += count(CouponPacchetto::where('Pacchetto', $IDOfferta)->get());
        return $tot;
    }


}
