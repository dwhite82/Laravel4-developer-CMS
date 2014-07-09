
{{ Form::label('first_name', 'First Name') }}
{{ Form::text('first_name', Input::old('first_name')) }}

{{ Form::label('last_name', 'Last Name') }}
{{ Form::text('last_name', Input::old('last_name')) }}

{{ Form::label('username', 'Username') }}
{{ Form::text('username', Input::old('username')) }}

{{ Form::label('email', 'Email') }}
{{ Form::email('email', Input::old('email')) }}

{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}

{{ Form::label('password_confirmation', 'Confirm Password') }}
{{ Form::password('password_confirmation') }}

{{ Form::label('role', 'Role')}}
{{ Form::select('role', array('developer' => 'developer','admin' => 'admin','user' => 'user'), Input::old('role'))}}

{{ Form::hidden('active', 0) }}
{{ Form::label('active', 'Active')}}
{{ Form::checkbox('active', true)}}

