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
								<img src="/img/hotel.jpg"/>
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
								<button class="btn btn-success btn-lg btn-block"><i class="fa fa-hand-o-right"></i> Book</button>
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
@endsection