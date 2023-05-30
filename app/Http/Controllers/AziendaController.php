<?php

namespace App\Http\Controllers;

use App\Models\Azienda;
use Illuminate\Http\Request;

class AziendaController extends Controller
{
    public function mostraAzienda($id)
    {
        $azienda = Azienda::find($id);

        return view('level0.azienda', compact('azienda'));
    }
}
