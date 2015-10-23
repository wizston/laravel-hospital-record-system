<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/22/2015
 * Time: 8:45 AM
 */
?>

<div class="panel panel-info" style="">
    <div class="panel-heading white-color">Notifications
        <a class="btn btn-sm btn-danger pull-right" href="{{ url('notifications') }}">View all ({{ $notifications->total() }})</a>
    </div>
    <div class="panel-body">

        <div class="row" style="margin-bottom: 5px">
            @if($notifications->total())
                <div class="" style="padding: 5px 5px; margin: 0 10px;" role="alert">

                    @foreach($notifications as $notification)
                        <div class="alert alert-default" role="alert">
                            <h5>{{ $notification->doctor_name }}</h5>
                            <p>{{ $notification->message }}</p>
                            <span class="text-muted">{{ $notification->updated_at->diffForHumans() }}</span>
                        </div>
                    @endforeach


                </div>
            @else
                <div class="text-center">
                    You have no notifications yet
                </div>
            @endif
        </div>

    </div>
</div>
