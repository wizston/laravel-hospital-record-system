@extends('frontend.layouts.master')

@section('content')
    <style>
        .profile
        {
            min-height: 355px;
            display: inline-block;
        }
        figcaption.ratings
        {
            margin-top:20px;
        }
        figcaption.ratings a
        {
            color:#f1c40f;
            font-size:11px;
        }
        figcaption.ratings a:hover
        {
            color:#f39c12;
            text-decoration:none;
        }
        .divider
        {
            border-top:1px solid rgba(0,0,0,0.1);
        }
        .emphasis
        {
            border-top: 4px solid transparent;
        }
        .emphasis:hover
        {
            border-top: 4px solid #1abc9c;
        }
        .emphasis h2
        {
            margin-bottom:0;
        }
        span.tags
        {
            background: #1abc9c;
            border-radius: 2px;
            color: #f5f5f5;
            font-weight: bold;
            padding: 2px 4px;
        }
        .dropdown-menu
        {
            background-color: #34495e;
            box-shadow: none;
            -webkit-box-shadow: none;
            width: 250px;
            margin-left: -125px;
            left: 50%;
        }
        .dropdown-menu .divider
        {
            background:none;
        }
        .dropdown-menu>li>a
        {
            color:#f5f5f5;
        }
        .dropup .dropdown-menu
        {
            margin-bottom:10px;
        }
        .dropup .dropdown-menu:before
        {
            content: "";
            border-top: 10px solid #34495e;
            border-right: 10px solid transparent;
            border-left: 10px solid transparent;
            position: absolute;
            bottom: -10px;
            left: 50%;
            margin-left: -10px;
            z-index: 10;
        }

    </style>
    <div class="col-md-8 col-md-offset-2">
        <div class="col-md-12">
            <div class="well profile">
                <div class="col-sm-12">
                    <div class="col-xs-12 col-sm-8">
                        <h3>{{ $user->name }}</h3>
                        <p><strong>Email: </strong> {{ $user->email }} </p>
                        <p><strong>Address: </strong> {{ $user->address }} </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        {{--<figure>
                        --}}{{--    <img src="http://www.brunningonline.net/simon/blog/archives/South%20Park%20Avatar.jpg" alt="" class="img-circle img-responsive">
                        </figure>--}}
                    </div>
                </div>
                <div class="col-xs-12 divider text-center">
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong> {{ $reportCount }}</strong></h2>
                        <p><small>Reports</small></p>
                        <a href="{{ url('dashboard') }}" class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Dashboard </a>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong> --- </strong></h2>
                        <p><small>Recommendations</small></p>
                        <a href="{{ url('profile/edit') }}" class="btn btn-info btn-block"><span class="fa fa-user"></span> Edit </a>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong>Active</strong></h2>
                        <p><small>Status</small></p>
                        <div class="btn-group dropup btn-block">
                            <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options </button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu text-left" role="menu">
                                <li><a href="{{ url('auth/password/change') }}"><span class="fa fa-list pull-right"></span>Change password </a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('reports') }}"><span class="fa fa-warning pull-right"></span>View Reports</a></li>
                                <li class="divider"></li>
                                <li><a href="{{ url('auth/logout') }}" class="btn" role="button"> Sign Out </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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