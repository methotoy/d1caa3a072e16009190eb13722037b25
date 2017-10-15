@extends('layouts.master')

@section('title','Booking')

@section('content')
	
	<section id="booking">
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

			  <div class="container hotel-box">
					<div class="row">
						<div class="col-md-4">
						<img src="img/hotel.jpg" />
						</div>
						<div class="col-md-8">
							<div class="col-md-8">
								<h3 class="hotel-name">Kiwiana Panorama</h3>
								<h4>Sample Information</h4>
								<h5>Sample Details Sample Details Sample Details Sample Details Sample Details Sample Details Sample Details Sample Details Sample Details Sample Details Sample Details Sample Details Sample Details Sam...</h4>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/adsl.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/baby-cot.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/bath.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/free-parking.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/hairdryer.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/lounge.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/mini-bar.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/non-smoking.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/safe.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/shower.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/adsl.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/baby-cot.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/bath.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/free-parking.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/hairdryer.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/lounge.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/mini-bar.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/non-smoking.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/safe.png">
									</div>
								</div>
								<div class="col-md-1 tag">
									<div class="tag-container">
										<img src="icons/shower.png">
									</div>
								</div>
							</div>
							<div class="col-md-4 aligncenter">
								<h5 class="hotel-rate">From <span>₱ 5,000</span> / night</h5>
								<button type="button" class="btn btn-info btn-block"><i class="fa fa-plus-circle"></i>  Read More</button>
							</div>
						</div>
					</div>
				</div>
      </div>
  </section>
@endsection