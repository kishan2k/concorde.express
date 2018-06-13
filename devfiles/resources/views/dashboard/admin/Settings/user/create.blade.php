@extends('layouts.layout1')
@section('PageTitle', 'Create New User')




@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel">
				<div class="panel-heading">Add New User</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/settings/users/create') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="name" value="{{ old('name') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Company</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="company" value="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Address 1</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Address" name="address1">
							</div>
						</div>
					<div class="form-group">
							<label class="col-md-4 control-label">Address 2</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Address" name="address2">
							</div>
						</div>
					<div class="form-group">
							<label class="col-md-4 control-label">Country</label>
							<div class="col-md-6">
								 <select class="form-control w400"  name="country">
                            @include('layouts.includes.countries')
                        </select>
							</div>
						</div>
					<div class="form-group">
							<label class="col-md-4 control-label">City</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="City" name="city">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">State</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="State" name="state">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Postcode</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Postcode" name="postcode">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Phone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="Phone" name="phone">
							</div>
						</div>


                        <div class="form-group">
							<label class="col-md-4 control-label">rate</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="rate">
							</div>
						</div>
						 <div class="form-group">
							<label class="col-md-4 control-label">credit</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="credit">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Admin</label>
							<div class="col-md-6">
								<div class="checkbox">
                                    <label>
                                        <div class="checker"><span class=""><input name="admin" type="checkbox"></span></div>
                                    </label>
                                </div>
							</div>
						</div>
                        
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>



@stop