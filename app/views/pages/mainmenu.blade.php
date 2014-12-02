@extends('layouts.default')

@section('content')
    

    <p><a href="{{ URL::to('PlatformAccount') }}">Account Management</a></p>
    <p><a href="{{ URL::to('PlatformGroup') }}">Group Management</a></p>
    <p><a href="{{ URL::to('PlatformRecord') }}">Platform Record Search</a></p>
    <p><a href="{{ URL::to('PlatformConnection') }}">Platform Connection</a></p>
    
{{ Form::open(array('url' => 'PlatformAccountAuthSetting')); }}
<br>
{{ Form::submit('AuthSetting!') }}
{{ Form::token() }}
{{ Form::close() }} 
 
  
{{ Form::open(array('url' => 'logout')); }}
<br>
{{ Form::submit('logout!') }}
{{ Form::token() }}
{{ Form::close() }}


    <p>This is my body content.</p>
@stop