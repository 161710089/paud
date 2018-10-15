@extends('layouts.user')
@section('content')
 @php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp

    <section class="page-title">
        <div class="auto-container">
            <h1>Events</h1>
            <ul class="page-breadcrumb">
                <li><a href="index-2.html">Home</a></li>
                <li>Events</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Event Section -->
    <section class="event-section">
        <div class="auto-container">
            <div class="event-table">
                <div class="title-box"><span class="icon fa fa-calendar"></span> Event</div>
                <!-- Event Block -->
                @foreach($tb_m_event as $data)
                <div class="event-block wow fadeInUp">
                    <div class="inner-box clearfix">
                        
                        <div class="image-column">
                            <div class="image"><a href="moreEvent/show-event/{{ $data->slug }}">
                                <img src="{{ asset('img/Fotoevent/'.$data->foto) }}" alt=""></a></div>
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
                                <li><a href="moreEvent/show-event/{{ $data->slug }}"><i class="fa fa-user"></i>{{ $data->tb_m_pengajar->nama }}</a></li>
                            </ul>
                        </div>

                        <div class="room-column">
                            <span>Hall No 01</span>
                        </div>

                        <div class="link-column">
                            <a href="moreEvent/show-event/{{ $data->slug }}" class="theme-btn">Register</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- Event Block -->
                
            </div>

            
        </div>
    </section>
    <!--End Event Section -->

  
@endsection