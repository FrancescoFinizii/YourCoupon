<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offerta extends Model
{
    protected $table = 'offerta';
    protected $primaryKey = 'IDOfferta';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'Titolo',
        'Prezzo',
        'Sconto',
        'Azienda',
        'Inizio',
        'Scadenza',
        'Fruizione',
        'Descrizione',
        'FotoProd'
    ];


    /*
         La relazione belongsTo indica che un record del modello Offerta appartiene a un record nel modello Azienda.
         In questo caso, la relazione viene stabilita sulla colonna Azienda nel modello Offerta, che rappresenta la
         chiave esterna che fa riferimento all'id dell'azienda a cui l'offerta è associato.
    */

    public function azienda()
    {
        return $this->belongsTo(Azienda::class, 'Azienda');
    }

    public function getOffertaById($IDOfferta)
    {
        return Offerta::find($IDOfferta);
    }

    public function getOfferteByAziendaAndDescrizione($searchbar, $idAzienda){
        return $this->where('Azienda', $idAzienda)
            ->where('Descrizione', 'REGEXP', $searchbar)
            ->orWhere('Titolo', 'REGEXP', $searchbar)
            ->paginate(24);
    }


    public function getOfferteByAziendaId($IDAzienda){
        return $this->where('Azienda', $IDAzienda)
            ->paginate(24);
    }


    public function getOfferteByDescrizione($searchbar){
        return $this->where('Descrizione', 'REGEXP', $searchbar)
            ->orWhere('Titolo', 'REGEXP', $searchbar)
            ->paginate(24);
    }
/*
    public static function searchOfferte($searchString)
    {

        SELECT o.*
FROM offerta o
JOIN azienda a ON o.Azienda = a.IDAzienda
WHERE o.Descrizione REGEXP 'nike|scarpe'
   AND a.RagioneSociale REGEXP 'scarpe|nike';




        return Offerta::where(function ($query) use ($searchString) {
            $query->where('Descrizione', 'LIKE', '%' . $searchString . '%');
        })->orWhereHas('azienda', function ($query) use ($searchString) {
            $query->where('RagioneSociale', 'LIKE', '%' . $searchString . '%');
        })->paginate(30);

        $offerte = Offerta::where(function ($query) use ($searchString) {
            $query->where('Descrizione', 'LIKE', '%' . $searchString . '%');
        })->orWhere(function ($query) use ($searchString) {
            $query->whereHas('azienda', function ($query) use ($searchString) {
                $query->where('RagioneSociale', 'LIKE', '%' . $searchString . '%');
            });
        })->get();


                return self::where(function ($queryBuilder) use ($query) {
                    $queryBuilder->where('Descrizione', 'LIKE', '%' . $query . '%')
                        ->orWhereHas('azienda', function ($queryBuilder) use ($query) {
                            $queryBuilder->where('RagioneSociale', 'LIKE', '%' . $query . '%');
                        });
                })
                    ->paginate(30);
    }
    */
}
