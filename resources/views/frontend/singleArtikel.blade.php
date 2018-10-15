@extends('layouts.artikel')
@section('content')
  @php
use Jenssegers\Date\Date;

Date::setLocale('id');
@endphp

     <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="blog-single">
                        <div class="news-block-two wow fadeIn">
                            <div class="inner-box">
                                <ul class="info-list">
                                    <li><span class="date">{{Date::parse($tb_m_artikel_single->created_at)->format('d')}}</span>{{Date::parse($tb_m_artikel_single->created_at)->format('M Y')}}</li>
                                    <li><span class="fa fa-user"></span> {{ $tb_m_artikel_single->user->name }}</li>
                                    <li><span class="fa fa-heart"></span> 128 Likes</li>
                                    <li><span class="fa fa-comment"></span> 32 Comments</li>
                                </ul>
                                <h3>{{ $tb_m_artikel_single->judul }}</h3>
                                <div class="image-box">
                                    <div class="image">
                                        <img src="{{ asset('img/Fotoartikel/'.$tb_m_artikel_single->foto) }}" 
                                             style="max-height:400px; max-width: 750px; min-height:400px; min-width: 750px; margin-top:7px;" alt=""></div>
                                </div>
                                  <p>{!! $tb_m_artikel_single->deskripsi !!}</p>
                              {{--   <div class="post-image">
                                    <div class="row clearfix">
                                        <div class="column col-lg-6 col-md-6 col-sm-12 wow fadeInUp">
                                           <div class="image"><a href="/frontend/images/resource/post-image-1.jpg" class="lightbox-image" tb_m_artikel_single-fancybox="gallery"><img src="/frontend/images/resource/post-image-1.jpg" alt=""></a></div>
                                        </div>
                                    </div>
                                </div>
                                <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a Capitalize on low hanging fruit to identify a ballpark </p>
                                <div class="individual-classes">
                                    <h4>Individual attention in small classes</h4>
                                    <p>win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal.</p>
                                    <ul class="list-style-three">
                                        <li>Learning program with after-school</li>    
                                        <li>Opportunities to scientific experiments</li>    
                                        <li>Positive learning environment</li>    
                                        <li>Individual attention in small classes</li>    
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                        
                        <!-- Post Control  -->
                        <div class="post-control">
                            <ul class="row clearfix">
                                <li class="prev col-lg-6 col-md-6 col-sm-12"><a href="#"><span class="fa fa-angle-left"></span> Previous Post</a></li>
                                <li class="next col-lg-6 col-md-6 col-sm-12"><a href="#">Next Post <span class="fa fa-angle-right"></span></a></li>
                            </ul>
                        </div>

                        <!-- Post Share Option -->
                        <div class="post-share-options clearfix">
                            <h5>Share</h5>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook-official"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
                            </ul>
                        </div>

                        <!-- Comments Area -->
             {{--            <div class="comments-area">
                            <div class="group-title"><h4>Comments (3)</h4></div>
                            <div class="comment-box">
                                <!-- Comment -->
                                <div class="comment">
                                    <div class="author-thumb"><img src="/frontend/images/resource/author-thumb-1.jpg" alt=""></div>
                                    <div class="comment-info">
                                        <div class="name">Nattasha</div>
                                        <div class="designation">Designer</div>
                                    </div>
                                    <div class="text">Cumque haereo procul ita meo cetera minima eam monere. Mei duo vulgus potens mandat utiles notatu. Competit extensum.</div>
                                    <a href="#" class="reply-btn"><span class="fa fa-mail-forward"></span></a>
                                </div>

                                <!-- Comment -->
                                <div class="comment">
                                    <div class="author-thumb"><img src="/frontend/images/resource/author-thumb-2.jpg" alt=""></div>
                                    <div class="comment-info">
                                        <div class="name">John Doe</div>
                                        <div class="designation">Developer</div>
                                    </div>
                                    <div class="text">Cumque haereo procul ita meo cetera minima eam monere. Mei duo vulgus potens mandat utiles notatu. Competit extensum.</div>
                                    <a href="#" class="reply-btn"><span class="fa fa-mail-forward"></span></a>
                                </div>

                                <!-- Comment -->
                                <div class="comment">
                                    <div class="author-thumb"><img src="/frontend/images/resource/author-thumb-3.jpg" alt=""></div>
                                    <div class="comment-info">
                                        <div class="name">Peeter son</div>
                                        <div class="designation">Designer</div>
                                    </div>
                                    <div class="text">Cumque haereo procul ita meo cetera minima eam monere. Mei duo vulgus potens mandat utiles notatu. Competit extensum.</div>
                                    <a href="#" class="reply-btn"><span class="fa fa-mail-forward"></span></a>
                                </div>
                            </div>
                        </div>
 --}}
                        <!-- Comments Form -->
                        {{-- <div class="comment-form">
                            <div class="group-title"><h4>Leave a Reply</h4></div>
                            <!--Comment Form-->
                            <form method="post" action="http://t.commonsupport.com/arans/blog.html">
                                <div class="row clearfix">
                                    <div class="col-lg-6 col-md-12 col-xs-12 form-group">
                                        <input type="text" name="username" placeholder="Name" required="">
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <input type="email" name="email" placeholder="Email" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <input type="tel" name="phone" placeholder="Phone" required="">
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                        <input type="url" name="website" placeholder="Website" required="">
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea name="message" placeholder="Your Comments"></textarea>
                                    </div>
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form">Post Comment</button>
                                    </div> 
                                </div>
                            </form>
                        </div> --}}


<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://tk-kamikinde.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

<script id="dsq-count-scr" src="//EXAMPLE.disqus.com/count.js" async></script>             

                    </div>
                </div>
@endsection
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-double-up"></span></div>
