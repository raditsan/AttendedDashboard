@extends('layouts.base')
@section('pageTitle', 'Dashboard')
@section('pageDescription', 'Report')
@section('pageLevel', 'Dashboard')
@section('pageActive', 'Report')
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{{$totals->count()}}</h3>

                        <p> Employee Total</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{route('EmployeeData')}}" class="small-box-footer">
                      More info  <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$total_login_today->count()}}</h3>

                        <p>Today Login</p>
                    </div>
                    <div class="icon">
                        <i class="ion fa-calendar-times-o "></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
