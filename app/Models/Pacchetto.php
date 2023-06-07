<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Offerta;


class Pacchetto extends Model
{
    use HasFactory;
    protected $table = 'pacchetto';
    protected $primaryKey = 'IDPacchetto';
    public function partecipazioni()
    {
        return $this->hasMany(Partecipa::class, 'Pacchetto', 'IDPacchetto');
    }



}
