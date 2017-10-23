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
							<form method="POST" onkeypress="return event.keyCode != 13;" id="form_personal" class="form-horizontal" role="form">
								{{ csrf_field() }}
								<input type="hidden" value="{{ Auth::guard('owner')->user()->id }}" hidden>

								<div class="form-group">
									<label for="firstname" class="col-sm-2 control-label">First Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="firstname" name="firstname" value="{{ Auth::guard('owner')->user()->firstname }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label for="lastname" class="col-sm-2 control-label">Last Name</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="lastname" name="lastname" value="{{ Auth::guard('owner')->user()->lastname }}" disabled>
									</div>
								</div>

								<div class="form-group">
									<label for="email" class="col-sm-2 control-label">Email</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="email" name="email" value="{{ Auth::guard('owner')->user()->email }}" disabled>
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
						@if(Auth::guard('owner')->user()->company)
							<div class="col-lg-8 col-lg-offset-2">
								<form method="POST" role="form" onkeypress="return event.keyCode != 13;" id="form_company">
									{{ csrf_field() }}

									<input type="text" name="id" hidden value="{{ Auth::guard('owner')->user()->company->id }}" />
											
									<div class="form-group">
										<label for="name" class="control-label">Official Name</label>
										<input type="text" class="form-control" id="name" name="name" value="{{ Auth::guard('owner')->user()->company->name }}" disabled>
									</div>

									<div class="form-group">
										<label for="address" class="control-label">Address</label>
										<input type="text" class="form-control" id="address" name="address" value="{{ Auth::guard('owner')->user()->company->address }}" disabled>
									</div>

									<div class="form-group">
										<label for="zip_code" class="control-label">Zip Code</label>
										<input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ Auth::guard('owner')->user()->company->zip_code }}" disabled>
									</div>

									<input type="text" id="map-lat" name="map_lat" hidden value="{{ Auth::guard('owner')->user()->company->map_lat }}" />
									<input type="text" id="map-lng" name="map_lng" hidden value="{{ Auth::guard('owner')->user()->company->map_lng }}" />

									<div class="map-container">
										<div id="map"></div>
										<div id="map-hidden"></div>
									</div>

									<div class="form-group">
										<label for="phone_number" class="control-label">Phone</label>
										<input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ Auth::guard('owner')->user()->company->phone_number }}" disabled>
									</div>

									<div class="form-group">
										<label for="fax_number" class="control-label">Fax</label>
										<input type="text" class="form-control" id="fax_number" name="fax_number" value="{{ Auth::guard('owner')->user()->company->fax_number }}" disabled>
									</div>

									<div class="form-group">
										<label for="email_address" class="control-label">Email</label>
										<input type="text" class="form-control" id="email_address" name="email_address" value="{{ Auth::guard('owner')->user()->company->email_address }}" disabled>
									</div>

									<div class="form-group">
										<label for="total_rooms" class="control-label">Total Number of Rooms/Suites</label>
										<input type="text" class="form-control" id="total_rooms" name="total_rooms" value="{{ Auth::guard('owner')->user()->company->total_rooms }}" disabled>
									</div>

									<div class="form-group">
										<label for="price_range" class="control-label">Price range (per night)</label>
										<input type="text" class="form-control" id="price_range" name="price_range" value="{{ Auth::guard('owner')->user()->company->price_range }}" disabled>
									</div>

									<div class="form-group">
										<label for="description" class="control-label">Description of your accommodation</label>
										<input type="text" class="form-control" id="description" name="description" value="{{ Auth::guard('owner')->user()->company->description }}" disabled>
									</div>

									<div>
										<label class="control-label" id="facilities">Facilities</label>
									</div>
									@foreach ($facilities as $facility)
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="checkbox checkbox-info">
												<input id="checkbox{{ $facility->id }}" type="checkbox" name="facilities[]" value="{{ $facility->id }}" disabled {{ $facility->status }}>
													<label for="checkbox{{ $facility->id }}">
													{{ $facility->name }}
												</label>
											</div>
											
										</div>
									@endforeach

									<div class="form-group">
										<div class="col-sm-10 col-sm-offset-2">
											<button type="submit" class="btn btn-info pull-right">Edit</button>
										</div>
									</div>
								</form>
							</div>
						@else {{-- ELSE (Save Company Information) --}}
							<div class="col-lg-8 col-lg-offset-2">
								<form method="POST" role="form" onkeypress="return event.keyCode != 13;" id="form_company">
									{{ csrf_field() }}
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
										<input type="number" class="form-control" id="zip_code" name="zip_code">
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
										<input type="email" class="form-control" id="email_address" name="email_address">
									</div>

									<div class="form-group">
										<label for="total_rooms" class="control-label">Total Number of Rooms/Suites</label>
										<input type="number" class="form-control" id="total_rooms" name="total_rooms">
									</div>

									<div class="form-group">
										<label for="price_range" class="control-label">Price range (per night)</label>
										<input type="number" class="form-control" id="price_range" name="price_range">
									</div>

									<div class="form-group">
										<label for="description" class="control-label">Description of your accommodation</label>
										<textarea class="form-control" rows="5" id="description" name="description"></textarea>
									</div>

									<div>
										<label class="control-label" id="facilities">Facilities</label>
									</div>
									@foreach ($facilities as $facility)
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="checkbox checkbox-info">
												<input id="checkbox{{ $facility->id }}" type="checkbox" name="facilities[]" value="{{ $facility->id }}">
													<label for="checkbox{{ $facility->id }}">
													{{ $facility->name }}
												</label>
											</div>
										</div>
									@endforeach

									<div class="form-group">
										<div class="col-sm-10 col-sm-offset-2">
											<button type="submit" class="btn btn-info pull-right">Save</button>
										</div>
									</div>
								</form>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection