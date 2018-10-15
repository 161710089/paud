 <footer class="main-footer">
        <!-- Footer upper -->
        <div class="footer-upper">
            <div class="inner-container">
                <!--Widgets Section-->
                <div class="widgets-section">
                    <div class="row clearfix">       
                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-12 col-sm-12">
                            <div class="footer-widget testimonial-widget">                            
                                <div class="single-item-carousel owl-carousel owl-theme">
                                    <div class="testimonial-block">
                                        <h2 class="name">John doue</h2>
                                        <div class="inner-box">
                                            <div class="thumb"><img src="/frontend/images/resource/thumb-1.jpg" alt=""></div>
                                            <div class="text">Efficiently enable enabled sources and cost Procces Affective Products. Completely synthesize princi centered sources and cost effective products.</div>
                                            <ul class="social-links">
                                                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="testimonial-block">
                                        <h2 class="name">John doue</h2>
                                        <div class="inner-box">
                                            <div class="thumb"><img src="/frontend/images/resource/thumb-1.jpg" alt=""></div>
                                            <div class="text">Efficiently enable enabled sources and cost Procces Affective Products. Completely synthesize princi centered sources and cost effective products.</div>
                                            <ul class="social-links">
                                                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="testimonial-block">
                                        <h2 class="name">John doue</h2>
                                        <div class="inner-box">
                                            <div class="thumb"><img src="/frontend/images/resource/thumb-1.jpg" alt=""></div>
                                            <div class="text">Efficiently enable enabled sources and cost Procces Affective Products. Completely synthesize princi centered sources and cost effective products.</div>
                                            <ul class="social-links">
                                                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget post-widget">
                                <h2 class="widget-title">Recent Post</h2>
                                <div class="widget-content">
                                    <!-- Recent Post -->
                                   @foreach($tb_m_artikel as $data)
                                    <article class="post">
                                        <span class="date">{{Date::parse($data->create_at)->format('d M')}}</span>
                                        <h4><a href="moreartikel/show-artikel/{{ $data->slug }}">{{ $data->judul }}</a></h4>
                                    </article>
                                    @endforeach
                                </div>
                            </div>  
                        </div>         
                        
                        <!--Footer Column-->
                        <div class="footer-column col-lg-4 col-md-6 col-sm-12">
                            <div class="footer-widget gallery-widget">
                                <h2 class="widget-title">Widget Gallery</h2>
                                <div class="widget-content">
                                    <div class="outer clearfix">
                                        @foreach($widgetgallery as $data)
                                         <figure class="image">
                                            <a href="{{ asset('img/Fotogallery/'.$data->foto) }}" class="lightbox-image" title="{{ $data->judul }}">
                                            	<img src="{{ asset('img/Fotogallery/'.$data->foto) }}" style="max-height:92px; max-width: 92px; min-height:92px; min-width: 92px; margin-top:7px;"></a>
                                        </figure>
                                        @endforeach

                                        
                                    </div>
                                </div>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      {{-- End Main Footer --}}

		<!-- Footer Lower -->
        <div class="footer-lower">
            <div class="auto-container">
                <div class="inner-box">
                    <div class="logo-box">
                    	@foreach($tb_s_sekolah as $data)
                        <figure><img src="{{ asset('img/FotoSekolah/'.$data->logo) }}" style="max-height:100px; max-width: 100px; margin-top:7px;" alt="footer logo"></figure>
                    	@endforeach
                    </div>
                    <div class="footer-social-links">
                        <ul class="social-links">
                        	@foreach($tb_s_sekolah as $data)
                            <li><a href="{{ $data->tb_s_sosmed->Facebook }}">Facebook</a></li>
                            <li><a href="{{ $data->tb_s_sosmed->Twitter }}">Twitter</a></li>
                            <li><a href="{{ $data->tb_s_sosmed->Instagram }}">Instagram</a></li>
                            <li><a href="#">Pinterest</a></li>
                            <li><a href="#">Linkedin</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>                                                                  
            </div>
        </div>
        {{-- End Footer Lower --}}


        <!--Footer Bottom-->
         <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright-text clearfix">
                    <div class="text">© Copyright 2018 <a href="/">
                    	@foreach($tb_s_sekolah as $data)
                    	{{ $data->nama_sekolah }}
                    	@endforeach
                    </a>. All Rights Reserved</div>
                    <div class="link">
                        <a href="Wonderful Education HTML Template">Wonderful Education HTML Template</a>                    
                    </div>
                </div>
            </div>
        </div>
    </footer>
   