<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class CouponController extends Controller
{

    /**
     * Mostra tutti i coupon attivi del cliente autenticato
     */
    public function index()
    {
        $coupons = Auth::user()->utenteable->coupon()->where('attivo', true)->get();
        return view("cliente.cliente-coupon", ["coupons" => $coupons]);
    }


    /**
     * Salva un nuovo coupon nel database
     */
    public function store()
    {
        Auth::user()->utenteable->coupon()->create([
            "Qr-Code" => "dsvlknvlkasnvoinapbsf",
            "attivo" => true
        ]);
        return redirect()->back()->with(["success" => "Coupon Ottenuto"]);
    }


    /**
     * Mostra la pagina con i dettagli del coupon
     */
    public function show($id)
    {
        $coupon = Coupon::find($id);
        if (Gate::allows("hasCoupon", $coupon)) {
            return view("cliente.coupon-show", ["coupon" => $coupon]);
        }
        else {
            return abort(403);
        }
    }
}
