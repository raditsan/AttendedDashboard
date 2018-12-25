<?php

namespace App\Http\Controllers;

use App\AttendedModel;
use Illuminate\Http\Request;

class EmployeeHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index()
    {
        return view('employee_page.home');
    }

    public function attendedData(){
        $data_attended = AttendedModel::where('user_id','=', \Auth::user()->id)->get();
        return view('employee_page.attended_data',compact('data_attended'));
    }
}
