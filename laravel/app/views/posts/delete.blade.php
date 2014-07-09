@extends('layouts.admin')
@section('title')Delete Post: {{$post->title}} @stop
@section('infobar')
    @include('posts._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Delete Post: {{$post->title}} </h2>
<p>Are you sure you want to delete this post?</p>
    {{ Form::model($post, array('method' => 'DELETE', 'route' => array('posts.destroy', $post->id), 'class' => 'form-admin')) }}
        <div class="col6 last">
        {{ Form::submit('Delete this Post') }} <a href="{{ action('PostController@index') }}" class="button">Cancel</a>
        </div>
    {{ Form::close() }}
@stop
