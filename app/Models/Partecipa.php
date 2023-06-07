<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partecipa extends Model
{
    use HasFactory;

    protected $table = 'Partecipa';

    public function offerta()
    {
        return $this->belongsTo(Offerta::class, 'IDOfferta', 'IDOfferta');
    }

}
