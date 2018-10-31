<!DOCTYPE html>
@extends('layouts.user')
@section('content')

@foreach($tb_s_sekolah as $data)
        <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | About-Us </title>
    @endforeach


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
                        <a href="{{ Route('contact') }}" class="theme-btn btn-style-one">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="page-title">
        <div class="auto-container">
            <h1>About Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('Home') }}">Home</a></li>
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
                        @foreach($tb_m_about as $data)
                        <div class="text">
                            {!! $data->about !!}
                        </div>
                    </div>
                </div>

                <!-- Image-column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box wow fadeInRight">
                            <figure class="image-1"><img src="{{ asset('img/Fotoabout/'.$data->foto) }}" alt=""></figure>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--End About Us -->

    <!-- History Section -->
    <section class="history-section">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- History Column -->
                @foreach($tb_m_about as $data)
                <div class="histroy-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Our <span>History</span></h2>
                        <div class="text">{!! $data->tb_m_history_about->history !!}</div>
                        <ul class="list-style-two">
                            @foreach($tb_m_history_about_pencapaian as $data)
                            <li>{{ $data->pencapaian }}</li>
                            @endforeach
                        </ul>
                        <div class="image-box wow fadeInLeft">
                            <figure><img src="{{ asset('img/Fotoabout/'.$data->tb_m_history_about->fotohistory) }}" style="min-height:250px; min-width:500px;   max-height:250px; max-width:500px; margin-top:7px; alt=""></figure>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- History Column -->
                {{-- <div class="accordion-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        @foreach($tb_m_about as $data)
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
                        @endforeach
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- End History Section -->

    <!-- Fun Fact -->
    <section class="fun-facts-section" style="background-image:url({{ asset('frontend/images/background/2.jpg') }});">
        <div class="auto-container">
            
            <div class="row clearfix">
                <!--Column-->
                <div class="column count-box col-lg-3 col-md-6 col-sm-12">
                    <div class="inner">
                        <div class="content">
                            <div class="icon-box"><span class="flaticon-abc-squares"></span></div>
                           <div class="count-outer count-box">
                                <span class="count-text" data-speed="2500" 
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
                                <span class="count-text" data-speed="2500" 
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
                                <span class="count-text" data-speed="2500" data-stop="{{App\tb_m_pengajar::all()->count() }}">0 </span>
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
                                <span class="count-text" data-speed="2500" 
                                data-stop="{{ App\tb_m_event::all()->count() }}">0 </span>
                            </div>
                            <div class="counter-title">Jumlah Event</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Fun Fact -->

    <!-- Subscribe Section -->
    {{-- <section class="subscribe-section">
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
     --}}<!-- End Subscribe Section -->

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
    <section class="event-section" style="background-image: url({{ asset('frontend/images/background/pattern-1.png') }});">
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
                <a href="{{ route('moreEvent') }}" class="theme-btn btn-style-one">More Event</a>
            </div>
        </div>
    </section>

             @else
              <div class="sec-title text-center">
                <h2>Belum Ada<span> Events</span></h2>
              </div>
          
            @endif


<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
@endsection

<!--Scroll to top-->


    