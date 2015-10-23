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
            <h3><i class="glyphicon glyphicon-file" style="color: #A8A8AB;"></i>All Reports
            </h3>


            <div class="panel panel-default">
                <div class="panel-body">

                    @if(count($reports))

                        @foreach($reports as $report)
                                <div class="panel panel-default">
                                    <div class="panel-body" style="position: relative;">
                                        <strong>{{ $report->patient_name }}</strong>
                                        <small class="pull-right text-muted">{{ $report->updated_at->format('d - M - Y') }}</small>
                                        <div> {{ $report->report }}</div>
                                        <div><span class="text-info">Assigned Doctor: </span><strong> Dr. {{ $report->name }}</strong></div>

                                    </div>
                                </div>
                        @endforeach

                    @else
                        <div class="text-center">
                            No report has been submitted to you
                        </div>
                    @endif
                        {!! $reports->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')

@stop