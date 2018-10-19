<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<link href="/frontend/css/bootstrap.css" rel="stylesheet">
<link href="/frontend/css/style.css" rel="stylesheet">
<link href="/frontend/css/responsive.css" rel="stylesheet">


<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="/frontend/js/respond.js"></script><![endif]-->
</head>

<body>

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
                            <li><a href="kindergarden.com">info@kindergarden.com</a></li>
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
                                        <li><a href="/moreartikel">Artikel</a></li>

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
    
    <!--Page Title-->
    @yield('content')
    <!-- Main Footer -->
@include('partials.footer')
 
    <!-- End Main Footer -->



</div>  
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
<script src="/frontend/js/jquery.js"></script> 
<script src="/frontend/js/jquery-ui.js"></script> 
<script src="/frontend/js/popper.min.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/jquery.fancybox.js"></script>
<script src="/frontend/js/owl.js"></script>
<script src="/frontend/js/wow.js"></script>
<script src="/frontend/js/countdown.js"></script>
<script src="/frontend/js/isotope.js"></script>
<script src="/frontend/js/appear.js"></script>
<script src="/frontend/js/script.js"></script>
</body>

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

</html>