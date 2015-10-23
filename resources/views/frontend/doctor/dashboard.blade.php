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
    <div class="col-md-8">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-weight: bold">Reports</div>
                <div class="panel-body">
                    @if($reports->total())
                    @foreach($reports as $report)
                            <div class="panel panel-default">
                                <div class="panel-body" style="position: relative;">
                                    <span class="label label-success report-check"><i class="glyphicon glyphicon-ok"></i></span>
                                    <div><strong>Patient:</strong> {{ $report->patient_name }}</div>
                                    <div><strong>Date:</strong> {{ $report->updated_at->diffForHumans() }}</div>
                                    <p> {{ mb_strimwidth($report->report, 0, 200, "...") }}</p>
                                    <div class="text-right"><a href="{{ url('doctor/report/' . $report->id) }}" class="btn btn-sm btn-warning">View full report</a></div>
                                </div>
                            </div>
                    @endforeach
                    @else
                        <div class="panel panel-default">
                            <div class="panel-body text-center" style="position: relative;">
                                No report has been assigned to you
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4" >

        {{-- View Containing all patients assigned to authenticated doctor --}}
        @include('frontend.includes.assigned_patients')

    </div>

@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop
