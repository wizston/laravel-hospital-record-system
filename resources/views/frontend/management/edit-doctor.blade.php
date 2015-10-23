<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/23/2015
 * Time: 10:35 AM
 */
?>

@extends('frontend.layouts.master')

@section('content')

    <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">

            <div class="panel-body">

                <h4>Edit Profile</h4>
                {!! Form::model($user, ['url' => 'management/profile/update', 'class' => 'form-horizontal']) !!}

                <input type="hidden" name="userID" value="{{ $user->id }}">
                <div class="form-group">
                    {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                    <div class="form-group">
                        {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>


                @if($user->license_number != null)
                <div class="form-group">
                    {!! Form::label('license_number', 'License Number', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::input('text', 'license_number', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('specialization_id', 'Specialization', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::select('specialization_id', $specializations, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                @endif


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        {!! Form::submit(trans('labels.save_button'), ['class' => 'btn btn-primary']) !!}
                    </div>
                </div>

                {!! Form::close() !!}

            </div><!--panel body-->

        </div>
    </div>

@endsection