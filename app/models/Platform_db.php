<?php

class Platform_db extends \Eloquent {
	protected $fillable = 
		array('db_connectionkey', 
			  'db_driver',
			  'db_host', 
			  'db_name',
			  'db_username',
			  'db_password',
			  'db_charset',
			  'db_prefix',
			  'pgsql_schema',
			  'mysql_collation'
		);
		
	protected $table = 'platform_dbs';	
	
	protected $hidden = array('db_password', 'remember_token');
	
	public $timestamps = false;
}