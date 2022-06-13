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
        $user = auth()->user();
        $doctors = Doctor::where('Status',1)->where('ClinicIDKey', $user->ClinicIDKey)->get(['IDKey','Name']);
        $doctorId = $request->query('doctorId', '');
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

    public function addAppointments(Request $request)
    {
        $user = auth()->user();
        $doctors = Doctor::where('Status',1)->where('ClinicIDKey', $user->ClinicIDKey)->get(['IDKey','Name']);

        return response(['page' => view('addAppointment',['doctors' => $doctors])->render()], 201);
    }

    public function done(Request $request)
    {
        // error_log($request);
        $appID = $request->query('appID', '');
        // error_log($appID);
        $appointment = Appointment::where('IDKey',$appID)->first();
        // consol.log($appointment);
        $appointment->Status = 2;
        $appointment->save();
        return response([],201);
    }

    public function cancel(Request $request)
    {
        $appID = $request->query('appID', '');
        $appointment = Appointment::find($appID);
        $appointment->Status = 3;
        $appointment->save();
        return response([],201);
    }

    public function searchAppointments(Request $request){ 
        $user = auth()->user();
        $doctors = Doctor::where('Status',1)->where('ClinicIDKey', $user->ClinicIDKey)->get(['IDKey','Name']);
        $idNum = $request->query('idNum', '');
        $patName = $request->query('patName', '');
        if($idNum){
            $patientID = Patient::where('IDNum',$idNum)->first();
            $patName = $patientID->PatName;
            $birth = $patientID->BirthDate;
            // $city = $patientID->BirthDate;
            $mobile = $patientID->Mobile;
            return response(['page' => view('addAppointment',['doctors' => $doctors])->render(),'data'=>['IdNum' => $idNum, 'patName' => $patName, 'birth' => $birth , 'mobile' => $mobile ]], 201);
        }
        else if($patName){
            $patientID = Patient::where('PatName',$patName)->first();
            $idNum = $patientID->IDNum;
            $birth = $patientID->BirthDate;
            // $city = $patientID->BirthDate;
            $mobile = $patientID->Mobile;
            return response(['page' => view('addAppointment',['doctors' => $doctors])->render(),'data'=>['IdNum' => $idNum, 'patName' => $patName, 'birth' => $birth , 'mobile' => $mobile ]], 201);
        }
    }
    
    public function addAppointment(Request $request){ 

        $user = auth()->user();
        $idNum = $request->idNum;
        $patients = Patient::where('IDNum', $idNum) -> first();
        $pateintID = $patients->IDKey;
        $doctorID = $request->doctorID;//fordoctorid
        $statusID = $request->statusID;
        $subject = $request->subject;
        $sDate = $request->sDate;
        $sTime = $request->sTime;
        $eTime = $request->eTime;
        $details = $request->details;
        
        $appointment = new Appointment;
        $appointment->PatientIDKey = $pateintID;
        $appointment->ForDocterIDKey = $doctorID;
        $appointment->Status = $statusID;
        $appointment->Subject = $subject;
        $appointment->Date = $sDate;
        $appointment->Time = $sTime;
        $appointment->EndTime_Expected = $eTime;
        $appointment->Details = $details;
        $appointment->IDKey = "564456465";
        $appointment->ClinicIDKey = $user->ClinicIDKey;
        $appointment->save();
    }
}