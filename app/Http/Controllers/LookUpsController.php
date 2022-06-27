<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LookUps;

class LookUpsController extends Controller
{
    public function getCitys(Request $request)
    {   
        $user = auth()->user();
        $countryID = $request->query('countryID', '');
        if($countryID)
           {
            $countrys =  LookUps :: where ('type',1000) -> where('ClinicIDKey', $user->ClinicIDKey) ->get();
            $citys = LookUps :: where ('ClinicIDKey',$user->ClinicIDKey)->where ('FatherIDKey',$countryID)-> where ('type',1001)->get();
            return response(['citys' => view('searchApp',['countrys' => $countrys, 'citys' => $citys])->render()], 201);
        }else  
            return response([], 201);   
    }
}
