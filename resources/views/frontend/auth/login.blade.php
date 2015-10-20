
<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <title>page title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="{{url("css/metro-bootstrap.css")}}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@include('frontend.includes.header-nav')

<div class="container">
    <div class="page-header" style="margin-top: 85px" id="banner">
        <div class="row">
            <div class="col-xs-12">

                <div class="row">

                    <div class="col-md-8 col-md-offset-2">

                        <div class="panel panel-default">
                            <div class="panel-heading">{{trans('labels.login_box_title')}}</div>

                            <div class="panel-body">

                                {!! Form::open(['url' => 'auth/login', 'class' => 'form-horizontal', 'role' => 'form']) !!}

                                <div class="form-group">
                                    {!! Form::label('email', trans('validation.attributes.email'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('email', 'email', old('email'), ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('password', trans('validation.attributes.password'), ['class' => 'col-md-4 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::input('password', 'password', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                {!! Form::checkbox('remember') !!} {{ trans('labels.remember_me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        {!! Form::submit(trans('labels.login_button'), ['class' => 'btn btn-primary', 'style' => 'margin-right:15px']) !!}

                                        {!! link_to('password/email', trans('labels.forgot_password')) !!}
                                    </div>
                                </div>

                                {!! Form::close() !!}

                                <div class="row text-center">
                                    {!! $socialite_links !!}
                                </div>
                            </div><!-- panel body -->

                        </div><!-- panel -->

                    </div><!-- col-md-8 -->

                </div><!-- row -->
            </div>
        </div>
    </div>

</div>
<footer class="footer" style="text-align:center; background-color:black; font-size:2rem; height:50px;">
    <p >...</p>
</footer>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type="text/javascript" src="{{ url('js/jquery.js') }}"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="{{ url('js/bootstrap.js') }}"></script>

<script>
    $('#view_profile_tab').click(function (e) {
        e.preventDefault()
        $('#tabs li:eq(1) a').tab('show')
    })
</script>
</body>
</html>