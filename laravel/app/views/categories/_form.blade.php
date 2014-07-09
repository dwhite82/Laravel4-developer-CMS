
{{ Form::label('title', 'Title', array('class' => 'required')) }}
{{ Form::text('title', Input::old('title')) }}
</div>
<div class="col6">
{{ Form::label('position', 'Position')}}
{{ Form::selectRange('position', 1, $category_count, Input::old('position')) }}
</div>
<div class="col-full">
{{ Form::hidden('visible', 0) }}
{{ Form::label('visible', 'Visible')}}
{{ Form::checkbox('visible')}}

{{ Form::label('description', 'Description') }}
{{ Form::textarea('description', Input::old('description')) }}