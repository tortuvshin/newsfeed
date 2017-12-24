<div id="bottom-sidebar">

    <div class="wrapper">

        <div class="row">
            
            <div class="col-md-3 col-sm-3 widget-area-11">

                <div class="widget widget_text">
                    <div id="footer-logo-image"><a href="index.html" style="color: red;font-size: 55px;font-family: fantasy;">Newsfeed</a></div>
                    <p>
2017 оны арванхоёрдугаар сараас www.newsfeed.mn сайтыг эрхлэн гаргаж байна. Мэдээллийг цаг тутам, шуурхай оруулах болсон анхны сайт байснаараа түргэн хугацаанд амжилт олж, өдгөө олон мянган монголчуудын өдөр тутмын хэрэглээ болсон байна.</p>
                </div>
                <!-- end:widget_text -->

                <div class="widget punica-contact-info-widget">

                    <p class="contact-address">Улаанбаатар хот</p>

                    <p class="contact-phone"><span>Утас:&nbsp;</span><a href="callto:99991111">+976 9999 1111</a></p>

                    <p class="contact-email"><span>Мэйл хаяг:&nbsp;</span><a href="mailto:contact@newsfeed.mn">contact@newsfeed.mn</a></p>
                    
                </div>
                <!-- end:punica-contact-info-widget -->
                
            </div>
            <!-- end:col-md-3 -->

            <div class="col-md-3 col-sm-3 widget-area-12">

                <div class="widget punica-article-list-4-widget">

                    <div class="widget-title widget-title-s5 clearfix"><h2><span>Сүүлд нэмэгдсэн</span></h2></div>

                    <ul class="clearfix">
                       
                        @if(isset($lastTrending))
                            @foreach($lastTrending->slice(0,3) as $item)
                             <li>
                                <article class="entry-item clearfix">
                                    <div class="entry-thumb pull-left">
                                        <a href="#"><img src="{{ makepreview($item->thumb, 's', 'posts') }}" alt=""></a>
                                    </div>
                                    <!-- end:entry-thumb -->
                                    <div class="entry-content">
                                        <header class="clearfix">
                                            <span class="entry-date pull-left clearfix">
                                                <i class="fa fa-clock-o pull-left"></i>
                                                <span class="month pull-left">{{ $item->created_at->diffForHumans() }}</span>
                                            </span>
                                            <!-- end:entry-date -->
                                            <span class="entry-meta pull-left">,&nbsp;</span>
                                            <span class="entry-author clearfix pull-left">
                                                <a href="#" class="pull-left">{{ $item->user->username }}</a>
                                            </span>
                                            <!-- end:entry-author -->
                                        </header>

                                        <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 50) }}</a></h6>
                                    </div>
                                    <!-- end:entry-content -->
                                </article>
                                <!-- end:entry-item -->
                            </li>
                            @endforeach
                        
                        @endif
                    </ul>
                    
                </div>
                <!-- end:punica-article-list-4-widget -->
                
            </div>
            <!-- end:col-md-3 -->

            <div class="col-md-3 col-sm-3 widget-area-13">

                <div class="widget punica-flickr-widget">

                    <div class="widget-title widget-title-s5 clearfix"><h2><span>Зургийн цомог</span></h2></div>

                    <div class="widget-content">
                        <div class="flickr-wrap clearfix" data-user="129289431@N06">
                            <ul class="clearfix list-unstyled"></ul>
                        </div>
                        <!--flickr-wrap-->
                    </div>
                    <!-- widget-content -->
                    
                </div>
                <!-- punica-flickr-widget -->
                
            </div>
            <!-- end:col-md-3 -->

            <div class="col-md-3 col-sm-3 widget-area-14">

                <div class="widget punica-newsletter-widget">

                    <div class="widget-title widget-title-s5 clearfix"><h2><span>Мэдээлэл авах</span></h2></div>
                    
                    <form class="newsletter-form clearfix" method="post" action="processNewsletterForm.php">
                        
                        <p class="input-email clearfix">
                            <input type="text" size="40" class="email" value="" name="email" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
                            <input type="submit" class="submit" value="Бүртгүүлэх">
                        </p>

                        <p>Мэйл хаягаа бүртгүүлж шинэ мэдээлэл цаг алдалгүй аваарай</p>

                    </form>
                    <div id="newsletter-response"></div>

                </div>
                <!-- end:punica-newsletter-widget -->

                <div class="widget">

                    <p>Сошиалд биднийг дагаарай:</p>

                    <ul class="social-links clearfix">
                        <li><a href="#" class="fa fa-facebook"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-tumblr"></a></li>
                        <li><a href="#" class="fa fa-rss"></a></li>
                        <li><a href="#" class="fa fa-skype"></a></li>
                        <li><a href="#" class="fa fa-youtube"></a></li>
                        <li><a href="#" class="fa fa-google-plus"></a></li>
                    </ul>
                    
                </div>
                <!-- end:punica-payment-widget -->
                
            </div>
            <!-- end:col-md-3 -->

        </div>
        <!-- end:row -->
        
    </div>
    <!-- end:wrapper -->

    <div class="mask"></div>
    
</div>
<!-- end:bottom-sidebar -->

<footer id="punica-page-footer">

    <div class="wrapper clearfix">

        <p id="copyright" class="pull-left">Copyright 2017. Бүх эрх хуулиар хамгаалагдсан</p>

        <p id="back-top" class="pull-right">
            <a href="#top" class="clearfix">Дээшээ буцах</a>
        </p>
        <!-- end:back-top -->
        
    </div>
    <!-- end:wrapper -->   
    
</footer>