<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LookUps extends Model
{
    use HasFactory;

    protected $table = "LookUps";
    protected $primaryKey = "IDKey";
}
