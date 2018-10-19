<!DOCTYPE html>
@extends('layouts.user')
@section('content')
<html lang="en">
<body>


    @foreach($tb_s_sekolah as $data)
    <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Home </title>
    @endforeach

    
    
    <!-- Call To Action -->
    <section class="call-to-action">
        <div class="anim-icons">
            <span class="icon icon-cloud wow shake"></span>
            <span class="icon butterfly-1 wow zoomIn"></span>
            <span class="icon butterfly-2 wow zoomIn"></span>
        </div>

        <div class="auto-container">
            <div class="outer-box clearfix">
                <div class="title-column">
                  @foreach($tb_s_sekolah as $data)
                    <h3>Selamat Datang di {{ $data->nama_sekolah }}</h3>
                    <h2>Terbaik Untuk Pendidikan</h2>
                  @endforeach
                </div>

                <div class="btn-column">
                    <div class="btn-box">
                        <a href="{{ Route('contact') }}" class="theme-btn btn-style-one">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Call To Action -->

     <!-- About Us -->
    <section class="about-us">
        <div class="auto-container">
            <div class="row clearfix">
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2><span>About</span> Our Kamikinde</h2>
                        </div>
                        <div class="text">
                            <p><strong>Secara kolaboratif mengatur pasar yang diberdayakan melalui jaringan plug-and-play. Dinamis menunda pengguna B2C setelah menginstal manfaat dasar. Secara dramatis
                               </strong></p>
                            <p>Secara efisien melepaskan informasi lintas media tanpa nilai lintas media. Cepat memaksimalkan pengiriman tepat waktu untuk skema real-time. Secara dramatis mempertahankan solusi klik-dan-mortir tanpa solusi fungsional. Selaraskan sepenuhnya hubungan perpajakan sumber daya melalui ceruk pasar utama. Profesional membina layanan pelanggan satu-ke-satu dengan ide-ide yang kuat. Secara dinamis berinovasi layanan pelanggan level-sumber daya untuk layanan pelanggan yang canggih.</p>
                        </div>
                        <div class="btn-box">
                            <a href="{{ Route('about_us') }}" class="theme-btn btn-style-one">Read More</a>
                        </div>
                    </div>
                </div>

                <!-- Image-column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <figure class="image-1 wow fadeInRight"><img src="/frontend/images/resource/image-1.png" alt=""></figure>
                            <figure class="image-2 wow zoomIn"><img src="/frontend/images/resource/dots.png" alt=""></figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End About Us -->

    <!-- Services Section -->
    
  <section class="testimonial-section" style="background-image: url(/frontend/images/background/5.jpg);">
        <div class="auto-container">
            <div class="inner-container">
                <div class="single-item-carousel owl-carousel owl-theme">
                    <!-- Testimonial Block Two -->
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="/frontend/images/resource/thumb-2.jpg" alt=""></div>
                            <span class="icon flaticon-right-quotes-symbol"></span>
                            <div class="text">I’m so happy to found Enfant. Not only is it an incredibly supportive environment for working parents, with flexible daycare options, but the teachers are also so caring and patient with the children.</div>
                            <div class="info">
                                <div class="name">John Doue - <span class="designation"> Teachers</span></div>
                            </div> 
                        </div>
                    </div>

                    <!-- Testimonial Block Two -->
                    <div class="testimonial-block-two">
                        <div class="inner-box">
                            <div class="thumb"><img src="/frontend/images/resource/thumb-2.jpg" alt=""></div>
                            <span class="icon flaticon-right-quotes-symbol"></span>
                            <div class="text">I’m so happy to found Enfant. Not only is it an incredibly supportive environment for working parents, with flexible daycare options, but the teachers are also so caring and patient with the children.</div>
                            <div class="info">
                                <div class="name">John Doue - <span class="designation"> Teachers</span></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if(count($tb_m_service)>0)        
    <section class="services-section" style="background-image: url(/frontend/images/background/1.jpg);">
        <div class="anim-icons">
            <span class="icon icon-sparrow wow shake"></span>
        </div>
        <div class="auto-container">
            <div class="sec-title text-center blue-devider">
                <h2>Our Best <span>Services</span></h2>
            </div>
            <div class="row clearfix">
                <!-- Service Block -->
                @foreach($tb_m_service as $data)
                <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="icon-box"><img src="{{ asset('img/Fotoservice/'.$data->foto) }}" alt=""></div>
                        <h3><a href="services.html">{{ $data->judul }}</a></h3>
                        <div class="text">{!! $data->deskripsi !!}.</div>
                    </div>
                </div>
                @endforeach
                <!-- Service Block -->
                
                <!-- Service Block -->
                <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="icon-box"><img src="/frontend/images/resource/icon-playing.png" alt=""></div>
                        <h3><a href="services.html">Active Playing</a></h3>
                        <div class="text">Alterum accommodare duo cu. Ius labore luptatum efficiendi ex, ne vim enim rebum.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                @else 
                 <div class="sec-title text-center">
                    <br>
                    <br>
                <h2>Belum Ada<span> Service</span></h2>
                </div>
          
                @endif
              

    <!--End Services Section -->

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
    </section>
    <!-- End Fun Fact -->

    <!--Gallery Section-->
                    @if(count($tb_m_gallery)>0)        
    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title text-center pink-devider">
                <h2>Our <span>Gallery</span></h2>
            </div>

            <!--Galery-->
            <div class="sortable-masonry">
                <!--Filter-->
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter=".all">All</li>
                        @foreach($tb_m_kategori_gallery as $data)
                        <li class="filter" data-role="button" data-filter=".{{ $data->kategori }}">
                        {{ $data->kategori }}</li>
                        @endforeach
                    </ul>
                    <div class="btn-box">
                        <a href="moreGallery" class="theme-btn btn-style-one">More Gallery</a>
                    </div>
                  </div>

                <div class="items-container row clearfix">
                
                    <!--Project Block Two-->
                  
                     @foreach($tb_m_gallery as $data) 
                    <div class="project-block masonry-item all {{ $data->tb_m_kategori_gallery->kategori }} col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                               <img src="{{ asset('img/Fotogallery/'.$data->foto) }}" style="max-height:350px; max-width: 400px; 
                               min-height:350px; min-width: 400px; margin-top:7px;"> 
                               <div class="overlay-box">
                                <a href="{{ asset('img/Fotogallery/'.$data->foto) }}" style=" background-image: 
                                url({{ asset('img/Fotogallery/'.$data->foto) }}); " class="lightbox-image" data-fancybox="gallery"><span class="icon icon-plus"></span></a></div>
                            </div>
                        </div>
                    </div>
                     @endforeach                   
                </div>
            </div>
                
        </div>
    </section>
                @else
                <br><br><br>
     
                 <div class="sec-title text-center">
                <h2>Belum Ada<span> Gallery</span></h2>
                </div>
          
                @endif
    <!--End Gallery Section-->

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
@php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp
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
                            <span>{{ $data->ruangan }}</span>
                        </div>
                        <div class="link-column">
                            <a href="moreEvent/show-event/{{ $data->slug }}" class="theme-btn">Lihat</a>
                        </div>
                        
                    </div>
                </div>
                        @endforeach

                {{-- <div class="event-block wow fadeInUp">
                    <div class="inner-box clearfix">
                        
                        <div class="image-column">
                            <div class="image"><a href="moreEvent/show-event/{{ $data->slug }}"><img src="/frontend/images/resource/event-2.jpg" alt=""></a></div>
                        </div>

                        <div class="day-column">
                            <h3>DAY 3</h3>
                            <span>31 May, 2018</span>
                        </div>

                        <div class="info-column">
                            <h4><a href="moreEvent/show-event/{{ $data->slug }}">Opening of the Summers Walk</a></h4>
                            <ul class="info">
                                <li><a href="moreEvent/show-event/{{ $data->slug }}"><i class="fa fa-clock-o"></i> 09:00 AM</a></li>
                                <li><a href="moreEvent/show-event/{{ $data->slug }}"><i class="fa fa-user"></i> Henry Keen St School</a></li>
                            </ul>
                        </div>

                        <div class="room-column">
                            <span>Hall No 05</span>
                        </div>

                        <div class="link-column">
                            <a href="moreEvent/show-event/{{ $data->slug }}" class="theme-btn">Register</a>
                        </div>
                    </div>
                </div>

                <div class="event-block wow fadeInUp">
                    <div class="inner-box clearfix">
                        
                        <div class="image-column">
                            <div class="image"><a href="moreEvent/show-event/{{ $data->slug }}"><img src="/frontend/images/resource/event-3.jpg" alt=""></a></div>
                        </div>

                        <div class="day-column">
                            <h3>DAY 5</h3>
                            <span>31 May, 2018</span>
                        </div>

                        <div class="info-column">
                            <h4><a href="moreEvent/show-event/{{ $data->slug }}">Creative Presentation</a></h4>
                            <ul class="info">
                                <li><a href="moreEvent/show-event/{{ $data->slug }}"><i class="fa fa-clock-o"></i> 09:00 AM</a></li>
                                <li><a href="moreEvent/show-event/{{ $data->slug }}"><i class="fa fa-user"></i> Henry Keen St School</a></li>
                            </ul>
                        </div>

                        <div class="room-column">
                            <span>Hall No 01</span>
                        </div>

                        <div class="link-column">
                            <a href="moreEvent/show-event/{{ $data->slug }}" class="theme-btn">Register</a>
                        </div>
                    </div>
                </div> --}}
            </div>


            <div class="link-box text-center">
                <a href="moreEvent" class="theme-btn btn-style-one">More Event</a>
            </div>
        </div>
    </section>

             @else
             <br><br><br>
    
              <div class="sec-title text-center">
                <h2>Belum Ada<span> Events</span></h2>
              </div>
          
            @endif
    <!--End Event Section -->

    <!-- Next Event -->
    <section class="next-event" style="background-image: url(/frontend/images/background/4.jpg);">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Event <span>Selanjutnya</span></h2>
                        <div class="text">Solutions.Completely synergize resource taxing .Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before process-centric communities. Dramatically evisculate holistic innovation rather than client-centric data.</div>
                        <ul class="list-style-one">
                            <li>Progressively maintain extensive</li>
                            <li>20+ predefined pages</li>
                            <li>Pleasant colors</li>
                            <li>Premium plugins</li>
                        </ul>

                        <!-- Countdown -->
                        {{-- Waktu --}}
                        @foreach($nextEvent as $data)
                        <div class="timer">
                            @if($data->waktu > carbon\carbon::now())
                            <div class="cs-countdown" data-countdown="{{ $data->waktu }}"></div>
                            @endif
                        </div>
                        @endforeach

                        {{-- End Waktu --}}
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-4 col-md-12 col-sm-12 wow fadeInRight">
                    <div class="inner-column">
                        <div class="register-form">
                            <h3>Daftar Sekarang</h3>
        @if(Session::has('success'))
            <div class="alert alert-success">
            {{ Session::get('success') }}
            </div>
        @endif
 
        {!! Form::open(['route'=>'daftar.store']) !!}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <input type="text" name="name" placeholder="Name" required>
        <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
 
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
        <input type="text" name="email" placeholder="Email" required>
       <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>

        <div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
        {!! Form::textarea('message', old('message'), ['placeholder'=>'Pesan']) !!}
        <span class="text-danger">{{ $errors->first('message') }}</span>
        </div>

    <div class="form-group text-center">
        <button class="theme-btn btn-style-one" type="submit" name="submit-form">Kirim</button>
    </div>
        {!! Form::close() !!}


                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>
    <!--End Next Event -->

    <!-- News Section -->
    @if(count($tb_m_artikel)>0)
    <section class="news-section" style="background-image: url(/frontend/images/background/pattern-2.png);">
        <div class="auto-container">
            <div class="sec-title text-center blue-devider">
                <h2> Our Latest <span>News</span></h2>
            </div>
            <div class="row clearfix">
                <!-- News Block -->

                @foreach($tb_m_artikel as $data)
                <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            @if(   carbon\carbon::now()   <=  Date::parse($data->created_at)->addDays(5) )
                            <span class="tag">News</span>
                            @endif
                            <div class="image"><a href="moreartikel/show-artikel/{{ $data->slug }}"><img src="{{ asset('img/Fotoartikel/'.$data->foto) }} " style="max-height:200px; min-height:200px; min-width:380px;  max-width: 380px; margin-top:7px;"  alt=""></a></div>
                        </div>
                        <div class="lower-content">
                            <div class="title">

                                <div class="date" >{{Date::parse($data->create_at)->format('d')}} 
                                            <span>{{Date::parse($data->create_at)->format('M')}}</span></div>
                                <ul class="info" >
                                     <li>By {{ $data->user->name }}</li>
                                     <li>01 comment</li>
                                </ul>

                                <h3><a href="moreartikel/show-artikel/{{ $data->slug }}">{{ $data->judul }}</a></h3>
                            </div>
                            <div class="text" >{!! $data->deskripsi !!}</div>
                            <div class="text float-right">    
                                    <ul class="info" >
                                     <li>Modifed By {{ $data->pengedit }}</li>                                     
                                </ul>
                            </div>
                         </div>
                    </div>
                </div>
                @endforeach
                @else 
                 <div class="sec-title text-center">
                    <br>
                    <br>
                <h2>Belum Ada<span> Artikel</span></h2>
                </div>
          
                @endif
                @foreach($tb_s_sekolah as $data)
                @if(count($tb_s_sekolah))
                            <div class="text float-right">    
                                    <ul class="info" >
                                     <li>Modifed By {{ $countFacebook }}</li>                                     
                                </ul>
                            </div>
                @endif
                @endforeach
                <!-- News Block -->
               {{--  <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <span class="tag">News</span>
                            <div class="image"><a href="moreartikel/show-artikel/{{ $data->slug }}"><img src="/frontend/images/resource/news-2.jpg" alt=""></a></div>
                        </div>
                        <div class="lower-content">
                            <div class="title">
                                <div class="date">28 <span>May</span></div>
                                <ul class="info">
                                     <li>By Admin</li>
                                     <li>01 comment</li>
                                </ul>
                                <h3><a href="moreartikel/show-artikel/{{ $data->slug }}">Where Well Rounded Starts with Well Educated</a></h3>
                            </div>
                            <div class="text">Timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar lutions without functional solutions.</div>
                         </div>
                    </div>
                </div>
 --}}
                <!-- News Block -->
                {{-- <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="1200ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <span class="tag">News</span>
                            <div class="image"><a href="moreartikel/show-artikel/{{ $data->slug }}"><img src="/frontend/images/resource/news-3.jpg" alt=""></a></div>
                        </div>
                        <div class="lower-content">
                            <div class="title">
                                <div class="date">29 <span>May</span></div>
                                <ul class="info">
                                     <li>By Admin</li>
                                     <li>01 comment</li>
                                </ul>
                                <h3><a href="moreartikel/show-artikel/{{ $data->slug }}">An Inspired Approach To Education</a></h3>
                            </div>
                            <div class="text">Timely deliverables for real-time schemas. Dramatically maintain clicks-and-mortar lutions without functional solutions.</div>
                         </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!--End News Section -->

    

@endsection

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
</body>
</html>








<!--Main Slider-->
   {{--  <section class="main-slider">
        <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
            <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
                <ul>
                    <!-- Slide 1 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1688" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="/frontend/images/main-slider/image-1.jpg" data-title="Slide Title" data-transition="parallaxvertical">
                        
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="/frontend/images/main-slider/image-1.jpg"> 
                        
                        <div class="tp-caption tp-resizeme" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-width="none"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-130','-110','-110','-110']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                           <h4>Take The First Step</h4>
                        </div>

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-fontsize="['64','40','36','24']"
                        data-width="auto"
                        data-textalign="center"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-60','-50','-50','-50']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h2>To Knowledge With Us</h2>
                        </div>

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="normal"
                        data-fontsize="['64','40','36','24']"
                        data-width="['650','650','650','600']"
                        data-textalign="center"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['20','20','30','40']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                           <div class="text">Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performanceon.</div>
                        </div>
                        
                        <div class="tp-caption tp-resizeme" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-width="auto"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['100','100','120','140']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <a href="about.html" class="theme-btn btn-style-one"><span>EnRoll Now</span></a>
                            <a href="content.html" class="theme-btn btn-style-two"><span>Contact Us</span></a>
                        </div>
                    </li>

                    <!-- Slide 2 -->
                    <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1689" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-thumb="/frontend/images/main-slider/image-2.jpg" data-title="Slide Title" data-transition="parallaxvertical">
                        
                        <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="center center" data-bgrepeat="no-repeat" data-no-retina="" src="/frontend/images/main-slider/image-2.jpg"> 
                        
                        <div class="tp-caption tp-resizeme" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-width="none"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-130','-110','-110','-110']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                           <h4>Take The First Step</h4>
                        </div>

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-fontsize="['64','40','36','24']"
                        data-width="auto"
                        data-textalign="center"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['-60','-50','-50','-50']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <h2>To Knowledge With Us</h2>
                        </div>

                        <div class="tp-caption" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="normal"
                        data-fontsize="['64','40','36','24']"
                        data-width="['650','650','650','600']"
                        data-textalign="center"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['20','20','30','40']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                           <div class="text">Podcasting operational change management inside of workflows to establish a framework. Taking seamless key performanceon.</div>
                        </div>
                        
                        <div class="tp-caption tp-resizeme" 
                        data-paddingbottom="[0,0,0,0]"
                        data-paddingleft="[0,0,0,0]"
                        data-paddingright="[0,0,0,0]"
                        data-paddingtop="[0,0,0,0]"
                        data-responsive_offset="on"
                        data-type="text"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-width="auto"
                        data-hoffset="['0','0','0','0']"
                        data-voffset="['100','100','120','140']"
                        data-x="['center','center','center','center']"
                        data-y="['middle','middle','middle','middle']"
                        data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'>
                            <a href="about.html" class="theme-btn btn-style-one"><span>EnRoll Now</span></a>
                            <a href="content.html" class="theme-btn btn-style-two"><span>Contact Us</span></a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    --}} <!--End Main Slider-->
