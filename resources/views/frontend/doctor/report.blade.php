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

        #loading {
            position: absolute;
            top: 15px;
            right: 25px;
        }

    </style>
    <div class="col-md-8">
        <h3 class="text-primary">REPORT</h3>
        <div class="panel panel-default" style="min-height: 300px;">
            <div class="panel-body">
                <div class="row">
                    <div class="" style="padding: 5px 30px; margin: 5px 10px;" role="alert">
                        <div class="row">
                            <h4><strong class="text-danger">Report: </strong></h4>

                            <p>
                                <span>Patient: <strong>{{ $report->name }}</strong></span>

                                <span style="float:right">Date: <strong>{{ $report->updated_at->format('jS, M Y') }}</strong></span>
                            </p>

                            <p>
                                {{ $report->report}}
                            </p>
                        </div>
                        <div>

                            <div class="row">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#make_recommendation" aria-controls="home" role="tab" data-toggle="tab">Make Recommendation</a></li>
                                    <li role="presentation"><a href="#refer" aria-controls="profile" role="tab" data-toggle="tab">Refer Patient</a></li>
                                </ul>

                            </div>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="make_recommendation">

                                    <div class="row">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                {!! Form::open(array('url' => url('doctor/report/post-recommendation/'. $id))) !!}
                                                <h4><strong class="text-success">Make Recommendations: </strong></h4>

                                                <div class="form-group">
                                                    <label for="doc_advice">Advice:</label>
                                                    <textarea name="doc_advice" id="doc_advice" rows="6" placeholder="Advice to patient" style="border: solid 1px #ddd;padding: 5px;font-size: small;" placeholder="Advice to patient" class="form-control">{{ isset($recommendation) ? $recommendation->advice : '' }}</textarea>
                                                </div>


                                                <div class="form-group">
                                                    <label for="doc_drug">Drugs:</label>
                                                    <textarea name="doc_drug" id="doc_drug" rows="6" style="font-size: small;border: solid 1px #ddd;padding: 5px" placeholder="Drugs to patient" class="form-control">{{ isset($recommendation) ? $recommendation->drugs : '' }}</textarea>
                                                </div>

                                                <div class="form-group text-right">
                                                    <input type="submit" value="Submit" class=" btn btn-warning">
                                                </div>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane" id="refer">

                                    <div class="row">
                                        <div class="panel panel-default">
                                            <div class="panel-body">

                                                <h5 class="text-center"><strong class="text-success">Refer Patient: </strong></h5>
                                                <p class="text-danger text-center">
                                                    Use this form only to refer this patient to another doctor that fit right for their report
                                                </p>

                                                {!! Form::open(['url' => url('doctor/report/refer_patient/'. $id), 'class' => 'form-horizontal']) !!}

                                                <div class="form-group">
                                                    <label for="doctors" class="col-sm-4 control-label" style="font-weight: bold">Choose Specialization: </label>
                                                    <div class="col-sm-8">
                                                        {!! Form::select('drp_specializations', $doctors, null, ['class' => 'form-control', 'id' => 'drp_specializations']) !!}
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="doctors" class="col-sm-4 control-label" style="font-weight: bold">Choose a Doctor: </label>
                                                    <div class="col-sm-8">
                                                        <select name="doctors" id="doctors" class="form-control">
                                                        </select>
                                                        <span id="loading"></span>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="note" class="col-sm-4 control-label">Note: </label>
                                                    <div class="col-sm-8">
                                                        <textarea name="note" placeholder="Other Notes (Optional)" class="form-control" id="note" rows=4></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group text-right">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-info">Submit</button>
                                                    </div>
                                                </div>

                                                {!! Form::close() !!}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-md-4" style="margin-top: 72px;">

        <div class="panel panel-info" style="">
            <div class="panel-heading white-color">Previous Complains
            </div>
            <div class="panel-body" style="">

                @if(count($previous_complaints))
                    @foreach($previous_complaints as $previous_complaint)
                        <a href="#" class="reports-list-link">
                            <div class="panel panel-default">
                                <div class="panel-body" style="position: relative;">
                                    <div><strong>Date:</strong> {{ $previous_complaint->updated_at->format('jS, M Y') }} </div>
                                    <p>{{ mb_strimwidth($previous_complaint->report, 0, 80, "...") }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                @else

                    <div class="panel panel-default">
                        <div class="panel-body text-center" style="position: relative;">
                            No Previous Complains From This Patient
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>

@endsection

@section('after-scripts-end')
    <script>
        //Fetch Doctors based on their specialization   doctors

        $('#drp_specializations').on('change', function() {
            var id = $(this).val();

            var data = "id=" + id;
            $.ajax({
                type: "POST",
                url: "ajax/get_doctors",
                data: data,
                cache: true,
                beforeSend: function(){
                    $('#doctors').attr('disabled', 'disabled');
                    $("#loading").html('<i class=\'fa fa-spinner fa-pulse\'></i> Loading...');
                },
                success: function(html){

                    $('#doctors').removeAttr('disabled');
                    $("#loading").html('');
                    $("#doctors").html(html);
                }
            });
        });
    </script>
@stop