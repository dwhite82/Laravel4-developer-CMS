@extends('layouts.admin')
@section('title') Show User: {{$user->username}} @stop

@section('infobar')
    @include('users._infobar')
@parent
@stop

@section('content')
<h2 class="main-headline">Show User: {{$user->username}}</h2>
    <article>
        <h3>ID: {{{$user->id}}}</h3>
        <h3>First Name: {{{$user->first_name}}}</h3>
        <h3>Last Name: {{{$user->last_name}}}</h3>
        <h3>Username: {{{$user->username}}}</h3>
        <h3>Email: {{{$user->email}}}</h3>
        <h3>Role: {{{$user->role}}}</h3>
		<h3>Active: {{{$user->active}}}</h3>
		<h3>Created At: {{{$user->created_at}}}</h3>
        <h3>Updated At: {{{$user->updated_at}}}</h3>
    </article>
    {{link_to(URL::previous(), 'Back to Users', array('class' => 'button'))}}
@stop