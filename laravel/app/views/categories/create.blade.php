@extends('layouts.admin')
@section('title', 'Admin - Create Category - ')
@section('infobar')
    @include('categories._infobar')
@parent
@stop
@section('content')
<h2 class="main-headline">Create a Category</h2>
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
        {{ Form::open(array('route' => 'categories.store', 'class' => 'form-admin')) }}
        <div class="col6">
            @include('categories._form')

        {{ Form::submit('Create Category') }}
        {{link_to(URL::previous(), 'Cancel', array('class' => 'button'))}}
        </div>
    {{ Form::close() }}
</div>
@stop