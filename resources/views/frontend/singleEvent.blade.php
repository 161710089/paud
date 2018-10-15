@extends('layouts.singleEvents')
@section('content')
 @php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp

<section class="page-title">
        <div class="auto-container">
            <h1>Events Single</h1>
            <ul class="page-breadcrumb">
                <li><a href="index-2.html">Home</a></li>
                <li>Events Single</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="event-detail">
                        <div class="upper-box">
                            <h3>{{ $tb_m_event_single->judul }}</h3>
                            <p>Information without cross-media functiosolutions.Completelyrelationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.  </p>
                            <div class="image-box wow fadeIn">
                                 <div class="image"><a href="{{ asset('img/Fotoevent/'.$tb_m_event_single->foto) }}" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset('img/Fotoevent/'.$tb_m_event_single->foto) }}" alt=""></a></div>
                                <div class="info-box">
                                    <ul class="course-info clearfix">
                                        <li>
                                           <h4><i class="icon fa fa-clock-o"></i>Waktu</h4>
                                           <p>{{Date::parse($tb_m_event_single->waktu)->format('H:i')}} - {{Date::parse($tb_m_event_single->waktu_selesai)->format('H:i')}}</p>
                                        </li>

                                        <li>
                                           <h4><i class="icon fa fa-calendar"></i>Tanggal</h4>
                                           <p>05 April , 2018</p>
                                        </li>

                                        <li>
                                           <h4><i class="icon fa fa-map"></i>Alamat</h4>
                                           <p>{{ $tb_m_event_single->alamat }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <p>Information without cross-media functiosolutions.Completelyrelationships viaremier niche markets. Professionally cultivate one-to-one customer service with robust ideas.  Quickly aggregate B2B users and worldwide potentialities. Progressively plagiarize resource-leveling e-commerce through resource-leveling core competencies. Dramatically mesh low-risk high-yield alignments before transparent e-tailers.Appropriately empower dynamic leadership skills after business portals. Globally myocardinate interactive supply chains with distinctive quality vectors. Globally revolutionize global sources.</p>
                            <p>Enthusiastically mesh long-term high-impact infrastructures vis-a-vis efficient customer service. ally fashion wireless leadership rather than prospective experiences. Energistically myocardinate and-mortar testing procedures whereas next-generation manufactured products.</p>
                            <h4>Event Descriptione</h4>
                            <p>Wide potentialities. Progressively plagiarize resource-leveling e-commerce through resource-leveling core competencies. Dramatically mesh low-risk high-yield alignments before transparent e-tailers.Appropriately empower dynamic leadership skills after business portals.</p>
                        </div>
                    @if(count($tb_m_ticket)>0)
                        <div class="event-paticipant">
                            <h4>Peserta</h4>
                            <div class="membar-carousel owl-carousel owl-theme">
                                @foreach($tb_m_buy_ticket as $data)
                                <div class="membar-block">
                                    <div class="inner-box">
                                        <div class="thumb"><a href="#">
                                            <img src="
                                            {{ asset('img/Fotosiswa/'.$data->user->tb_m_siswa->foto) }}" 
                                            alt=""></a></div>
                                        <div class="membar-info">
                                            <h5 class="name">{{ $data->user->tb_m_siswa->nama_lengkap }}</h5>
                                            <span class="course">Art Courses</span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                    @endif
                                {{-- div class="membar-block">
                                    <div class="inner-box">
                                        <div class="thumb"><a href="#"><img src="/frontend/images/resource/membar-2.jpg" alt=""></a></div>
                                        <div class="membar-info">
                                            <h5 class="name">Marina Parven</h5>
                                            <span class="course">Art Courses</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="membar-block">
                                    <div class="inner-box">
                                        <div class="thumb"><a href="about.html"><img src="/frontend/images/resource/membar-3.jpg" alt=""></a></div>
                                        <div class="membar-info">
                                            <h5 class="name">Loosiya</h5>
                                            <span class="course">Art Courses</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="membar-block">
                                    <div class="inner-box">
                                        <div class="thumb"><a href="about.html"><img src="/frontend/images/resource/membar-1.jpg" alt=""></a></div>
                                        <div class="membar-info">
                                            <h5 class="name">Christina</h5>
                                            <span class="course">Art Courses</span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <!--  -->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    <aside class="sidebar event-sidebar">

                        <!-- Categories -->
       {{--                  <div class="sidebar-widget search-box">
                            <form method="post" action="http://t.commonsupport.com/arans/blog.html">
                                <div class="form-group">
                                    <input type="search" name="search-field" value="" placeholder="Serarch Event" required="">
                                    <button type="submit"><span class="icon flaticon-magnifying-glass"></span></button>
                                </div>
                            </form>
                        </div>
 --}}
                        <!-- Buy Tickets -->
                        
                                        @foreach($tb_m_ticket as $data)
                        
                        @if(Carbon\Carbon::now() <= $data->tersedia_tanggal )
                        <div class="sidebar-widget buy-ticket wow fadeInRight">
                            <div class="title">Tiket Belum Tersedia</div>
                        </div>
                        
                        @elseif($data->jumlah_tiket_tersedia <= $bookingticket)
                        <div class="sidebar-widget buy-ticket wow fadeInRight">
                            <div class="title">Tiket Habis</div>
                        </div>
                            
                        @elseif(Carbon\Carbon::yesterday() >= $data->sampai_tanggal )
                        <div class="sidebar-widget buy-ticket wow fadeInRight">
                            <div class="title">Tiket Tidak Tersedia</div>
                        </div>
                        

                        @elseif(Carbon\Carbon::now() >= $data->tersedia_tanggal )
                        <div class="sidebar-widget buy-ticket wow fadeInRight">
                            <div class="title">Beli Ticket</div>
                            <div class="content">
                            Tiket tersedia Hari : <b>{{Date::parse($data->tanggal_tersedia)->format('D,d M-Y')                     }}</b>
                            <br>
                            Sampai Hari : <b>{{ Date::parse($data->sampai_tanggal)->format('D,d M-Y') }}</b>
                                <ul class="ticket-info">
                                    <li>Total TIket <span>
                                        {{ $data->jumlah_tiket_tersedia }}
                                                    </span></li>
                                    <li>Tiket Terpesan <span>{{ $bookingticket }}</span></li>
                                    <li>Cost <span class="text-green">Free</span></li>
                                </ul>
                            <div class="link-box"><a href="{{ Route('guest.tb_m_event.buy',$data->id) }}" class="theme-btn btn-style-three">Beli Sekarang!</a></div>
                            <div class="message">Anda harus masuk 
                            <a href="{{Route('contact') }}">ke situs kami </a> untuk memesan tiket ini!</div>
                            </div>
                        </div>

                        
                        @endif

                                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection