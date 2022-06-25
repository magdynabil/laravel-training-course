<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Patient;
use App\Models\Phone;
use App\Models\Service;
use App\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function hasOne()
    {
        $user = User::with(['phone' => function ($query) {
            $query->select('phone', 'code', 'user_id');
        }])->find('1');
        return response()->json($user);
    }
    public function hasOne_reverse()
    {
       $phone= Phone::with('user')->find('1');
       return $phone;
    }
    public function users_has_phone()
    {
       // $users=User::wherehas('phone')->get();
        $users=User::wherehas('phone',function($q)
        {
            $q->where('code','02');
        })->with('phone')->get();
        return $users;
    }
    public function users_not_has_phone()
    {
        $users=User::whereDoesntHave('phone')->get();
        return $users;
    }
    public function hospitals_doctors()
    {
        $user = Hospital::with(['doctors' => function ($query) {
            $query->select('name','hospital_id','id');
        }])->find('2');
        return response()->json($user);
    }
    public function doctor_hospital()
    {
        $user = Doctor::with(['hospital' => function ($query) {
            $query->select('name','address','id');
        }])->find('2');
        return response()->json($user);
    }
    public function delete_hospital($hospital_id)
    {
        $hospital=Hospital::findOrfail($hospital_id);
        $hospital->doctors()->delete();
        $hospital->delete();
    }
    public function find_services_from_doctor()
    {
        $doctor = Doctor::with('services')->find('1');
        return $doctor;

    }
    public function find_doctor_from_services()
    {
        $service = Service::with('doctors')->find('1');
        return $service;

    }
    public function insert_services()
    {
        ###### the sync method will delete the data from the pivot table if the model does not exist in the array, and insert only the new items to the pivot table. #####
       // $doctor = Doctor::find(2);
        //$doctor->services()->sync(array(1, 2, 3));
        ###### ignoring duplicates, #####
        // $doctor = Doctor::find(2);
       //$doctor->services()->syncWithoutDetaching(array(1, 2, 3));
        ###### allowing for duplicates, #####
         $doctor = Doctor::find(1);
         $doctor->services()->attach(array(1, 2, 3));
        return 'done';

    }
    public function pationt_doctor()
    {
       $patient= Patient::find(2);
       return $patient->doctor;
    }
    public function country_doctor()
    {
       $patient= Country::find(2);
       return $patient->doctors;
    }
}
