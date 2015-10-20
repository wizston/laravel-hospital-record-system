<?php
/**
 * Created by PhpStorm.
 * User: wizstpm
 * Date: 10/20/2015
 * Time: 4:14 PM
 */
?>

@extends('frontend.layouts.master')

@section('content')
    <style>
        .report-header
        {
            display: block;
        }
        .report-titles
        {
            margin-top: 50px;
        }
        .report-titles-rows
        {
            margin-bottom: 5px;
        }
        .text-strong
        {
            font-weight: bold;
        }
        .result-text, .notes_text
        {
            min-height: 150px;
        }
        .input_space
        {
            border-bottom: solid 1px #9d9d9d;
            padding: 0;
            margin: 0;
            width: 95%;
        }
        .signatures
        {
            position: relative;
            bottom: 0;
        }
    </style>
    <div class="col-md-10 col-md-offset-1">
        <div class="col-md-12">
            <h4><i class="glyphicon glyphicon-file" style="color: #A8A8AB;"></i>Report: 23 DEC 2015</h4>

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="text-center text-strong">
                        <span class="report-header">Lorem ipsum dolor sit amet,</span>
                        <span class="report-header">500, consectetur  elit.</span>
                        <span class="report-header">Accusamus architecto at aut</span>
                        <span class="report-header">cum ex expedita hic maiores modi mollitia necessitatibus</span>
                    </div>

                    <div class="report-titles">

                        <div class="row report-titles-rows">
                            <div class="col-md-3"><strong>Doctor's Name: </strong></div>
                            <div class="col-md-9">Lorem ipsum Name</div>
                        </div>

                        <div class="row report-titles-rows">
                            <div class="col-md-3"><strong>Patient's Name: </strong></div>
                            <div class="col-md-9">Lorem ipsum Name</div>
                        </div>

                        <div class="row report-titles-rows">
                            <div class="col-md-3"><strong>Patient DOB : </strong></div>
                            <div class="col-md-9">Lorem ipsum Name</div>
                        </div>

                        <div class="row report-titles-rows">
                            <div class="col-md-3"><strong>Patient's Phone: </strong></div>
                            <div class="col-md-9">Lorem ipsum Name</div>
                        </div>

                        <div class="row report-titles-rows">
                            <div class="col-md-3"><strong>Appointment Date: </strong></div>
                            <div class="col-md-9">20 JAN 2016</div>
                        </div>

                        <div class="row report-titles-rows" style="margin-top: 30px">
                            <div class="col-md-12"><strong>The following tests were performed: </strong></div>
                            <div class="col-md-12">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus atque autem blanditiis culpa cupiditate dolorem earum eius libero magnam natus, necessitatibus nesciunt nihil, porro praesentium recusandae sapiente sequi voluptatem voluptates!
                            </div>
                        </div>

                        <div class="row report-titles-rows result-text" style="margin-top: 30px">
                            <div class="col-md-12"><strong>RESULTS: </strong></div>
                            <div class="col-md-12">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus atque autem blanditiis culpa cupiditate dolorem earum eius libero magnam natus, necessitatibus nesciunt nihil, porro praesentium recusandae sapiente sequi voluptatem voluptates!
                            </div>
                        </div>

                        <div class="row report-titles-rows notes_text" style="margin-top: 30px">
                            <div class="col-md-12"><strong>NOTES: </strong></div>
                            <div class="col-md-12">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus atque autem blanditiis culpa cupiditate dolorem earum eius libero magnam natus, necessitatibus nesciunt nihil, porro praesentium recusandae sapiente sequi voluptatem voluptates!
                            </div>
                        </div>

                        <div class="row signatures">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    ds
                                    <hr class="input_space">
                                </div>
                                <div class="col-md-6">
                                    ds
                                    <hr class="input_space">
                                </div>
                                <div class="col-md-6">
                                    Doctor's Signature
                                </div>
                                <div class="col-md-6">
                                    Date
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts-end')

@stop
