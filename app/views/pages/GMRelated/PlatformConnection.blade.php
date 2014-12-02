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
                        <h1 class="page-header">平台連線管理頁面</h1>
                        
                        <table class="table table-striped table-bordered table-hover" id="example">
	                    	<thead>
	                    		<th>Connection Name</th>
	                            <th>Connection IP</th>
	                            <th>Description</th>
	                            <th>Group</th>
	                            <th>Insert Connection</th>
	                    	</thead>
	                    	<tr>
	                    		{{ Form::open(array('action' => 'PlatformRelatedController@doPlatformConnectionInsert')) }}
                                		<td>
										{{ Form::text('connectionname', Input::old('connectionname'), array('class' => 'form-control', 'required' => 'required', 'maxlength' => '40')) }}
                                		</td>
                                		<td>
										{{ Form::text('connectionip', Input::old('connectionip'), array('class' => 'form-control', 'required' => 'required', 'maxlength' => '40')) }}
                                		</td>
                                		<td>
										{{ Form::text('connectiondescription', Input::get('connectiondescription'), array('class' => 'form-control', 'maxlength' => '100')) }}
                                		</td>
                                		<td>
										{{ Form::text('connectiongroup', Input::get('connectiongroup'), array('class' => 'form-control', 'maxlength' => '100')) }}
                                		</td>
                                		<td colspan = "2" align="center">
											{{ Form::submit('Insert!',  array('class' => 'btn btn-success')) }}
											{{ Form::token() }}
											{{ Form::close() }}
                                		</td>
	                    	</tr>
                        </table>
                        <table class="table table-striped table-bordered table-hover" id="example">
	                    	<thead>
	                    		<th>Connection Name</th>
	                            <th>Connection IP</th>
	                            <th>Description</th>
	                            <th>Group</th>
	                            <th>Last update time</th>
	                            <th colspan="2">Management</th>
	                    	</thead>
	                    	@foreach($connections as $connections)
							<tr>
									{{ Form::open(array('action' => 'PlatformRelatedController@doPlatformConnectionUpdate')) }}
								<td>{{ Form::text('connectionname', $connections->connection_name, array('class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly')) }}</td>
								<td>{{ Form::text('connectionip', $connections->connection_ip, array('class' => 'form-control', 'required' => 'required')) }}</td>
								<td>{{ Form::text('connectiondescription', $connections->connection_note, array('class' => 'form-control', 'maxlength' => '25')) }}</td>
								<td>{{ Form::text('connectiongroup', $connections->connection_group, array('class' => 'form-control', 'maxlength' => '25')) }}</td>
								<td>{{ Form::text('connectionupdatetime', $connections->update_time, array('class' => 'form-control', 'maxlength' => '25', 'readonly' => 'readonly')) }}</td>
								<td>{{ Form::submit('Update!', array('class' => 'btn btn-success')) }}
									{{ Form::token() }}
									{{ Form::close() }}
								</td>
								<td>{{ Form::open(array('action' => 'PlatformRelatedController@doPlatformConnectionDelete')) }}
									{{ Form::hidden('connectionname', $connections->connection_name) }}
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