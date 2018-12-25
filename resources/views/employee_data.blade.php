@extends('layouts.base')
@section('pageTitle', 'Master Data')
@section('pageDescription', 'Employee Data')
@section('pageLevel', 'Master Data')
@section('pageActive', 'Employee Data')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Employee Data</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" style="">
                @if(Session::has('alert-success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        {{ \Illuminate\Support\Facades\Session::get('alert-success') }}
                    </div>
                @elseif(Session::has('alert-failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Alert!</h4>
                        {{ \Illuminate\Support\Facades\Session::get('alert-failed') }}
                    </div>

                @endif
                <div class="btn-group">
                    <a href="{{route('FormAddEmployee')}}" class="btn btn-success btn-group-xs">
                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                        Add Employee</a>
                    <button class="btn btn-info btn-group-xs" data-toggle="modal" data-target="#modal_edit_category" onclick="underdeveloptment();">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        Batch Proccess</button>
                </div>

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>#ID</td>
                        <td>Name</td>
                        <td>Email</td>
                        <td>Rule</td>
                        <td>Create At</td>
                        <td>Update At</td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $dt)
                        <tr>
                            <td>{{ $dt->id }}</td>
                            <td>{{ $dt->name }}</td>
                            <td>{{ $dt->email }}</td>
                            <td>{{ $dt->rule }}</td>
                            <td>{{ $dt->created_at }}</td>
                            <td>{{ $dt->updated_at }}</td>
                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer" style="">

            </div>
            <!-- /.box-footer-->
        </div>
    </section>
@endsection