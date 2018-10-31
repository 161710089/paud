<!DOCTYPE html>
@extends('layouts.artikel')
@section('content')
<body>

@php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp

    @foreach($tb_s_sekolah as $data)
    <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Artikel </title>
    @endforeach


    <!-- Sidebar Page Container -->
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-standard">
                        @if(count($tb_m_artikel)>0)
                        @foreach($tb_m_artikel as $data)
                        <div class="news-block-two wow fadeIn">
                            <div class="inner-box">
                                <ul class="info-list">
                                    <li><span class="date">{{Date::parse($data->created_at)->format('d')}}</span>{{Date::parse($data->created_at)->format('M Y')}}</li>
                                    <li><span class="fa fa-user"></span> {{ $data->user->name }}</li>
                                    <li><span class="fa fa-heart"></span> 128 Likes</li>
                                    <li><span class="fa fa-comment"></span> 32 Comments</li>
                                </ul>
                                <h3><a href="moreartikel/show-artikel/{{ $data->slug }}">{{ $data->judul }}</a></h3>
                                <div class="image-box">
                                    <div class="image"><a href="moreartikel/show-artikel/{{ $data->slug }}">
                                        <img src="{{ asset('img/Fotoartikel/'.$data->foto) }}" 
                                             style="max-height:400px; max-width: 750px; min-height:400px; min-width: 750px; margin-top:7px;" alt=""></a></div>
                                </div>
                                <div class="text"><h6>{!! str_limit($data->deskripsi , 350) !!}</h6></div>
                                <div class="btn-box">
                                    <a href="moreartikel/show-artikel/{{ $data->slug }}" class="theme-btn btn-style-one">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <center>    
                        <h1>Belum Ada Artikel</h1>
                        </center>
                        @endif

                        <!-- News Block Two -->
                      {{--   <div class="news-block-two wow fadeIn">
                            <div class="inner-box">
                                <ul class="info-list">
                                    <li><span class="date">02</span> April 2018</li>
                                    <li><span class="fa fa-user"></span> ApRobot Smith</li>
                                    <li><span class="fa fa-heart"></span> 128 Likes</li>
                                    <li><span class="fa fa-comment"></span> 32 Comments</li>
                                </ul>
                                <h3><a href="blog-single-1.html">Play is Our Brain’s Favorite Way of Learning</a></h3>
                                <div class="image-box">
                                    <div style="padding:56.25% 0 0 0;position:relative;"><iframe src="https://player.vimeo.com/video/30133754" style="position:absolute;top:0;left:0;width:100%;height:100%;"></iframe>
                                    </div>
                                </div>
                                <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinkingLeveragetions.</div>
                                <div class="btn-box">
                                    <a href="blog-single-1.html" class="theme-btn btn-style-one">Read More</a>
                                </div>
                            </div>
                        </div>
 --}}
                        <!-- News Block Two -->
{{--                         <div class="news-block-two wow fadeIn">
                            <div class="inner-box">
                                <ul class="info-list">
                                    <li><span class="date">02</span> April 2018</li>
                                    <li><span class="fa fa-user"></span> ApRobot Smith</li>
                                    <li><span class="fa fa-heart"></span> 128 Likes</li>
                                    <li><span class="fa fa-comment"></span> 32 Comments</li>
                                </ul>
                                <h3><a href="blog-single-1.html">Play is Our Brain’s Favorite Way of Learning</a></h3>
                                <div class="image-box">
                                    <div class="single-item-carousel owl-carousel owl-theme">
                                        <div class="image"><a href="blog-single-1.html"><img src="/frontend/images/resource/blog-2.jpg" alt=""></a></div>
                                        <div class="image"><a href="blog-single-1.html"><img src="/frontend/images/resource/blog-1.jpg" alt=""></a></div>
                                        <div class="image"><a href="blog-single-1.html"><img src="/frontend/images/resource/blog-3.jpg" alt=""></a></div>
                                    </div>
                                </div>
                                <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinkingLeveragetions.</div>
                                <div class="btn-box">
                                    <a href="blog-single-1.html" class="theme-btn btn-style-one">Read More</a>
                                </div>
                            </div>
                        </div>
 --}}
                        <!-- News Block Two -->
    {{--                     <div class="news-block-two wow fadeIn">
                            <div class="inner-box">
                                <ul class="info-list">
                                    <li><span class="date">02</span> April 2018</li>
                                    <li><span class="fa fa-user"></span> ApRobot Smith</li>
                                    <li><span class="fa fa-heart"></span> 128 Likes</li>
                                    <li><span class="fa fa-comment"></span> 32 Comments</li>
                                </ul>
                                <h3><a href="blog-single-1.html">Play is Our Brain’s Favorite Way of Learning</a></h3>
                                <div class="image-box">
                                   <iframe style="width:100%; border:none;" height="215" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/289259586&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>
                                </div>
                                <div class="text">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinkingLeveragetions.</div>
                                <div class="btn-box">
                                    <a href="blog-single-1.html" class="theme-btn btn-style-one">Read More</a>
                                </div>
                            </div>
                        </div>
 --}}
                        <!-- Styled Pagination -->
                        {{ $tb_m_artikel->appends(request()->input())->links() }}
    
                    </div>
                </div>
                <!-- Sidebar Side -->
             
    
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
@endsection
