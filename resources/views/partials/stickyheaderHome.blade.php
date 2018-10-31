     <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                		@foreach($tb_s_sekolah as $data)
                    <a href="/" title=""><img src="{{ asset('img/FotoSekolah/'.$data->logo) }}" style="max-height:60px; max-width: 60px; margin-top:7px;"></a>
                    	@endforeach
                  
                </div>
                <!--Right Col-->
                <div class="pull-right">
                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix">
                                     <li><a href="{{ route('Home') }}">Home</a></li>
                         			 <li><a href="{{ Route('about_us') }}">About Us</a></li>
                                <li class="dropdown"><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="service">Services</a></li>
                                        <li><a href="moreEvent">Event</a></li>
                                        <li><a href="moreartikel">Artikel</a></li>
                                    </ul>
                                </li> 
                               <li><a href="moreGallery">Gallery</a></li>

                                <li><a href="{{ Route('contact') }}">Contact</a></li>
                                <li><a href="\login">Sign in</a></li>
                            </ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div>
   