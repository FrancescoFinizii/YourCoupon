<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'azienda';
    protected $primaryKey = 'IDAzienda';
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'RagioneSociale',
        'Sede',
        'Tipologia',
        'Descrizione',
        'Mail',
        'Link',
        'Telefono',
        'Logo'
    ];

    //metodo che definisce le relazioni tra un'azienda e le sue offerte
    public function offerte()
    {
        return $this->hasMany(Offerta::class, 'Azienda');
    }

    public function getAziendaById($IDAzienda){
        return Azienda::find($IDAzienda);
    }

    public function vincoliRelazionali()
    {
        // Supponiamo che ci sia una relazione "hasMany" con la tabella "Offerte"
        // Verifica se l'azienda ha offerte associate
        $hasOfferte = $this->offerte()->count() > 0;

        // Restituisci una collezione contenente le relazioni coinvolte
        return collect([
            'offerte' => $hasOfferte,
        ])->filter(function ($value) {
            // Filtra solo le relazioni coinvolte
            return $value;
        });
    }
}
