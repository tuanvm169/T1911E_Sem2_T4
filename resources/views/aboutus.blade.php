@extends("layouts.shop")
@section("content")
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>GIỚI THIỆU</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Giới thiệu</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start About Page  -->
    <div class="about-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="banner-frame"><img class="img-fluid" src="{{asset('shop/images/about-img.jpg')}}"
                                                   alt=""/>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="noo-sh-title-top">We are <span>Freshshop</span></h2>
                    <p>"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                        laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto
                        beatae vitae dicta sunt explicabo. Nemo enim ipsam
                        voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores
                        eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia
                        dolor sit amet, consectetur, adipisci velit,
                        sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat
                        voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit
                        laboriosam, nisi ut aliquid ex ea commodi consequatur?
                        Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae
                        consequatur.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <a class="btn hvr-hover" href="#">Read More</a>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Trusted</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Professional</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. </p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="service-block-inner">
                        <h3>We are Expert</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. </p>
                    </div>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-12">
                    <h2 class="noo-sh-title">Meet Our Team</h2>
                </div>
                @foreach($lsUser as $user)
                    <div class="col-sm-6 col-lg-3">
                        <div class="hover-team">
                            <div class="our-team"><img src="{{$user->avatar}}" alt=""/>
                                <div class="team-content">
                                    <h3 class="title">{{$user->name}}</h3> <span
                                        class="post">{{$user->role_name}}</span></div>
                                <ul class="social">
                                    <li>
                                        <a href="#" class="fab fa-facebook"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fab fa-twitter"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fab fa-google-plus"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="fab fa-youtube"></a>
                                    </li>
                                </ul>
                                <div class="icon"><i class="fa fa-plus" aria-hidden="true"></i></div>
                            </div>
                            <hr class="my-0">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End About Page -->
@endsection
