@extends('layouts.base')
@section('pageTitle', 'Attended')
@section('pageDescription', '')
@section('pageLevel', 'Main')
@section('pageActive', 'Attended')
@section('content')
<section class="content">
    <!-- Info boxes -->
    <div class="login-box">
        <div class="login-logo">
            <a href="index"><b>Attendance</b></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">
            <form action="" method="post">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" id="showtime" name="showtime">
                    Coordinate : <br>
                    <div class="row">
                        <div class="col-xs-6">
                            <input type="text" class="form-control" id="txt_lat" name="txt_lat" readonly="" style="padding-right: 10px !important;">
                        </div>
                        <div class="col-xs-6">
                            <input type="text" class="form-control" id="txt_lng" name="txt_lng" readonly="" style="padding-right: 10px !important;">
                        </div>
                    </div>

                    IP : <br>
                    <!--input type="text" class="form-control" id="txt_ip" name="txt_ip" value="" readonly="readonly"-->
                    <input type="text" class="form-control" id="txt_ip" name="txt_ip" readonly="">

                </div>

                <br>
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-primary btn-block btn-flat" onclick="btIn()"> In </button>
                    </div><!-- /.col -->
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-primary btn-block btn-flat" onclick="btOut()"> Out </button>
                    </div><!-- /.col -->
                </div>
                <!--</form>-->
            </form><!-- /.example-modal -->


            <div id="response">
                &nbsp;
            </div>
            <div></div>
        </div><!-- /.login-box-body -->
    </div>
</section>
@endsection
