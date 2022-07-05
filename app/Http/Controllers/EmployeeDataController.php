<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Department;
use App\Http\Resources\EmployeeResource;

class EmployeeDataController extends Controller
{
    public function countries() {
        $countries = Country::all();
        return response()->json($countries);
    }

    public function departments() {
        $departments = Department::all();
        return response()->json($departments);
    }

    public function states(Country $country) {
        return response()->json($country->states);
    }

    public function cities(State $state) {
        return response()->json($state->cities);
    } 
    
    public function employees() {
        
        $employees = Employee::all();

        return EmployeeResource::collection($employees);
    }
}
