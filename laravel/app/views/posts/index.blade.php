@extends('layouts.admin')
@section('title', 'Admin - Posts - ')
@section('infobar')
    @include('posts._infobar')
@parent
@stop
@section('content')

@if (isset($posts[0]))
    <h2 class="main-headline">Posts for Page: {{{$posts[0]->page->title}}}</h2>
@else
    <h2 class="main-headline">No Posts Yet</h2>
@endif
    <table class="tbl-admin">
        <tr>
            <th>ID</th>
            <th>Page</th>
            <th>Title</th>
            <th>Position</th>
            <th>Visible</th>
            <th>Actions</th>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{{$post->id}}}</td>
            <td>{{{$post->page->title}}}</td>
            <td>{{{$post->title}}}</td>
            <td>{{{$post->position}}}</td>
            <td>{{{$post->visible}}}</td>
            <td>
                <a href="{{ action('PostController@show', array('id' => $post->id)) }}"><img src="{{ asset('images/icon_show.png') }}" alt="Show {{{$post->title}}}" title="Show {{{$post->title}}}"/></a>
                <a href="{{ action('PostController@edit', array('id' => $post->id)) }}"><img src="{{ asset('images/icon_edit.png') }}" alt="Edit {{{$post->title}}}" title="Edit {{{$post->title}}}"/></a>
                <a href="{{ action('PostController@getDelete', array('id' => $post->id)) }}"><img src="{{ asset('images/icon_delete.png') }}" alt="Delete {{{$post->title}}}" title="Delete {{{$post->title}}}"/></a>
            </td>
        </tr>
        @endforeach
    </table>
@stop