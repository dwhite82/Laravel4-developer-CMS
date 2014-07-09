@extends('layouts.admin')
@section('title', 'Admin - Pages - ')
@section('infobar')
    @include('pages._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Pages</h2>
    <table class="tbl-admin">
        <tr>
            <th>ID</th>
            <th>Parent</th>
            <th>Title</th>
            <th>Position</th>
            <th>Visible</th>
            <th>Actions</th>
        </tr>
        @foreach($pages as $page)
        <tr>
            <td>{{{$page->id}}}</td>
            <td>{{{$page->parent["title"]}}}</td>
            <td>{{{$page->title}}}</td>
            <td>{{{$page->position}}}</td>
            <td>{{{$page->visible}}}</td>
            <td>
                <a href="{{ action('PostController@index', array('page_id' => $page->id)) }}"><img src="{{ asset('images/icon_view.png') }}" alt="View posts" class="button" title="view posts"/></a>
                <a href="{{ action('PageController@show', array('id' => $page->id)) }}"><img src="{{ asset('images/icon_show.png') }}" alt="Show {{{$page->title}}}" title="Show {{{$page->title}}}"/></a>
                <a href="{{ action('PageController@edit', array('id' => $page->id)) }}"><img src="{{ asset('images/icon_edit.png') }}" alt="Edit {{{$page->title}}}" title="Edit {{{$page->title}}}"/></a>
                <a href="{{ action('PageController@getDelete', array('id' => $page->id)) }}"><img src="{{ asset('images/icon_delete.png') }}" alt="Delete {{{$page->title}}}" title="Delete {{{$page->title}}}"/></a>
            </td>
        </tr>
        @endforeach
    </table>
@stop