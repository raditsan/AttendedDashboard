@extends('layouts.base')
@section('pageTitle', 'Profile')
@section('pageDescription', '')
@section('pageLevel', 'Profile')
@section('pageActive', 'here')
@section('content')
<section class="content">

    <div class="center-block">
        <div class="col-lg-3 col-lg-offset-4">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="{{URL::asset('img_profile/' . Auth::user()->img_profile)}}" alt="User profile picture">

                    <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                    <p class="text-muted text-center">{{ Auth::user()->rule }}</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Email</b> <a class="pull-right">{{ Auth::user()->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Join date</b> <a class="pull-right">{{ Auth::user()->created_at }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Rule</b> <a class="pull-right">{{ Auth::user()->rule }}</a>
                        </li>
                    </ul>

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
</section>
@endsection