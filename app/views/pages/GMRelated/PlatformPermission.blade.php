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
                        <h1 class="page-header">Permissions</h1>
                        <h3>
						{{ Form::open(array('action' => 'PlatformRelatedController@doPlatformPermissionUpdate')) }}
                            <small>Group Name:</small>
                            @foreach($roles as $roles)
                        		{{ $roles->name }}
                        		{{ Form::hidden('role_id', $roles->id) }}
                        		{{-- $roles->id --}}
                        		<input type="button" class = "btn btn-outline btn-danger" value="{{ $roles->name }}">
                        	@endforeach
                        </h3>
                        
                        
								<br>
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<th>Pick id</th>
								<th>Permission Name</th>
								<th>Permission Description</th>
							</thead>
									@foreach($permission_all as $permission_line)
								<tr>
										<?php //$is_check = "" ?>
									<td align="center"><input name="permission_check[{{ $permission_line->id }}]" type="checkbox" {{ $permission_line->is_check }} /></td>
									<td>{{ $permission_line->name }}</td>
									<td>{{ $permission_line->display_name }}</td>
											
								</tr>
									@endforeach
							<tfoot>
								
								<th colspan="3" align="center">{{ Form::submit('Submit!', array('class' => 'btn btn-success')) }}</th>
								{{ Form::token() }}
								{{ Form::close() }}
							</tfoot>
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