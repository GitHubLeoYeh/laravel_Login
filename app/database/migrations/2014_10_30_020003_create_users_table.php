<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('account', 50);
			$table->string('password', 100);
			$table->string('user_nickname', 50)->nullable();
			$table->string('user_desc', 50)->nullable();
			$table->string('remember_token', 100)->nullable();
		});

		Schema::create('platform_connection', function(Blueprint $table)
		{
			$table->increments('connection_id');
			$table->string('connection_name', 50)->nullable();
			$table->string('connection_ip', 20)->nullable();
			$table->string('connection_note', 255)->nullable();
			$table->string('connection_group', 255)->nullable();
			$table->timestamp('update_time')->nullable();
			$table->string('remember_token', 100)->nullable();
			
		});

		Schema::create('platform_dbs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('db_connectionkey', 20);
			$table->string('db_driver', 20);
			$table->string('db_host', 40);
			$table->string('db_name', 20);
			$table->string('db_username', 20);
			$table->string('db_password', 100);
			$table->string('db_charset', 20)->nullable()->default('utf8');
			$table->string('db_prefix', 30)->default('');
			$table->string('pgsql_schema', 20)->nullable()->default('public');
			$table->string('mysql_collation', 20)->nullable()->default('utf8_unicode_ci');
			$table->string('remember_token', 100)->nullable();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		// Schema::table('users', function(Blueprint $table)
		// {
// 			
		// });
		Schema::drop('platform_dbs');
		Schema::drop('platform_connection');
		Schema::drop('users');
	}

}
