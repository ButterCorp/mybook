<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Butter Template" />
    <meta name="description" content="MyBook - Easy website builder" />
    <meta name="author" content="@ButterCorp" />
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
    <div class="menu-responsive"><a href="#"> <b>MyBook</b></a> <a class="but" href="#"><span class="ti-menu"></span> </a></div>

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
                            <li class="active">
                                <a style="text-align: center;">
                                    @if($site->slug_content && $site->slug_statut)
                                            {{ $site->slug_content }}
                                        @elseif(!$site->slug_content && $site->slug_statut)
                                            Réalisez votre site en deux clics grâce a votre compte facebook
                                    @endif
                                </a>
                            </li>
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
                    @if($site->network_statut)
                        @if(isset($site->facebook_url))
                            <li class="social-facebook"><a href="{{ $site->facebook_url }}"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if(isset($site->instagram_url))
                                <li class="social-instagram"><a href="{{ $site->instagram_url }}"><i class="fa fa-instagram"></i></a></li>
                        @endif
                        @if(isset($site->google_url))
                                <li class="social-google"><a href="{{ $site->google_url }}"><i class="fa fa-google-plus"></i></a></li>
                        @endif
                        @if(isset($site->twitter_url))
                                <li class="social-twitter"><a href="{{ $site->twitter_url }}"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if(isset($site->linkedin_url))
                                <li class="social-linkedin"><a href="{{ $site->linkedin_url }}"><i class="fa fa-linkedin"></i></a></li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>

    </header>

    <!--=================================
     header -->


    <!--=================================
     portfolio -->

    <section class="white-bg masonry-main o-hidden" style="background-color: #302f2f;">

                <div class="masonry columns-3 popup-gallery no-padding">
                    <div class="grid-sizer"></div>

                    @foreach($photos as $photo)

                        <a class="popup portfolio-img" href="{{ $photo->url }}">
                        <div class="masonry-item photography">
                            <div class="portfolio-item">
                                <img src="{{ $photo->url }}" alt="">
                                <div class="portfolio-overlay">
                                    <div class="portfolio-overlay">
                                        <h4 class="text-white">{{ ($site->show_photo_description) ? $photo->description : '' }}</h4>
                                        <h6 class="text-white">{{ ($site->show_count_likes) ? $photo->nb_likes : ''}} <i class="fa fa-thumbs-o-up"></i> |
                                            {{ ($site->show_count_comments) ? $photo->nb_comments : ''}} <i class="fa fa-comments-o"></i></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    @endforeach
                </div>

    </section>

<!--=================================
footer -->

<footer class="footer page-section-pt black-bg" {{ ($site->footer_statut) ? '' : 'hidden' }}>
<div class="container">
<div class="row">
</div>
<div class="footer-widget mt-20">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 xs-mb-20">
            <p class="mt-15">
                @if($site->footer_content && $site->footer_statut)
                    {{ $site->footer_content }}
                @elseif(!$site->footer_content && $site->footer_statut)
                    &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#"> ButterCorp </a> All Rights Reserved
                @endif
            </p>
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
</div>
</html>

</style>