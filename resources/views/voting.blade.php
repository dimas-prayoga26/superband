<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ISC 2026 - Indonesia Superband Competition</title>
    <meta name="description" content="ISC 2026 - Indonesia Superband Competition">
    <meta name="keywords" content="ISC 2026 - Indonesia Superband Competition">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="icon" type="image/png" href="assets/img/logo.png?v=browser-tab-logo">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/img/logo.png?v=browser-tab-logo">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Unbounded:wght@400;500;600;700&display=swap" rel="stylesheet">



    <!--==============================
	    All CSS File
	============================== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/imageRevealHover.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .register-header-row {
            display: grid;
            grid-template-columns: 1fr auto 1fr;
        }

        .register-header-row > .col-auto {
            width: auto;
        }

        .register-header-menu {
            justify-self: center;
        }

        .register-header-spacer {
            min-width: 100px;
        }

        @media (max-width: 991px) {
            .register-header-row {
                display: flex;
            }
        }
    </style>

</head>

<body>
    <!--********************************
   		Code Start From Here
	******************************** -->




    <!--==============================
     Preloader
    ==============================-->
    <div class="preloader">
        <div class="preloader-inner">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="popup-search-box">
        <button class="searchClose"><img src="assets/img/icon/close.svg" alt="img"></button>
        <form action="#">
            <input type="text" placeholder="Search Here..">
            <button type="submit"><img src="assets/img/icon/search-white.svg" alt="img"></button>
        </form>
    </div>

    <div class="sidemenu-wrapper">
        <div class="sidemenu-content">
            <button class="closeButton sideMenuCls"><img src="assets/img/icon/close.svg" alt="icon"></button>
            <div class="widget footer-widget">
                <div class="widget-about">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}"><img src="assets/img/logo-white.svg" alt="Ovation"></a>
                    </div>
                    <p class="about-text">We are digital agency that helps businesses develop immersive and engaging</p>
                    <div class="sidebar-wrap">
                        <h6>27 Division St, New York,</h6>
                        <h6>NY 10002, USA</h6>
                    </div>
                    <div class="sidebar-wrap">
                        <h6><a href="tel:1800123654987">+1 800 123 654 987 </a></h6>
                        <h6><a href="mailto:frisk.agency@mail.com">frisk.agency@mail.com</a></h6>
                    </div>
                    <div class="social-btn style2">
                        <a href="https://www.facebook.com/">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fab fa-facebook"></i></span>
                                <span class="effect-1"><i class="fab fa-facebook"></i></span>
                            </span>
                        </a>
                        <a href="https://instagram.com/">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fab fa-instagram"></i></span>
                                <span class="effect-1"><i class="fab fa-instagram"></i></span>
                            </span>
                        </a>
                        <a href="https://twitter.com/">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fab fa-twitter"></i></span>
                                <span class="effect-1"><i class="fab fa-twitter"></i></span>
                            </span>
                        </a>
                        <a href="https://dribbble.com/">
                            <span class="link-effect">
                                <span class="effect-1"><i class="fab fa-dribbble"></i></span>
                                <span class="effect-1"><i class="fab fa-dribbble"></i></span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="contact.html" class="chat-btn gsap-magnetic">Letâ€™s Talk with us</a>
            </div>
        </div>
    </div>

    <div class="popup-search-box d-none d-lg-block">
        <button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#">
            <input type="text" placeholder="What are you looking for?">
            <button type="submit"><i class="fal fa-search"></i></button>
        </form>
    </div>
    <!--==============================
    Mobile Menu
    ============================== -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-area">
            <button class="menu-toggle"><i class="fas fa-times"></i></button>
            <div class="mobile-logo">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="Indonesia Superband Competition" width="100"></a>
            </div>
            <div class="mobile-menu">
                <ul>
                    <li><a href="{{ route('home') }}">HOME</a></li>
                    <li><a href="{{ route('home') }}#about">ABOUT</a></li>
                    <li><a href="{{ route('home') }}#step">STEP</a></li>
                    <li><a href="{{ route('home') }}#rundown">RUNDOWN</a></li>
                    <li><a href="{{ route('home') }}#judges">JUDGES</a></li>
                    <li><a href="{{ route('home') }}#articles">ARTICLES</a></li>
                </ul>
            </div>
            <div class="sidebar-wrap">
                <h6>27 Division St, New York,</h6>
                <h6>NY 10002, USA</h6>
            </div>
            <div class="sidebar-wrap">
                <h6><a href="tel:1800123654987">+1 800 123 654 987 </a></h6>
                <h6><a href="mailto:frisk.agency@mail.com">frisk.agency@mail.com</a></h6>
            </div>
            <div class="social-btn style3">
                <a href="https://www.facebook.com/">
                    <span class="link-effect">
                        <span class="effect-1"><i class="fab fa-facebook"></i></span>
                        <span class="effect-1"><i class="fab fa-facebook"></i></span>
                    </span>
                </a>
                <a href="https://instagram.com/">
                    <span class="link-effect">
                        <span class="effect-1"><i class="fab fa-instagram"></i></span>
                        <span class="effect-1"><i class="fab fa-instagram"></i></span>
                    </span>
                </a>
                <a href="https://twitter.com/">
                    <span class="link-effect">
                        <span class="effect-1"><i class="fab fa-twitter"></i></span>
                        <span class="effect-1"><i class="fab fa-twitter"></i></span>
                    </span>
                </a>
                <a href="https://dribbble.com/">
                    <span class="link-effect">
                        <span class="effect-1"><i class="fab fa-dribbble"></i></span>
                        <span class="effect-1"><i class="fab fa-dribbble"></i></span>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <!--==============================
	Header Area
    ==============================-->
    <header class="nav-header header-layout2 style2 bg-white">
        <div class="sticky-wrapper">
            <!-- Main Menu Area -->
            <div class="menu-area">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-between register-header-row">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="Indonesia Superband Competition" width="100"></a>
                            </div>
                        </div>
                        <div class="col-auto m-lg-auto register-header-menu">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <span class="link-effect">
                                                <span class="effect-1">HOME</span>
                                                <span class="effect-1">HOME</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}#about">
                                            <span class="link-effect">
                                                <span class="effect-1">ABOUT</span>
                                                <span class="effect-1">ABOUT</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}#step">
                                            <span class="link-effect">
                                                <span class="effect-1">STEP</span>
                                                <span class="effect-1">STEP</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}#rundown">
                                            <span class="link-effect">
                                                <span class="effect-1">RUNDOWN</span>
                                                <span class="effect-1">RUNDOWN</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}#judges">
                                            <span class="link-effect">
                                                <span class="effect-1">JUDGES</span>
                                                <span class="effect-1">JUDGES</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}#articles">
                                            <span class="link-effect">
                                                <span class="effect-1">ARTICLES</span>
                                                <span class="effect-1">ARTICLES</span>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle sidebar-btn">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </button>
                            </div>
                        </div>
                        <div class="col-auto d-none d-lg-block register-header-spacer" aria-hidden="true"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!--==============================
    Breadcumb
    ============================== -->
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('assets/Jember Feed 18.png') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Vote Now</h1>
            </div>
        </div>
    </div>

    <!--==============================
    Pricing Area
    ==============================-->
    <div class="space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-7 col-xl-6 col-lg-8">
                    <div class="title-area text-center">
                        <h2 class="sec-title">Make Your Vote Count</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card bg-smoke h-100">
                        <h4 class="pricing-card_title">VOCAL</h4>
                        <div class="d-flex justify-content-center">
                            <img src="assets/img/team/team-1-1.png" class="object-fit-cover" alt="Team Image" style="border-radius: 20px;">
                        </div>
                        <p class="mt-3">
                            <span class="fw-bold">Satria Pratama</span> <br>
                            <span>SMA 1 Jember</span>
                        </p>
                        <a href="project.html" class="btn">
                            <span class="link-effect">
                                <span class="effect-1">VOTE!</span>
                                <span class="effect-1">VOTE!</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card bg-smoke h-100">
                        <h4 class="pricing-card_title">GITARIS</h4>
                        <div class="d-flex justify-content-center">
                            <img src="assets/img/team/team-1-2.png" class="object-fit-cover" alt="Team Image" style="border-radius: 20px;">
                        </div>
                        <p class="mt-3">
                            <span class="fw-bold">Daniyel Mandala</span> <br>
                            <span>SMA 1 Jember</span>
                        </p>
                        <a href="project.html" class="btn">
                            <span class="link-effect">
                                <span class="effect-1">VOTE!</span>
                                <span class="effect-1">VOTE!</span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card bg-smoke h-100">
                        <h4 class="pricing-card_title">BASSIS</h4>
                        <div class="d-flex justify-content-center">
                            <img src="assets/img/team/team-1-3.png" class="object-fit-cover" alt="Team Image" style="border-radius: 20px;">
                        </div>
                        <p class="mt-3">
                            <span class="fw-bold">Bimo Aryo</span> <br>
                            <span>SMA 1 Jember</span>
                        </p>
                        <a href="project.html" class="btn">
                            <span class="link-effect">
                                <span class="effect-1">VOTE!</span>
                                <span class="effect-1">VOTE!</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--==============================
    Marquee Area
    ==============================-->
    <div class="container-fluid p-0 overflow-hidden">
        <div class="slider__marquee clearfix marquee-wrap">
            <div class="marquee_mode marquee__group">
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Bersinar Bareng Superband Baru-mu!</a></h6>
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Bersinar Bareng Superband Baru-mu!</a></h6>
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Bersinar Bareng Superband Baru-mu!</a></h6>
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Bersinar Bareng Superband Baru-mu!</a></h6>
            </div>
        </div>
    </div>

    <!--==============================
        Footer Area
    ==============================-->
    <footer class="footer-wrapper footer-layout2 overflow-hidden">
        <div class="container">
            <div class="widget-area space-top">
                <div class="row justify-content-between">
                    <div class="col-md-6 col-xl-5 col-lg-6">
                        <div class="widget widget-newsletter footer-widget">
                            <h3 class="widget_title">Stay in the loop. Get gig schedules, backstage insights, and competition updates delivered to you.</h3>
                            <form class="newsletter-form">
                                <div class="form-group">
                                    <input class="form-control" type="email" placeholder="Your email here" required="">
                                </div>
                                <button type="submit" class="btn"><img src="assets/img/icon/arrow-left-top.svg" alt=""></button>
                            </form>
                            <p>By dropping your email, you agree to our Privacy Policy. Your info is safe with us.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-xl-2 col-lg-3">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Links</h3>
                            <div class="menu-all-pages-container list-column2">
                                <ul class="menu">
                                    <li><a href="{{ route('about') }}"> About</a></li>
                                    <li><a href="project.html">Portfolios</a></li>
                                    <li><a href="service.html">Services</a></li>
                                    <li><a href="contact.html">Testimonials</a></li>
                                    <li><a href="project.html">Careers</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-auto col-lg-4">
                        <div class="widget footer-widget widget-contact">
                            <h3 class="widget_title">Contact</h3>
                            <ul class="contact-info-list">
                                <li>Kabupaten Jember, Jawa Timur, Indonesia</li>
                                <!-- <li>
                                    <a href="tel:1800123654987">+1 800 123 654 987</a>
                                    <a href="mailto:frisk.agency@mail.com">frisk.agency@mail.com</a>
                                </li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright-wrap">
                <div class="row gy-3 justify-content-between align-items-center">
                    <div class="col-md-6">
                        <p class="copyright-text">Copyright Â© 2026
                            <a href="">Indonesia Superband Competition</a>
                        </p>

                    </div>
                    <div class="col-md-6 align-self-center">
                        <div class="social-btn style3 justify-content-md-end">
                            <a href="https://www.facebook.com/">
                                <span class="link-effect">
                                    <span class="effect-1"><i class="fab fa-facebook"></i></span>
                                    <span class="effect-1"><i class="fab fa-facebook"></i></span>
                                </span>
                            </a>
                            <a href="https://instagram.com/">
                                <span class="link-effect">
                                    <span class="effect-1"><i class="fab fa-instagram"></i></span>
                                    <span class="effect-1"><i class="fab fa-instagram"></i></span>
                                </span>
                            </a>
                            <a href="https://twitter.com/">
                                <span class="link-effect">
                                    <span class="effect-1"><i class="fab fa-tiktok"></i></span>
                                    <span class="effect-1"><i class="fab fa-tiktok"></i></span>
                                </span>
                            </a>
                            <a href="https://dribbble.com/">
                                <span class="link-effect">
                                    <span class="effect-1"><i class="fab fa-youtube"></i></span>
                                    <span class="effect-1"><i class="fab fa-youtube"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--********************************
			Code End  Here
	******************************** -->

    <!-- Scroll To Top -->
    <div class="scroll-top">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
        </svg>
    </div>


    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/gsap.min.js"></script>
<script src="assets/js/ScrollTrigger.min.js"></script>
    <script src="assets/js/sticky-kit.min.js"></script>

    
    <script src="assets/js/imageRevealHover.js"></script>
    <script src="assets/js/jarallax.min.js"></script>
    <script src="assets/js/jquery.marquee.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/wow.js"></script>

    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>
</body>

</html>
