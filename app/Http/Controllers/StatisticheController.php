<?php

namespace App\Http\Controllers;


use App\Models\Azienda;
use App\Models\Cliente;
use App\Models\Coupon;
use App\Models\Offerta;
use App\Models\Utente;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class StatisticheController extends Controller
{

    /**
     * Elimina l'auto dal database
     */
    public function index() {
        return view("admin.statistiche");
    }


    /**
     * Mostra la pagina in cui vengono mostrate le statistiche dei coupon emessi dai clienti
     */
    public function indexCliente() {
        $utenti = Utente::whereHasMorph('utenteable', [Cliente::class], function (Builder $query) {
            $query->where("username", "LIKE", "%%");
        })->take(10)->get();
        return view("admin.statistiche-clienti", compact("utenti"));
    }


    /**
     * Mostra la pagina in cui vengono mostrate le statistiche dei coupon emessi dalle offerte
     */
    public function indexOfferta() {
        $offerte = Offerta::all()->take(10);
        return view("admin.statistiche-offerte", compact("offerte"));
    }


    /**
     * Restituisce il numero totale di coupon emessi
     */
    public static function countCoupon()
    {
        return Coupon::count();
    }


    /**
     * Restituisce il numero di coupon emessi dal singolo cliente
     */
    public function getCouponFromClient(Request $request)
    {
        return Coupon::where("ClienteID", $request->id)->count();

    }


    /**
     * Restituisce il numero di coupon emessi dalla singola offerta
     */
    public static function getCouponFromOfferta(Request $request)
    {
        return Coupon::where("OffertaID", $request->id)->count();
    }


    /**
     * Restituisce il numero totale di aziende presenti nel database
     */
    public static function countAziende() {
        return Azienda::count();
    }


    /**
     * Restituisce il numero totale di offerte presenti nel database
     */
    public static function countOfferte() {
        return Offerta::count();
    }
}
