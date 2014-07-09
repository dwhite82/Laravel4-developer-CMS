
{{ Form::label('title', 'Title', array('class' => 'required')) }}
{{ Form::text('title', Input::old('title')) }}

{{ Form::label('permalink', 'Permalink', array('class' => 'required')) }}
{{ Form::text('permalink', Input::old('permalink')) }}

{{ Form::label('template', 'Template') }}
{{ Form::text('template', Input::old('template')) }}

{{ Form::hidden('subnav', 0) }}
{{ Form::label('subnav', 'Subnav')}}
{{ Form::checkbox('subnav')}}
</div>

<div class="col6">
{{ Form::label('category_id', 'Category')}}
{{ Form::select('category_id', $categories, Input::old('category_id'))}}

{{ Form::label('parent_id', 'Parent')}}
{{ Form::select('parent_id', array(0 => 'None') + $pages, Input::old('parent_id'))}}

{{ Form::label('position', 'Position')}}
{{ Form::selectRange('position', 1, $page_count, Input::old('position')) }}

{{ Form::hidden('visible', 0) }}
{{ Form::label('visible', 'Visible')}}
{{ Form::checkbox('visible')}}
</div>

<div class="col-full">
{{ Form::label('description', 'Description') }}
{{ Form::textarea('description', Input::old('description')) }}
