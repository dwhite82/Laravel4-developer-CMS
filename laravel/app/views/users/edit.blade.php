@extends('layouts.admin')
@section('title')Edit User: {{$user->username}} @stop
@section('infobar')
    @include('users._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Edit User: {{$user->username}}</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
        {{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id), 'class' => 'form-admin')) }}
        <div class="col6">
            @include('users._form')

        {{ Form::submit('Update User') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}

@stop