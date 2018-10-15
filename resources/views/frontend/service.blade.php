@extends('layouts.user')
@section('content')
    <section class="page-title">
        <div class="auto-container">
            <h1>Services</h1>
            <ul class="page-breadcrumb">
                <li><a href="index-2.html">Home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

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

    <!-- Services Section -->
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
                
            </div>
        </div>
    </section>
    <!--End Services Section -->

    <!-- Next Event -->
    <section class="next-event" style="background-image: url(/frontend/images/background/4.jpg);">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h2>Next <span>Event</span></h2>
                        <div class="text">Solutions.Completely synergize resource taxing .Dynamically target high-payoff intellectual capital for customized technologies. Objectively integrate emerging core competencies before process-centric communities. Dramatically evisculate holistic innovation rather than client-centric data.</div>
                        <ul class="list-style-one">
                            <li>Progressively maintain extensive</li>
                            <li>20+ predefined pages</li>
                            <li>Pleasant colors</li>
                            <li>Premium plugins</li>
                        </ul>

                        <!-- Countdown -->
                        <div class="timer">
                            <div class="cs-countdown" data-countdown="10/20/2018 05:06:59"></div>            
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="form-column col-lg-4 col-md-12 col-sm-12 wow fadeInRight">
                    <div class="inner-column">
                        <div class="register-form">
                            <h3>Register Now</h3>
                             <form method="post" action="http://t.commonsupport.com/arans/index.html">
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="Your Name" required="">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your Email" required="">
                                </div>

                                <div class="form-group">
                                    <textarea name="message" placeholder="Massage"></textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button class="theme-btn btn-style-one" type="submit" name="submit-form">Send Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
@endsection