<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webster - Multi-Purpose HTML5 Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ ($site->title == null) ? "MyBookOne" : $site->title . " - MyBookOne" }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/image/template/MyBookOne/favicon.png') }}" />

    <!-- font -->
    <link  rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,500,500i,600,700,800,900|Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/template/MyBookOne/plugins-css.css') }}" />

    <!-- Typography -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/template/MyBookOne/typography.css') }}" />

    <!-- Shortcodes -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/template/MyBookOne/shortcodes/shortcodes.css') }}" />

    <!-- Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/template/MyBookOne/style.css') }}" />

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/template/MyBookOne/responsive.css') }}" />


</head>

<body>

<div class="wrapper vertical-header">

    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{ asset('/image/template/MyBookOne/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
     preloader -->


    <!--=================================
     header -->
    <div class="menu-responsive"><a href="#"> <b>Webster</b></a> <a class="but" href="#"><span class="ti-menu"></span> </a></div>

    <header id="left-header" class="header vertical-menu">

        <!--=================================
         mega menu -->

        <div class="menu">
            <!-- menu start -->
            <nav id="menu" class="mega-menu" data-pos='vertical-left'>
                <!-- menu list items container -->
                <section class="menu-list-items">
                    <!-- menu logo -->
                    <ul class="menu-logo">
                        <li>
                            <a href="#"><img id="logo_img" src="{{ asset('/image/template/MyBookOne/logo.png') }}" alt="logo"> </a>
                        </li>
                    </ul>
                    <!-- menu links -->
                    <div class="menu-bar">
                        <ul class="menu-links">

                            <!-- <li class="active"><a href="javascript:void(0)">Home <i class="fa fa-angle-down fa-indicator"></i></a>
                                   <!-- drop down full width
                                   <div class="drop-down grid-col-12">
                                       <!--grid row-
                                       <div class="grid-row">
                                           <!--grid column 3--
                                           <div class="grid-col-3">
                                               <ul>
                                                 <li><a href="index-01.html">Webster default <span class="label label-warning">default</span> </a></li>
                                                 <li><a href="index-02.html">Classic Business </a></li>
                                                 <li><a href="index-03.html">Business Parallax</a></li>
                                                 <li><a href="index-04.html">Digital Agency </a></li>
                                                 <li><a href="index-05.html">Corporate </a></li>
                                                 <li><a href="index-06.html">Modern Business </a></li>
                                                 <li><a href="index-07.html">Creative Studio </a></li>
                                                 <li><a href="index-08.html">Creative Agency </a></li>
                                                 <li><a href="index-09.html">Personal Portfolio/CV </a></li>
                                                 <li><a href="index-10.html">Freelancer </a></li>
                                                 <li><a href="index-11.html">Marketing Agency <span class="label label-success">New</span> </a></li>
                                                 <li><a href="index-personal-dark.html">Personal Dark <span class="label label-success">New</span> </a></li>
                                                 <li><a href="index-portfolio-02.html">Portfolio Metro</a></li>
                                               </ul>
                                           </div>
                                       </div>
                                   </div>
                               </li> -->




                        </ul>
                    </div>
                </section>
            </nav>
            <!-- menu end -->
        </div>

        <div class="menu-widgets text-white">
            <div class="social-icons border rounded color-hover text-center">
                <ul>
                    <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li class="social-instagram"><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li class="social-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>

    </header>

    <!--=================================
     header -->


    <!--=================================
     portfolio -->

    <section class="white-bg masonry-main o-hidden">
        <div class="masonry columns-3 popup-gallery no-padding">
            <div class="grid-sizer"></div>
            <div class="masonry-item photography illustration">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/02.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/02.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item photography">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/02.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white">Post vimeo video</h4>
                        <h6 class="text-white">Photography | Illustration</h6>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/02.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item photography branding">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/03.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/03.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item web-design">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/04.gif') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/04.gif') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item photography illustration">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/05.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/05.jpg') }}><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item photography">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/06.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white">Post vimeo video</h4>
                        <h6 class="text-white">Photography | Illustration</h6>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/06.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/07.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/07.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item photography branding">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/08.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/08.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item illustration">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/09.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/09.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item illustration">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/10.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/10.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/01.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="portfolio-single-01.html"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/01.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
            <div class="masonry-item branding">
                <div class="portfolio-item">
                    <img src="{{ asset('image/portfolio/masonry/02.jpg') }}" alt="">
                    <div class="portfolio-overlay">
                        <h4 class="text-white"> <a href="#"> Post simple image </a> </h4>
                        <span class="text-white"> <a href="#"> Branding </a> | <a href="#"> Web Design </a> </span>
                    </div>
                    <a class="popup portfolio-img" href="{{ asset('image/portfolio/masonry/02.jpg') }}"><i class="fa fa-arrows-alt"></i></a>
                </div>
            </div>
        </div>

    </section>

    <!--=================================
     footer -->

    <footer class="footer page-section-pt black-bg">
        <div class="container">
            <div class="row">
            </div>
            <div class="footer-widget mt-20">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 xs-mb-20">
                        <p class="mt-15">&copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#"> ButterCorp </a> All Rights Reserved</p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 text-right xs-text-left">
                        <div class="footer-widget-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i> </a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!--=================================
     footer -->

</div>



<div id="back-to-top"><a class="top arrow" href="#top"><i class="fa fa-angle-up"></i> <span>TOP</span></a></div>


<!--=================================
 jquery -->

<!-- jquery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

<!-- plugins-jquery -->
<script type="text/javascript" src="{{ asset('/js/template/MyBookOne/plugins-jquery.js') }}"></script>

<!-- plugin_path -->
<script type="text/javascript">var plugin_path = "{{ asset('js/template/MyBookOne/') }}/";</script>


<!-- custom -->
<script type="text/javascript" src="{{ asset('js/template/MyBookOne/custom.js') }}"></script>

</body>
</html>