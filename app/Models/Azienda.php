<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Azienda extends Model
{
    protected $table = 'azienda';
    protected $primaryKey = 'IDAzienda';

    use HasFactory;

    //metodo che definisce le relazioni tra un'azienda e le sue offerte
    public function offerte()
    {
        return $this->hasMany(Offerta::class, 'Azienda');
    }

    public function getAziendaById($IDAzienda){
        return Azienda::find($IDAzienda);
    }

}
