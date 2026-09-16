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
            <a href="contact.html" class="chat-btn gsap-magnetic">Let’s Talk with us</a>
        </div>
    </div>
</div>

<!--==============================
Sidemenu
============================== -->
<div class="sidemenu-wrapper d-none d-lg-block ">
    <div class="sidemenu-content">
        <button class="closeButton sideMenuCls"><img src="assets/img/icon/close.svg" alt="icon"></button>
        <div class="widget woocommerce widget_shopping_cart">
            <h3 class="widget_title">Shopping cart</h3>
            <div class="widget_shopping_cart_content">
                <ul class="woocommerce-mini-cart cart_list product_list_widget ">
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button"><i class="fas fa-times"></i></a>
                        <a href="#"><img src="assets/img/product/product_thumb_1_1.jpg" alt="Cart Image">Ripple Crewneck</a>
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">€</span>160.90
                        </span>
                        <span class="quantity">Quantity: 1
                        </span>
                    </li>
                    <li class="woocommerce-mini-cart-item mini_cart_item">
                        <a href="#" class="remove remove_from_cart_button"><i class="fas fa-times"></i></a>
                        <a href="#"><img src="assets/img/product/product_thumb_1_2.jpg" alt="Cart Image">Herman Miller</a>
                        <span class="woocommerce-Price-amount amount">
                            <span class="woocommerce-Price-currencySymbol">€</span>44.50
                        </span>
                        <span class="quantity">Quantity: 1
                        </span>
                    </li>

                </ul>
                <p class="woocommerce-mini-cart__total total">
                    <strong>TOTAL</strong>
                    <span class="woocommerce-Price-amount amount">
                        <span class="woocommerce-Price-currencySymbol">€</span>205.40</span>
                </p>
                <p class="woocommerce-mini-cart__buttons buttons btn-wrap justify-content-between">
                    <a href="cart.html" class="btn style-white wc-forward">
                        <span class="link-effect">
                            <span class="effect-1">VIEW CART</span>
                            <span class="effect-1">VIEW CART</span>
                        </span>
                    </a>
                    <a href="checkout.html" class="btn style2 wc-forward">
                        <span class="link-effect">
                            <span class="effect-1">CHECKOUT</span>
                            <span class="effect-1">CHECKOUT</span>
                        </span>
                    </a>
                </p>
            </div>
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
            <a href="{{ route('home') }}"><img src="assets/img/logo.svg" alt="Ovation"></a>
        </div>
        <div class="mobile-menu">
            <ul>
                <li>
                    <a href="{{ route('home') }}">HOME</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#about">ABOUT</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#step">STEP</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#rundown">RUNDOWN</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#judges">JUDGES</a>
                </li>
                <li>
                    <a href="{{ route('home') }}#articles">ARTICLES</a>
                </li>
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
                            <a href="{{ route('home') }}"><img src="assets/img/logo.png" alt="logo" width="100"></a>
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
