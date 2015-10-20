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
            <div class="panel panel-info">
                <div class="panel-heading white-color">All Notifications</div>
                <div class="panel-body">

                    <div class="row" style="margin-bottom: 5px">
                        <div class="" style="padding: 5px 5px; margin: 0 10px;" role="alert">
                            @if($notifications->total())

                            @foreach($notifications as $notification)
                            <div class="alert alert-default" role="alert">
                                <h5>{{ $notification->doctor_name }}</h5>
                                <p>{{ $notification->message }}</p>
                                <span class="text-muted">{{ $notification->updated_at->diffForHumans() }}</span>
                            </div>
                            @endforeach

                            @else
                            <div class="text-center">
                                You have no notifications
                            </div>
                            @endif

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