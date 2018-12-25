@extends('layouts/base')
@section('content')
    <section class="content">
        <form class="form-horizontal"  action="{{route('AddEmployee')}}" method="post">
            {{ csrf_field() }}
            {{ method_field('POST') }}
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Add Employee</h3> <button type="submit" class="btn btn-success btn-xs">Save</button> <button type="button" class="btn btn-warning btn-xs" onclick="window.history.go(-1); return false;">Back</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-4">
                        <input type="text" class="form-control" placeholder="Name" name="name" required >
                    </div>
                    <div class="col-xs-4">
                        <input type="email" class="form-control" placeholder="Email" name="email" required >
                    </div>
                    <div class="col-xs-4">
                        <select class="form-control" name="rule" required >
                            <option value="" disabled selected>Select rule</option>
                            <option value="employee">Employee</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="col-xs-4">
                        <p>* The password is same as email</p>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        </form>
    </section>
@endsection
