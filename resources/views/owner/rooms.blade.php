@extends('owner.layouts.master')

@section('title','Owner Home')

@section('content')	
	<section id="rooms">
		<div class="container">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title">Rooms</h3>
				</div>
				<div class="panel-body">
					@if(Auth::guard('owner')->user()->company)
					<div class="col-md-12">
						<button class="btn btn-info pull-right btn-add" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#addRoomModal">
							<i class="fa fa-plus-circle"></i> Add Rooms
						</button>
					</div>
					@endif
					<div class="col-md-12" id="drag">
						@foreach($rooms as $room)
						<div class="col-md-6 room" id="room-{{ $room->id }}">
							<div class="panel panel-success">
								<div class="panel-heading">
									<h3 class="panel-title">
										<span>{{ ucwords((strlen($room->name) < 40) ? $room->name : substr($room->name, 0, 40)."...") }}</span>
										<i class="fa fa-trash pull-right drag-filter" aria-hidden="true" data-id="{{ $room->id }}"></i>
										<i class="fa fa-arrows pull-right drag-handle" aria-hidden="true" data-id="{{ $room->id }}"></i>
										<i class="fa fa-pencil pull-right drag-edit" aria-hidden="true" data-id="{{ $room->id }}"></i>
										<i class="fa fa-eye pull-right drag-view" aria-hidden="true" data-id="{{ $room->id }}"></i>
									</h3>
								</div>
								<div class="panel-body">
									<div class="col-md-12">
										<h4>Information</h4>
										<p class="wrap">{{ (strlen($room->information) < 198) ? $room->information : substr($room->information, 0, 198)."..." }}</p>
									</div>
									<div class="col-md-12">
										<h4>Price Range (per night)</h4>
										<p>₱ {{ $room->price }}</p>
									</div>
									<div class="col-md-12">
										<h4>Capacity</h4>
										<p><i class="fa fa-male"></i> x {{ $room->capacity }}</p>
									</div>
									<div class="col-md-12">
										<h4>Facilities</h4>
										<div class="row">
											<div class="col-sm-12">
												@foreach($room->facilities as $facility)
													<span class="tag-icon">
														<img src="{{ $facility }}" class="tips">
													</span>
												@endforeach
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<h4>Image(s)</h4>
										<div class="row">
											<div class="room-image col-md-6 col-sm-12">
												<img src="/img/hotel.jpg" />
											</div>
											<div class="room-image col-md-6 col-sm-12">
												<img src="/img/hotel2.jpg" />
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>

	{{-- Add Room Modal --}}
	<div class="modal fade prm" id="addRoomModal">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row clearfix">
						<div class="col-md-12">
							<form method="POST" class="form-horizontal" role="form" id="room_form">
								{{ csrf_field() }}
								<input type="hidden" id="id">
								<div class="form-group">
									<label for="name" class="control-label">Name</label>
									<input type="text" class="form-control" id="name" name="name" maxlength="191" required>
								</div>

								<div class="form-group">
									<label for="information" class="control-label">Information</label>
									<textarea class="form-control" id="information" name="information" rows="5" required></textarea>
								</div>

								<div class="form-group">
									<label for="price" class="control-label">Price Range</label>
									<input type="number" class="form-control" id="price" name="price" min="0" required>
								</div>

								<div class="form-group">
									<label for="capacity" class="control-label">Capacity</label>
									<input type="number" class="form-control" id="capacity" name="capacity" min="0" required>
								</div>

								<div class="form-group">
									<div>
										<label for="facilities" class="control-label">Facilities</label>
									</div>
									@foreach ($allFacilities as $facility)
										<div class="col-md-6 col-sm-6 col-xs-12">
											<div class="checkbox checkbox-info">
												<input id="checkbox{{ $facility->id }}" type="checkbox" name="facilities[]" value="{{ $facility->id }}">
													<label for="checkbox{{ $facility->id }}">
													{{ $facility->name }}
												</label>
											</div>
											
										</div>
									@endforeach
								</div>


								<div class="form-group">
									<button type="submit" class="btn btn-info pull-right">Add</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- End Add Room Modal --}}
@endsection