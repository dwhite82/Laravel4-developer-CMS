@extends('layouts.admin')
@section('title', 'Admin - Create User - ')
@section('infobar')
    @include('users._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Create a User</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
        {{ Form::open(array('route' => 'users.store', 'class' => 'form-admin')) }}
        <div class="col6">
            @include('users._form')

        {{ Form::submit('Create User') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}

@stop