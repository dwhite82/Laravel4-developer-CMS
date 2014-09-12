@if(Session::has('message'))
<div class="alert {{Session::get('alert-class', 'alert-info')}}">
    {{Session::get('message')}}
</div>
@endif
{{ HTML::ul($errors->all(), array('class'=> 'form-errors')) }}
{{ Form::open(array('action' => 'PublicController@contact')) }}
<div class="col6">
    <span class="required">(Required Field)</span>
    {{ Form::label('name', 'Name:', array('class' => 'required textbox')) }}
    {{ Form::text('name', Input::old('name'), array('class' => 'textbox')) }}

    {{ Form::label('email', 'Email', array('class' => 'required textbox')) }}
    {{ Form::email('email', Input::old('email'), array('class' => 'textbox')) }}

    {{ Form::label('subject', 'Subject:', array('class' => 'required textbox')) }}
    {{ Form::text('subject', Input::old('subject'), array('class' => 'textbox')) }}

    {{ Form::label('comments', 'Comments:') }}
    {{ Form::textarea('comments', Input::old('comments'), array('class' => 'textbox')) }}

    {{ Form::submit('Submit') }}
</div>
{{ Form::close() }}