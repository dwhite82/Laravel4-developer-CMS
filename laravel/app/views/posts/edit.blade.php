@extends('layouts.admin')
@section('infobar')
    @include('posts._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Edit Post</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
        {{ Form::model($post, array('method' => 'PATCH', 'route' => array('posts.update', $post->id), 'class' => 'form-admin')) }}
        <div class="col6">
            @include('posts._form')

        {{ Form::submit('Update Post') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}
@stop

@section('footscripts')
@parent
    {{ HTML::script('js/ckeditor/ckeditor.js'); }}
@stop