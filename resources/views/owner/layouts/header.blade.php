<section id="header">
    <div class="header-area">
        <div class="top_header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 zero_mp">
                        <div class="address">
                            @if(Auth::guard('owner')->check())
                                <i class="fa fa-envelope floatleft"></i>
                                <p>{{ Auth::guard('owner')->user()->email }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="social_icon text-right">
                            <a href=""><i class="fa fa-facebook"></i></a>
                            <a href=""><i class="fa fa-twitter"></i></a>
                            <a href=""><i class="fa fa-google-plus"></i></a>
                            <a href=""><i class="fa fa-youtube"></i></a>
                            @if(Auth::guard('owner')->check())
                                <a href="#" id="signOutButton" class="log">Sign out</a>

                                <form method="POST" id="signOutForm" action="/owner/signout" hidden>
                                    {{ csrf_field() }}
                                </form>
                            @else
                                <a href="/owner/signin" class="log">Sign in</a>
                            @endif
                        </div>
                    </div>
                    <!--End of col-md-4-->
                </div>
                <!--End of row-->
            </div>
            <!--End of container-->
        </div>
        <!--End of top header-->
        <div class="header_menu text-center affix-top" data-spy="affix" data-offset-top="50" id="nav">
            <div class="container">
                <nav class="navbar navbar-default zero_mp ">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand custom_navbar-brand" href="#">SiteName</a>
                    </div>
                    <!--End of navbar-header-->

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse zero_mp" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right main_menu">
                            <li class="active"><a href="#header">Home <span class="sr-only">(current)</span></a></li>
                            <li class=""><a href="#welcome">Explore</a></li>
                            <li class=""><a href="#portfolio">Promos</a></li>
                            <li class=""><a href="#counter">News & Articles</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
                <!--End of nav-->
            </div>
            <!--End of container-->
        </div>
        <!--End of header menu-->
    </div>
    <!--end of header area-->
</section>