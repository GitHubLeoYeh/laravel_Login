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
                        <h1 class="page-header">平台群組管理頁面</h1>
							<table class="table table-striped table-bordered table-hover" id="example">
								<thead>
                                        <th>Group Name</th>
                                        <th>Delete</th>
                                        <th colspan="2">Permissions & Members</th>
                                </thead>
									
									<tr>
                            			{{ Form::open(array('url' => 'PlatformGroupInsert')) }}
                                		<td>
										{{ Form::text('name', Input::old('name'), array('class' => 'form-control', 'required' => 'required')) }}
                                		</td>
                                		<td align="center" colspan="3">
											{{ Form::submit('Insert!',  array('class' => 'btn btn-success')) }}
											{{ Form::token() }}
											{{ Form::close() }}
										</td>
									</tr>
									@foreach($roles as $roles)
									<tr>
										{{ Form::open(array('url' => 'PlatformGroupDelete')) }}
										<td>{{ Form::text('name', $roles->name, array('class' => 'form-control', 'required' => 'required', 'readonly' => 'readonly')) }}</td>
											{{ Form::hidden('name', $roles->name) }}
										<td align="center">
											{{ Form::submit('Delete!', array('class' => 'btn btn-success')) }}
										</td>
											{{ Form::token() }}
											{{ Form::close() }}
										<td  align="center">
										{{ Form::open(array('action' => 'PlatformRelatedController@doPlatformPermission')) }}
										<!-- <input name="id" type="text" value = '{{ $roles->id }}'> -->
										<!-- <input name="name" type="text" value = '{{ $roles->name }}'> -->
										{{ Form::hidden('id', $roles->id) }}
										{{ Form::hidden('name', $roles->name) }}
										{{ Form::submit('Permissions!', array('class' => 'btn btn-success')) }}
											{{ Form::token() }}
											{{ Form::close() }}
										</td>
										<td  align="center">
										{{ Form::open(array('action' => 'PlatformRelatedController@doPlatformGroup')) }}
										<!-- <input name="id" type="text" value = '{{ $roles->id }}'> -->
										<!-- <input name="name" type="text" value = '{{ $roles->name }}'> -->
										{{ Form::hidden('id', $roles->id) }}
										{{ Form::hidden('name', $roles->name) }}
										{{ Form::submit('members!', array('class' => 'btn btn-success')) }}
											{{ Form::token() }}
											{{ Form::close() }}
										</td>
										<br>
									</tr>
									@endforeach

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