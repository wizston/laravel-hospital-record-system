<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/20/2015
 * Time: 3:21 PM
 */
?>

@extends('frontend.layouts.master')

@section('content')

    <style>
        .reports-arrow {
            position: absolute;
            right: 15px;
            top: 28px;
            float: right;
            font-size: 17px;
        }
        .reports-list-link
        {
            text-decoration: none !important;
        }
        .make-report-link {
            position: absolute;
            top: 32px;
            right: 18px;
        }
    </style>
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-12">
            <h3><i class="glyphicon glyphicon-file" style="color: #A8A8AB;"></i>Reports
            </h3>
            <a href="{{ url('report/new') }}" class="btn btn-success btn-sm make-report-link">Make Report</a>


            <div class="panel panel-default">
                <div class="panel-body">

                    @if(count($reports))

                        @foreach($reports as $report)
                            <a href="{{ url('report/' . $report->id) }}" class="reports-list-link">
                                <div class="panel panel-default">
                                    <div class="panel-body" style="position: relative;">
                                        <div><strong>Report: </strong>{{ mb_strimwidth($report->report, 0, 90, "...") }}</div>
                                        <div><strong>Date:</strong> {{ $report->updated_at->format('d - M - Y') }}</div>
                                        <i class="glyphicon glyphicon-chevron-right reports-arrow"></i>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    @else
                        <div class="text-center">
                            You have no reports yet
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')

@stop