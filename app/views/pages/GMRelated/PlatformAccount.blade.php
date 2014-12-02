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
                        <h1 class="page-header">平台帳號管理頁面</h1>
							                        
							
							<!--Starttable-->
							<script>
								$(document).ready( function () {
							   		$('#example').DataTable(); 
								} );
								
							</script>
                                <!-- <table id="startdatatable"> -->
                                <table class="table table-striped table-bordered table-hover" id="example">
                                	<thead>
                                		<th>Account</th>
                                        <th>Password</th>
                                        <th>NickName</th>
                                        <th>Description</th>
                                        <th colspan = "2">Management</th>
                                	</thead>
                                	<tr>
                            			{{ Form::open(array('url' => 'PlatformAccountInsert')) }}
                                		<td>
										{{ Form::text('account', Input::old('account'), array('class' => 'form-control', 'required' => 'required')) }}
                                		</td>
                                		<td>
                                		{{ Form::password('password', array('class' => 'form-control', 'required' => 'required')) }}	
                                		</td>
                                		<td>
										{{ Form::text('user_nickname', Input::get('user_nickname'), array('class' => 'form-control', 'maxlength' => '25')) }}
                                		</td>
                                		<td>
										{{ Form::text('user_desc', Input::get('user_desc'), array('class' => 'form-control', 'maxlength' => '25')) }}
                                		</td>
                                		<td colspan = "2" align="center">
											{{ Form::submit('Insert!',  array('class' => 'btn btn-success')) }}
											{{ Form::token() }}
											{{ Form::close() }}
                                		</td>
                                		
                                		
                                	</tr>
									@foreach($users as $users)
									<tr>
											{{ Form::open(array('url' => 'PlatformAccountUpdate')) }}
										<td>{{ Form::text('account', $users->account, array('class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly')) }}</td>
										<td>{{ Form::password('password', array('class' => 'form-control', 'required' => 'required')) }}</td>
										<td>{{ Form::text('user_nickname', $users->user_nickname, array('class' => 'form-control', 'maxlength' => '25')) }}</td>
										<td>{{ Form::text('user_desc', $users->user_desc, array('class' => 'form-control', 'maxlength' => '25')) }}</td>
										<td>{{ Form::submit('Update!', array('class' => 'btn btn-success')) }}
											{{ Form::token() }}
											{{ Form::close() }}
										</td>
										<td>{{ Form::open(array('url' => 'PlatformAccountDelete')) }}
											{{ Form::hidden('account', $users->account) }}
											{{ Form::submit('Delete!', array('class' => 'btn btn-success')) }}
										</td>
											{{ Form::token() }}
											{{ Form::close() }}
										<br>
									</tr>
									@endforeach

								<tfoot>
                                	<th>Account</th>
                                    <th>Password</th>
                                    <th>NickName</th>
                                    <th>Description</th>
                                    <th colspan = "2">Management</th>
                                </tfoot>
							</table>
							<!--Endtable-->
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