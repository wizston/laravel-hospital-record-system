@extends('frontend.layouts.master')

@section('content')
	<div class="row">

		<div class="col-md-8 col-md-offset-2">

			<div class="panel panel-default">
				<div class="panel-heading">{{ trans('labels.update_information_box_title') }}</div>

				<div class="panel-body">

                       {!! Form::model($user, ['route' => 'frontend.profile.update', 'class' => 'form-horizontal', 'method' => 'PATCH']) !!}

                              <div class="form-group">
                                    {!! Form::label('name', trans('validation.attributes.name'), ['class' => 'col-md-2 control-label']) !!}
                                    <div class="col-md-10">
                                        {!! Form::input('text', 'name', null, ['class' => 'form-control']) !!}
                                    </div>
                              </div>

                              @if ($user->canChangeEmail())
                                  <div class="form-group">
                                      {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-2 control-label']) !!}
                                      <div class="col-md-10">
                                          {!! Form::input('email', 'email', null, ['class' => 'form-control']) !!}
                                      </div>
                                  </div>
                              @endif

                    <div class="form-group">
                        <label for="address" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-10">
                            {!! Form::input('address', 'address', null, ['class' => 'form-control', 'placeholder' => 'Address','required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-2 control-label">Phone Number </label>
                        <div class="col-sm-10">
                            {!! Form::input('phone', 'phone', null, ['class' => 'form-control', 'placeholder' => 'Phone number','required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dob" class="col-sm-2 control-label">Date of Birth </label>
                        <div class="col-sm-10">

                            {!! Form::input('date_of_birth', 'date_of_birth', null, ['class' => 'form-control', 'placeholder' => 'Date of birth','required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Gender </label>
                        <div class="col-sm-10">
                            <div class="radio radio-inline">
                                <label>
                                    {!! Form::radio('gender', 'male', '', ['required']) !!}
                                    Male
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    {!! Form::radio('gender', 'female', '', ['required']) !!}
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>

                    <!------ Next of Kin Begins ------------>

                    <div class="row" style="margin-bottom: 10px;">
                        <h5 class="text-center"><strong>Next Of Kin Details</strong></h5>
                    </div>

                    <div class="form-group">
                        <label for="kin_name" class="col-sm-2 control-label">Name </label>
                        <div class="col-sm-10">
                            {!! Form::input('next_of_kin_name', 'next_of_kin_name', null, ['class' => 'form-control', 'placeholder' => 'Next of Kin Name','required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kin_number" class="col-sm-2 control-label">Phone Number </label>
                        <div class="col-sm-10">
                            {!! Form::input('next_of_kin_phone', 'next_of_kin_phone', null, ['class' => 'form-control', 'placeholder' => 'Phone Number','required']) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="gender" class="col-sm-2 control-label">Gender </label>
                        <div class="col-sm-10">
                            <div class="radio radio-inline">
                                <label>
                                    {!! Form::radio('next_of_kin_gender', 'male', '', ['required']) !!}
                                    Male
                                </label>
                            </div>
                            <div class="radio radio-inline">
                                <label>
                                    {!! Form::radio('next_of_kin_gender', 'female', '', ['required']) !!}
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kin_address" class="col-sm-2 control-label">Address </label>
                        <div class="col-sm-10">
                            {!! Form::input('next_of_kin_address', 'next_of_kin_address', null, ['class' => 'form-control', 'placeholder' => 'Next of Kin Address','required']) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kin_rel" class="col-sm-2 control-label">Relationship </label>
                        <div class="col-sm-10">
                            {!! Form::input('next_of_kin_relationship', 'next_of_kin_relationship', null, ['class' => 'form-control', 'placeholder' => 'Next of kin relationship','required']) !!}
                        </div>
                    </div>
                              <div class="form-group">
                                  <div class="col-md-6 col-md-offset-4">
                                      {!! Form::submit(trans('labels.save_button'), ['class' => 'btn btn-primary']) !!}
                                  </div>
                              </div>

                       {!! Form::close() !!}

				</div><!--panel body-->

			</div><!-- panel -->

		</div><!-- col-md-10 -->

	</div><!-- row -->
@endsection