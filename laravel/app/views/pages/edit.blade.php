@extends('layouts.admin')
@section('title')Edit Page: {{$page->title}} @stop
@section('infobar')
    @include('pages._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Edit Page: {{$page->title}}</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
        {{ Form::model($page, array('method' => 'PATCH', 'route' => array('pages.update', $page->id), 'class' => 'form-admin')) }}
        <div class="col6">
            @include('pages._form')

        {{ Form::submit('Update Page') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}

@stop