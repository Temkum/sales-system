  <!DOCTYPE html>
  <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <meta name="description" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- all css here -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/bootstrap.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/animate.css') }}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/jquery-ui.min.css') }}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/meanmenu.min.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/owl.carousel.css') }}">
    <!-- slick css -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/slick.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/font-awesome.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/style.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/responsive.css') }}">
    <!-- modernizr js -->
    <script src="js/modernizr-2.8.3.min.js"></script>
  </head>

  <body>
    <header class="header-pos">
      <div class="header-bottom-area">
        <div class="container">
          <div class="inner-container">
            <div class="row">
              <div class="col-md-2 col-sm-4 col-xs-5">
                <div class="logo">
                  <a href="{{ route('home') }}">
                    <img src="{{ asset('assets/home/images/logo-white-text.png') }}" alt="">
                  </a>
                </div>
              </div>
              <div class="col-md-8 hidden-xs hidden-sm">
                <div class="main-menu">
                  <nav>
                    <ul>
                      <li><a href="{{ route('home') }}">Home</a></li>
                      <li><a href="about.html">about</a></li>
                      <li class="static"><a href="{{ route('shop') }}">shop</a>
                        <div class="mega-menu">
                          <div class="mega-left">
                            <span>
                              <a href="#" class="mega-title">WOMEN CLOTH</a>
                              <a href="#">casual suit</a>
                              <a href="#">business suit</a>
                            </span>
                            <span>
                              <a href="#" class="mega-title">MEN CLOTH</a>
                              <a href="#">casual suit</a>
                              <a href="#">business Suit</a>
                              <a href="#">Tuxedo</a>
                            </span>
                          </div>
                          <div class="mega-right">
                            <span class="mega-menu-img">
                              <a href="shop.html"><img alt=""
                                  src="{{ asset('assets/home/images/1_2.jpg') }}"></a>
                            </span>
                          </div>
                        </div>
                      </li>
                      <li><a href="contact.html">contact</a></li>
                    </ul>
                  </nav>
                </div>
              </div>
              <div class="col-md-2 col-sm-8 col-xs-7 header-right">
                <div class="user-meta">
                  <a href="#"><i class="fa fa-cog"></i></a>
                  <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Testimonial</a></li>
                    <li><a href="{{ route('login') }}">Log in</a></li>
                  </ul>
                </div>
                <div class="header-search">
                  <i class="fa fa-search"></i>
                  <div class="header-form">
                    <form action="#">
                      <input type="text" placeholder="search">
                      <button><i class="fa fa-search"></i></button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- header-bottom-area end -->
      <!-- mobile-menu-area start -->
      <div class="mobile-menu-area visible-xs visible-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="mobile-menu">
                <nav id="dropdown">
                  <ul>
                    <li><a href="index.html">Home</a>
                      <ul>
                        <li><a href="index.html">Homepage Version 1</a></li>
                        <li><a href="index-2.html">Homepage Version 2</a></li>
                        <li><a href="index-3.html">Homepage Version 3</a></li>
                      </ul>
                    </li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="blog.html">blog</a></li>
                    <li><a href="shop.html">Shop</a>
                      <ul>
                        <li><a href="#">WOMEN CLOTH</a>
                          <ul>
                            <li><a href="shop.html">casual shirt</a></li>
                            <li><a href="shop.html">rikke t-shirt</a></li>
                            <li><a href="shop.html">mia top </a></li>
                            <li><a href="shop.html">muscle tee</a></li>
                          </ul>
                        </li>
                        <li><a href="#">MEN CLOTH</a>
                          <ul>
                            <li><a href="shop.html">casual shirt</a></li>
                            <li><a href="shop.html">rikke t-shirt</a></li>
                            <li><a href="shop.html">mia top </a></li>
                            <li><a href="shop.html">muscle tee</a></li>
                          </ul>
                        </li>
                        <li><a href="#">WOMEN JEWELRY</a>
                          <ul>
                            <li><a href="shop.html">necklace </a></li>
                            <li><a href="shop.html">chunky short striped</a></li>
                            <li><a href="shop.html">samhar cuff </a></li>
                            <li><a href="shop.html">nail set</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="shop.html">Footwear </a></li>
                    <li><a href="#">Pages</a>
                      <ul>
                        <li><a href="about.html">about</a></li>
                        <li><a href="blog.html">blog</a></li>
                        <li><a href="blog-2-column.html">blog 2 column</a></li>
                        <li><a href="blog-full-width.html">blog full width</a></li>
                        <li><a href="blog-right-sidebar.html">blog right sidebar</a></li>
                        <li><a href="single-blog.html">single blog</a></li>
                        <li><a href="single-blog-video.html">single blog video</a></li>
                        <li><a href="cart.html">shopping cart</a></li>
                        <li><a href="checkout.html">checkout</a></li>
                        <li><a href="wishlist.html">wishlist</a></li>
                        <li><a href="contact.html">contact</a></li>
                        <li><a href="login.html">login</a></li>
                        <li><a href="shop.html">shop</a></li>
                        <li><a href="product-details.html">product details</a></li>
                        <li><a href="shop-full-width.html">shop full width</a></li>
                        <li><a href="shop-right-sidebar.html">shop right sidebar</a></li>
                        <li><a href="404.html">404 error</a></li>
                      </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- mobile-menu-area end -->
    </header>
    <!-- slider start -->
    <div class="slider-area">
      <div class="slider-active">
        <div class="single-slider slide-height d-flex align-items-center"
          style="background-image:url({{ asset('assets/home/images/slide2.jpg') }})">
          <div class="container">
            <div class="row">
              <div class="col-xl-10 offset-xl-1">
                <div class="slide-content text-center">
                  <h6 data-animation="fadeInUp" data-delay=".5s">We are the best</h6>
                  <h1 data-animation="fadeInUp" data-delay="1s">Trendy Collection {{ Date('Y') }}</h1>
                  <a class="btn btn-rounded" href="{{ route('about') }}" data-animation="fadeInUp"
                    data-delay="1.5s">learn more
                    <i class="icofont icofont-location-arrow"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="single-slider slide-height d-flex align-items-center"
          style="background-image:url({{ asset('assets/homeimages/slide1.jpg') }})">
          <div class="container">
            <div class="row">
              <div class="col-xl-10 offset-xl-1">
                <div class="slide-content text-center">
                  <h6 data-animation="fadeInUp" data-delay=".5s">Top fashion for men</h6>
                  <h1 data-animation="fadeInUp" data-delay="1s"> Best Fashion For Men</h1>
                  <a class="btn btn-rounded" href="{{ route('about') }}" data-animation="fadeInUp"
                    data-delay="1.5s">learn more
                    <i class="icofont icofont-location-arrow"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="single-slider slide-height d-flex align-items-center"
          style="background-image:url({{ 'assets/home/images/slide2.jpg' }})">
          <div class="container">
            <div class="row">
              <div class="col-xl-10 offset-xl-1">
                <div class="slide-content text-center">
                  <h6 data-animation="fadeInUp" data-delay=".5s">Best Fashion For Lady</h6>
                  <h1 data-animation="fadeInUp" data-delay="1s">Top fashion for men</h1>
                  <a class="btn" href="#" data-animation="fadeInUp" data-delay="1.5s">learn more
                    <i class="icofont icofont-location-arrow"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- banner-area start -->
    <div class="banner-area pad-60">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6">
            <div class="single-banner">
              <a href="#">
                <img src="{{ asset('assets/home/images/tux11.jpg') }}" alt=""="">
                <div class="banner-caption">
                  <h2>Men's <span>Sunglasses</span></h2>
                  <p>Our sunglasses and retro frames are all shades of great.</p>
                </div>
              </a>
            </div>
            <div class="single-banner marg-20">
              <a href="#">
                <img src="{{ asset('assets/home/images/tux10.jpg') }}" alt="">
                <div class="banner-caption">
                  <h2>Men's <span>Watches</span></h2>
                  <p>Designer or digital, vintage or leather - it's time to get smart.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-4 col-sm-6">
            <div class="single-banner">
              <a href="#">
                <img src="{{ asset('assets/home/images/tux.jpg') }}" alt="">
                <div class="banner-caption">
                  <h2>New Men's <span> style</span></h2>
                  <p>Style it like a boss with this week's most hyped T-shirts.</p>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="single-banner">
              <a href="#">
                <img src="{{ asset('assets/home/images/tux9.jpg') }}" alt="">
                <div class="banner-caption">
                  <h2>Men's <span>Shoes</span></h2>
                  <p>Marley tried to convince her but she was not interested.</p>
                </div>
              </a>
            </div>
            <div class="single-banner marg-20">
              <a href="#">
                <img src="{{ asset('assets/home/images/tux14.jpg') }}" alt="">
                <div class="banner-caption">
                  <h2><span> Sunglasses</span></h2>
                  <p>Our sunglasses and retro frames are all shades of great.</p>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- featured-area start -->
    <div class="featured-area pad-60">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2>Most Popular product</h2>
            <div class="title-icon">
              <span><i class="fa fa-angle-left"></i> <i class="fa fa-angle-right"></i></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="product-tab">
              <!-- Nav tabs -->
              <ul class="product-nav" role="tablist">
                <li role="presentation" class="active"><a href="{{ route('home') }}" aria-controls="home"
                    role="tab" data-toggle="tab">most popular</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                    data-toggle="tab">trending</a></li>
                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab"
                    data-toggle="tab">new arrival</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                  <div class="row">
                    <div class="product-curosel">
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details">
                              <img src="{{ asset('assets/home/images/tux1.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/tux3.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                          <div class="product-content">
                            <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                            <div class="price">
                              <span>$70.00</span>
                              <span class="old">$80.11</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/tux3.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/tux4.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/tux5.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/tux6.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/tux7.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/tux8.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                          <div class="product-content">
                            <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                            <div class="price">
                              <span>$80.00</span>
                              <span class="old">$90.11</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/tux9.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/tux10.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/tux11.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/tux12.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/tux13.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/tux14.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/tux15.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/tux16.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product end -->
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="profile">
                  <div class="row">
                    <div class="product-curosel">
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/17.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/18.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/19.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/20.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/21.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/22.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/23.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/6_1.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/2.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/1_3.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/4.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/3_1.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/6_1.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/5_1.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                          <div class="product-content">
                            <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                            <div class="price">
                              <span>$80.00</span>
                              <span class="old">$90.11</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/7.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/8.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product end -->
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="messages">
                  <div class="row">
                    <div class="product-curosel">
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/10.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/9.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/12.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/11.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/14.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/13.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/16.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/15.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                          <div class="product-content">
                            <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                            <div class="price">
                              <span>$80.00</span>
                              <span class="old">$90.11</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product end -->
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/18.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/17.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/20.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/19.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                          <div class="product-content">
                            <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                            <div class="price">
                              <span>$80.00</span>
                              <span class="old">$90.11</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product end -->
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/21.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/22.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                          <div class="product-content">
                            <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                            <div class="price">
                              <span>$80.00</span>
                              <span class="old">$90.11</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product end -->
                      <!-- single-product start -->
                      <div class="col-md-12">
                        <div class="single-product">
                          <div class="product-img">
                            <a href="product-details.html">
                              <img src="{{ asset('assets/home/images/23.jpg') }}" alt="">
                              <img class="secondary-img" src="{{ asset('assets/home/images/5_1.jpg') }}"
                                alt="">
                            </a>
                            <span class="tag-line">new</span>
                            <div class="product-action">
                              <div class="button-top">
                                <a href="#" data-toggle="modal" data-target="#productModal"><i
                                    class="fa fa-search"></i></a>
                                <a href="#"><i class="fa fa-heart"></i></a>
                              </div>
                              <div class="button-cart">
                                <button><i class="fa fa-shopping-cart"></i> Place request</button>
                              </div>
                            </div>
                          </div>
                          <div class="product-content">
                            <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                            <div class="price">
                              <span>$80.00</span>
                              <span class="old">$90.11</span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- single-product end -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- featured-area end -->
    <!-- upcoming-product-area start -->
    <div class="upcoming-product-area pad-60">
      <div class="container">
        <div class="row">
          <div class="upcoming-curosel">
            <!-- upcoming-single start -->
            <div class="upcoming-single">
              <div class="col-md-4 col-sm-4">
                <div class="upcoming-img">
                  <a href="product-details.html"><img src="{{ asset('assets/home/images/9.jpg') }}"
                      alt=""></a>
                </div>
              </div>
              <div class="col-md-8 col-sm-8">
                <div class="upcoming-content">
                  <h2><a href="#">Lorem ipsum dolor</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                    ut
                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                    tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor
                    in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                    facilisis
                    at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue
                    duis dolore te feugait nulla facilisi.Nam liber tempor cum.</p>
                  <div class="timer">
                    <div data-countdown="2018/07/01"></div>
                  </div>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- upcoming-single end -->
            <!-- upcoming-single start -->
            <div class="upcoming-single">
              <div class="col-md-4 col-sm-4">
                <div class="upcoming-img">
                  <a href="product-details.html"><img src="{{ asset('assets/home/images/w1.jpg') }}"
                      alt=""></a>
                </div>
              </div>
              <div class="col-md-8 col-sm-8">
                <div class="upcoming-content">
                  <h2><a href="#">Lorem ipsum dolor</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                    ut
                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                    tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor
                    in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                    facilisis
                    at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue
                    duis dolore te feugait nulla facilisi.Nam liber tempor cum.</p>
                  <div class="timer">
                    <div data-countdown="2018/08/01"></div>
                  </div>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- upcoming-single end -->
            <!-- upcoming-single start -->
            <div class="upcoming-single">
              <div class="col-md-4 col-sm-4">
                <div class="upcoming-img">
                  <a href="product-details.html"><img src="{{ asset('assets/home/images/5_1.jpg') }}"
                      alt=""></a>
                </div>
              </div>
              <div class="col-md-8 col-sm-8">
                <div class="upcoming-content">
                  <h2><a href="#">Lorem ipsum dolor</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                    ut
                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                    tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor
                    in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                    facilisis
                    at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue
                    duis dolore te feugait nulla facilisi.Nam liber tempor cum.</p>
                  <div class="timer">
                    <div data-countdown="2018/08/01"></div>
                  </div>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- upcoming-single end -->
            <!-- upcoming-single start -->
            <div class="upcoming-single">
              <div class="col-md-4 col-sm-4">
                <div class="upcoming-img">
                  <a href="product-details.html"><img src="{{ asset('assets/home/images/w9.jpg') }}"
                      alt=""></a>
                </div>
              </div>
              <div class="col-md-8 col-sm-8">
                <div class="upcoming-content">
                  <h2><a href="#">Lorem ipsum dolor</a></h2>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                    ut
                    laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                    tation
                    ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
                    dolor
                    in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                    facilisis
                    at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue
                    duis dolore te feugait nulla facilisi.Nam liber tempor cum.</p>
                  <div class="timer">
                    <div data-countdown="2018/08/01"></div>
                  </div>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- upcoming-single end -->
          </div>
        </div>
      </div>
    </div>
    <!-- upcoming-product-area end -->
    <!-- category-area start -->
    <div class="category-area pad-60">
      <div class="container">
        <div class="row">
          <div class="section-title">
            <h2>Exclusive collection</h2>
            <div class="title-icon">
              <span><i class="fa fa-angle-left"></i> <i class="fa fa-angle-right"></i></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="product-curosel">
            <!-- single-product start -->
            <div class="col-md-12">
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/2.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/1_3.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$70.00</span>
                    <span class="old">$80.11</span>
                  </div>
                </div>
              </div>
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/5_1.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/7.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$70.00</span>
                    <span class="old">$80.11</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- single-product end -->
            <!-- single-product start -->
            <div class="col-md-12">
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/16.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/14.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/13.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/12.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- single-product end -->
            <!-- single-product start -->
            <div class="col-md-12">
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/11.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/6_1.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/9.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/8.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- single-product end -->
            <!-- single-product start -->
            <div class="col-md-12">
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/7.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/8.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/5_1.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/2.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- single-product end -->
            <!-- single-product start -->
            <div class="col-md-12">
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/1_3.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/2.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/9.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/10.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- single-product end -->
            <!-- single-product start -->
            <div class="col-md-12">
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/12.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/18.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/7.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/12.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- single-product end -->
            <!-- single-product start -->
            <div class="col-md-12">
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/16.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/17.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/8.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/9.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- single-product end -->
            <!-- single-product start -->
            <div class="col-md-12">
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/9.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/10.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
              <div class="single-product">
                <div class="product-img">
                  <a href="product-details.html">
                    <img src="{{ asset('assets/home/images/12.jpg') }}" alt="">
                    <img class="secondary-img" src="{{ asset('assets/home/images/9.jpg') }}" alt="">
                  </a>
                  <span class="tag-line">new</span>
                  <div class="product-action">
                    <div class="button-top">
                      <a href="#" data-toggle="modal" data-target="#productModal"><i
                          class="fa fa-search"></i></a>
                      <a href="#"><i class="fa fa-heart"></i></a>
                    </div>
                    <div class="button-cart">
                      <button><i class="fa fa-shopping-cart"></i> Place request</button>
                    </div>
                  </div>
                </div>
                <div class="product-content">
                  <h3><a href="product-details.html">Lorem ipsum dolor</a></h3>
                  <div class="price">
                    <span>$80.00</span>
                    <span class="old">$90.11</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- single-product end -->
          </div>
        </div>
      </div>
    </div>

    <!-- footer start -->
    <footer>
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="footer-logo">
                <img src="{{ asset('assets/home/images/logo-white-text.jpg') }}" alt="">
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt
                  ut
                  laoreet dolore <br> magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                  tation.</p>
                <div class="widget-icon">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-google-plus"></i></a>
                  <a href="#"><i class="fa fa-vimeo-square"></i></a>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer-top-area start -->
      <div class="footer-top-area">
        <div class="container">
          <div class="row">
            <!-- footer-widget start -->
            <div class="col-lg-3 col-md-3 col-sm-4">
              <div class="footer-widget">
                <h3>CONTACT US</h3>
                <ul class="footer-contact">
                  <li>
                    <i class="fa fa-map-marker"> </i>
                    Addresss: City of London, Guildhall, PO Box 270
                  </li>
                  <li>
                    <i class="fa fa-envelope"> </i>
                    Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                      data-cfemail="d3b2b7bebabd9391b2a0bab087bbb6beb6fdb0bcbe">[email protected]</a>
                  </li>
                  <li>
                    <i class="fa fa-phone"> </i>
                    Phone: +123 455657589
                  </li>
                </ul>
              </div>
            </div>
            <!-- footer-widget end -->
            <!-- footer-widget start -->
            <div class="col-lg-3 col-md-3 hidden-sm">
              <div class="footer-widget">
                <h3>My account</h3>
                <ul class="footer-menu">
                  <li><a href="{{ route('login') }}">Admin Login</a></li>
                  <li><a href="#">Worker Panel</a></li>
                </ul>
              </div>
            </div>
            <!-- footer-widget end -->
            <!-- footer-widget start -->
            <div class="col-lg-3 col-md-3 col-sm-4">
              <div class="footer-widget">
                <h3>about us</h3>
                <ul class="footer-menu">
                  <li><a href="#">Delivery</a></li>
                  <li><a href="#">Payment</a></li>
                  <li><a href="#">Return Policy</a></li>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
            </div>
            <!-- footer-widget end -->
            <!-- footer-widget start -->
            <div class="col-lg-3 col-md-3 col-sm-4">
              <div class="footer-widget">
                <h3>Product tags</h3>
                <div class="product-tag">
                  <ul>
                    <li><a href="#">Top</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Collection</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">men</a></li>
                    <li><a href="#">gallery</a></li>
                    <li><a href="#">new</a></li>
                    <li><a href="#">Collection men</a></li>
                    <li><a href="#">Top</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Collection</a></li>
                    <li><a href="#">best</a></li>
                    <li><a href="shop.html">cloth</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- footer-widget end -->
          </div>
        </div>
      </div>
      <!-- footer-top-area end -->
      <!-- footer-bottom-area start -->
      <div class="footer-bottom-area">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="copyright">
                <p>Copyright © <a href="#">BasicTheme</a>. All Rights Reserved</p>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
              <div class="payment-img">
                <img src="{{ asset('assets/home/images/payment.jpg') }}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer-bottom-area end -->
    </footer>
    <!-- footer end -->

    <script data-cfasync="false" src="{{ asset('assets/home/js/email-decode.min.js') }}"></script>
    <script src="{{ asset('assets/home/js/jquery-1.12.0.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/home/js/bootstrap.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('assets/home/js/owl.carousel.min.js') }}"></script>
    <!-- meanmenu js -->
    <script src="{{ asset('assets/home/js/jquery.meanmenu.js') }}"></script>
    <!-- jquery-ui js -->
    <script src="{{ asset('assets/home/js/jquery-ui.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/home/js/wow.min.js') }}"></script>
    <!-- plugins js -->
    <script src="{{ asset('assets/home/js/plugins.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/home/js/main.js') }}"></script>


  </body>

  </html>
