<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponPacchetto;
use http\Client\Curl\User;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public static function getTotCoupon(){

        $tot = count(Coupon::all());
        $tot += count(CouponPacchetto::all());
       // $out = new \Symfony\Component\Console\Output\ConsoleOutput();
       // $out->writeln($tot);
        return ($tot);

    }
    public static function getCouponFromUser(){
        $username = "Persona10";
        $coupon = count(Coupon::where('users', $username)->get());
        return $coupon;


    }


}
