@extends('layouts.admin')
@section('title') Delete User: {{$user->username}} @stop
@section('infobar')
@include('users._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Delete User: {{$user->username}}</h2>
<p>Are you sure you want to delete this user?</p>

    {{ Form::model($user, array('method' => 'DELETE', 'route' => array('pages.destroy', $user->id), 'class' => 'form-admin')) }}
        <div class="col6 last">
        {{ Form::submit('Delete this User') }} <a href="{{ action('UserController@index') }}" class="button">Cancel</a>
        </div>
    {{ Form::close() }}

@stop
