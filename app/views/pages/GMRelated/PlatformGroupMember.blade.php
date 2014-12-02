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
                        <h1 class="page-header">
                       				{{ Form::open(array('action' => 'PlatformRelatedController@doPlatformGroupUpdate', 'method' => 'post')) }}
                         @foreach($roles as $roles)
                        		{{ $roles->name }}
                        		{{ Form::hidden('role_id', $roles->id) }}
                       	 @endforeach
                       	&nbsp Members &nbsp Management</h1>
                       	
                       	<table class="table table-striped table-bordered table-hover">
                       		<thead>
								<th>Pick members</th>
								<th>Members </th>
							</thead>
                       		<tr>
                       			<td>
                       				<!-- <form method="post" action="PlatformRelatedController@doPlatformGroupUpdate"></form> -->
                       					<div class="form-group">
                                            <label><small><font color="red"></font>&nbsp&nbsp<br>(Please use "Control" button to do multiple select and what you pick would overeride original mambers)</font></small></small></label>
                                            <select name = "pick_account[]" multiple class="form-control">
                                            	@foreach($users as $user_data)
                                            		<option align = "center" value="{{ $user_data->id }}">--------------------{{ $user_data->account }}--------------------</option>
                                            	@endforeach
                                            </select>
                                        </div>
                                    {{ Form::submit('submit', array('class' => 'btn btn-success')) }}
											{{ Form::token() }}
											{{ Form::close() }}
                                        <!-- <input type="submit" name = "submit" value="submit" class="btn btn-success">
                                        <button type="reset" class="btn btn-default">Reset Button</button> -->
                       			</td>
                       			<td>
                       				<ul>
                       					@if($results != null)
	                       					@foreach($results as $results)
	                       						<li>{{ $results->account }}</li><br>
	                       					@endforeach
                       					@else
                       						{{ "------No members------" }}
                       					@endif
                       				</ul>
                       			</td>
                       		</tr>
                       	
                       	
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