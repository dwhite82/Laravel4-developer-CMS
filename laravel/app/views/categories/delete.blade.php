@extends('layouts.admin')
@section('title')Delete Category {{$category->title}} @stop
@section('infobar')
@include('categories._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Delete Category: {{$category->title}}</h2>
<p>Are you sure you want to delete this category?</p>
    {{ Form::model($category, array('method' => 'DELETE', 'route' => array('categories.destroy', $category->id), 'class' => 'form-admin')) }}
        <div class="col6 last">
        {{ Form::submit('Delete this Category') }} <a href="{{ action('CategoryController@index') }}" class="button">Cancel</a>
        </div>
    {{ Form::close() }}
@stop
