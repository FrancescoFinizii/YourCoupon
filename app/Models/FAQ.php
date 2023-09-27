<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'faq';

    public $timestamps = false;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'domanda',
        'risposta',
    ];
}
