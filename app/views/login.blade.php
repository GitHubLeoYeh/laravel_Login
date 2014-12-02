<!DOCTYPE html>
<html>
	<head><title>Login Page</title></head>
	<body>
		{{ Form::open(array('url' => '/doLogin')) }}
			<h1>Login</h1>
			<!--顯示錯誤訊息處-->
			@if (Session::get('loginError'))
			<div class= "alert alert-danger" >{{ Session::get('loginError') }}</div>
			@endif
			@if(Session::has('flash_notice'))
            <div id="flash_notice" style="color: red">{{ Session::get('flash_notice') }}</div>
        	@endif
			<p>
				{{ $errors->first('account') }}
				{{ $errors->first('password') }}
			</p>

			<p>
				{{ Form::label('account', 'Account') }}
				{{ Form::text('account', Input::old('account'), array('placeholder' => 'xpecadmin')) }}
			</p>
			
			<p>
				{{ Form::label('password', 'password') }}
				{{ Form::password('password') }}
				
			</p>
			
			<p>{{ Form::submit('送出') }}</p>
		{{ Form::close() }}
		
	</body>	
</html>