@extends('layouts.app')
@section('title', 'Edit profile | Findworka')
@section('content')
<div class="container">
    <h1>Edit Profile</h1>
        {!! Form::open(['action'=>['DashboardController@update', Auth::user()->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name',  'Your Name')}}
            {{Form::text('name', Auth::user()->name, ['class' =>'form-control', 'placeholder' => "Your Name"])}}
        </div>
        <div class="form-group">
            {{Form::label('email',  'E-mail Address')}}
            {{Form::text('email', Auth::user()->email, ['class' =>'form-control', 'placeholder' => "E-mail Address"])}}
        </div>
        <div class="form-group">
            {{Form::label('password',  'Password')}}
            {{Form::text('password','', ['class' =>'form-control', 'placeholder' => "Password"])}}
        </div>

         <div class="form-group">
            <h1> Registered Courses </h1>
            {{Auth::user()->courses()->get()->first()->name}}
        </div> 
        
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
    </div>
@endsection