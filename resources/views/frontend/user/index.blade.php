@extends('frontend.layouts.master')

@section('content')


    <div class="container-margin">
        <div class="">
            <ul class="nav nav-tabs" id="tabs">
                <li class="active"><a href="#dashboard" data-toggle="tab" title="Dashboard"><span class="glyphicon glyphicon-dashboard" style="font-size: 25px;"></span ><span style="font-size: 30px;"> Dashboard</span></a></li>
                <li><a href="#profile" data-toggle="tab" title="Profile"><span class="glyphicon glyphicon-user" style="font-size: 30px;"></span><span style="font-size: 30px;"> Profile</span></a></li>
                <li><a href="#report" data-toggle="tab" title="Report"><span class="glyphicon glyphicon-list-alt" style="font-size: 25px;"></span><span style="font-size: 30px;"> Report</span></a></li>
                <li><a href="#notification" data-toggle="tab" title="Notification"><span class="glyphicon glyphicon-bell " style="font-size: 25px;"></span ><span style="font-size: 30px;" > Notifications <span class="badge" style="background: #f90; width: 25px;height: 25px; margin-bottom: inherit">5</span></span></a></li>
            </ul>
        </div>
    </div>
    <div class="" style="min-height: 530px;">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="dashboard">
                <div class="row" style="margin-top:30px;">

                    <div class="col-md-6" >
                        <div class="panel panel-info" style="">
                            <div class="panel-heading white-color">Profile</div>
                            <div class="panel-body" style="">
                                <div class="row" style="margin:0 2px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Personel details</div>
                                        <div class="panel-body" style="padding: 5px 20px">
                                            <div class="row">
                                                <div class="">
                                                    <p>Name    : <strong>Oyeneye bolaji ibrahim</strong></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="">
                                                    <p>Email : <strong>bioyeneye@gmail.com</strong></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="">
                                                    <p>Address : <strong>Phase II Gbagada lagos nigeria africa</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row" style="margin:0 2px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Next of kin details</div>
                                        <div class="panel-body">
                                            <div class="row" style="padding: 5px 20px">
                                                <div class="row">
                                                    <div class="">
                                                        <p>Name    : <strong>Mrs. Oyeneye</strong></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="">
                                                        <p>Relationship : <strong>Mother</strong></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="">
                                                        <p>Address : <strong>Phase II Gbagada lagos nigeria africa</strong></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="margin-right: 2px;">
                                    <a class="btn btn-danger pull-right" id="view_profile_tab" href="#profile">view...</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default" style="min-height: 300px;">
                            <div class="panel-heading">Report</div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="well well-lg" style="padding: 5px 30px; margin: 5px 10px;" role="alert">
                                        <div class="row">
                                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, consectetur ex. Ab asperiores corporis dicta dolorem dolorum magni nostrum obcaecati optio, quasi recusandae rerum sint totam, veniam veritatis vero! Maiores.</p>
                                        </div>
                                        <div class="row">
                                            <p>Doctor: <strong>Dr. Oyeneye bolaji</strong></p>
                                        </div>
                                        <div class="row">
                                            <p>Date: <strong>12th june, 2015</strong></p>
                                        </div>
                                        <div class="row">
                                            <a class="btn btn-danger pull-right" href="/Patient/report">more...</a>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="well well-lg" style="padding: 5px 30px; margin: 0 10px;" role="alert">
                                        <div class="row">
                                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, consectetur ex. Ab asperiores corporis dicta dolorem dolorum magni nostrum obcaecati optio, quasi recusandae rerum sint totam, veniam veritatis vero! Maiores.</p>
                                        </div>
                                        <div class="row">
                                            <p>Doctor: <strong>Dr. Wale</strong></p>
                                        </div>
                                        <div class="row">
                                            <p>Date: <strong>12th august, 2015</strong></p>
                                        </div>
                                        <div class="row">
                                            <a class="btn btn-danger pull-right" href="/Patient/report">more...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-info" style="min-height: 300px;">
                            <div class="panel-heading white-color">Notification</div>
                            <div class="panel-body">

                                <div class="row" style="margin-bottom: 5px">
                                    <div class="well well-lg" style="padding: 5px 30px; margin: 0 10px;" role="alert">
                                        <div class="row">
                                            <p>Doctor: <strong>Dr. Wale</strong></p>
                                        </div>
                                        <div class="row">
                                            <p>Date: <strong>12th august, 2015</strong></p>
                                        </div>
                                        <div class="row">
                                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit odio pariatur placeat repellat. Adipisci blanditiis dicta, doloribus eius fugit iste laudantium necessitatibus perspiciatis quam suscipit tenetur ut voluptas! Minus, quo.</p>
                                        </div>
                                        <div class="row">
                                            <a class="btn btn-danger" href="/Patient/report">3 Notification...</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="well well-lg" style="padding: 5px 30px; margin: 0 10px;" role="alert">
                                        <div class="row">
                                            <p>Doctor: <strong>Dr. Wale</strong></p>
                                        </div>
                                        <div class="row">
                                            <p>Date: <strong>12th august, 2015</strong></p>
                                        </div>
                                        <div class="row">
                                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit odio pariatur placeat repellat. Adipisci blanditiis dicta, doloribus eius fugit iste laudantium necessitatibus perspiciatis quam suscipit tenetur ut voluptas! Minus, quo.</p>
                                        </div>
                                        <div class="row">
                                            <a class="btn btn-danger" href="/Patient/report">3 Notification...</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="profile">
                <div class="container">
                    <div class="row" style="margin: 10px 0;">
                        <div class="col-md-6"><h3>Welcome <strong>mr. oyeneye bolaji</strong></h3></div>
                        <div class="col-md-6"><a class="btn btn-info pull-right" href="Patient/update" role="button">Update Profile...</a></div>
                    </div>
                    <div class="row">
                        <div class="panel panel-info" style="min-height: 300px;">
                            <div class="panel-heading white-color">Profile</div>
                            <div class="panel-body">
                                <div class="row" style="margin:0 2px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Personel details</div>
                                        <div class="panel-body" style="padding: 5px 20px">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p>Name    : <strong>Oyeneye bolaji ibrahim</strong></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p>DOB    : <strong>12th june, 2015</strong></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p>Email : <strong>bioyeneye@gmail.com</strong></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p>Gender : <strong>Male</strong></p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p>Address : <strong>Phase II Gbagada lagos nigeria africa</strong></p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p>Phone Number : <strong>08062986510</strong></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row" style="margin:0 2px;">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">Next of kin details</div>
                                        <div class="panel-body">
                                            <div class="row" style="padding: 5px 20px">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>Name    : <strong>Mrs. Oyeneye</strong></p>
                                                    </div>

                                                    <div class="col-lg-6">
                                                        <p>Phone Number : <strong>08062986510</strong></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>Relationship : <strong>Mother</strong></p>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <p>Gender : <strong>Female</strong></p>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <p>Address : <strong>Phase II Gbagada lagos nigeria africa</strong></p>
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

            <div class="tab-pane fade" id="report">
                <div class="row" style="margin-top: 5px; margin-right: 5px;">
                    <a class="btn btn-info pull-right" href="/Patient/new_report" role="button">New Report</a>
                </div>
                <div class="row">
                    <div class="well well-lg" style="padding: 5px 30px; margin: 5px 10px;" role="alert">
                        <div class="row">
                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, consectetur ex. Ab asperiores corporis dicta dolorem dolorum magni nostrum obcaecati optio, quasi recusandae rerum sint totam, veniam veritatis vero! Maiores.</p>
                        </div>
                        <div class="row">
                            <p>Doctor: <strong>Dr. Oyeneye bolaji</strong></p>
                        </div>
                        <div class="row">
                            <p>Date: <strong>12th june, 2015</strong></p>
                        </div>
                        <div class="row">
                            <a class="btn btn-danger pull-right" href="/Patient/report">more...</a>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="well well-lg" style="padding: 5px 30px; margin: 5px 10px;" role="alert">
                        <div class="row">
                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, consectetur ex. Ab asperiores corporis dicta dolorem dolorum magni nostrum obcaecati optio, quasi recusandae rerum sint totam, veniam veritatis vero! Maiores.</p>
                        </div>
                        <div class="row">
                            <p>Doctor: <strong>Dr. Oyeneye bolaji</strong></p>
                        </div>
                        <div class="row">
                            <p>Date: <strong>12th june, 2015</strong></p>
                        </div>
                        <div class="row">
                            <a class="btn btn-danger pull-right" href="/Patient/report">more...</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="notification">
                <div class="row" style="margin-bottom: 5px; margin-top: 5px">
                    <div class="well well-lg" style="padding: 5px 30px; margin: 0 10px;" role="alert">
                        <div class="row">
                            <p>Doctor: <strong>Dr. Wale</strong></p>
                        </div>
                        <div class="row">
                            <p>Date: <strong>12th august, 2015</strong></p>
                        </div>
                        <div class="row">
                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit odio pariatur placeat repellat. Adipisci blanditiis dicta, doloribus eius fugit iste laudantium necessitatibus perspiciatis quam suscipit tenetur ut voluptas! Minus, quo.</p>
                        </div>
                        <div class="row">
                            <a class="btn btn-danger" href="/Patient/report">3 Notification...</a>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 5px; margin-top: 5px">
                    <div class="well well-lg" style="padding: 5px 30px; margin: 0 10px;" role="alert">
                        <div class="row">
                            <p>Doctor: <strong>Dr. Wale</strong></p>
                        </div>
                        <div class="row">
                            <p>Date: <strong>12th august, 2015</strong></p>
                        </div>
                        <div class="row">
                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit odio pariatur placeat repellat. Adipisci blanditiis dicta, doloribus eius fugit iste laudantium necessitatibus perspiciatis quam suscipit tenetur ut voluptas! Minus, quo.</p>
                        </div>
                        <div class="row">
                            <a class="btn btn-danger" href="/Patient/report">3 Notification...</a>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom: 5px; margin-top: 5px">
                    <div class="well well-lg" style="padding: 5px 30px; margin: 0 10px;" role="alert">
                        <div class="row">
                            <p>Doctor: <strong>Dr. Wale</strong></p>
                        </div>
                        <div class="row">
                            <p>Date: <strong>12th august, 2015</strong></p>
                        </div>
                        <div class="row">
                            <p>Description: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit odio pariatur placeat repellat. Adipisci blanditiis dicta, doloribus eius fugit iste laudantium necessitatibus perspiciatis quam suscipit tenetur ut voluptas! Minus, quo.</p>
                        </div>
                        <div class="row">
                            <a class="btn btn-danger" href="/Patient/report">3 Notification...</a>
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