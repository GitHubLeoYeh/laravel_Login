<?php

class PlatformRelatedController extends \BaseController {

/**PlatformAccount
 * */
	public function PlatformAccountInsert()
	{
		User::create(array(
			'account' => Input::get('account'),
			'password'=> Hash::make(Input::get('possword')), 
			'user_nickname' => Input::get('user_nickname'),
			'user_desc' => Input::get('user_desc')
			));
		return View::make('pages.GMRelated.PlatformAccount')
			->with('title', 'Platform Account Management')
				->with('users', User::all());
	}

	public function PlatformAccountDelete()
	{
		DB::table('users')->where('account', '=', Input::get('account'))->delete();
		return View::make('pages.GMRelated.PlatformAccount')
			->with('title', 'Platform Account Management')
				->with('users', User::all());
	}
	
	public function PlatformAccountUpdate()
	{
		DB::table('users')->where('account', '=', Input::get('account'))
		->update(array('password' => Hash::make(Input::get('password')), 
						'user_nickname' => Input::get('user_nickname'), 'user_desc' => Input::get('user_desc')));
		return View::make('pages.GMRelated.PlatformAccount')
				->with('title', 'Platform Account Management')
				->with('users', User::all());
	}
/**PlatformGroup
 * */
	public function PlatformGroupManagement()
	{
		if(Entrust::hasRole('Admin')){
			return View::make('pages.GMRelated.PlatformGroup')
			->with('title', 'Platform Group Management')
				->with('users', User::all())
				->with('roles', Role::all())
				->with('permissions', Permission::all()
			);
		}
		else {
            Auth::logout();
            return Redirect::to('/')
                ->with('flash_notice', 'You don\'t have access!');
        }
	}

	public function PlatformGroupInsert()
	{
		$admin = new Role();
	    $admin->name = Input::get('name');
	    $admin->save();
		return View::make('pages.GMRelated.PlatformGroup')
		->with('title', 'Platform Group Management')
			->with('users', User::all())
			->with('roles', Role::all())
			->with('permissions', Permission::all()
			);
	}

	public function PlatformGroupeDelete()
	{
		DB::table('roles')->where('name', '=', Input::get('name'))->delete();
		return View::make('pages.GMRelated.PlatformGroup')
		->with('title', 'Platform Group Management')
			->with('users', User::all())
			->with('roles', Role::all())
			->with('permissions', Permission::all()
			);
	}

