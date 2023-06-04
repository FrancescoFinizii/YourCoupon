<?php
namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Utente extends Authenticable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'username';
    public $incrementing = false;
    public $timestamps = false;    /*     * By default, Laravel expects your model primary key to be auto incrementing.     * From what you've posted, it looks like that's not the case with your example.     *     * Add this to your model definition:     * public $incrementing = false;     *    */
    protected $fillable = [
        'Nome',
        'Cognome',
        'Email',
        'username',
        'role',
        'Nascita',
        'Genere',
        'Telefono',
        'ProPic',
        'password'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    protected $hidden = [
        'username',
        'password', '
        remember_token',];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
//        'email_verified_at' => 'datetime',
//        'Nascita' => 'date',
    ];

    public function hasRole($livello)
    {
        $livello = (array)$livello;
        return in_array($this->role, $livello);
    }

    public function isGuest($livello) {
        if ($this->Livello == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isUser($livello) {
        if ($this->Livello == 1) {
            return true;
        } else
            return false;
    }

    public function isStaff($livello) {
        if ($this->livello == 2) {
            return true;
        } else
            return false;
    }


    public function isAdmin($livello) {
        if ($this->livello == 3) {
            return true;
        } else
            return false;
    }

}
