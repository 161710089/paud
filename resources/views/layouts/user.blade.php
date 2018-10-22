<html lang="en">

<head>
<meta charset="utf-8">
<!-- Stylesheets -->

<link href="/frontend/css/bootstrap.css" rel="stylesheet">
<link href="/frontend/plugins/revolution/css/settings.css" rel="stylesheet" type="text/css"><!-- REVOLUTION SETTINGS STYLES -->
<link href="/frontend/plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
<link href="/frontend/plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css"><!-- REVOLUTION NAVIGATION STYLES -->
<link href="/frontend/css/style.css" rel="stylesheet">
<link href="/frontend/css/responsive.css" rel="stylesheet">

@foreach($sekolahs as $data)
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('img/FotoSekolah/'.$data->logo) }}">
 
@endforeach

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="/frontend/js/respond.js"></script><![endif]-->
</head>
<div class="page-wrapper">
 <!-- Preloader -->
    <div class="preloader"></div>
   <!-- Main Header-->
    <header class="main-header">
        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <div class="top-left">
                        <ul class="contact-list clearfix">
                            @foreach($tb_s_sekolah as $data) 
                            <li><a href="\kindergarden.com">info@kindergarden.com</a></li>
                            <li>{{ $data->no_telepon }}</li>
                            @endforeach
                        </ul>
                    </div>
                 
                    <div class="top-right clearfix ">
                        <ul class="clearfix ">
                            <li class=""><a class="text-white" href="\login">Sign in</a>  </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="clearfix">
                    
                              @foreach($tb_s_sekolah as $data)
                    <div class="logo-outer">
                        <div class="logo"><a href="/">
                          <img src="{{ asset('img/FotoSekolah/'.$data->logo) }}" style="min-width:120px; min-height:80px;   max-height:80px; max-width: 120px; margin-top:7px;"></a></div>
                    </div>
                    
                    <div class="upper-right clearfix">
                        
                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-map"></span></div>
                            <ul>
                                <li><strong>Alamat</strong>: Bandung ID</li>
                                <li>{{ $data->alamat }}</li>
                            </ul>
                        </div>
                        
                        <!--Info Box-->
                        <div class="upper-column info-box">
                            <div class="icon-box"><span class="flaticon-clock-5"></span></div>
                            <ul>
                                <li><strong>Waktu Buka</strong>:{{ $data->waktu_buka }}</li>
                                <li>{{ $data->hari_buka }} - Buka</li>
                            </ul>
                        </div>

                    </div>
                              @endforeach
                </div>
            </div>
        </div>

        <!--Header-lower-->
        <div class="header-lower">
            <div class="auto-container">

                <div class="nav-outer clearfix">
                    <!-- Main Menu -->
                    <nav class="main-menu navbar-expand-md navbar-dark">
                        <div class="navbar-header">
                            <!-- Toggle Button -->      
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="flaticon-menu"></span>
                            </button>
                        </div>
                        
                        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li><a href="/">Home</a></li>

                                <li><a href="{{ Route('about_us') }}">About Us</a></li>
                                <li class="dropdown"><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="service">Services</a></li>
                                        <li><a href="moreEvent">Event</a></li>
                                        <li><a href="moreartikel">Artikel</a></li>

                                    </ul>
                                </li> 
                                <li><a href="moreGallery">Gallery</a></li>
								<li><a href="{{ Route('contact') }}">Contact</a></li>

                            </ul>
                        </div>
                    </nav>
                    <!-- Main Menu End-->

                    <!-- Outer Box -->
                    <div class="outer-box">
                        <ul class="social-icon-one">
                            @foreach($tb_s_sekolah as $data)
                            @if($data->tb_s_sosmed->Facebook>0)
                            <li><a href="{{ $data->tb_s_sosmed->Facebook }}"><i class="fa fa-facebook-official"></i></a></li>
                            @endif
                            @if($data->tb_s_sosmed->Instagram>0)
                            <li><a href="{{ $data->tb_s_sosmed->Instagram }}"><i class="fa fa-instagram"></i></a></li>
                            @endif
                            @if($data->tb_s_sosmed->Twitter>0)
                            <li><a href="{{ $data->tb_s_sosmed->Twitter }}"><i class="fa fa-twitter-square"></i></a></li>
                            @endif
                            @endforeach
                            {{-- <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header -->
@include('partials.stickyheaderHome')
    </header>
    <!--End Main Header -->
    
@yield('content')


		<!-- Main Footer -->
    <footer class="main-footer">
        <!-- Footer upper -->
        <div class="footer-upper">
            <div class="inner-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">       
                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-widget testimonial-widget">                            
                                <div class="single-item-carousel owl-carousel owl-theme">
                                    <div class="testimonial-block">
                                        <h2 class="name">John doue</h2>
                                        <div class="inner-box">
                                            <div class="thumb"><img src="/frontend/images/resource/thumb-1.jpg" alt=""></div>
                                            <div class="text">Efficiently enable enabled sources and cost Procces Affective Products. Completely synthesize princi centered sources and cost effective products.</div>
                                            <ul class="social-links">
                                                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="testimonial-block">
                                        <h2 class="name">John doue</h2>
                                        <div class="inner-box">
                                            <div class="thumb"><img src="/frontend/images/resource/thumb-1.jpg" alt=""></div>
                                            <div class="text">Efficiently enable enabled sources and cost Procces Affective Products. Completely synthesize princi centered sources and cost effective products.</div>
                                            <ul class="social-links">
                                                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="testimonial-block">
                                        <h2 class="name">John doue</h2>
                                        <div class="inner-box">
                                            <div class="thumb"><img src="/frontend/images/resource/thumb-1.jpg" alt=""></div>
                                            <div class="text">Efficiently enable enabled sources and cost Procces Affective Products. Completely synthesize princi centered sources and cost effective products.</div>
                                            <ul class="social-links">
                                                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget post-widget">
                                <h2 class="widget-title">Recent Post</h2>
                                <div class="widget-content">
                                    <!-- Recent Post -->
                                   @foreach($recentpost_artikel as $data)
                                    <article class="post">
                                        <span class="date">{{Date::parse($data->create_at)->format('d M')}}</span>
                                        <h4><a href="moreartikel/show-artikel/{{ $data->slug }}">{{ $data->judul }}</a></h4>
                                    </article>
                                    @endforeach
                                </div>
                            </div>  
                        </div>         
                        
                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget gallery-widget">
                                <h2 class="widget-title">Widget Gallery</h2>
                                <div class="widget-content">
                                    <div class="outer clearfix">
                                        @foreach($widgetgallery as $data)
                                         <figure class="image">
                                            <a href="{{ asset('img/Fotogallery/'.$data->foto) }}" class="lightbox-image" title="{{ $data->judul }}">
                                            	<img src="{{ asset('img/Fotogallery/'.$data->foto) }}" style="max-height:92px; min-width:92px; min-height:92px;  max-width: 92px; margin-top:7px;"></a>
                                        </figure>
                                        @endforeach

                                        
                                    </div>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      {{-- End Main Footer --}}

		<!-- Footer Lower -->
        <div class="footer-lower">
            <div class="auto-container">
                <div class="inner-box">
                    <div class="logo-box">
                    	@foreach($tb_s_sekolah as $data)
                        <figure><img src="{{ asset('img/FotoSekolah/'.$data->logo) }}" style="max-height:100px; max-width: 100px; margin-top:7px;" alt="footer logo"></figure>
                    	@endforeach
                    </div>
                    <div class="footer-social-links">
                        <ul class="social-links">
                        	@foreach($tb_s_sekolah as $data)
                                @if($data->tb_s_sosmed->Facebook>0)
                            <li><a href="{{ $data->tb_s_sosmed->Facebook }}">Facebook</a></li>
                                @endif
                                @if($data->tb_s_sosmed->Facebook>0)
                            <li><a href="{{ $data->tb_s_sosmed->Twitter }}">Twitter</a></li>
                                @endif
                                @if($data->tb_s_sosmed->Facebook>0)  
                            <li><a href="{{ $data->tb_s_sosmed->Instagram }}">Instagram</a></li>
                                @endif
                            {{-- <li><a href="#">Pinterest</a></li>
                            <li><a href="#">Linkedin</a></li>
                           --}}  
                            @endforeach
                        </ul>
                    </div>
                </div>                                                                  
            </div>
        </div>
        {{-- End Footer Lower --}}


        <!--Footer Bottom-->
         <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright-text clearfix">
                    <div class="text">© Copyright 2018 <a href="/">
                    	@foreach($tb_s_sekolah as $data)
                    	{{ $data->nama_sekolah }}
                    	@endforeach
                    </a>. All Rights Reserved</div>
                    <div class="link">
                        <a href="https://themeforest.net">Wonderful Education HTML Template</a>                    
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Main Footer -->


</div>


<script src="/frontend/js/jquery.js"></script> 
<script src="/frontend/js/popper.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<!--Revolution Slider-->
<script src="/frontend/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="/frontend/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/frontend/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="/frontend/js/main-slider-script.html"></script>
<!--End Revolution Slider-->
<script src="/frontend/js/jquery.fancybox.js"></script>
<script src="/frontend/js/owl.js"></script>
<script src="/frontend/js/wow.js"></script>
<script src="/frontend/js/countdown.js"></script>
<script src="/frontend/js/isotope.js"></script>
<script src="/frontend/js/appear.js"></script>
<script src="/frontend/js/script.js"></script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5bc42a9208387933e5bb5058/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</html>

