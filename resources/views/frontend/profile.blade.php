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
                        <h2>Nicole Pearson</h2>
                        <p><strong>About: </strong> Web Designer / UI. </p>
                        <p><strong>Hobbies: </strong> Read, out with friends, listen to music, draw and learn new things. </p>
                        <p><strong>Skills: </strong>
                            <span class="tags">html5</span>
                            <span class="tags">css3</span>
                            <span class="tags">jquery</span>
                            <span class="tags">bootstrap3</span>
                        </p>
                    </div>
                    <div class="col-xs-12 col-sm-4 text-center">
                        <figure>
                            <img src="http://www.brunningonline.net/simon/blog/archives/South%20Park%20Avatar.jpg" alt="" class="img-circle img-responsive">
                            <figcaption class="ratings">
                                <p>Ratings
                                    <a href="#">
                                        <span class="fa fa-star"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fa fa-star"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fa fa-star"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fa fa-star"></span>
                                    </a>
                                    <a href="#">
                                        <span class="fa fa-star-o"></span>
                                    </a>
                                </p>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="col-xs-12 divider text-center">
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong> 20,7K </strong></h2>
                        <p><small>Followers</small></p>
                        <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> dashboard </button>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong>245</strong></h2>
                        <p><small>Following</small></p>
                        <button class="btn btn-info btn-block"><span class="fa fa-user"></span> Edit </button>
                    </div>
                    <div class="col-xs-12 col-sm-4 emphasis">
                        <h2><strong>43</strong></h2>
                        <p><small>Snippets</small></p>
                        <div class="btn-group dropup btn-block">
                            <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options </button>
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu text-left" role="menu">
                                <li><a href="#"><span class="fa fa-list pull-right"></span>Change password </a></li>
                                <li class="divider"></li>
                                <li><a href="#"><span class="fa fa-warning pull-right"></span>View Reports</a></li>
                                <li class="divider"></li>
                                <li><a href="#" class="btn disabled" role="button"> Sign Out </a></li>
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