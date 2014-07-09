@extends('layouts.admin')
@section('title')Edit Category: {{$category->title}} - @stop
@section('infobar')
    @include('categories._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Edit Category: {{$category->title}}</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}

        {{ Form::model($category, array('method' => 'PATCH', 'route' => array('categories.update', $category->id), 'class' => 'form-admin')) }}
        <div class="col6">
            @include('categories._form')

        {{ Form::submit('Update Category') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}

@stop