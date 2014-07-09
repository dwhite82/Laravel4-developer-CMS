@extends('layouts.admin')
@section('title', 'Admin - Index - ')
@section('infobar')

@parent
@stop
@section('content')
<h2 class="main-headline">Yoursite.com Admin Area</h2>
<p>Hello, {{$user->first_name . ' ' . $user->last_name}}</p>
<p>User: {{$user->username}}</p>
<p>Access Level: {{$user->role}}</p>
@stop