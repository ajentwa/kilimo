@extends('layout.app')
@section('title','| User Profile')

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel x_panel_design">
            <div class="x_title">
                <h2>Farmer Profile</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="list-group h4">
                    <li class="list-group-item"><strong>First Name:</strong> {{ $user->first_name }}</li>
                    <li class="list-group-item"><strong>Middle Name:</strong> {{ $user->middle_name }}</li>
                    <li class="list-group-item"><strong>Surname:</strong> {{ $user->surname }}</li>
                    <li class="list-group-item"><strong>Email Address:</strong> {{ $user->email }}</li>
                    <li class="list-group-item"><strong>Phone Number:</strong> {{ $user->phone_no }}</li>
                    <li class="list-group-item"><strong>Ward:</strong> {{ $user->ward->name }}</li>
                </ul>
                <a class="x_footer btn primary-btn pull-right" href="{{url('dashboard')}}">Go back</a>
            </div>
        </div>
    </div>
@stop


