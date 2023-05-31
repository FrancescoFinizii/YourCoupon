<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\StaffMember as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class StaffMember extends Authenticatable
{
    use HasFactory, Notifiable;


public function modificaPassword($oldPassword, $newPassword)
{
    if (Hash::check($oldPassword, $this->password)) {
        $this->password = Hash::make($newPassword);
        $this->save();
        return true;
    }

    return false;
}
}
