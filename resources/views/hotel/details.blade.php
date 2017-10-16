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
								Kiwiana Panorama
								<br/>
								<small>Sample Information</small>
							</h1>
							<div class="clearfix"></div>
						</div>
						<div class="col-sm-4 text-right">
							<h5 class="hotel-rate">From <span>₱ 5,000</span> / night</h5>
						</div>
					</div>
					<div class="row">
						<span class="tag-icon">
							<img src="/icons/adsl.png" class="tips">
						</span>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</article> 
	</section>
@endsection