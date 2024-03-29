<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = "Appointments";
    protected $primaryKey = "IDKey";
    protected $keyType = 'string';
    const UPDATED_AT = 'UpDateDate';
    const CREATED_AT = 'InsertDate';

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'PatientIDKey');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'ForDocterIDKey');
    }
}
