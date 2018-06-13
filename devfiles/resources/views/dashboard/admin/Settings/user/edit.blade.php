@extends('layouts.layout1')
@section('PageTitle', 'Edit User')




@section('content')

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel">
				<div class="panel-heading">Edit User</div>
				<div class="panel-body">					

					<form class="form-horizontal" role="form" method="POST" action="/admin/settings/users/{{$user->id}}/edit">
						
<div class="form-group">
							<label class="col-md-4 control-label">Name</label>
							<div class="col-md-6">
								<input type="text" placeholder="{{ $user->name }}" value="{{ $user->name }}" class="form-control" name="name" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Company</label>
							<div class="col-md-6">
								<input type="text" placeholder="{{ $user->company }}" value="{{ $user->company }}" class="form-control" name="company" value="">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" placeholder="{{ $user->email }}" value="{{ $user->email }}" class="form-control" name="email" value="">
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
								<input type="text" class="form-control" placeholder="{{ $user->address1 }}" value="{{ $user->address1 }}" name="address1">
							</div>
						</div>
					<div class="form-group">
							<label class="col-md-4 control-label">Address 2</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="{{ $user->address2 }}" value="{{ $user->address2 }}" name="address2">
							</div>
						</div>
					<div class="form-group">
							<label class="col-md-4 control-label">Country</label>
							<div class="col-md-6">
								 <select class="form-control w400"  value="{{ $user->country }}" name="country">
                            @include('layouts.includes.countries')
                        </select>
							</div>
						</div>
					<div class="form-group">
							<label class="col-md-4 control-label">City</label>
							<div class="col-md-6">
								<input type="text" value="{{ $user->city }} "class="form-control" placeholder="{{ $user->city }}" name="city">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">State</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="{{ $user->state }}" value="{{ $user->state }}" name="state">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Postcode</label>
							<div class="col-md-6">
								<input type="text" class="form-control" placeholder="{{ $user->postcode }}" value="{{ $user->postcode }}" name="postcode">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Phone</label>
							<div class="col-md-6">
								<input type="text" class="form-control" value="{{ $user->phone }}" placeholder="{{ $user->phone }}" name="phone">
							</div>
						</div>

                        <div class="form-group">
							<label class="col-md-4 control-label">rate</label>
							<div class="col-md-6">
								<input type="text" placeholder="{{ $user->rate }}" value="{{ $user->rate }}" class="form-control" name="rate">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">credit</label>
							<div class="col-md-6">
								<input type="text" class="form-control" value="{{ $user->credit }}" placeholder="{{ $user->credit }}" name="credit">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Admin</label>
							<div class="col-md-6">
								<div class="checkbox">
                                    <label>
                                        <div class="checker"><span class=""><input name="admin" value="{{ $user->admin }}" type="checkbox"></span></div>
                                    </label>
                                </div>
							</div>
						</div>





                        
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Update
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