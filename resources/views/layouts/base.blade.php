<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.ico')}}">
    <link
        href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/chosen.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/color-01.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/flexslider.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/sweetalert2.min.css') }}"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
          integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.css"
          integrity="sha512-40vN6DdyQoxRJCw0klEUwZfTTlcwkOLKpP8K8125hy9iF4fi8gPpWZp60qKC6MYAFaond8yQds7cTMVU8eMbgA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    @livewireStyles
</head>

<body class="home-page home-01 ">
@include('sweetalert::alert')

@if (app()->isLocal()) @endif
<!-- mobile menu -->
<div class="mercado-clone-wrap">
    <div class="mercado-panels-actions-wrap">
        <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
    </div>
    <div class="mercado-panels"></div>
</div>

<!--header-->
<header id="header" class="header header-style-1">
    <div class="container-fluid">
        <div class="row">
            <div class="topbar-menu-area">
                <div class="container">
                    <div class="topbar-menu left-menu">
                        <ul>
                            <li class="menu-item">
                                <a title="Hotline: (+123) 456 789" href="#"><span
                                        class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
                            </li>
                        </ul>
                    </div>
                    <div class="topbar-menu right-menu">
                        <ul>

                            <li class="menu-item lang-menu menu-item-has-children parent">
                                <a title="English" href="#"><span class="img label-before"><img
                                            src="{{asset('assets/images/lang-en.png')}}"
                                            alt="lang-en"></span>English<i class="fa fa-angle-down"
                                                                           aria-hidden="true"></i></a>
                                <ul class="submenu lang">
                                    <li class="menu-item"><a title="hungary" href="#"><span
                                                class="img label-before"><img
                                                    src="{{asset('assets/images/lang-hun.png')}}"
                                                    alt="lang-hun"></span>Hungary</a></li>
                                    <li class="menu-item"><a title="german" href="#"><span
                                                class="img label-before"><img
                                                    src="{{asset('assets/images/lang-ger.png')}}"
                                                    alt="lang-ger"></span>German</a>
                                    </li>
                                    <li class="menu-item"><a title="french" href="#"><span
                                                class="img label-before"><img
                                                    src="{{asset('assets/images/lang-fra.png')}}"
                                                    alt="lang-fre"></span>French</a>
                                    </li>
                                    <li class="menu-item"><a title="canada" href="#"><span
                                                class="img label-before"><img
                                                    src="{{asset('assets/images/lang-can.png')}}"
                                                    alt="lang-can"></span>Canada</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children parent">
                                <a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down"
                                                                                aria-hidden="true"></i></a>
                                <ul class="submenu curency">
                                    <li class="menu-item">
                                        <a title="Pound (GBP)" href="#">Pound (GBP)</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Euro (EUR)" href="#">Euro (EUR)</a>
                                    </li>
                                    <li class="menu-item">
                                        <a title="Dollar (USD)" href="#">Dollar (USD)</a>
                                    </li>
                                </ul>
                            </li>
                            @if (Route::has('login'))
                                @auth
                                    @if(Auth::user()->utype === 'ADM')
                                        <li class="menu-item menu-item-has-children parent">
                                            <a title="My Account" href="#">My Account Admin {{Auth::user()->name}}<i
                                                    class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency">
                                                <li class="menu-item">
                                                    <a title="Dashboard"
                                                       href="{{ route('admin.dashboard')}}">Dashboard</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="products"
                                                       href="{{ route('admin.categories') }}">category</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Products" href="{{route('admin.products')}}">Products</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Manager Home Slider" href="{{route('admin.slider')}}">Manager
                                                        Home
                                                        Slider</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Manager Home Slider"
                                                       href="{{route('admin.add.categories.home')}}"> Manager Home
                                                        Categories</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Sale Settings" href="{{route('admin.sale')}}">Sale
                                                        Settings</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Coupons" href="{{route('admin.coupons')}}">Coupons</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Orders" href="{{route('admin.orders')}}">Orders</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Contact" href="{{route('admin.contact')}}">Contact</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Settings" href="{{route('admin.settings')}}">Settings</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{route('logout')}}"
                                                       onclick="event.preventDefault(); document.querySelector('#logout-form').submit();">Logout</a>
                                                </li>

                                                <form id="logout-form" method="POST" action='{{route('logout')}}'>
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                    @else
                                        <li class="menu-item menu-item-has-children parent">
                                            <a title="My Account" href="#">My Account {{Auth::user()->name}}<i
                                                    class="fa fa-angle-down" aria-hidden="true"></i></a>
                                            <ul class="submenu curency">
                                                <li class="menu-item">
                                                    <a title="Dashboard"
                                                       href="{{ route('user.dashboard')}}">Dashboard</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="My Orders" href="{{route('user.orders')}}">My Orders</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a title="Change Password" href="{{route('user.change.password')}}">Change
                                                        Password</a>
                                                </li>
                                                <li class="menu-item">
                                                    <a href="{{route('logout')}}"
                                                       onclick="event.preventDefault();document.getElementById('form').submit();">Logout</a>
                                                </li>
                                                <form id="form" method="POST" action='{{route('logout')}}'>
                                                    @csrf
                                                </form>
                                            </ul>
                                        </li>
                                    @endif
                                @else
                                    <li class="menu-item"><a title="Register or Login"
                                                             href="{{route('login')}}">Login</a>
                                    </li>
                                    <li class="menu-item"><a title="Register or Login"
                                                             href="{{route('register')}}">Register</a></li>
                                @endif
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="mid-section main-info-area">

                    <div class="wrap-logo-top left-section">
                        <a href="{{route('home')}}" class="link-to-home"><img
                                src="{{asset('assets/images/logo-top-1.png')}}" alt="mercado"></a>
                    </div>

                    <livewire:header-search-component/>
                    <div class="wrap-icon right-section">
                        @if(Auth::check())
                            <livewire:wishlist-count-component/>
                            <livewire:cart-count-component/>
                        @endif
                        <div class="wrap-icon-section show-up-after-1024">
                            <a href="#" class="mobile-navigation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-section header-sticky">
                <div class="header-nav-section">
                    <div class="container">
                        <ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info">
                            <li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span
                                    class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span
                                    class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top new items</a><span
                                    class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top Selling</a><span
                                    class="nav-label hot-label">hot</span></li>
                            <li class="menu-item"><a href="#" class="link-term">Top rated items</a><span
                                    class="nav-label hot-label">hot</span></li>
                        </ul>
                    </div>
                </div>

                <div class="primary-nav-section">
                    <div class="container">
                        <ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu">
                            <li class="menu-item home-icon">
                                <a href="{{route('home')}}" class="link-term mercado-item-title"><i
                                        class="fa fa-home" aria-hidden="true"></i></a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="link-term mercado-item-title">About Us</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('shop')}}" class="link-term mercado-item-title">Shop</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('product.cart')}}" class="link-term mercado-item-title">Cart</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('product.checkout')}}"
                                   class="link-term mercado-item-title">Checkout</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{route('home.contact')}}" class="link-term mercado-item-title">Contact
                                    Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- main  -->
{{$slot}}

<!-- footer -->
<livewire:footer-component>


    <script src="{{asset('assets/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
    <script src="{{asset('assets/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.flexslider.js')}}"></script>
    {{--<script src="{{asset('assets/js/chosen.jquery.min.js')}}"></script>--}}
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.sticky.js')}}"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/sweetalert2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
            integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"
            integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.7.0/nouislider.min.js"
            integrity="sha512-jWNpWAWx86B/GZV4Qsce63q5jxx/rpWnw812vh0RE+SBIo/mmepwOSQkY2eVQnMuE28pzUEO7ux0a5sJX91g8A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tiny.cloud/1/42v197tovchx9nor26m7h3os2x09t2qmi0jf2ed8zea2cc9h/tinymce/5/tinymce.min.js"
            referrerpolicy="no-referrer"></script>
@stack('scripts')
@livewireScripts
</body>

</html>
