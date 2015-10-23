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
        .txt-send-message {
            border: solid 1px #eee !important;
            margin: 5px;
            width: 98%;
            padding: 6px !important;
            font-size: small !important;
            border-radius: 5px !important;
        }
        .panel-body.patient-lists {
            padding: 0px 15px;
        }
    </style>
    <div class="col-md-8">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-weight: bold">Reports</div>
                <div class="panel-body">
                    <div class="text-right">
                        <a class="" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Hide Report
                        </a>
                    </div>

                    <div class="collapse in" id="collapseExample">
                        <div class="well">
                            <strong>{{ $lastReport->patient_name }}: </strong>
                            <span class="pull-right">{{ $lastReport->created_at->format('d/m/Y') }}</span>
                            <br/>
                            {{ $lastReport->report }}
                        </div>
                    </div>

                    <div class="row">

                        @if(count($conversations))
                            <div class="message-wrap col-lg-12">
                                <div class="msg-wrap">
                                    @foreach($conversations as $conversation)
                                        <div class="media msg">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" data-src="holder.js/64x64" alt="64x64" style="width: 32px; height: 32px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAACqUlEQVR4Xu2Y60tiURTFl48STFJMwkQjUTDtixq+Av93P6iBJFTgg1JL8QWBGT4QfDX7gDIyNE3nEBO6D0Rh9+5z9rprr19dTa/XW2KHl4YFYAfwCHAG7HAGgkOQKcAUYAowBZgCO6wAY5AxyBhkDDIGdxgC/M8QY5AxyBhkDDIGGYM7rIAyBgeDAYrFIkajEYxGIwKBAA4PDzckpd+322243W54PJ5P5f6Omh9tqiTAfD5HNpuFVqvFyckJms0m9vf3EY/H1/u9vb0hn89jsVj8kwDfUfNviisJ8PLygru7O4TDYVgsFtDh9Xo9NBrNes9cLgeTybThgKenJ1SrVXGf1WoVDup2u4jFYhiPx1I1P7XVBxcoCVCr1UBfTqcTrVYLe3t7OD8/x/HxsdiOPqNGo9Eo0un02gHkBhJmuVzC7/fj5uYGXq8XZ2dnop5Mzf8iwMPDAxqNBmw2GxwOBx4fHzGdTpFMJkVzNB7UGAmSSqU2RoDmnETQ6XQiOyKRiHCOSk0ZEZQcUKlU8Pz8LA5vNptRr9eFCJQBFHq//szG5eWlGA1ywOnpqQhBapoWPfl+vw+fzweXyyU+U635VRGUBOh0OigUCggGg8IFK/teXV3h/v4ew+Hwj/OQU4gUq/w4ODgQrkkkEmKEVGp+tXm6XkkAOngmk4HBYBAjQA6gEKRmyOL05GnR99vbW9jtdjEGdP319bUIR8oA+pnG5OLiQoghU5OElFlKAtCGr6+vKJfLmEwm64aosd/XbDbbyIBSqSSeNKU+HXzlnFAohKOjI6maMs0rO0B20590n7IDflIzMmdhAfiNEL8R4jdC/EZIJj235R6mAFOAKcAUYApsS6LL9MEUYAowBZgCTAGZ9NyWe5gCTAGmAFOAKbAtiS7TB1Ng1ynwDkxRe58vH3FfAAAAAElFTkSuQmCC">
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right time"><i class="fa fa-clock-o"></i> {{ $conversation->created_at->diffForHumans() }}</small>

                                                <h5 class="media-heading">{{ $conversation->name }}</h5>
                                                <small class="col-lg-10">{{ $conversation->message }}</small>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="send-wrap ">

                            {!! Form::open(['url' => url('doctor/report/chat/new')]) !!}

                            <input type="hidden" name="reportId" value="{{ $lastReport->id }}">
                            <input type="hidden" name="doctorID" value="{{ $lastReport->user_id }}">

                            <textarea class="form-control txt-send-message" name="message" id="message" rows="3" placeholder="Write a reply..."></textarea>
                            <button class="btn btn-sm btn-success pull-right" style="margin-top: 5px;">Send</button>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="col-md-4" >

        {{-- View Containing all patients assigned to authenticated doctor --}}

        <div class="panel panel-default">
            <div class="panel-heading" style="font-weight: bold">Other Reports</div>
            <div class="panel-body">
                @if(count($reports))
                    @foreach($reports as $report)
                        <a href="{{ url('doctor/feedback/'.$id.'?conversation=' . $report->id) }}" style="text-decoration: none">
                        <div class="panel panel-default" style="margin-bottom: 5px;">
                            <div class="panel-body patient-lists">
                                <strong><< {{ $report->patient_name }}</strong>
                                <small class="pull-right text-muted">{{ $report->created_at->format('d/m/Y') }}</small>
                                <div style="color: #6F6678;">
                                    {{ mb_strimwidth($report->report, 0, 40, "...") }}
                                </div>
                                <div class="patient-pix"></div>
                            </div>
                        </div>
                        </a>
                    @endforeach
                @else
                    <div class="panel panel-default" style="margin-bottom: 5px;">
                        <div class="panel-body text-center">
                            <strong class="text-warning">No patients is assigned to you yet.</strong>
                        </div>
                    </div>
                @endif
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
