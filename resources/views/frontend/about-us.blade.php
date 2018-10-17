@extends('layouts.user')
@section('content')
<link href="/frontend/css/bootstrap.css" rel="stylesheet">
<link href="/frontend/css/style.css" rel="stylesheet">
<link href="/frontend/css/responsive.css" rel="stylesheet">

<link rel="shortcut icon" href="/frontend/images/favicon.png" type="image/x-icon">
<link rel="icon" href="/frontend/images/favicon.png" type="image/x-icon">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


    <section class="call-to-action">
        <div class="anim-icons style-two">
            <span class="icon icon-cloud wow shake"></span>
            <span class="icon butterfly-1 wow rotateIn"></span>
        </div>

        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="title-column">
                    @foreach($sekolahs as $data)
                    <h3>Selamat Datang di {{ $data->nama_sekolah }}</h3>
                    @endforeach
                    <h2>Terbaik untuk Pendidikan</h2>
                </div>

                <div class="btn-column">
                    <div class="btn-box">
                        <a href="contact.html" class="theme-btn btn-style-one">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-title">
        <div class="auto-container">
            <h1>About Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="/">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </section>

     <!-- About Us -->
    <section class="about-us style-two">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        @foreach($sekolahs as $data)
                        <div class="sec-title">
                            <h2><span>About</span> {{ $data->nama_sekolah }}</h2>
                        </div>
                        @endforeach
                        <div class="text">
                            <p><strong>Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically</strong></p>
                            <p>Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
                            <p>markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
                        </div>
                    </div>
                </div>

                <!-- Image-column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box wow fadeInRight">
                            <figure class="image-1"><img src="/frontend/images/resource/image-1.png" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Us -->

    <!-- History Section -->
    <section class="history-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- History Column -->
                <div class="histroy-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Our <span>History</span></h2>
                        <div class="text">Deliverables for real-time schemas. Dramatically maintain clicks-and-mortar solutions without functional solutions.Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</div>
                        <ul class="list-style-two">
                            <li>Learning program with after-school</li>
                            <li>Positive learning environment</li>
                            <li>Learning through play</li>
                        </ul>
                        <div class="image-box wow fadeInLeft">
                            <figure><img src="/frontend/images/resource/image-3.jpg" alt=""></figure>
                        </div>
                    </div>
                </div>

                <!-- History Column -->
                <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h3>Hello. Our school has been present for over 20 years in the market. We make the most of all our students.</h3>
                        <!--Accordian Box-->
                        <ul class="accordion-box">

                            <!--Block-->
                            <li class="accordion block active-block">
                                <div class="acc-btn active"><span class="icon"></span>Functional solutions.Completely synergize resource ?</div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <div class="text">Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth.</div>
                                    </div>
                                </div>
                            </li>

                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn"><span class="icon"></span>Opportunities to Scientific Experiments</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth.</div>
                                    </div>
                                </div>
                            </li>
    
                            
                            
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn"><span class="icon"></span>Individual Attention in Small Classes</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth.</div>
                                    </div>
                                </div>
                            </li>
                            
                            <!--Block-->
                            <li class="accordion block">
                                <div class="acc-btn"><span class="icon"></span>Writing and Reading Classes Chilld Speciltys</div>
                                <div class="acc-content">
                                    <div class="content">
                                        <div class="text">Mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth.</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End History Section -->

    <!-- Fun Fact -->
    <section class="fun-facts-section" style="background-image:url(/frontend/images/background/2.jpg);">
        <div class="auto-container">
            
            <div class="row clearfix">
                <!--Column-->
                <div class="column count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-abc-squares"></span></div>
                           <div class="count-outer count-box">
                                <span class="count-text" data-speed="2000" 
                                data-stop="{{ App\tb_m_siswa::all()->count() }}">0 </span>
                            </div>
                           <div class="counter-title">Jumlah Siswa</div>
                        </div>
                    </div>
                </div>
                

                <!--Column-->

                <div class="column count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-stop"></span></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="2000" 
                                data-stop="300">0 </span>
                            </div>
                            <div class="counter-title">Best Awards Won</div>
                        </div>
                    </div>
                </div>

                      
                

                <!--Column-->
                <div class="column count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-smiling-girl"></span></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="2000" data-stop="{{App\tb_m_pengajar::all()->count() }}">0 </span>
                            </div>
                            <div class="counter-title">Jumlah Guru</div>
                        </div>
                    </div>
                </div>
                
                <!--Column-->
                <div class="column count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-edit-2"></span></div>
                            <div class="count-outer count-box">
                                <span class="count-text" data-speed="3000" 
                                data-stop="300">0 </span>
                            </div>
                            <div class="counter-title">Pencils Wood</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Fun Fact -->

    <!-- Subscribe Section -->
    <section class="subscribe-section">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="title-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Take The <span>First Step</span></h2>
                        <div class="text">Without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain .</div>
                    </div>
                </div>

                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="subscribe-form">
                        <form method="post" action="http://t.commonsupport.com/arans/contact.html">
                            <div class="form-group">
                                <input type="email" name="email" value="" placeholder="Enter Your Email" required="">
                                <button type="submit" class="theme-btn btn-style-six">Send Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe Section -->

    <!-- Event Section -->
    @php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp
<br>
<br>
<br>
    <!-- Event Section -->
            @if(count($tb_m_event)>0)
    <section class="event-section" style="background-image: url(/frontend/images/background/pattern-1.png);">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Don't Miss Our <span>Events</span></h2>
            </div>
            <div class="event-table">
                <div class="title-box"><span class="icon fa fa-calendar"></span> Event</div>
                <!-- Event Block -->
                        @foreach($tb_m_event as $data)
                <div class="event-block wow fadeInUp">
                    <div class="inner-box clearfix">
                        <div class="image-column">
                            <div class="image"><a href="moreEvent/show-event/{{ $data->slug }}"><img src="{{ asset('img/Fotoevent/'.$data->foto) }}" style="max-height:200px; max-width: 500px;" alt=""></a></div>
                        </div>

                        <div class="day-column">
                            <h3>{{Date::parse($data->waktu)->format('D')}}</h3>
                            <span>{{Date::parse($data->waktu)->format('d M, Y')}}</span>
                        </div>

                        <div class="info-column">
                            <h4><a href="moreEvent/show-event/{{ $data->slug }}">{{ $data->judul }}</a></h4>
                            <ul class="info">
                                <li><a href="moreEvent/show-event/{{ $data->slug }}"><i class="fa fa-clock-o"></i>
                                  {{Date::parse($data->waktu)->format('H:i')}}</a></li>
                                <li><a href="moreEvent/show-event/{{ $data->slug }}"><i class="fa fa-user"></i>
                                  {{ $data->tb_m_pengajar->nama }}</a></li>
                            </ul>
                        </div>

                        <div class="room-column">
                            <span>Hall No 01</span>
                        </div>
                        <div class="link-column">
                            <a href="moreEvent/show-event/{{ $data->slug }}" class="theme-btn">Lihat</a>
                        </div>
                        
                    </div>
                </div>
                        @endforeach

            </div>


            <div class="link-box text-center">
                <a href="moreEvent" class="theme-btn btn-style-one">More Event</a>
            </div>
        </div>
    </section>

             @else
              <div class="sec-title text-center">
                <h2>Belum Ada<span> Events</span></h2>
              </div>
          
            @endif

@endsection
<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
<script src="/frontend/js/jquery.js"></script> 
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
</html>