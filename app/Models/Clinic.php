<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = "Clinics";
    protected $primaryKey = "IDKey";
    protected $keyType = 'string';
}
