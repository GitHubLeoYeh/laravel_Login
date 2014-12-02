<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	//useless
	public function showLogin()
	{
		return View::make('hello');
		
	}

	public function dologout()
	{
		Auth::logout();
            return Redirect::to('/');
	}
	
	//進入驗證方法
	public function doLogin()
	{
	//設定欄位檢核規則
		$rules = array(
			'account'	=>'required',
			'password'	=>'required',
		);
		//將驗證規則放入驗證class Validator
		$validator = Validator::make(Input::all(), $rules);
		
		//判斷欄位檢核是否成功
		if($validator->fails()){
			return Redirect::to('/')
				->withErrors($validator)//errormsg
				->withInput(Input::except('password'));
		}else{
			//如果過了欄位檢核，進行登入帳密驗證(將要檢核的input資料放進陣列並且對應資料庫欄位)
			$userdata = array(
				'account'		=> Input::get('account'),
				'password'		=> Input::get('password')
			);
			//將要檢核的欄位資料變數放進Auth class當中
			if(Auth::attempt($userdata)){
				return Redirect::intended('/index');
				echo '我登入囉!!!哇哈哈哈哈!!';
			} else {
				return Redirect::to('/')
				->with('flash_notice', 'System Deny! Please contact our system manager!');
				// return Redirect::to('/login');
			}
			
		}
		
		
	}
	
}
