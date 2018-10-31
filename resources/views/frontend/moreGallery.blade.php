<!DOCTYPE html>
@extends('layouts.user')
@section('content')


    @foreach($tb_s_sekolah as $data)
        <title>{{ $data->nama_sekolah }} - Taman kanak-kanak | Gallery </title>
    @endforeach

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
                                                  
                    
                  </div>

                <div class="items-container row clearfix">
                
                    <!--Project Block Two-->
                  
                     @foreach($tb_m_gallery as $data) 
                    <div class="project-block masonry-item width-20 all {{ $data->tb_m_kategori_gallery->kategori }} col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                               <img src="{{ asset('img/Fotogallery/'.$data->foto) }}" style="max-height:225px; 
                               min-height:225px; margin-top:7px;"> 
                               <div class="overlay-box">
                                <a href="{{ asset('img/Fotogallery/'.$data->foto) }}" style="background-image: 
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
    <section class="gallery-section">
        <div class="auto-container">
            <div class="sec-title text-center pink-devider">
                <h2>Belum Ada <span>Gallery</span></h2>
            </div>

        </div>
    </section>
@endif
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>

@endsection