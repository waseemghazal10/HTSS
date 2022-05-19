<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "Dns_Users_tbl";
    protected $primaryKey = "IDKey";
    protected $keyType = 'string';

    public function clinic()
    {
        return $this->belongsTo(Clinic::class, 'ClinicIDKey');
    }
}
