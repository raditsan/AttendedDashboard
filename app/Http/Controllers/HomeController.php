<?php

namespace App\Http\Controllers;

use App\AttendedModel;
use App\UserModel;
use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $total_login_today = AttendedModel::where('login_year' , '=',date('Y'))->
        where('login_month' , '=',date('n'))->
        where('login_date' , '=',date('j'))->
        get();
        $totals = UserModel::where('rule', '!=','admin')->get();
        return view('home',compact('totals','total_login_today'));
    }

    public function dataEmployee(){
        $data = UserModel::get();
        return view('employee_data',compact('data'));
    }

    public function formAddEmployee(){
        return view('add_employee');
    }

    public function addEmployee(Request $request){
        $data = new UserModel();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->email);
        $data->rule = $request->rule;
        $data->img_profile = "avatar5.png";
        try {
            $data->save();
            return redirect()->route('EmployeeData')->with('alert-success','Success!');
        } catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect()->route('EmployeeData')->with('alert-failed','Somthing wrong [Duplicate Entry Email]!');
            }
            return redirect()->route('EmployeeData')->with('alert-failed','Somthing wrong [ Laravel Error Code '.$errorCode.' ]!');
        }

    }

    public function attendedMaster(){
        $data_attended = AttendedModel::join('users','user_id','=','id')->get();
        return view('admin_page.attended_master',compact('data_attended'));
    }

}
