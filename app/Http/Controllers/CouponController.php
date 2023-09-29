<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Offerta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


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
    public function store(Request $request)
    {
        $request->OffertaID = Crypt::decrypt($request->OffertaID);
        if (!Coupon::where("ClienteID", Auth::user()->utenteable->id)->where("OffertaID", $request->OffertaID)->exists()) {
            Auth::user()->utenteable->coupon()->create([
                "id" => (string) Str::uuid(),
                "OffertaID" => $request->OffertaID,
                "attivo" => true
            ]);
            return redirect()->back()->with(["success" => "Coupon Ottenuto"]);
        }
        else {
            return redirect()->back()->withErrors(["error" => "Hai già ottenuto il coupon per questa offerta"]);
        }
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
