@extends('layouts.admin')
@section('title') Delete Page: {{$page->title}} @stop
@section('infobar')
@include('pages._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Delete Page: {{$page->title}}</h2>
<p>Are you sure you want to delete this page?</p>

    {{ Form::model($page, array('method' => 'DELETE', 'route' => array('pages.destroy', $page->id), 'class' => 'form-admin')) }}
        <div class="col6 last">
        {{ Form::submit('Delete this Page') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}

@stop
