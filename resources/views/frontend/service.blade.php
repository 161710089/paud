@extends('layouts.user')
@section('content')
   
    @foreach($tb_s_sekolah as $data)
        <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Service </title>
    @endforeach

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
    


<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
@endsection