<!DOCTYPE html>
<html lang="en">

<head>
	@include('includes.indexhead')
</head>

<body>
	<div id="wrapper">
		@include('includes.navigation')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Database Setting</h1>
						<table class="table table-striped table-bordered table-hover">
						<thead>
							<th>Conn Name</th>
							<th>Conn DB driver</th>
							<th>Conn host</th>
							<th>Conn DB Name</th>
							<th>Conn username</th>
							<th>Conn password</th>
							<th>Conn charset</th>
							<th>Conn prefix</th>
							<th>Conn schema</th>
							<th>Conn collation</th>
							<th colspan="2">Manage</th>
							
						</thead>
						{{ Form::open(array('action' => 'ServerRelatedController@doPlatformDBSettingInsert')) }}
							<tr>
								<td>
								{{ Form::text('db_connectionkey', Input::old('db_connectionkey'), array('class' => 'form-control', 'required' => 'required', 'maxlength' => '20')) }}
                        		</td>
								<td>
								{{ Form::text('db_driver', Input::old('db_driver'), array('class' => 'form-control', 'required' => 'required', 'maxlength' => '20')) }}
                        		</td>
								<td>
								{{ Form::text('db_host', Input::old('db_host'), array('class' => 'form-control', 'required' => 'required', 'maxlength' => '40')) }}
                        		</td>
								<td>
								{{ Form::text('db_name', Input::old('db_name'), array('class' => 'form-control', 'required' => 'required', 'maxlength' => '20')) }}
                        		</td>
								<td>
								{{ Form::text('db_username', Input::old('db_username'), array('class' => 'form-control', 'required' => 'required', 'maxlength' => '20')) }}
                        		</td>
								<td>
								{{ Form::password('db_password', array('class' => 'form-control', 'maxlength' => '100')) }}
                        		</td>
								<td>
								{{ Form::text('db_charset', Input::old('db_charset'), array('class' => 'form-control', 'required' => 'required', 'maxlength' => '20')) }}
                        		</td>
                        		<td>
								{{ Form::text('db_prefix', Input::get('db_prefix'), array('class' => 'form-control', 'maxlength' => '25', 'maxlength' => '30')) }}
                        		</td>
                        		<td>
								{{ Form::text('pgsql_schema', Input::get('pgsql_schema'), array('class' => 'form-control', 'maxlength' => '20')) }}
                        		</td>
                        		<td>
								{{ Form::text('mysql_collation', Input::get('mysql_collation'), array('class' => 'form-control', 'maxlength' => '20')) }}
                        		</td>
                    			<td colspan = "2" align="center">
										{{ Form::submit('Insert!',  array('class' => 'btn btn-success')) }}
										{{ Form::token() }}
										{{ Form::close() }}
                        		</td>
							</tr>
							@foreach($platform_dbs as $platform_dbs_all)
							<tr>
									{{ Form::open(array('action' => 'ServerRelatedController@doPlatformDBSettingUpdate')) }}
								<td>{{ Form::text('db_connectionkey', $platform_dbs_all->db_connectionkey, array('class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly', 'maxlength' => '20')) }}</td>
								<td>{{ Form::text('db_driver', $platform_dbs_all->db_driver, array('class' => 'form-control', 'required' => 'required', 'maxlength' => '20')) }}</td>
								<td>{{ Form::text('db_host', $platform_dbs_all->db_host, array('class' => 'form-control', 'required' => 'required', 'maxlength' => '40')) }}</td>
								<td>{{ Form::text('db_name', $platform_dbs_all->db_name, array('class' => 'form-control', 'required' => 'required', 'maxlength' => '20')) }}</td>
								<td>{{ Form::text('db_username', $platform_dbs_all->db_username, array('class' => 'form-control', 'required' => 'required', 'maxlength' => '20')) }}</td>
								<td>{{ Form::password('db_password', array('class' => 'form-control', 'maxlength' => '100')) }}</td>
								<td>{{ Form::text('db_charset', $platform_dbs_all->db_charset, array('class' => 'form-control', 'maxlength' => '20')) }}</td>
								<td>{{ Form::text('db_prefix', $platform_dbs_all->db_prefix, array('class' => 'form-control', 'maxlength' => '30')) }}</td>
								<td>{{ Form::text('pgsql_schema', $platform_dbs_all->pgsql_schema, array('class' => 'form-control', 'maxlength' => '20')) }}</td>
								<td>{{ Form::text('mysql_collation', $platform_dbs_all->mysql_collation, array('class' => 'form-control', 'maxlength' => '20')) }}</td>
								<td>{{ Form::submit('Update!', array('class' => 'btn btn-success')) }}
									{{ Form::token() }}
									{{ Form::close() }}
								</td>
								<td>
									{{ Form::open(array('action' => 'ServerRelatedController@doPlatformDBSettingDelete')) }}
									{{ Form::hidden('db_connectionkey', $platform_dbs_all->db_connectionkey) }}
									{{ Form::submit('Delete!', array('class' => 'btn btn-success')) }}
								</td>
									{{ Form::token() }}
									{{ Form::close() }}
								<br>
							</tr>
							@endforeach
						</table>

                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

  	</div>
    <!-- /#wrapper -->

</body>
</html>               