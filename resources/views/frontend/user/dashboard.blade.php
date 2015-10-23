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
    <div class="col-md-8">

        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-weight: bold">My Recent Reports and Recommendations</div>
                <div class="panel-body">

                    @if(count($recent_report))
                    <div class="row">
                        <div class="well well-lg" style="padding: 5px 30px; margin: 5px 10px;" role="alert">
                            <div class="row">
                                <p><strong class="text-danger">Report: </strong><br>
                                    {{ $recent_report->report }}
                                    {{--...<a href="#">read more</a>--}}
                                </p>
                            </div>
                            <div class="row">
                                <h5 class="text-success">Doctor's Recommendations: </h5>
                            </div>

                            @if($recommendation)
                            <div class="row">
                                <p>
                                    <span>Doctor: <strong>{{ $recommendation->name }}</strong></span>

                                   <span style="float:right">Date: <strong> {{ $recommendation->updated_at->diffForHumans() }}</strong></span>
                                </p>
                                <p>
                                    {{ $recommendation->advice }}
                                </p>
                            </div>
                            <div class="row">
                                <a class="btn btn-danger pull-right" href="{{ url('report/'. $recommendation->id) }}">View</a>
                            </div>
                            @else
                                <div class="text-center">
                                    <strong class="text-danger">This report has no recommendation yet, please be patient since you already a patient.</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    @else
                        <div class="text-center">
                            <strong>You haven't made any report yet.</strong><br/>
                            if you will like to make a report, click <a href="{{ url('report/new') }}">here.</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4" >

        @include('frontend.includes.notifications')

        @include('frontend.includes.profile-nav')

            </div>

@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop