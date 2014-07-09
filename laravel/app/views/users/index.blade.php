@extends('layouts.admin')
@section('title', 'Admin - Users - ')
@section('infobar')
    @include('users._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Users</h2>
    <table class="tbl-admin">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
			<th>Active</th>
			<th>Actions</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{{$user->id}}}</td>
            <td>{{{$user->username}}}</td>
            <td>{{{$user->email}}}</td>
			<td>{{{$user->role}}}</td>
			<td>{{{$user->active}}}</td>
            <td>
                <a href="{{ action('PostController@index', array('user_id' => $user->id)) }}"><img src="{{ asset('images/icon_view.png') }}" alt="View posts" class="button" title="view posts"/></a>
                <a href="{{ action('UserController@show', array('id' => $user->id)) }}"><img src="{{ asset('images/icon_show.png') }}" alt="Show {{{$user->username}}}" title="Show {{{$user->username}}}"/></a>
                <a href="{{ action('UserController@edit', array('id' => $user->id)) }}"><img src="{{ asset('images/icon_edit.png') }}" alt="Edit {{{$user->username}}}" title="Edit {{{$user->username}}}"/></a>
                <a href="{{ action('UserController@getDelete', array('id' => $user->id)) }}"><img src="{{ asset('images/icon_delete.png') }}" alt="Delete {{{$user->username}}}" title="Delete {{{$user->username}}}"/></a>
            </td>
        </tr>
        @endforeach
    </table>
@stop