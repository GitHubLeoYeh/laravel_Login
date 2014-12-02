<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/login', array('uses' => 'HomeController@showLogin'));	//useless

Route::get('logout', array('uses' => 'HomeController@dologout'));

Route::post('/doLogin', array('uses' => 'HomeController@doLogin'));

Route::get('/index', function()
	{
		return View::make('pages.index');
	});
	
Route::get('PlatformAccount', array('before' => 'auth', function()
	{
		if(Entrust::hasRole('Admin')){
			return View::make('pages.GMRelated.PlatformAccount')
			->with('title', 'Platform Account Management')
			->with('users', User::all());
		}
		else {
            Auth::logout();
            return Redirect::to('/')
                ->with('flash_notice', 'You don\'t have access!');
        }
// return App::abort(403);
	}));
	
Route::get('PlatformGroup', 'PlatformRelatedController@PlatformGroupManagement');
	
Route::get('PlatformConnection', 'PlatformRelatedController@PlatformConnectionManagement');
	
Route::get('PlatformRecord', function()
	{
		return View::make('pages.GMRelated.PlatformRecord')
			->with('title', 'PlatformRecord')
			->with('users', User::all());
	});
	
	
Route::get('DBSetting', 'ServerRelatedController@DBSetting');

Route::post('PlatformAccountInsert', 'PlatformRelatedController@PlatformAccountInsert');
	
Route::post('PlatformAccountDelete', 'PlatformRelatedController@PlatformAccountDelete');
	
Route::post('PlatformAccountUpdate', 'PlatformRelatedController@PlatformAccountUpdate');

Route::post('PlatformGroupInsert', 'PlatformRelatedController@PlatformGroupInsert');

Route::post('PlatformGroupDelete', 'PlatformRelatedController@PlatformGroupDelete');

Route::post('doPlatformPermission', 'PlatformRelatedController@doPlatformPermission');

Route::post('doPlatformPermissionUpdate', 'PlatformRelatedController@doPlatformPermissionUpdate');

Route::post('doPlatformGroup', 'PlatformRelatedController@doPlatformGroup');

Route::post('doPlatformGroupUpdate', 'PlatformRelatedController@doPlatformGroupUpdate');

Route::post('doPlatformConnectionInsert', 'PlatformRelatedController@doPlatformConnectionInsert');

Route::post('doPlatformConnectionDelete', 'PlatformRelatedController@doPlatformConnectionDelete');

Route::post('doPlatformConnectionUpdate', 'PlatformRelatedController@doPlatformConnectionUpdate');

Route::post('doPlatformPermissionInsert', 'ServerRelatedController@doPlatformPermissionInsert');

Route::post('doPlatformDBSettingInsert', 'ServerRelatedController@doPlatformDBSettingInsert');

Route::post('doPlatformDBSettingUpdate', 'ServerRelatedController@doPlatformDBSettingUpdate');

Route::post('doPlatformDBSettingDelete', 'ServerRelatedController@doPlatformDBSettingDelete');

Route::get('TemplatePage', function(){return View::make('pages.GMRelated.TemplatePage');});

