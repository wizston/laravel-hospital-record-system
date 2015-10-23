<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/21/2015
 * Time: 9:31 AM
 */
?>

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
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-12">
            <h3><i class="glyphicon glyphicon-pencil"></i> Make a report</h3>


            <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        <strong>Tip:  </strong>Make full description of your health status including the symtoms and the duration (start day) of the ailment

                    </p>

                    {!! Form::open(array('url' => url('report/new'))) !!}

                    <div class="form-group">
                        <textarea name="txtReport" id="txtReport" rows="10" class="form-control" placeholder="Type your complain here..." style="border: solid 1px #ddd;padding: 5px"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                           {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')

@stop