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
            <div class="panel panel-info" style="">
                <div class="panel-heading white-color">Notifications
                    <a class="btn btn-sm btn-danger pull-right" href="{{ url('notifications') }}">View all ({{ $notifications->total() }})</a>
                </div>
                <div class="panel-body">

                    <div class="row" style="margin-bottom: 5px">
                        @if($notifications->total())
                        <div class="" style="padding: 5px 5px; margin: 0 10px;" role="alert">

                            @foreach($notifications as $notification)
                            <div class="alert alert-default" role="alert">
                                <h5>{{ $notification->doctor_name }}</h5>
                                <p>{{ $notification->message }}</p>
                                <span class="text-muted">{{ $notification->updated_at->diffForHumans() }}</span>
                            </div>
                            @endforeach


                    </div>
                    @else
                        <div class="text-center">
                            You have no notifications yet
                        </div>
                    @endif
                </div>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-default" style="min-height: 300px;">
                <div class="panel-heading">Reports</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="well well-lg" style="padding: 5px 30px; margin: 5px 10px;" role="alert">
                            <div class="row">
                                <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, consectetur ex. Ab asperiores corporis dicta dolorem dolorum magni nostrum obcaecati optio, quasi recusandae rerum sint totam, veniam veritatis vero! Maiores.</p>
                            </div>
                            <div class="row">
                                <p>Doctor: <strong>Dr. Oyeneye bolaji</strong></p>
                            </div>
                            <div class="row">
                                <p>Date: <strong>12th june, 2015</strong></p>
                            </div>
                            <div class="row">
                                <a class="btn btn-danger pull-right" href="/Patient/report">more...</a>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="well well-lg" style="padding: 5px 30px; margin: 0 10px;" role="alert">
                            <div class="row">
                                <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, consectetur ex. Ab asperiores corporis dicta dolorem dolorum magni nostrum obcaecati optio, quasi recusandae rerum sint totam, veniam veritatis vero! Maiores.</p>
                            </div>
                            <div class="row">
                                <p>Doctor: <strong>Dr. Wale</strong></p>
                            </div>
                            <div class="row">
                                <p>Date: <strong>12th august, 2015</strong></p>
                            </div>
                            <div class="row">
                                <a class="btn btn-danger pull-right" href="/Patient/report">more...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4" >
        @include('frontend.includes.profile-nav')
    </div>


@endsection

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop