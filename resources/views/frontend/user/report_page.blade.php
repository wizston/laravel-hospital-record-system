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
            <h3 class="text-primary">REPORT</h3>
            <div class="panel panel-default" style="min-height: 300px;">
                <div class="panel-body">
                    <div class="row">
                        <div class="well well-lg" style="padding: 5px 30px; margin: 5px 10px;" role="alert">
                            <div class="row">
                                <h4><strong class="text-danger">Report: </strong></h4>
                                <p>{{ $report->report }} </p>
                            </div>

                            <h4><strong class="text-success">Doctor's Recommendations: </strong></h4>
                            @if($recommendation)
                                <div class="row">
                                    <p>
                                        <span>Doctor: <strong>Dr.{{ $recommendation->name }}</strong></span>

                                        <span style="float:right">Date: <strong>{{ $recommendation->updated_at->diffForHumans() }}</strong></span>
                                    </p>
                                    <p>
                                        <strong>Advice: </strong>{{ $recommendation->advice }}
                                        <br/>
                                        <br/>
                                        <strong>Drugs: </strong>{{ $recommendation->drugs }}
                                    </p>
                                </div>
                            @else
                                <div class="text-center">
                                    <strong class="text-danger">This report has no recommendation yet, please exercise patient while your report is been attend to.</strong>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4" style="margin-top: 70px;">

        <div class="panel panel-info" style="">
            <div class="panel-heading white-color">Feedback
            </div>
            <div class="panel-body" style="height: 450px;overflow-y: scroll;">

                {!! Form::open(['url' => url('report/chat/new')]) !!}
                <input type="hidden" name="reportId" value="{{ $report->id }}">

                @if(count($conversations))
                    <input type="hidden" name="doctorID" value="{{ $conversations[0]->doctor_id }}">
                    @foreach($conversations as $conversation)
                        <div class="panel" style="margin-bottom: 5px;">
                            <div class="panel-body" style="padding: 7px">
                                <strong> Dr. {{ $conversation->doctor_name }}:</strong>
                                <span class="text-muted pull-right" style="font-size: smaller"><i class="glyphicon glyphicon-time"></i> {{ $conversation->created_at->diffForHumans() }}</span>
                                <p style="margin-bottom: 0">{{ $conversation->message }}</p>
                            </div>
                        </div>
                    @endforeach

                        <div class="panel" style="margin-bottom: 5px;">
                            <div class="panel-body">
                                <textarea name="message" id="message" placeholder="Send a message to Dr. {{ $conversation->doctor_name }}" rows=2 class="form-control"></textarea>
                                <button class="btn btn-sm btn-success pull-right" style="margin-top: 5px;">Send</button>
                            </div>
                        </div>
                @else

                    <input type="hidden" name="doctorID" value="{{ $report->assigned_doctor_id }}">
                    <div class="panel" style="margin-bottom: 5px;">
                        <div class="panel-body" style="padding: 7px">
                            <div class="text-center">
                                you have no conversations to display
                            </div>
                        </div>
                    </div>

                    <div class="panel" style="margin-bottom: 5px;">
                        <div class="panel-body">
                            <textarea name="message" id="message" placeholder="Start a Conversation" rows=2 class="form-control"></textarea>
                            <button class="btn btn-sm btn-success pull-right" style="margin-top: 5px;">Send</button>
                        </div>
                    </div>

                @endif

                {!! Form::close() !!}

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