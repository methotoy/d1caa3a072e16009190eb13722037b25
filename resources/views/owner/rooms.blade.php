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
					<div class="col-md-12">
						<button class="btn btn-info pull-right btn-add"><i class="fa fa-plus-circle"></i> Add Rooms</button>
					</div>
					<div class="col-md-12">
						<div class="panel panel-primary">
							<div class="panel-body">
								<div class="col-md-12" id="drag">

									<div class="col-md-6 room">
										<div class="panel panel-info">
											<div class="panel-heading">
												<h3 class="panel-title">
													Rooms 1
													<i class="fa fa-trash pull-right drag-filter" aria-hidden="true"></i>
													<i class="fa fa-arrows pull-right drag-handle" aria-hidden="true"></i>
													<i class="fa fa-pencil pull-right drag-edit" aria-hidden="true"></i>
												</h3>
											</div>
											<div class="panel-body">
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection