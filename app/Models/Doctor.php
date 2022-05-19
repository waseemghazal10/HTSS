<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = "Dns_Doctors_tbl";
    protected $primaryKey = "IDKey";
    protected $keyType = 'string';
}
