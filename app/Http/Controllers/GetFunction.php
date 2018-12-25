<?php

namespace App\Http\Controllers;

use App\AttendedModel;
use App\User;
use App\UserModel;
use Illuminate\Http\Request;

class GetFunction extends Controller
{
    public function pageProfile(){
        return view('profile');
    }
    //
    public function getTimeserver(){
        $dates = date("D M d Y H:m:s O");
        return $dates;
    }

    public function getIpclient(){
        $ip = \Request::ip();
        return $ip;
    }

    public function employIn(Request $request) {

        $total_login_today = AttendedModel::where('login_year' , '=',date('Y'))->
        where('login_month' , '=',date('n'))->
        where('login_date' , '=',date('j'))->
        where('user_id' , '=',\Auth::user()->id)->
        exists();

        if($total_login_today){
            return response()->json([
                'status'=>'failed',
                'message'=>'You Have already attended today.'
            ]);
        }

        $data = new AttendedModel();
        $data->user_id = \Auth::user()->id;
        $data->login_year = date("Y");
        $data->login_month = date('n');
        $data->login_date = date('j');
        $data->login_time = date('Y-m-d H:i:s');
        $data->login_lat = $request->txt_lat;
        $data->login_lng = $request->txt_lng;
        try {
            $data->save();
            return response()->json([
                'status'=>'success',
                'message'=>'Welcome '  . \Auth::user()->name
            ]);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json([
                'status'=>'failed',
                'message'=>'Something wrong, click in or out after sinchronize is finish.!'
            ]);
        }

    }

    public function employOut(Request $request)
    {
        $tot_login_today = AttendedModel::where('login_year', '=', date('Y'))->
        where('login_month', '=', date('n'))->
        where('login_date', '=', date('j'))->
        where('user_id', '=', \Auth::user()->id);

        $total_signout_today = AttendedModel::where('signout_year', '=', date('Y'))->
        where('signout_month', '=', date('n'))->
        where('signout_date', '=', date('j'))->
        where('user_id', '=', \Auth::user()->id)->
        exists();

        if (!$tot_login_today->exists()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'You are not Attended in today, please click In to Attended.'
            ]);
        } elseif ($total_signout_today) {
            return response()->json([
                'status' => 'failed',
                'message' => 'You are Attended out today, thanks.'
            ]);
        }

        $update = $tot_login_today->first();
        $update->signout_year = date("Y");
        $update->signout_month = date('n');
        $update->signout_date = date('j');
        //$update->signout_time = "2020-12-20 19:00:00";
        $update->signout_time = date('Y-m-d H:i:s');
        $update->signout_lat = $request->txt_lat;
        $update->signout_lng = $request->txt_lng;
        try {
            $update->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Yayy, go to home :) '
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something wrong, click in or out after sinchronize is finish.!'
            ]);
        }
    }

    public function loginMobile(Request $request){
        //header("Access-Control-Allow-Origin: *");
        $email =  $request->email;
        $password = $request->password;
        $hashedPassword = User::select('password')->where('email', $email)->value('password');

        if (\Hash::check($password , $hashedPassword)) {
            // The passwords match...
            $result = UserModel::where('email', '=', $email)
                ->where('password', '=', $hashedPassword )
                ->get([
                    'id',
                    'name',
                    'email',
                    'rule',
                    'img_profile',
                    'created_at',
                    'updated_at'
                ]);
            //if ( !isset($result[0])) return ['data' => null];
            //return ['data' => $result[0]];
            return response()->json([
                'status' => "ok",
                'message' => "ok",
                'data' => $result
            ]);
        }else{
            return response()->json([
                'status' => "error",
                'message' => "User or password incorect",
                'data' => null
            ]);
        }


     }

     public function mIn(Request $request) {
        sleep(3);
         $total_login_today = AttendedModel::where('login_year' , '=',date('Y'))->
         where('login_month' , '=',date('n'))->
         where('login_date' , '=',date('j'))->
         where('user_id' , '=',$request->id)->
         exists();

         if($total_login_today){
             return response()->json([
                 'status'=>'failed',
                 'message'=>'You Have already attended today.'
             ]);
         }

         $data = new AttendedModel();
         $data->user_id = $request->id;
         $data->login_year = date("Y");
         $data->login_month = date('n');
         $data->login_date = date('j');
         $data->login_time = date('Y-m-d H:i:s');
         $data->login_lat = $request->mlat;
         $data->login_lng = $request->mlong;
         try {
             $data->save();
             return response()->json([
                 'status'=>'success',
                 'message'=>'Welcome '
             ]);
         } catch(\Illuminate\Database\QueryException $e){
             return response()->json([
                 'status'=>'failed',
                 'message'=>'Something wrong, click in or out after sinchronize is finish.!'
             ]);
         }
     }

    public function mOut(Request $request)
    {
        $tot_login_today = AttendedModel::where('login_year', '=', date('Y'))->
        where('login_month', '=', date('n'))->
        where('login_date', '=', date('j'))->
        where('user_id', '=', $request->id);

        $total_signout_today = AttendedModel::where('signout_year', '=', date('Y'))->
        where('signout_month', '=', date('n'))->
        where('signout_date', '=', date('j'))->
        where('user_id', '=', $request->id)->
        exists();

        if (!$tot_login_today->exists()) {
            return response()->json([
                'status' => 'failed',
                'message' => 'You are not Attended in today, please click In to Attended.'
            ]);
        } elseif ($total_signout_today) {
            return response()->json([
                'status' => 'failed',
                'message' => 'You are Attended out today, thanks.'
            ]);
        }

        $update = $tot_login_today->first();
        $update->signout_year = date("Y");
        $update->signout_month = date('n');
        $update->signout_date = date('j');
        //$update->signout_time = "2020-12-20 19:00:00";
        $update->signout_time = date('Y-m-d H:i:s');
        $update->signout_lat = $request->mlat;
        $update->signout_lng = $request->mlong;
        try {
            $update->save();
            return response()->json([
                'status' => 'success',
                'message' => 'Yayy, go to home :) '
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something wrong, click in or out after sinchronize is finish.!'
            ]);
        }
    }

}
