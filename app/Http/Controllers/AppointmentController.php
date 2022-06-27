<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\LookUps;
use App\Models\Clinic;
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
        $countrys =  LookUps :: where ('type',1000) -> where('ClinicIDKey', $user->ClinicIDKey) ->get();
        $citys =  LookUps :: where ('type',1001) -> where('ClinicIDKey', $user->ClinicIDKey) ->where('FatherIDKey',$user->CountryIDKey) ->get();
        $doctors = Doctor::where('Status',1)->where('ClinicIDKey', $user->ClinicIDKey)->get(['IDKey','Name']);
        foreach ($doctors as $doctor){
            if($doctor -> IDKey == $user -> IDKey)
            $doctor -> selected = true;
        }

        foreach ($countrys as $country){
            if($country -> IDKey == $user -> CountryIDKey)
            $country -> selected = true;
        }

        foreach ($citys as $city){
            if($city -> IDKey == $user -> CityIDKey)
            $city -> selected = true;
        }
        return response(['page' => view('addAppointment',['doctors' => $doctors , 'countrys' => $countrys, 'citys' => $citys])->render()], 201);
    }

    public function done(Request $request)
    {
        $appID = $request->query('appID', '');
        $appointment = Appointment::where('IDKey',$appID)->first();
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
            $patientArray = Patient::where('IDNum',$idNum)->get();
            if($patientArray -> count() > 0)
            {
                $patient = $patientArray ->first();
                $patName = $patient ->  PatName;
                $birth = $patient->BirthDate;
                $city = $patient->CityIDKey;
                $mobile = $patient->Mobile;
                $lookUpCity = LookUps :: where ('IDKey',$city)->where ('type',1001)->first();
                return response(['data'=>['IdNum' => $idNum, 'patName' => $patName, 'birth' => $birth , 'mobile' => $mobile ,'city' => $lookUpCity->AName]], 201);
            }
            else{
                $patients = Patient::where('IDNum','like','%'.$idNum.'%')->get();
                foreach ($patients as $patient){
                    $lookUpCity = LookUps :: where ('IDKey',$patient -> CityIDKey)->where ('type',1001)->first();
                    $patient -> cityArabicName = $lookUpCity->AName;
                }
                return response(['row' => view('templates.row',['patients' => $patients])->render()], 201);
                // return view('searchApp',['patients' => $patients])->render();
                
            }
        }
        else if($patName){
            $patientName = Patient::where('PatName',$patName)->first();
            if($patientName){   
                $idNum = $patientName->IDNum;
                $birth = $patientName->BirthDate;
                $city = $patientName->CityIDKey;
                $mobile = $patientName->Mobile;
                $lookUpCity = LookUps :: where ('IDKey',$city)->where ('type',1001)->first();
                return response(['page' => view('addAppointment',['doctors' => $doctors])->render(),'data'=>['IdNum' => $idNum, 'patName' => $patName, 'birth' => $birth , 'mobile' => $mobile ,'city' => $lookUpCity->AName]], 201);
            }
            else{
                $str_arr = explode (" ", $patName); 
                foreach($str_arr as $key => $str){
                    if($key == 0)
                        $patientQuery = Patient::where('PatName','like','%'.$str_arr[0].'%');
                    else 
                        $patientQuery = $patientQuery ->where('PatName','like','%'.$str_arr[$key].'%'); 
                }
                $patients = $patientQuery->get();

                foreach ($patients as $patient){
                    $lookUpCity = LookUps :: where ('IDKey',$patient -> CityIDKey)->where ('type',1001)->first();
                    $patient -> cityArabicName = $lookUpCity->AName;
                }
                // return response(['patients' => $patients], 201);
                return response(['row' => view('templates.row',['patients' => $patients])->render()], 201);
            }
        }
        else return response(['row' => ""], 201);
    }
    
    public function searchAppointmentPopUp(Request $request){ 
        $user = auth()->user();
        $doctors = Doctor::where('Status',1)->where('ClinicIDKey', $user->ClinicIDKey)->get(['IDKey','Name']);
        $idNum = $request->query('idNum', '');
        $patName = $request->query('patName', '');
        $countryId = $request->query('countryId', '');
        $cityId = $request->query('cityId', '');
        $tools = $request->query('tools', '');
        $country = Clinic :: where ('IDKey',$user->ClinicIDKey)->first();
        if($idNum){
            if($countryId && $cityId)
                $patientArray = Patient::where('IDNum',$idNum)->where ('CountryIDKey',$countryId)->where ('CityIDKey',$cityId)->get();
            // error_log($patientID);
            else if($countryId && !$cityId){
                $patientArray = Patient::where('IDNum',$idNum)->where ('CountryIDKey',$countryId)->get();
            }
            else 
                $patientArray = Patient::where('IDNum',$idNum)->get();
            if($patientArray -> count() > 0)
            {
                $lookUpCity = LookUps :: where ('IDKey',$patientArray ->first() -> CityIDKey)->where ('type',1001)->first();
                $patientArray -> first() -> cityArabicName = $lookUpCity->AName;
                return response(['row' => view('templates.row',['patients' => $patientArray])->render()], 201);}
            else{
                $patients = Patient::where('IDNum','like','%'.$idNum.'%')->get();

                foreach ($patients as $patient){
                    $lookUpCity = LookUps :: where ('IDKey',$patient -> CityIDKey)->where ('type',1001)->first();
                    $patient -> cityArabicName = $lookUpCity->AName;
                }

                return response(['row' => view('templates.row',['patients' => $patients])->render()], 201);
            }
        }
        else if($patName){
            $patientName = Patient::where('PatName',$patName)->first();
            if($patientName){
                $lookUpCity = LookUps :: where ('IDKey',$patientName -> CityIDKey)->where ('type',1001)->first();
                $patientName -> cityArabicName = $lookUpCity->AName;   
                return response(['row' => view('templates.row',['patients' => $patientName])->render()], 201);
            }
            else{
                $str_arr = explode (" ", $patName); 
                foreach($str_arr as $key => $str){
                    if($key == 0)
                        $patientQuery = Patient::where('PatName','like','%'.$str_arr[0].'%');
                    else 
                        $patientQuery = $patientQuery ->where('PatName','like','%'.$str_arr[$key].'%'); 
                }
                $patients = $patientQuery->get();

                foreach ($patients as $patient){
                    $lookUpCity = LookUps :: where ('IDKey',$patient -> CityIDKey)->where ('type',1001)->first();
                    $patient -> cityArabicName = $lookUpCity->AName;
                }

                return response(['row' => view('templates.row',['patients' => $patients])->render()], 201);
            }
        }
        else if($tools){
            $pattern = "/^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/";
            $checkTool = preg_match($pattern, $tools); // returns 1 if matches and 0 if not 
            if($checkTool == 1){
                $patients = Patient :: where ('Email',$tools)->get();
                return response(['row' => view('templates.row',['patients' => $patients])->render()], 201);
            }
            else{
                $pattern = "/^(05|5)\d{8}$/";
                $checkTool = preg_match($pattern, $tools);
                if($checkTool == 1){
                    $patients = Patient :: where ('Mobile',$tools)->get();
                    return response(['row' => view('templates.row',['patients' => $patients])->render()], 201);
                }
                else{
                    $pattern = "/^2\d{6}$/";
                    $checkTool = preg_match($pattern, $tools);
                    if($checkTool == 1){
                        $patients = Patient :: where ('Mobile',$tools)->get();
                        return response(['row' => view('templates.row',['patients' => $patients])->render()], 201);
                    }
                }
            }
        }
        else return response(['row' => ""], 201);
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
        $appointment->IDKey = $appointment->PatientIDKey . '-' . time();
        $appointment->ClinicIDKey = $user->ClinicIDKey;
        $appointment->save();
        return response([], 201);
    }

    public function showDoctorAppointments(Request $request){ 
        $doctorID = $request->query('doctorId', '');
        error_log($doctorID );
        $date = $request->query('date', '');
        error_log($date );
        if($doctorID && $date){
            $appointments = Appointment::where('ForDocterIDKey',$doctorID)->where('Date',$date)->get();
            return response (['appointment' => view('templates.doctorAppointments',['appointments' => $appointments])->render()], 201);
        }
        else if (!$doctorID && $date){
            $appointments = Appointment::where('Date',$date)->get();
            return response (['appointment' => view('templates.doctorAppointments',['appointments' => $appointments])->render()], 201);
        }
        else{
            return response ([], 201);
        }
    }

    public function checkStatus(Request $request){ 
        $ID = $request->query('Id', '');
        $appointment = Appointment :: where('IDKey',$ID)->first();
        $appointment -> Status = 2;
        $appointment -> save();
        return response([],201);
    }

    public function cancelStatus(Request $request){ 
        $ID = $request->query('Id', '');
        $appointment = Appointment :: where('IDKey',$ID)->first();
        $appointment -> Status = 3;
        $appointment -> save();
        return response([],201);
        
    }

}