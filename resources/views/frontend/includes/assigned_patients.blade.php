<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/21/2015
 * Time: 4:15 PM
 */
?>


<div class="panel panel-default">
    <div class="panel-heading" style="font-weight: bold">Patients you manage</div>
    <div class="panel-body">
        @if(count($patients))
            @foreach($patients as $patient)
                <div class="panel panel-default" style="margin-bottom: 5px;">
                    <div class="panel-body patient-lists">
                        <a href="{{ url('doctor/feedback/' . $patient->id) }}"><strong>{{ $patient->name }}</strong></a>
                        <div> <a class="btn btn-xs btn-default text-primary" href="#"><i class="glyphicon glyphicon-envelope"></i> Feedback</a></div>
                        <div class="patient-pix"></div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="panel panel-default" style="margin-bottom: 5px;">
                <div class="panel-body text-center">
                    <strong class="text-warning">No patients is assigned to you yet.</strong>
                </div>
            </div>
        @endif
    </div>
</div>