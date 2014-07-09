@extends('layouts.admin')
@section('title', 'Admin - Categories - ')
@section('infobar')
    @include('categories._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Categories</h2>
    <table class="tbl-admin">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Position</th>
            <th>Visible</th>
            <th>Actions</th>
        </tr>
        @foreach($categories as $category)
        <tr>
            <td>{{{$category->id}}}</td>
            <td>{{{$category->title}}}</td>
            <td>{{{$category->position}}}</td>
            <td>{{{$category->visible}}}</td>
            <td>
                <a href="{{ action('PageController@index') }}"><img src="{{ asset('images/icon_view.png') }}" alt="View pages" class="button" title="view pages"/></a>
                <a href="{{ action('CategoryController@show', array('id' => $category->id)) }}"><img src="{{ asset('images/icon_show.png') }}" alt="Show {{{$category->title}}}" title="Show {{{$category->title}}}"/></a>
                <a href="{{ action('CategoryController@edit', array('id' => $category->id)) }}"><img src="{{ asset('images/icon_edit.png') }}" alt="Edit {{{$category->title}}}" title="Edit {{{$category->title}}}"/></a>
                <a href="{{ action('CategoryController@getDelete', array('id' => $category->id)) }}"><img src="{{ asset('images/icon_delete.png') }}" alt="Delete {{{$category->title}}}" title="Delete {{{$category->title}}}"/></a>
            </td>
        </tr>
        @endforeach
    </table>
@stop