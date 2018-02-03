<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Butter Template" />
    <meta name="description" content="MyBook - Easy website builder" />
    <meta name="author" content="@ButterCorp" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ ($site->title == null) ? "MyBookTwo" : $site->title . " - MyBookTwo" }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/image/template/MyBookTwo/favicon.png') }}" />

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

<body class="st-container st-effect-1">

<div class="wrapper">


    <!--=================================
     preloader -->

    <div id="pre-loader">
        <img src="{{ asset('/image/template/MyBookTwo/loader-01.svg') }}" alt="">
    </div>

    <!--=================================
     preloader -->

    <!--=================================
     st-menu  -->

    <div class="st-menu st-effect-1 scrollbar right-side big-side" id="menu-1">
        <div class="pos-bot">
            <ul class="menu">
                <li><a class="active">
                        @if($site->slug_content && $site->slug_statut)
                            {{ $site->slug_content }}
                        @elseif(!$site->slug_content && $site->slug_statut)
                            Réalisez votre site en deux clics grâce a votre compte facebook
                        @endif
                    </a></li>
            </ul>
            <div class="slide-footer">
                <div class="slide-footer-content">
                </div>
                <div class="social-icons color-icon text-social width-half clearfix">
                    <ul>
                        @if($site->network_statut)
                            @if(isset($site->facebook_url))
                                <li class="social-facebook"><a href="{{ $site->facebook_url }}"> facebook </a></li>
                            @endif
                            @if(isset($site->instagram_url))
                                <li class="social-instagram"><a href="{{ $site->instagram_url }}"> instagram </a></li>
                            @endif
                            @if(isset($site->google_url))
                                <li class="social-google"><a href="{{ $site->google_url }}"> google </a></li>
                            @endif
                            @if(isset($site->twitter_url))
                                <li class="social-twitter"><a href="{{ $site->twitter_url }}"> twitter </a></li>
                            @endif
                            @if(isset($site->linkedin_url))
                                <li class="social-linkedin"><a href="{{ $site->linkedin_url }}"> linkedin </a></li>
                            @endif
                        @endif
                    </ul>
                </div>
                <div class="copy-right">
                    @if($site->footer_content && $site->footer_statut)
                        {{ $site->footer_content }}
                    @elseif(!$site->footer_content && $site->footer_statut)
                        &copy;Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#"> ButterCorp </a> All Rights Reserved
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--=================================
     st-menu  -->

    <!--=================================
     header -->

    <div class="st-pusher">
        <header class="header burger">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="logo">
                            <a href="https://mybook.ovh"> <img class="img-responsive img-small" src="{{ asset('/image/template/MyBookTwo/logo-dark.png') }}" alt="MyBook"> </a>
                        </div>
                    </div>
                    <div class="col-xs-6 text-right">
                        <a href="#" class="menu-icon medium side-panel-trigger"><span class="ti-menu"></span></a>
                    </div>
                </div>
            </div>
        </header>

        <!--=================================
        header -->

        <!--=================================
 portfolio -->


        <section class="white-bg masonry-main o-hidden" style="background-color: #302f2f;">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="masonry columns-3 popup-gallery no-padding">
                            <div class="grid-sizer"></div>

                            @foreach($photos as $photo)

                            <div class="masonry-item photography">
                                <div class="portfolio-item simple-effect">
                                    <img src="{{ $photo->url }}" alt="">
                                    <div class="portfolio-overlay">
                                        <h4><a href="{{ $photo->url }}"> {{ $photo->description }} </a></h4>
                                        <span> <a href="#"> {{ $photo->nb_likes }} <i class="fa fa-thumbs-o-up"></i> | <a href="#"> {{ $photo->nb_comments }} <i class="fa fa-comments-o"></i> </a> </span>
                                    </div>
                                </div>
                            </div>

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!--=================================
         portfolio -->

        <!--=================================
         footer -->

        <footer id="footer-fixed" class="footer footer-simple black-bg">
            <div class="container-fluid">
                <div class="row page-section-ptb">
                    <div class="col-lg-12 col-md-12">
                        <div class="action-box theme-bg">
                            <h3 class="center">
                                @if($site->slug_content && $site->slug_statut)
                                    {{ $site->slug_content }}
                                @elseif(!$site->slug_content && $site->slug_statut)
                                    Réalisez votre site en deux clics grâce a votre compte facebook
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="row page-section-pb">
                    <div class="col-lg-2 col-md-2 col-sm-6 sm-mb-30">
                        <img class="img-responsive" id="logo-footer" src="{{ asset('/image/template/MyBookTwo/logo.png') }}" alt="">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 sm-mb-30 ">
                        <ul class="addresss-info">
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 ">
                        <div class="social-icons color-icon text-social width-half clearfix xs-mb-20">
                            <ul>
                                @if($site->network_statut)
                                    @if(isset($site->facebook_url))
                                        <li class="social-facebook"><a href="{{ $site->facebook_url }}"> facebook </a></li>
                                    @endif
                                    @if(isset($site->instagram_url))
                                        <li class="social-instagram"><a href="{{ $site->instagram_url }}"> instagram </a></li>
                                    @endif
                                    @if(isset($site->google_url))
                                        <li class="social-google"><a href="{{ $site->google_url }}"> google </a></li>
                                    @endif
                                    @if(isset($site->twitter_url))
                                        <li class="social-twitter"><a href="{{ $site->twitter_url }}"> twitter </a></li>
                                    @endif
                                    @if(isset($site->linkedin_url))
                                        <li class="social-linkedin"><a href="{{ $site->linkedin_url }}"> linkedin </a></li>
                                    @endif
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="footer-useful-link clearfix">
                            <ul>
                                <li><a href="https://mybook.ovh">Create Account</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--=================================
         footer -->

    </div>
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