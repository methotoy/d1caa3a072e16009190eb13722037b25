@extends('layouts.master')

@section('title','Hotels')

@section('content')
	
	<section id="hotel">
      <div class="container">
		  	<div class="search-area aligncenter">
			    <form>
			      <div class="row">
			      <div class="col-md-4 col-sm-4"><input type="text" value="" name="find" placeholder="City,Hotel and Resort's Name"/></div>
			      <div class="col-md-2 col-sm-2 b-lft"><input type="text" placeholder="Check In" name="in"/></div>
			      <div class="col-md-2 col-sm-2 b-lft"><input type="text" placeholder="Num. of Nights" name="night"/></div>
			      <div class="col-md-2 col-sm-2 b-lft"><input type="text" placeholder="1 room, 2 Guest" name="guest"/></div>
			      <div class="col-md-2 col-sm-2 last"><input type="submit" value="Find" name="submit"/></div>
			      </div>
			    </form>
			  </div>

			  @foreach($companies as $company)
				  <div class="container hotel-container">
						<div class="row">
							<div class="col-md-4">
								<img src="/img/hotel.jpg" />
							</div>
							<div class="col-md-8">
								<div class="col-md-8">
									<h3 class="hotel-name">{{ ucwords($company->name) }}</h3>
									<h4>{{ ucwords($company->information) }}</h4>
									<h5>{{ (strlen($company->description) < 198) ? $company->description : substr($company->description, 0, 198)."..." }}</h4>
									
									@foreach($company->facilities as $facility)
										<div class="col-md-1 tag">
											<div class="tag-container">
												<img src="{{ $facility['icon_path'] }}">
											</div>
										</div>
									@endforeach
								</div>
								<div class="col-md-4 aligncenter">
									<h5 class="hotel-rate">From <span>₱ {{ $company->price_range }}</span> / night</h5>
									<a href="/hotels/information/{{ $company->id }}" class="btn btn-info btn-block btn-a"><i class="fa fa-plus-circle"></i>  Read More</a>
								</div>
							</div>
						</div>
					</div>
				@endforeach
      </div>
  </section>
@endsection