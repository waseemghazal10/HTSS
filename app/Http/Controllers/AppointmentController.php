<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getAppointments(Request $request)
    {
        $appointments = Appointment::all();
        return view('appointments', ['appointments' => $appointments]);
    }
}
