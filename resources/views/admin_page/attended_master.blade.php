@extends('layouts.base')
@section('pageTitle', 'Master Data')
@section('pageDescription', 'Attended Master')
@section('pageLevel', 'Master')
@section('pageActive', 'Attended Master')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Attended Data</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body" style="">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>Date</td>
                        <td>Email</td>
                        <td>Day</td>
                        <td>In</td>
                        <td>Out</td>
                        <td>working hours</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data_attended as $dt)
                        <tr>
                            <td>{{ date("Y-m-d", strtotime($dt->login_time)) }}</td>
                            <td>{{ $dt->email }}</td>
                            <td>{{ date("l", strtotime($dt->login_time)) }}</td>
                            <td>{{ date("H:i:s", strtotime($dt->login_time)) }}</td>
                            <td>
                                @if (!empty($dt->signout_time))
                                    {{ date("H:i:s", strtotime($dt->signout_time)) }}
                                @endif
                            </td>
                            <td>
                                @if (!empty($dt->signout_time))
                                    @php
                                        $t1 = strtotime($dt->login_time);
                                            $t2 = strtotime($dt->signout_time);
                                            $delta_T = ($t2 - $t1);
                                            $day = round(($delta_T % 604800) / 86400);
                                            $hours = round((($delta_T % 604800) % 86400) / 3600);
                                            $minutes = round(((($delta_T % 604800) % 86400) % 3600) / 60);
                                            $sec = round((((($delta_T % 604800) % 86400) % 3600) % 60));
                                            //echo $day." days";
                                            echo $hours." hours ";
                                            echo $minutes." minutes ";
                                            echo $sec." sec";

                                    @endphp
                                @endif
                            </td>
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