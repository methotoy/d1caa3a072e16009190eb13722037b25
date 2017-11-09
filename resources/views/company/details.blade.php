@extends('layouts.master')

@section('title','Hotels')

@section('content')
	<section id="hotel-details">
		<article class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row">
						<div class="col-sm-8">
							<h1>
								{{ $company->name }}
								<br>
								<small>{{ $company->information }}</small>
							</h1>
							<div class="clearfix"></div>
						</div>
						<div class="col-sm-4 text-right">
							<h5 class="hotel-rate">From <span>{{ $company->price_range }}</span> / night</h5>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							@foreach($company->facilities as $facility)
								<span class="tag-icon">
									<img src="{{ $facility['icon_path'] }}" class="tips">
								</span>
							@endforeach
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<img src="/img/hotel.jpg" />
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h5>{{ $company->description }}</h5>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="col-sm-12 right-container">
						<div class="boxed">
							<h4>{{ $company->name }}</h4>
							<p>
								<i class="fa fa-map-marker"></i>
								{{ $company->address }}
								<br>
								<i class="fa fa-phone"></i>
								{{ $company->phone_number }}
								<br>
								<i class="fa fa-envelope"></i>
								{{ $company->email_address }}
							</p>
							<input type="hidden" id="map_lat" value="{{ $company->map_lat }}">
							<input type="hidden" id="map_lng" value="{{ $company->map_lng }}">
						</div>
						<div class="map-boxed text-center" id="map-details">
							MAP HERE!
						</div>
					</div>
				</div>
			</div>
			<div class="rooms-container">
				<div class="room-header text-center">
					<h3>ROOMS</h3>
				</div>
				@foreach($company->rooms as $room)
					<div class="row room-details-container">
						<div class="col-lg-3 col-md-3">
							<div class="image-container">
								@if(count($room->images))
								<img src="/{{ $room->images[0]->path }}/large.{{ $room->images[0]->file_extension }}"/>
								@endif
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-5">
							<h4>{{ $room->name }}</h4>
							{{ (strlen($room->information) < 87) ? $room->information : substr($room->information, 0, 87)."..." }}
								<div class="tag-container">
									@foreach($room->facilities as $facility)
										<span class="tag-icon">
											<img src="{{ $facility['icon_path'] }}" class="tips">
										</span>
									@endforeach
								</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 text-center">
							<div class="room-rate">
								<h5>₱ {{ $room->price }}</h5>
								{{-- <small class="text-warning">₱ 5,001</small> --}}
								<p class="text-muted">Price / 1 night(s)</p>
								<br>
								<p>Capacity: <i class="fa fa-male"></i> x{{ $room->capacity }}</p>
								@if(Auth::guard()->check())
									<button class="btn btn-success btn-lg btn-block btn-book" data-capacity="{{ $room->capacity }}" data-id="{{ $room->id }}"><i class="fa fa-hand-o-right"></i> Book</button>
								@else
									<button class="btn btn-success btn-lg btn-block btn-sign-up"><i class="fa fa-hand-o-right"></i> Book</button>
								@endif
								<button class="btn btn-info btn-lg btn-block"><i class="fa fa-plus-circle"></i> Read More</button>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-4">
							<div class="calendar-container text-center">
								<h3>CALENDARE HERE</h3>
							</div>
						</div>
					</div>
				@endforeach	
			</div>
		</article> 
	</section>

	{{-- SIGN UP MODAL --}}
	<div class="modal fade" id="signUpModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="panel panel-default">
						<div class="panel-heading"> Sign In</div>
						<div class="panel-body">
							<form class="form-horizontal" method="POST" id="signInForm">
								{{ csrf_field() }}

								<div class="form-group">
									<div class="col-md-12">
											<input id="email" type="email" class="form-control" name="email" required autofocus placeholder="Email Address">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12">
										<input id="password" type="password" class="form-control" name="password" required placeholder="Password">
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12">
										<div class="checkbox">
											<label>
												<input type="checkbox" name="remember"> Remember Me
											</label>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary btn-block">Sign In</button>
									</div>
								</div>

								<div class="form-group">
									<div class="col-md-12">
										<a href="{{ url('/password/reset') }}" class="btn btn-link btn-block">Forgot Password?</a>
										<a href="{{ url('/signup') }}" class="btn btn-link btn-block">No Account? Sign up now!</a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- END SIGN UP MODAL --}}

	{{-- BOOK MODAL --}}
	<div class="modal fade" id="bookModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Book Form</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="capacity">
					<form id="bookForm" method="POST" class="form-horizontal" role="form">
						{{ csrf_field() }}
						<input type="hidden" id="room_id" name="id">

						<div class="form-group">
							<label for="datepicker" class="col-sm-3 control-label">Check In:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="datepicker" name="check_in" readonly required>
							</div>
						</div>

						<div class="form-group">
							<label for="datepicker2" class="col-sm-3 control-label">Check Out:</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" id="datepicker2" name="check_out" readonly required>
							</div>
						</div>

						<div class="form-group">
							<label for="no_rooms" class="col-sm-3 control-label">No of Rooms:</label>
							<div class="col-sm-9">
								<select class="form-control" id="no_rooms" name="no_rooms" required>
									<option selected disabled value="">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-10 col-sm-offset-2">
								<button type="submit" class="btn btn-primary pull-right">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	{{-- END BOOK MODAL --}}
@endsection