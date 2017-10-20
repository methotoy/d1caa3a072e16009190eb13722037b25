@extends('owner.layouts.master')

@section('title','Owner Home')

@section('content')	
	<section id="account">
		<div class="container">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Personal Information</h3>
				</div>
				<div class="panel-body">
					<div class="row clearfix">
						<div class="col-lg-8 col-lg-offset-2">
							<form action="" method="POST" class="form-horizontal" role="form">
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputEmail3" value="{{ Auth::guard('owner')->user()->firstname }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">Last Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputPassword3" value="{{ Auth::guard('owner')->user()->lastname }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label for="inputPassword3" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="inputPassword3" value="{{ Auth::guard('owner')->user()->email }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<button type="submit" class="btn btn-info pull-right">Edit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Company Information</h3>
				</div>
				<div class="panel-body">
					<div class="row clearfix">
						<div class="col-lg-8 col-lg-offset-2">
							<form action="" method="POST" role="form" onkeypress="return event.keyCode != 13;">
								<div class="form-group">
									<label for="name" class="control-label">Official Name</label>
									<input type="text" class="form-control" id="name" name="name">
								</div>

								<div class="form-group">
									<label for="address" class="control-label">Address</label>
									<input type="text" class="form-control" id="address" name="address">
								</div>

								<div class="form-group">
									<label for="zip_code" class="control-label">Zip Code</label>
									<input type="text" class="form-control" id="zip_code" name="zip_code">
								</div>

								<input type="text" id="map-lat" name="map_lat" hidden />
								<input type="text" id="map-lng" name="map_lng" hidden />

								<div id="map"></div>

								<div class="form-group">
									<label for="phone_number" class="control-label">Phone</label>
									<input type="text" class="form-control" id="phone_number" name="phone_number">
								</div>

								<div class="form-group">
									<label for="fax_number" class="control-label">Fax</label>
									<input type="text" class="form-control" id="fax_number" name="fax_number">
								</div>

								<div class="form-group">
									<label for="email_address" class="control-label">Email</label>
									<input type="text" class="form-control" id="email_address" name="email_address">
								</div>

								<div class="form-group">
									<label for="total_rooms" class="control-label">Total Number of Rooms/Suites</label>
									<input type="text" class="form-control" id="total_rooms" name="total_rooms">
								</div>

								<div class="form-group">
									<label for="price_range" class="control-label">Price range (per night)</label>
									<input type="text" class="form-control" id="price_range" name="price_range">
								</div>

								<div class="form-group">
									<label for="description" class="control-label">Description of your accommodation</label>
									<input type="text" class="form-control" id="description" name="description">
								</div>

								<div class="form-group">
									<div class="col-sm-10 col-sm-offset-2">
										<button type="submit" class="btn btn-info pull-right">Save</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection