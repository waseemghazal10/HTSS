<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function getAppointments(Request $request)
    {
        $doctors = Doctor::all('IDKey', 'Name');
        $doctorId = $request->query('doctorId', '');
        $user = auth()->user();
        $date = $request->query('Date', '');
        if(!$date){
            $date = date("Y-m-d");
        }
        if ($doctorId) {
            $appointments = Appointment::where('ClinicIDKey', $user->ClinicIDKey)->where('ForDocterIDKey', $doctorId)->where('Date', $date)->get();
        } else {
            $appointments = Appointment::where('ClinicIDKey', $user->ClinicIDKey)->where('Date', $date)->get();
        }
        return response(['page' => view('appointments', ['appointments' => $appointments, 'doctors' => $doctors, 'selectedDoctor' => $doctorId , 'Date' => $date])->render()], 201);
    }

    public function done(Request $request)
    {
        // error_log($request);
        $appID = $request->query('appID', '');
        // error_log($appID);
        $appointment = Appointment::where('IDKey',$appID)->first();
        // consol.log($appointment);
        $appointment->Status = 4;
        $appointment->save();
        return response([],201);
    }

    public function cancel(Request $request)
    {
        $appID = $request->query('appID', '');
        $appointment = Appointment::find($appID);
        $appointment->Status = 2;
        $appointment->save();
        return response([],201);
    }
}