	public function doPlatformGroup()
	{
		$get_role_id = Input::get('id');
		$get_role_name = Input::get('name');
		// echo "id:".$get_role_id."<br>name:".$get_role_name;
		$roles = Role::where('id', '=', Input::get('id'))->get();
		// print_r($roles);
		$users_id = DB::select('select user_id from assigned_roles where role_id = ?', array(Input::get('id')));
		// print_r($users_id);
		$users_all = DB::select('SELECT * FROM users');
		// print_r($users_all);
		// foreach($users_all as $users_all_get)
		// {
			// $be_show = DB::select('select user_id from assigned_roles where user_id =? and role_id = ?'
						// , array($users_all_get->id, Input::get('id')));
			// if($be_show)
				// print_r($be_show);
		$results = DB::select('select A.account
					from users A, assigned_roles B
					where B.user_id = A.id
					and B.role_id = ?', array(Input::get('id')));
			// print_r($results);
			// {
				// foreach($be_show as $show)
				// {
					// $group_member_result = DB::select('SELECT account FROM USERS WHERE ID = ?', array($show->user_id));
						// print_r($group_member_result); echo "幹!!";
						return View::make('pages.GMRelated.PlatformGroupMember')
						->with('title', 'Platform Group Management')
							->with('users', $users_all)
							->with('roles', $roles)
							->with('results', $results)
							// ->with('group_member_result', $group_member_result)
							;
				// }
			// }
		// }
	}

	public function doPlatformGroupUpdate()
	{
		$role_id = Input::get('role_id');
		//echo $role_id;
		$pick_account = Input::get('pick_account');
		($pick_account)? $pick_account : null;
		
		// ($_POST['pick_account'] == null)? "Yes" : "NO";
		// $pick_account = $_POST['pick_account'] = Input::get('role_id');
		// print_r($pick_account);
		DB::delete('delete from assigned_roles where role_id='.$role_id);
		if($pick_account)
		{
			foreach ($pick_account as $selectedOption)
			{
	    		// echo $selectedOption."\n";	
					DB::insert('INSERT INTO assigned_roles( user_id, role_id) 
						 VALUES ('.$selectedOption.', '.$role_id.')');
			}
		}
		
		$users_all = DB::select('SELECT * FROM users');
		$results = DB::select('select A.account
					from users A, assigned_roles B
					where B.user_id = A.id
					and B.role_id = ?', array(Input::get('role_id')));
		$roles = Role::where('id', '=', $role_id)->get();
		return View::make('pages.GMRelated.PlatformGroupMember')
				->with('title', 'Platform Group Management')
					->with('users', $users_all)
					->with('roles', $roles)
					->with('results', $results)
					;
	}
/**PlatformPermission
 * */
	public function PlatformPermission()
	{
		if(Entrust::hasRole('Admin'))
		{
			return View::make('pages.GMRelated.PlatformPermission')
			->with('title', 'Platform Permission Management')
				->with('users', User::all())
				->with('roles', Role::all())
				->with('permissions', Permission::all()
			);
		}
		else 
		{
            Auth::logout();
            return Redirect::to('/')
                ->with('flash_notice', 'You don\'t have access!');
        }
	}

	public function doPlatformPermission()
	{
		// $roles = DB::table('roles')-> where('id', '=', Input::get('id'))->get();
		$roles = Role::where('id', '=', Input::get('id'))->get();
		// print_r($roles);
		$permission_id = DB::table('permission_role')-> where('role_id', '=', Input::get('id'))->get();
		// print_r($permission_id);
		// $checked_row = DB::select('select *
							// from permission_role a,permissions b
							// where a.permission_id = b.id 
							// and a.role_id = ?', array(Input::get('id')));
		// print_r($checked_row);
		$permission_all = DB::select('SELECT * FROM permissions');
		foreach($permission_all as $permission_line)
		{
			$is_check = DB::select('select * from permission_role where role_id =? and permission_id = ?'
						, array(Input::get('id'), $permission_line->id));
		 	if($is_check == null)
			{
				$permission_line->is_check = "";		
			}
			else 
			{
				$permission_line->is_check = "checked";
			}
		 }

		return View::make('pages.GMRelated.PlatformPermission')
			->with('title', 'Platform Role Management')
				->with('roles', $roles)
				->with('permission_all', $permission_all)
				;
	}

	public function doPlatformPermissionUpdate()
	{
		$edit_role_id = Input::get('role_id');
		$permission_check = Input::get('permission_check');
		$permission_all = DB::select('SELECT * FROM permissions');
		// print_r($permission_check);
		// echo '<br>'.$edit_role_id.'<br>';
		//帶入PlatformPermission要準備的物件
		$roles = Role::where('id', '=', $edit_role_id)->get();
		// $checked_row = DB::select('select *
					// from permission_role a,permissions b
					// where a.permission_id = b.id 
					// and a.role_id = ?', array(Input::get('id')));

		DB::delete('delete from permission_role where role_id='.$edit_role_id);
		if($permission_check)
		{
		
			foreach($permission_check as $permission_id  => $toUpdate)
			{
				DB::insert('INSERT INTO permission_role( permission_id, role_id) 
					 VALUES ('.$permission_id.', '.$edit_role_id.')');
			}
		}
		
		$permission_all = DB::select('SELECT * FROM permissions');

		foreach($permission_all as $permission_line)
		{
			$is_check = DB::select('select * from permission_role where role_id =? and permission_id = ?'
						, array($edit_role_id, $permission_line->id));
		 	if($is_check == null)
			{
				$permission_line->is_check = "";
			}
			else
			{
				$permission_line->is_check = "checked";
			}
		 }

		return View::make('pages.GMRelated.PlatformPermission')
			->with('title', 'Platform Permission Management')
			->with('roles', $roles)
			->with('permission_all', $permission_all)
			;
		// return View::make('pages.GMRelated.PlatformRole')
			// ->with('title', 'Platform Permission Management')
			// ->with('users', User::all())
			// ->with('roles', Role::all())
			// ->with('permissions', Permission::all())
			// ;
	}
/**PlatformConnection
 * */
	public function PlatformConnectionManagement()
	{
		$connection_all = DB::select('SELECT * FROM platform_connection');
		// print_r($connection_all);
		if(Entrust::hasRole('Admin')){
			return View::make('pages.GMRelated.PlatformConnection')
			->with('title', 'Platform Connection Management')
				->with('users', User::all())
				->with('roles', Role::all())
				->with('permissions', Permission::all())
				->with('connections', $connection_all
			);
		}
		else {
            Auth::logout();
            return Redirect::to('/')
                ->with('flash_notice', 'You don\'t have access!');
        }
	}
	
	public function doPlatformConnectionInsert()
	{
		DB::insert("INSERT INTO platform_connection( connection_name, connection_ip, connection_note, connection_group, update_time) 
					VALUES ('".Input::get('connectionname')."', '".Input::get('connectionip')."', '".Input::get('connectiondescription')."', '".Input::get('connectiongroup')."', now());");
		$connection_all = DB::select('SELECT * FROM platform_connection');
		return View::make('pages.GMRelated.PlatformConnection')
			->with('title', 'Platform Connection Management')
				->with('users', User::all())
				->with('roles', Role::all())
				->with('permissions', Permission::all())
				->with('connections', $connection_all
			);
	}
	
	public function doPlatformConnectionDelete()
	{
		// echo Input::get('connectionname');
		$connectionname = Input::get('connectionname');
		DB::delete("delete from platform_connection where connection_name='".$connectionname."'");
		$connection_all = DB::select('SELECT * FROM platform_connection');
		return View::make('pages.GMRelated.PlatformConnection')
			->with('title', 'Platform Connection Management')
				->with('users', User::all())
				->with('roles', Role::all())
				->with('permissions', Permission::all())
				->with('connections', $connection_all
			);
	}
	
	public function doPlatformConnectionUpdate()
	{
		$connectionname = Input::get('connectionname');
		DB::delete("delete from platform_connection where connection_name='".$connectionname."'");
		DB::insert("INSERT INTO platform_connection( connection_name, connection_ip, connection_note, connection_group, update_time) 
					VALUES ('".Input::get('connectionname')."', '".Input::get('connectionip')."', '".Input::get('connectiondescription')."', '".Input::get('connectiongroup')."', now());");
		
		$connection_all = DB::select('SELECT * FROM platform_connection');
		return View::make('pages.GMRelated.PlatformConnection')
			->with('title', 'Platform Connection Management')
				->with('users', User::all())
				->with('roles', Role::all())
				->with('permissions', Permission::all())
				->with('connections', $connection_all
			);			
	}


}