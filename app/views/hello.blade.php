@extends('layouts.default')
<head>
	@include('includes.loginhead')
</head>
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
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
                            <fieldset>
                                <div class="form-group">
                                    <!-- <input class="form-control" placeholder="Account" name="account" type="text" autofocus> -->
                                    {{ Form::text('account', Input::old('account'), array('class' => 'form-control', 'placeholder' => 'Account', 'autofocus' => 'true', 'required' => 'required')) }}
                                </div>

                                <div class="form-group">
                                    <!-- <input class="form-control" placeholder="Password" name="password" type="password" value=""> -->
                                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' =>'Password', 'required' => 'required' )) }}
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <!-- <input name="remember" type="checkbox" value="Remember Me">Remember Me -->
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                                {{ Form::submit('Login', array('class' => 'btn btn-lg btn-success btn-block')) }}
                            </fieldset>
                       	 {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
