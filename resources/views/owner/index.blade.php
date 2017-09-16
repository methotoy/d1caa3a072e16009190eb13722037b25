@extends('owner.layouts.master')

@section('title','Owner Home')

@section('content')
	<section id="header">
		<div class="banner-area aligncenter">
	    <h1>Where Your Journey Begins.</h1>
	    <p><strong>Find Your Best Travel</strong></p>
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
	</section>
	
	<section id="featured">
      <div class="container">
          <h2>Featured Destinations</h2>
          <div class="row feat">

              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item_border">
                  <img src="img/hotel.jpg" />
                    <div class="wrapper_content">
											<div class="post_title"><h4>
												<a href="single-tour.html" rel="bookmark">Kiwiana Panorama</a>
											</h4></div>
											<span class="post_date"><i class="fa fa-map-marker"></i> Bantayan island, Cebu</span>
									 </div>

                   <div class="read_more">
										<div class="item_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
										</div>
										<a href="single-tour.html" class="read_more_button">VIEW MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>

                </div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item_border">
                <img src="img/hotel2.jpg" />
                  <div class="wrapper_content">
                    <div class="post_title"><h4>
                      <a href="single-tour.html" rel="bookmark">Kiwiana Panorama</a>
                    </h4></div>
                    <span class="post_date"><i class="fa fa-map-marker"></i> Bantayan island, Cebu</span>
                  </div>

                  <div class="read_more">
										<div class="item_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
										</div>
										<a href="single-tour.html" class="read_more_button">VIEW MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>

                </div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item_border">
                <img src="img/hotel.jpg" />
                  <div class="wrapper_content">
											<div class="post_title"><h4>
												<a href="single-tour.html" rel="bookmark">Kiwiana Panorama</a>
											</h4></div>
											<span class="post_date"><i class="fa fa-map-marker"></i> Bantayan island, Cebu</span>
									</div>
                  <div class="read_more">
										<div class="item_rating">
											<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
										</div>
										<a href="single-tour.html" class="read_more_button">VIEW MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>
								</div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item_border">
                <img src="img/hotel2.jpg" />
                  <div class="wrapper_content">
										<div class="post_title"><h4>
											<a href="single-tour.html" rel="bookmark">Kiwiana Panorama</a>
										</h4></div>
										<span class="post_date"><i class="fa fa-map-marker"></i> Bantayan island, Cebu</span>
									</div>
                  <div class="read_more">
    								<div class="item_rating">
    									<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
    								</div>
    								<a href="single-tour.html" class="read_more_button">VIEW MORE
    									<i class="fa fa-long-arrow-right"></i></a>
    								<div class="clear"></div>
    							</div>
								</div>
              </div>

          </div>
      </div>
  </section>

  <section class="regular background">
		<div class="container">
			<div class="row">

				<h3 class="hidden">Destination Categories</h3>

				<div class="col-md-6 col-lg-4">
					<article class="card accordion-card">
						<header>
							<h3 class="section-title">Adventure Seekers</h3>
							<p>With endless hiking trails, these destinations will satisfy the wildest explorers!</p>
						</header>
						<div class="accordion-panel">
							<div class="panel-group" id="accordion-1" role="tablist" aria-multiselectable="true">
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-20-960x540.jpg');">
									<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-1" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<div class="panel-heading" role="tab" id="headingOne">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Buenos Aires, Argentina</h4>
											<ul class="hierarchy">
												<li>South America</li>
											</ul>
										</div>
									</a>
								</div>
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-11-960x540.jpg');">
									<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-1" href="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
										<div class="panel-heading" role="tab" id="headingThree">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Queenstown, New Zealand</h4>
											<ul class="hierarchy">
												<li>Oceania</li>
											</ul>
										</div>
									</a>
								</div>
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-10-960x540.jpg');">
									<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-1" href="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
										<div class="panel-heading" role="tab" id="headingFour">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Zermatt, Switzerland</h4>
											<ul class="hierarchy">
												<li>Europe</li>
											</ul>
										</div>
									</a>
								</div>
							</div>
						</div>
						<footer><a href="#" class="btn btn-success">Find More &nbsp; <i class="fa fa-arrow-right"></i></a></footer>
					</article> <!-- /.accordion-card -->
				</div>

				<div class="col-md-6 col-lg-4">
					<article class="card accordion-card">
						<header>
							<h3 class="section-title">Beach Lovers</h3>
							<p>Head for a swim and relax on the warm, golden sand. Life's a beach!</p>
						</header>
						<div class="accordion-panel">
							<div class="panel-group" id="accordion-2" role="tablist" aria-multiselectable="true">
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-14-960x540.jpg');">
									<div id="collapseOne-2" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-2" href="#collapseOne-2" aria-expanded="true" aria-controls="collapseOne-2">
										<div class="panel-heading" role="tab" id="headingOne-2">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Acapulco, Mexico</h4>
											<ul class="hierarchy">
												<li>North America</li>
											</ul>
										</div>
									</a>
								</div>
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-13-960x540.jpg');">
									<div id="collapseTwo-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo-2">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-2" href="#collapseTwo-2" aria-expanded="true" aria-controls="collapseTwo-2">
										<div class="panel-heading" role="tab" id="headingTwo-2">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Whitehaven Beach, Australia</h4>
											<ul class="hierarchy">
												<li>Oceania</li>
											</ul>
										</div>
									</a>
								</div>
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-5-960x540.jpg');">
									<div id="collapseThree-2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-2" href="#collapseThree-2" aria-expanded="true" aria-controls="collapseThree-2">
										<div class="panel-heading" role="tab" id="headingThree-2">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Algarve, Portugal</h4>
											<ul class="hierarchy">
												<li>Europe</li>
											</ul>
										</div>
									</a>
								</div>
							</div>
						</div>
						<footer><a href="#" class="btn btn-success">Find More &nbsp; <i class="fa fa-arrow-right"></i></a></footer>
					</article> <!-- /.accordion-card -->
				</div>

				<div class="col-md-12 col-lg-4">
					<article class="card accordion-card">
						<header>
							<h3 class="section-title">Crowd Escapers</h3>
							<p>Step away from the crowd, explore places where you'll feel no one has ever been before.</p>
						</header>
						<div class="accordion-panel">
							<div class="panel-group" id="accordion-3" role="tablist" aria-multiselectable="true">
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-22-960x540.jpg');">
									<div id="collapseOne-3" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-3" href="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne-3">
										<div class="panel-heading" role="tab" id="headingOne-3">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Galapagos Islands, Ecuador</h4>
											<ul class="hierarchy">
												<li>South America</li>
											</ul>
										</div>
									</a>
								</div>
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-19-960x540.jpg');">
									<div id="collapseThree-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-3" href="#collapseThree-3" aria-expanded="true" aria-controls="collapseThree-3">
										<div class="panel-heading" role="tab" id="headingThree-3">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Yellowstone, USA</h4>
											<ul class="hierarchy">
												<li>North America</li>
											</ul>
										</div>
									</a>
								</div>
								<!-- Guide Panel -->
								<div class="panel panel-default" style="background-image: url('img/destinations-21-960x540.jpg');">
									<div id="collapseFour-3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
										<div class="panel-body">
											<div class="read-more">Details <i class="fa fa-arrow-right"></i></div>
											<a href="#"><div class="spacer"></div></a>
										</div>
									</div>
									<a data-toggle="collapse" data-parent="#accordion-3" href="#collapseFour-3" aria-expanded="true" aria-controls="collapseFour-3">
										<div class="panel-heading" role="tab" id="headingFour-3">
											<div class="panel-icon">
												<i class="fa fa-map-marker"></i>
											</div>
											<h4 class="panel-title">Foz do Iguacu, Brasil</h4>
											<ul class="hierarchy">
												<li>South America</li>
											</ul>
										</div>
									</a>
								</div>
							</div>
						</div>
						<footer><a href="#" class="btn btn-success">Find More &nbsp; <i class="fa fa-arrow-right"></i></a></footer>
					</article> <!-- /.accordion-card -->
				</div>

	    </div>
	  </div>
	</section>

  <section id="special">
      <div class="screen">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-sm-6 col-xs-6">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <h2>Get 30% Discount</h2>
                <p>Dummy Text, Your Here!</p>
                <p>Dummy Text, Your Here!</p>
                <p>Dummy Text, Your Here!</p>
                <button class="btn btn-success">Read More</button>
              </div>
          </div>
      </div>
      </div>
  </section>

  <section id="blog">
      <div class="container">
          <h2>News & Articles</h2>
          <div class="row feat">

              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item_border">
                  <img src="img/hotel.jpg" />
                    <div class="wrapper_content">
											<div class="post_title"><h4>
												<a href="single-tour.html" rel="bookmark">Kiwiana Panorama</a>
											</h4></div>
											<span class="post_date"><i class="fa fa-calendar"></i> Jan 19, 2017</span>
									 </div>

                   <div class="read_more">
										<a href="single-tour.html" class="read_more_button">READ MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>

                </div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item_border">
                <img src="img/hotel2.jpg" />
                  <div class="wrapper_content">
                    <div class="post_title"><h4>
                      <a href="single-tour.html" rel="bookmark">Kiwiana Panorama</a>
                    </h4></div>
                    <span class="post_date"><i class="fa fa-calendar"></i> Jan 19, 2017</span>
                  </div>

                  <div class="read_more">
										<a href="single-tour.html" class="read_more_button">READ MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>

                </div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item_border">
                <img src="img/hotel.jpg" />
                  <div class="wrapper_content">
											<div class="post_title"><h4>
												<a href="single-tour.html" rel="bookmark">Kiwiana Panorama</a>
											</h4></div>
											<span class="post_date"><i class="fa fa-calendar"></i> Jan 19, 2017</span>
									</div>
                  <div class="read_more">
										<a href="single-tour.html" class="read_more_button">READ MORE
											<i class="fa fa-long-arrow-right"></i></a>
										<div class="clear"></div>
									</div>
								</div>
              </div>

              <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item_border">
                <img src="img/hotel2.jpg" />
                  <div class="wrapper_content">
										<div class="post_title"><h4>
											<a href="single-tour.html" rel="bookmark">Kiwiana <br/>Panorama</a>
										</h4></div>
										<span class="post_date"><i class="fa fa-calendar"></i> Jan 19, 2017</span>
									</div>
                  <div class="read_more">
    								<a href="single-tour.html" class="read_more_button">READ MORE
    									<i class="fa fa-long-arrow-right"></i></a>
    								<div class="clear"></div>
    							</div>
								</div>
              </div>

          </div>
      </div>
  </section>


  <div class="subscribe-email">
      <div class="container">
          <div class="subscribe-email-wrapper">
              <div class="col-md-8 col-sm-8 col-xs-12">
                  <p class="subscribe-email-title">SUBSCRIBE TO OUR NEWSLETTER</br> <i>to get latest offers and deals!</i></p>
              </div>
              <div class="col-md-4 col-sm-4 col-xs-12">
                  <form action="index.html">
                      <div class="input-group form-subscribe-email"><input type="text" placeholder="Write your email" class="form-control"><span class="input-group-btn"><button type="submit" class="btn-email">→</button></span></div>
                  </form>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
  </div>
@endsection