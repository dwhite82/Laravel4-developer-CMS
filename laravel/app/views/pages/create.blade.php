@extends('layouts.admin')
@section('title', 'Admin - Create Page - ')
@section('infobar')
    @include('pages._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Create a Page</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
        {{ Form::open(array('route' => 'pages.store', 'class' => 'form-admin')) }}
        <div class="col6">
            @include('pages._form')

        {{ Form::submit('Create Page') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}

@stop