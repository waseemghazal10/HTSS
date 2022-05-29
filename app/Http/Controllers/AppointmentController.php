<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getAppointments(Request $request)
    {
        $doctors = Doctor::all('IDKey', 'Name');
        $doctorId = $request->query('doctorId', '');
        $user = auth()->user();
        if ($doctorId) {
            $appointments = Appointment::where('ClinicIDKey', $user->ClinicIDKey)->where('ForDocterIDKey', $doctorId)->get();
        } else {
            $appointments = Appointment::where('ClinicIDKey', $user->ClinicIDKey)->get();
        }
        return response(['page' => view('appointments', ['appointments' => $appointments, 'doctors' => $doctors, 'selectedDoctor' => $doctorId])->render()], 201);
    }
}
