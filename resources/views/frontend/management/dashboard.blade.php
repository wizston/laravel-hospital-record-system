<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/21/2015
 * Time: 1:23 PM
 */
?>
@extends('frontend.layouts.master')

@section('content')
    <style>
        .alert-default {
            background: #eee;
        }

        .alert-default h5 {
            margin-top: 0.5px;
            margin-bottom: -2.5px;
        }

        .alert-default p {
            color: #2c2c2c;
        }
        .alert {
            margin-bottom: 3px;
        }

    </style>

    <style>
        .reports-list-link
        {
            text-decoration: none !important;
            color: #960116;
        }
        .make-report-link {
            position: absolute;
            top: 32px;
            right: 18px;
        }

        .patient-pix {
            width: 45px;
            height: 45px;
            border: dashed 1px #eee;
            position: absolute;
            left: 5px;
            top: 5px;
        }

        .patient-lists {
            padding-top: 5px;
            padding-bottom: 5px;
            position: relative;
            padding-left: 60px;
        }
        .report-check {
            position: absolute;
            right: 10px;
            top: 10px;
        }
    </style>
    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4">

                    <div class="panel panel-default">
                        <div class="panel-body text-center  ">
                            <h2><strong> {{ $total_patients }}</strong></h2>
                            <p><small>All Patients</small></p>
                            <a class="btn btn-info btn-block"><span class="fa fa-plus-circle"></span> View </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">

                    <div class="panel panel-default">
                        <div class="panel-body text-center  ">
                            <h2><strong> {{ $total_doc }}</strong></h2>
                            <p><small>All Doctors</small></p>
                            <a class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> View </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">

                    <div class="panel panel-default">
                        <div class="panel-body text-center  ">
                            <h2><strong> {{ $total_reports }}</strong></h2>
                            <p><small>Reports</small></p>
                            <a class="btn btn-warning btn-block"><span class="fa fa-plus-circle"></span> View </a>
                        </div>
                    </div>
                </div>


                <div class="col-md-12">
                    <a href="{{ url('management/new-doctor') }}" class="btn btn-primary pull-right">Register New Doctor</a>
                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#patients_tab" aria-controls="home" role="tab" data-toggle="tab">Patients</a></li>
                            <li role="presentation"><a href="#doctors_tab" aria-controls="profile" role="tab" data-toggle="tab">Doctors</a></li>
                            <li role="presentation"><a href="{{ url('management/new-doctor') }}" >Register Doctors</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="patients_tab">
                                <h3>All Patients</h3>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Edit</th>
                                    </tr>
                                    @if($patients)
                                        <input type="hidden" value="{{ $i = 0 }}">
                                        @foreach($patients as $patient)
                                            <input type="hidden" value="{{ $i++ }}">
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $patient->name }}</td>
                                                <td>{{ $patient->email }}</td>
                                                <td>{{ $patient->address }}</td>
                                                <td><a href="{{ url('management/profile/edit/' . $patient->user_id) }}" class="btn btn-sm btn-warning">EDIT</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </thead>
                                </table>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="doctors_tab">

                                <h3>All Doctors</h3>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Specialization</th>
                                        <th>License Number</th>
                                        <th>Edit</th>
                                    </tr>
                                    @if($doctors)
                                        <input type="hidden" value="{{ $i = 0 }}">
                                        @foreach($doctors as $doctor)
                                            <input type="hidden" value="{{ $i++ }}">
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $doctor->doctorName }}</td>
                                                <td>{{ $doctor->email }}</td>
                                                <td>{{ $doctor->name }}</td>
                                                <td>{{ $doctor->license_number }}</td>
                                                <td><a href="{{ url('management/profile/edit/' . $doctor->user_id) }}" class="btn btn-sm btn-warning">EDIT</a></td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </thead>
                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop
