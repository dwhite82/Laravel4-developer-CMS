@extends('layouts.admin')
@section('title')Show Post {{$post->title}} @stop
@if ($post->content_type == 'code')
    @section('headscripts')
    @parent
        {{ HTML::style('js/libs/highlight/styles/idea.css'); }}
    @stop
@endif
@section('infobar')
    @include('posts._infobar')
@parent
@stop

@section('content')
<h2 class="main-headline">Show Post: {{{$post->title}}}</h2>
    <article>
        <h3>ID: {{{$post->id}}}</h3>
        <h3>Page: {{{$post->page->title}}}</h3>
		<h3>User: {{{$post->user_id}}}</h3>
        <h3>Title: {{{$post->title}}}</h3>
        <h3>Position: {{{$post->position}}}</h3>
        <h3>Visible: {{{$post->visible}}}</h3>
		<h3>Content Placement: {{{$post->content_placement}}}</h3>
		<h3>Content Type: {{{$post->content_type}}}</h3>
        <h3>Created At: {{{$post->created_at}}}</h3>
        <h3>Updated At: {{{$post->updated_at}}}</h3>
		<h3>Container Attributes:</h3>
		<p>{{{$post->container_attr}}}</p>
        <h3>Content:</h3>
        @if ($post->content_type == 'code')
            <pre>
                <code {{$post->container_attr}}>{{$post->content}}</code>
            </pre>
        @else
            {{$post->content}}
        @endif
    </article>
{{link_to(URL::previous(), 'Back to Posts', array('class' => 'button'))}}
@stop
@if ($post->content_type == 'code')
    @section('footscripts')
    @parent
        {{ HTML::script('js/libs/highlight/highlight.min.js'); }}
    @stop
@endif
