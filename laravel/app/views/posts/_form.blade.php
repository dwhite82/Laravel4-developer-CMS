{{ Form::hidden('page_id', Input::get('page_id')) }}

{{ Form::hidden('user_id', 1) }}

{{ Form::label('title', 'Title', array('class' => 'required')) }}
{{ Form::text('title', Input::old('title')) }}

{{ Form::label('container_attr', 'Container Attributes') }}
{{ Form::text('container_attr', Input::old('container_attr')) }}

{{ Form::hidden('visible', 0) }}
{{ Form::label('visible', 'Visible')}}
{{ Form::checkbox('visible')}}
</div>
<div class="col6">
{{ Form::label('content_placement', 'Content Placement', array('class' => 'required'))}}
{{ Form::select('content_placement', array('body' => 'body','content' => 'content','infobar' => 'infobar'), Input::old('content_placement'))}}

{{ Form::label('position', 'Position')}}
{{ Form::selectRange('position', 1, $post_count, Input::old('position')) }}

{{ Form::label('content_type','Content Type', array('class' => 'required')) }}
    <fieldset class="radio-group">
        {{ Form::radio('content_type','HTML',true) }}<span>HTML</span>
        {{ Form::radio('content_type','code') }}<span>Code</span>
    </fieldset>
</div>
<div class="col-full">
{{ Form::label('content', 'Content') }}
{{ Form::textarea('content', Input::old('content'), array('class' => 'ckeditor')) }}
