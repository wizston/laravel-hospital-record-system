@extends('frontend.layouts.master')

@section('content')
    <div class="row">

        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-primary">
                <div class="panel-heading">{{ trans('labels.register_box_title') }}</div>

                <div class="panel-body">

                    {!! Form::open(['to' => 'auth/register', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                    <div class="form-group">
                        {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::input('name', 'name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::input('email', 'email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email Address', 'required']) !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Phone Number </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label">Date of Birth </label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="dob" id="dob" placeholder="Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Gender </label>
                        <div class="col-sm-10">
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="gender" id="sex" value="male" required>
                                    Male
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="gender" id="sex" value="female" required>
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::input('password', 'password', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', trans('validation.attributes.password_confirmation'), ['class' => 'col-md-2 control-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'required']) !!}
                        </div>
                    </div>

                    <!------ Next of Kin Begins ------------>

                    <div class="row" style="margin-bottom: 10px;">
                        <h5 class="text-center"><strong>Next Of Kin Details</strong></h5>
                    </div>

                    <div class="form-group">
                        <label for="kin_name" class="col-sm-2 control-label">Name </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kin_name" id="kin_name" placeholder="Next of Kin Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kin_number" class="col-sm-2 control-label">Phone Number </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kin_number" id="kin_number" placeholder="Phone Number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Gender </label>
                        <div class="col-sm-10">
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="kin_gender" id="kin_gender" value="male" required>
                                    Male
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="kin_gender" id="kin_gender" value="female" required>
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kin_address" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kin_address" id="kin_address" placeholder="Next of Kin Address" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kin_rel" class="col-sm-2 control-label">Relationship </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="kin_rel" id="kin_rel" placeholder="Next of kin relationship" required>
                        </div>
                    </div>
                    <!------ Next of Kin Ends ------------>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {!! Form::submit(trans('labels.register_button'), ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div><!-- panel body -->

            </div><!-- panel -->

        </div><!-- col-md-8 -->

    </div><!-- row -->
@endsection