<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"> 

    <!-- Libraries Stylesheet -->
    <link href="{{asset('home/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('home/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('home/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->

    <!-- Template Stylesheet -->
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet">
    @livewireStyles
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>BigBen</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbar"
            aria-expanded="false" aria-controls="collapseExample">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar" >
            <div class="navbar-nav ms-auto p-4 p-lg-0 " style="justify-content: end;">
                @guest
                <a href="{{route('home_landing')}}" class="nav-item nav-link {{ Route::currentRouteName() == "home_landing" ? 'active':'' }}">Home</a>
                <a href="{{route('home_about')}}" class="nav-item nav-link {{ Route::currentRouteName() == "home_about" ? 'active':'' }}">About</a>
                <a href="{{route('courses_index')}}" class="nav-item nav-link {{ Route::currentRouteName() == "courses_index" ? 'active':'' }}">Courses</a>
                <!--<div class="nav-item dropdown">-->
                <!--    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>-->
                <!--    <div class="dropdown-menu fade-down m-0">-->
                <!--        <a href="" class="dropdown-item">Our Team</a>-->
                <!--        <a href="" class="dropdown-item">Testimonial</a>-->
                <!--        <a href="" class="dropdown-item">404 Page</a>-->
                <!--    </div>-->
                <!--</div>-->
                <a href="{{route('home_contact')}}" class="nav-item nav-link {{ Route::currentRouteName() == "home_contact" ? 'active':'' }}">Contact</a>
                <a href="{{route('login')}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Join Now<i class="fa fa-arrow-right ms-3"></i></a>
                @else
                    @auth
                        <a href="{{route('home_landing')}}" class="nav-item nav-link {{ Route::currentRouteName() == "home_landing" ? 'active':'' }}">Home</a>
                        <a href="{{route('home_about')}}" class="nav-item nav-link {{ Route::currentRouteName() == "home_about" ? 'active':'' }}">About</a>
                        <a href="{{route('courses_index')}}" class="nav-item nav-link {{ Route::currentRouteName() == "courses_index" ? 'active':'' }}">Courses</a>
                        <div class="nav-item dropdown"style="width: 10%;">
                            <a class="dropdown-toggle nav-link dropdown-user-link w-25" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false" >                                 
                                <span class="user-name text-bold-700">{{auth()->user()->name}}</span>
                                </span>
                                <span class="avatar avatar-online">
                                <img src="{{asset('images/lechef.jpg')}}" alt="avatar"><i></i></span>
                            </a>
                            <div class="dropdown-menu fade-down m-0"  aria-labelledby="dropdownMenuButton">
                               <a href="" class="dropdown-item">profile</a>
                                <a href="" class="dropdown-item">My courses</a>
                                @if(auth()->user()->utype ==="ADM")
                                <a href="{{route('home_admin')}}" class="dropdown-item">dashboard</a>
                                @endif
                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route("logout") }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="ft-power"></i> Logout</a>
                            </div>
                        </div>
                        <a href="{{route('home_contact')}}" class="nav-item nav-link {{ Route::currentRouteName() == "home_contact" ? 'active':'' }}">Contact</a>
                    @endauth
                @endguest

            </div>
        </div>
    </nav>
    <div class="font-sans text-gray-900 antialiased">
        @yield('navbar')
        @isset($slot)
            {{ $slot }}
        @endisset
    </div>

    <!-- Navbar End -->
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Quick Link</h4>
                    <a class="btn btn-link" href="{{route('home_about')}}">About Us</a>
                    <a class="btn btn-link" href="{{route('home_contact')}}">Contact Us</a>
                    <a class="btn btn-link" href="#">Privacy Policy</a>
                    <a class="btn btn-link" href="#">Terms & Condition</a>
                    <a class="btn btn-link" href="#">FAQs & Help</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Gallery</h4>
                    <div class="row g-2 pt-2">
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('home/img/course-1.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('home/img/course-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('home/img/course-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('home/img/course-2.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('home/img/course-3.jpg')}}" alt="">
                        </div>
                        <div class="col-4">
                            <img class="img-fluid bg-light p-1" src="{{asset('home/img/course-1.jpg')}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-white mb-3">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" name="email"placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">BigBen  </a>, All Right Reserved.

                        Designed By <a class="border-bottom" href="">Bola & George</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="{{route('home_landing')}}">Home</a>
                            <a href="#">Cookies</a>
                            <a href="#">Help</a>
                            <a href="#">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .dropdown-menu {
            position: static;
            float: none;
        }
        .avatar img {
            width: 9%;
            max-width:9%;
            height: auto;
            border: 0 none;
            border-radius: 1000px;
        }
        .header-navbar .navbar-container ul.nav li a.dropdown-user-link .avatar {
            margin-right: 0.5rem;
            width: 36px;
        }
    </style>
    <!-- Footer End -->
    @livewireScripts
    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('home/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('home/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('home/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('home/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('home/js/main.js')}}"></script>
</body>

</html>
