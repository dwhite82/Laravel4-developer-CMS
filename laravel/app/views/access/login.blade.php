@extends('layouts.admin')
@section('title', 'Login - ')
@section('infobar')
<h2>Login</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
    {{ Form::open(array('url' => 'access/login', 'class' => 'form-admin')) }}
        {{ Form::label('username', 'Username') }}
        {{ Form::text('username') }}

        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}

        {{ Form::submit('Login') }}
    {{ Form::close() }}

@stop
@section('content')
<h2 class="main-headline">Protected Area</h2>
<p>You must login to view content</p>
@stop