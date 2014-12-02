<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		// Model::unguard();

		$this->call('Excute');
	}

}

class Excute extends Seeder
{

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
			'account'    => 'xpecadmin',
			'password' => Hash::make('xpec2011'),
			'user_nickname' => 'admin01',
			'user_desc' => 'system manager',
		));
		User::create(array(
			'account'    => 'authtest1',
			'password' => Hash::make('123456'),
			'user_nickname' => 'member1',
			'user_desc' => 'member1',
		));
		User::create(array(
			'account'    => 'authtest2',
			'password' => Hash::make('123456'),
			'user_nickname' => 'member2',
			'user_desc' => 'member2',
		));
		
		
		//建立群組	
		$admin = new Role();
	    $admin->name = 'Admin';
	    $admin->save();
	  
	    $user = new Role();
	    $user->name = 'User';
	    $user->save();
	  
	    $user1 = new Role();
	    $user1->name = 'Undefined';
	    $user1->save();
	  
	    $user2 = new Role();
	    $user2->name = 'Undefined1';
	    $user2->save();
	  
	    $user3 = new Role();
	    $user3->name = 'Undefined2';
	    $user3->save();
	  	
		//建立權限
	    $read = new Permission();
	    $read->name = 'can_read';
	    $read->display_name = 'Can Read Data';
	    $read->save();
	  
	    $edit = new Permission();
	    $edit->name = 'can_edit';
	    $edit->display_name = 'Can Edit Data';
	    $edit->save();
	  
	    $access = new Permission();
	    $access->name = 'can_access';
	    $access->display_name = 'Can Access Page';
	    $access->save();
	  
	    $undefined = new Permission();
	    $undefined->name = 'can_do_sth';
	    $undefined->display_name = 'Undefined Permission';
	    $undefined->save();
	  	
		//指定群組權限
	    $user->attachPermission($read);
	    $admin->attachPermission($read);
	    $admin->attachPermission($edit);
	    $admin->attachPermission($access);
	    $admin->attachPermission($undefined);
	 	
		
	    $adminRole = DB::table('roles')->where('name', '=', 'Admin')->pluck('id');
	    $userRole = DB::table('roles')->where('name', '=', 'User')->pluck('id');
	    // print_r($userRole);
	    // die();
	  	
	  	//賦予使用者所屬群組
	    $user1 = User::where('account','=','xpecadmin')->first();
	    $user1->roles()->attach($adminRole);
	    $user1 = User::where('account','=','xpecadmin')->first();
	    $user1->roles()->attach($userRole);
	    $user2 = User::where('account','=','authtest1')->first();
	    $user2->roles()->attach($userRole);
	    $user3 = User::where('account','=','authtest2')->first();
	    $user3->roles()->attach($userRole);
		
		//建立連線資料
		DB::insert("INSERT INTO platform_connection( connection_name, connection_ip, connection_note, connection_group, update_time) 
					VALUES ('access', '*.*.*.*', 'Delete this after setting is done', '', now());");
		
		//建立DB資料
		// DB::insert("INSERT INTO platform_db( db_connectionkey, db_driver, db_host, db_name, db_username, db_password, db_charset, db_prefix, pgsql_schema) 
					// VALUES ('testconnection', 'pgsql', '192.168.99.26', database_name, 'maxi', '', 'utf8', 1, 'Master Login DB', 0, 0);");
		$db = new Platform_db();
	    $db->db_connectionkey = 'testconnection';
	    $db->db_driver = 'pgsql';
	    $db->db_host = '192.168.99.26';
	    $db->db_name = 'database_name';
	    $db->db_username = 'maxi';
	    $db->db_password = '';
	    $db->db_charset = 'utf8';
	    $db->db_prefix = '';
	    $db->pgsql_schema = 'public';
	    $db->save();
	}

}