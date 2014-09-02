@extends('layouts.admin')
@section('title', 'Admin - Create Post - ')
@section('infobar')
    @include('posts._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Create a Post</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
        {{ Form::open(array('route' => 'posts.store', 'class' => 'form-admin')) }}
        <div class="col6">
            @include('posts._form')

        {{ Form::submit('Create Post') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}
@stop

@section('footscripts')
@parent
    {{ HTML::script('js/libs/ckeditor/ckeditor.js'); }}
@stop