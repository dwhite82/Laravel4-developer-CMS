@extends('layouts.admin')
@section('title')Show Category: {{$category->title}} @stop

@section('infobar')
    @include('categories._infobar')
@parent
@stop

@section('content')
<h2 class="main-headline">Show Category: {{{$category->title}}}</h2>
    <article>
        <h3>ID: {{{$category->id}}}</h3>
        <h3>Title: {{{$category->title}}}</h3>
        <h3>Position: {{{$category->position}}}</h3>
        <h3>Visible: {{{$category->visible}}}</h3>
        <h3>Created At: {{{$category->created_at}}}</h3>
        <h3>Updated At: {{{$category->updated_at}}}</h3>
        <h3>Description:</h3>
        <p>{{{$category->description}}}</p>
    </article>
    {{link_to(URL::previous(), 'Back to Categories', array('class' => 'button'))}}
@stop