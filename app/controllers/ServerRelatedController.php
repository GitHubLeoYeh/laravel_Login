<?php

class ServerRelatedController extends \BaseController {

	public function DBSetting()
	{
		$db_info = DB::select('select * from platform_dbs');
		// print_r($db_info);
		// foreach($db_info as $db_infos)
		// {
			// Config::set('database.connections.'.$db_infos->db_connectionkey, array(
			    // 'driver'    => $db_infos->db_driver,
			    // 'host'      => $db_infos->db_host,
			    // 'database'  => $db_infos->db_name,
			    // 'username'  => $db_infos->db_username,
			    // 'password'  => $db_infos->db_password,
				// 'charset'  	=> $db_infos->db_charset,
				// 'prefix'   	=> $db_infos->db_prefix,
				// 'schema'   	=> $db_infos->pgsql_schema
			// ));
			// $db_test = DB::connection('testconnection')->select('select account from platform_accounts');
			// // print_r($db_test);
			// foreach($db_test as $db_tests)
			// {
				// echo $db_tests->account.'<br>';
			// }
		// }
		
		return View::make('pages.ServerManage.DBSetting')
			->with('title', 'Platform DB Management')
					->with('platform_dbs', Platform_db::all());	
		;
	}

	public function doPlatformDBSettingInsert()
	{
		Platform_db::create(array(
			'db_connectionkey' => Input::get('db_connectionkey'),
			'db_driver' => Input::get('db_driver'),
			'db_host' => Input::get('db_host'),
			'db_name' => Input::get('db_name'),
			'db_username' => Input::get('db_username'),
			'db_password' => Hash::make(Input::get('db_password')),
			'db_charset' => Input::get('db_charset'),
			'db_prefix' => Input::get('db_prefix'),
			'pgsql_schema' => Input::get('pgsql_schema'),
			'mysql_collation' => Input::get('mysql_collation')
			));
		return View::make('pages.ServerManage.DBSetting')
			->with('title', 'Platform DB Management')
				->with('platform_dbs', Platform_db::all());	
	}
	
	public function doPlatformDBSettingUpdate()
	{
		// Platform_db::updateOrCreate(
// 		
			// $attributes = array(
				// 'db_connectionkey' => Input::get('db_connectionkey'),
				// 'db_driver' => Input::get('db_driver'),
				// 'db_host' => Input::get('db_host'),
				// 'db_name' => Input::get('db_name'),
				// 'db_username' => Input::get('db_username'),
				// 'db_password' => Input::get('db_password'),
				// 'db_charset' => Input::get('db_charset'),
				// 'db_prefix' => Input::get('db_prefix'),
				// 'pgsql_schema' => Input::get('pgsql_schema'),
				// 'mysql_collation' => Input::get('mysql_collation')
				// )
				// , 
// 			
			// $values = array(
				// 'db_connectionkey' => Input::get('db_connectionkey'),
				// 'db_driver' => Input::get('db_driver'),
				// 'db_host' => Input::get('db_host'),
				// 'db_name' => Input::get('db_name'),
				// 'db_username' => Input::get('db_username'),
				// 'db_password' => Input::get('db_password'),
				// 'db_charset' => Input::get('db_charset'),
				// 'db_prefix' => Input::get('db_prefix'),
				// 'pgsql_schema' => Input::get('pgsql_schema'),
				// 'mysql_collation' => Input::get('mysql_collation')
			// )
			// );
		
		DB::table('platform_dbs')->where('db_connectionkey', '=', Input::get('db_connectionkey'))
			->update(array(
							'db_driver' => Input::get('db_driver'),
							'db_host' => Input::get('db_host'),
							'db_name' => Input::get('db_name'),
							'db_username' => Input::get('db_username'),
							'db_password' => Hash::make(Input::get('db_password')),
							'db_charset' => Input::get('db_charset'),
							'db_prefix' => Input::get('db_prefix'),
							'pgsql_schema' => Input::get('pgsql_schema'),
							'mysql_collation' => Input::get('mysql_collation')
					));
		return View::make('pages.ServerManage.DBSetting')
			->with('title', 'Platform DB Management')
				->with('platform_dbs', Platform_db::all());	
	}

	public function doPlatformDBSettingDelete()
	{
		Platform_db::where('db_connectionkey', '=', Input::get('db_connectionkey'))->delete();
		
		return View::make('pages.ServerManage.DBSetting')
			->with('title', 'Platform DB Management')
				->with('platform_dbs', Platform_db::all());	
	}

	/**
	 * Display the specified resource.
	 * GET /serverrelated/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /serverrelated/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /serverrelated/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /serverrelated/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}