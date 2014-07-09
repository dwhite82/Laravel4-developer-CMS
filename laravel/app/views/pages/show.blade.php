@extends('layouts.admin')
@section('title') Show Page {{$page->title}} @stop

@section('infobar')
    @include('pages._infobar')
@parent
@stop

@section('content')
<h2 class="main-headline">Show Page {{{$page->title}}}</h2>
    <article>
        <h3>ID: {{{$page->id}}}</h3>
        <h3>Parent: {{{$page->parent["title"]}}}</h3>
        <h3>Title: {{{$page->title}}}</h3>
        <h3>Permalink: {{{$page->permalink}}}</h3>
        <h3>Position: {{{$page->position}}}</h3>
        <h3>Visible: {{{$page->visible}}}</h3>
        <h3>Subnav: {{{$page->subnav}}}</h3>
        <h3>Created At: {{{$page->created_at}}}</h3>
        <h3>Updated At: {{{$page->updated_at}}}</h3>
        <h3>Description:</h3>
        <p>{{{$page->description}}}</p>
    </article>
    {{link_to(URL::previous(), 'Back to Pages', array('class' => 'button'))}}
@stop