<!DOCTYPE html>
<html lang="en">
<head>
    <title>Colo Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/bootstrap4/bootstrap.min.css')}}">
    <link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/main_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/single_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/single_responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/contact_styles.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('styles/contact_responsive.css')}}">
</head>

<body>

<div class="super_container">

    <header class="header trans_300">

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                            <a href="{{route('home')}}">VNT<span>shop</span></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                @if(!(\Illuminate\Support\Facades\Auth::user()->name??""))
                                    <li><a href="{{route('home')}}">home</a></li>
                                    <li><a href="{{route('contact')}}">contact</a></li>
                                    <li><a href="{{route('user.formRegister')}}">sing up</a></li>
                                    <li><a href="{{route('user.formSingIn')}}">sing in</a></li>
                                @else
                                    <li><a href="{{route('home')}}">home</a></li>
                                    <li><a href="{{route('contact')}}">contact</a></li>
                                @endif
                            </ul>
                            <ul class="navbar_user">
                                <li>
                                    <form action="{{route('products.search')}}" method="post">
                                        @csrf
                                    <div class="input-group rounded">
                                            <input type="search" class="form-control rounded fa fa-search" name="key" placeholder="Search"/>
                                    </div>
                                    </form>
                                </li>
                                <li class="account">
                                    <i class="fa fa-user "
                                       aria-hidden="true">
                                        {{\Illuminate\Support\Facades\Auth::user()->name??""}}
                                    </i>
                                    <ul class="account_selection">
                                        <li><a href="{{route('user.logOut')}}"><i class="fa fa-sign-out"
                                                                                  aria-hidden="true"></i></a></li>
                                        <li><a href="{{route('user.formEdit')}}"><i class="fa fa-edit"
                                                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </li>
                                @php($products = session('cart') ?? $products = [] )
                                <li class="checkout">
                                    <a href="{{ route('cart-list') }}">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="checkout_items" class="checkout_items">{{count($products)}}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div
                        class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="contact.html">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div
                        class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('styles/bootstrap4/popper.js')}}"></script>
<script src="{{asset('styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{asset('plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{asset('plugins/easing/easing.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="{{asset('js/contact_custom.js')}}"></script>

</body>
</html>
