<!DOCTYPE html>
@extends('layouts.user')
@section('content')
<!DOCTYPE html>
<head>
<meta charset="utf-8">
@foreach($tb_s_sekolah as $data)
<title>{{ $data->nama_sekolah }} - Taman Kanak kanak | Contact </title>
@endforeach

<!-- Stylesheets -->
<link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


<body>

    
       <section class="page-title">
        <div class="auto-container">
            <h1>Contact Us</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('Home') }}">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Info Section -->
    <section class="contact-info-section">
        <div class="auto-container">
            <div class="inner-container">
                <div class="row clearfix">
                    <!-- Contact Info Block -->
                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        @foreach($tb_s_sekolah as $data)
                        <div class="inner-box">
                            <h3>London, UK</h3>
                            <ul>
                                <li>{{ $data->alamat }} <br>London, N10 3LY</li>
                                <li>Tel: {{ $data->no_telepon }}</li>
                                <li>Email; <a href="#">Support@arans.com</a></li>
                            </ul>
                        </div>
                        @endforeach
                    </div>

                    <!-- Contact Info Block -->
                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <h3>New York, USA</h3>
                            <ul>
                                <li>10, Firs Avenue, Muswell Hill, <br>London, N10 3LY</li>
                                <li>Tel: 02 562-958</li>
                                <li>Email; <a href="#">Support@arans.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Contact Info Block -->
                    <div class="contact-info-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <h3>Tokyo, Japan</h3>
                            <ul>
                                <li>10, Firs Avenue, Muswell Hill, <br>London, N10 3LY</li>
                                <li>Tel: 02 562-958</li>
                                <li>Email; <a href="#">Support@arans.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Info Section -->

    <!-- Contact Form Section -->
    
      <section class="contact-form-section">
        <div class="auto-container">
            <div class="sec-title text-center light">
                <h2>Ambil <span>Langkah Pertama</span></h2>

                <div class="text">Without cross-media value. Quickly maximize timely deliverables for real-time schemas. Dramatically maintain .Nec archimedes<br> manifestam deceperunt eae cohibendam praecipuum propugnent.Co solere im to maxime manebo maxima me.</div>
            </div>

            <!-- Contact Form -->
           

            <div class="contact-form">
 
<div class="container">
 
@if(Session::has('success'))
   <div class="alert alert-success">
     {{ Session::get('success') }}
   </div>
@endif
 
{!! Form::open(['route'=>'contactus.store']) !!}
 <div class="row clearfix">
    <div class="col-lg-6 col-md-12 col-xs-12 form-group">                
<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
{!! Form::text('name', old('name'), ['placeholder'=>'Nama']) !!}
<span class="text-danger">{{ $errors->first('name') }}</span>
</div>
    </div>
 
    <div class="col-lg-6 col-md-12 col-xs-12 form-group">                
<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
{!! Form::text('email', old('email'), ['placeholder'=>'Email']) !!}
<span class="text-danger">{{ $errors->first('email') }}</span>
</div>
    </div>

<div class="col-lg-6 col-md-12 col-xs-12 form-group">                
<div class="form-group {{ $errors->has('subject') ? 'has-error' : '' }}">
{!! Form::text('subject', old('subject'), ['placeholder'=>'Subject']) !!}
<span class="text-danger">{{ $errors->first('subject') }}</span>
</div>
    </div>
 
    <div class="col-lg-6 col-md-12 col-xs-12 form-group">                
<div class="form-group {{ $errors->has('no_telepon') ? 'has-error' : '' }}">
{!! Form::text('no_telepon', old('no_telepon'), ['placeholder'=>'No Telepon']) !!}
<span class="text-danger">{{ $errors->first('no_telepon') }}</span>
</div>
    </div>


    <div class="col-lg-12 col-md-12 col-xs-12 form-group">                
<div class="form-group {{ $errors->has('message') ? 'has-error' : '' }}">
{!! Form::textarea('message', old('message'), ['placeholder'=>'Pesan']) !!}
<span class="text-danger">{{ $errors->first('message') }}</span>
</div>
    </div>

    <div class="col-lg-12 col-md-12 col-xs-12 form-group text-center">                
<div class="form-group">
<button class="theme-btn btn-style-two">Hubungi Kami!</button>
</div>
    </div>
</div>
{!! Form::close() !!}
 
</div>            </div>
        </div>
    </section>
  
    <!--End Contact Form Section -->
    <!-- Map Section -->
    @if($garis_bujurNull<1)
    @if($garis_lintangNull<1)
    @if($garis_lintang>0)
    @if($garis_bujur>0)
                @foreach($tb_s_sekolah as $data)
    <section class="map-section">
        <div class="auto-container">
            <div class="map-outer">
                <!--Map Canvas-->
                <div class="map-canvas"
                    data-zoom="15"
                    data-lat="{{ $data->tb_s_map->garis_bujur }}"
                    data-lng="{{ $data->tb_s_map->garis_lintang }}"
                    data-type="roadmap"
                    data-hue="#ffc400"
                    data-title="{{ $data->nama_sekolah }}"
                    data-icon-path="/frontend/images/icons/map-marker.png"
                    data-content="{{ $data->alamat }}<br><a href='https://mail.google.com'>{{ $data->Email }}</a>">
                </div>
            </div>
        </div>
    </section>
                @endforeach
    @else
    @endif
    @endif
    @endif
    @endif
    <!--End Map Section -->



                   
<script src="{{ asset('frontend/js/jquery.js') }}"></script> 
<script src="{{ asset('frontend/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('frontend/js/owl.js') }}"></script>
<script src="{{ asset('frontend/js/wow.js') }}"></script>
<script src="{{ asset('frontend/js/countdown.js') }}"></script>
<script src="{{ asset('frontend/js/isotope.js') }}"></script>
<script src="{{ asset('frontend/js/validate.js') }}"></script>
<script src="{{ asset('frontend/js/appear.js') }}"></script>
<script src="{{ asset('frontend/js/script.js') }}"></script>
<!--Google Map APi Key-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyBKS14AnP3HCIVlUpPKtGp7CbYuMtcXE2o"></script>
<script src="/frontend/js/map-script.js"></script>
<!--End Google Map APi-->


<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
@endsection
<!--Scroll to top-->
