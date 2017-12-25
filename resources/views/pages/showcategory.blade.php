@extends("app")

@section('head_title', $category->name .' | '.getcong('sitename') )
@section('head_description', $category->description )

@section("content")

<div id="main-content" style="padding-top: 45px;">

    <div class="breadcrumb clearfix">
        <div class="wrapper">
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                <a href="index.html" itemprop="url">
                    <span itemprop="title">Home</span>
            </a>
            </span>
            <span>&nbsp;|&nbsp;</span>
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="current-page"><span itemprop="title">Categories</span></span>
        </div>
        <!-- end:wrapper -->
    </div>
    <!-- breadcrumb -->

    <div class="wrapper clearfix">
        <div class="widget-area-4">

            <div class="widget punica-article-list-3-widget">

                <div class="widget-content clearfix">

                    <div class="mask"></div>

                    <article class="last-item pull-left">

                        <div class="entry-content">
                            <header class="clearfix">
                                <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                <span class="date pull-left">23</span>
                                </span>
                                <!-- end:entry-date -->
                                <span class="entry-meta pull-left">,&nbsp;</span>
                                <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                <a href="#" class="pull-left">Jack grove</a>
                                </span>
                                <!-- end:entry-author -->
                            </header>

                            <h2 class="entry-title"><a href="#">New York City Ebola Patient's Condition Upgraded from 'Serious' to 'Stable'</a></h2>
                            <p class="entry-excerpt">Vivamus auctor quam nec mauris commodo laoreet. Nam ut metus elementum, pharetra diam sed, rhoncus tortor. Sed vehicula justo ut sem auctor sagittis. Sed vehicula justo ut sem auctor sagittis.</p>
                        </div>

                    </article>
                    <!-- end:last-item -->

                    <ul class="older-post clearfix pull-left">
                        <li>
                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a href="#" class="entry-categories pink">Life style</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img src="placeholders/post-image/post-28.jpg" alt=""></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <h6 class="entry-title"><a href="#">10 Questions To Ask Before Getting Your Next Travel Credit Card</a></h6>
                                </div>
                            </article>
                            <!-- end:entry-item -->
                        </li>
                        <li>
                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a href="#" class="entry-categories green">World</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img src="placeholders/post-image/post-4.jpg" alt=""></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <h6 class="entry-title"><a href="#">10 Questions To Ask Before Getting Your Next Travel Credit Card</a></h6>
                                </div>
                            </article>
                            <!-- end:entry-item -->
                        </li>
                        <li>
                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a href="#" class="entry-categories orange">Foods</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img src="placeholders/post-image/post-29.jpg" alt=""></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <h6 class="entry-title"><a href="#">10 Questions To Ask Before Getting Your Next Travel Credit Card</a></h6>
                                </div>
                            </article>
                            <!-- end:entry-item -->
                        </li>
                        <li>
                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a href="#" class="entry-categories blue">Culture</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img src="placeholders/post-image/post-30.jpg" alt=""></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <h6 class="entry-title"><a href="#">10 Questions To Ask Before Getting Your Next Travel Credit Card</a></h6>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->
                        </li>
                    </ul>

                </div>
                <!-- end:widget-content -->

            </div>
            <!-- end:punica-article-list-3-widget -->

        </div>
        <div class="col-a pull-left">

            <section class="widget-area-15">

                <div class="widget punica-post-list-1-widget">

                    <div class="row">

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories blue" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-20.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories pink" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-21.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories orange" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-22.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                    </div>
                    <!-- end:row -->

                    <div class="row">

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories blue" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-20.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories pink" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-21.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories orange" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-22.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                    </div>
                    <!-- end:row -->

                    <div class="row">

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories blue" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-20.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories pink" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-21.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories orange" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-22.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                    </div>
                    <!-- end:row -->

                    <div class="row">

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories blue" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-20.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories pink" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-21.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                        <div class="col-md-4">

                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a class="entry-categories orange" href="#">News</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img alt="" src="placeholders/post-image/post-22.jpg"></a>
                                    </div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">Warning of a ‘winter of discontent’ over university pensions</a></h6>

                                    <p>Proin eu sapien non tortor mattis auctor ac sit amet justo. Aliquam pellentesque odio quis eleifend aliquet. In id sodales dui. Pellentesque ac est risus. Vestibulum</p>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->

                        </div>
                        <!-- end:col-md-4 -->

                    </div>
                    <!-- end:row -->

                    <div class="pagination clearfix">
                        <ul class="page-numbers clearfix">
                            <li><a class="first page-numbers" href="#">Previous</a></li>
                            <li><a class="page-numbers" href="#">1</a></li>
                            <li><span class="page-numbers current">2</span></li>
                            <li><span class="page-numbers dots">…</span></li>
                            <li><a class="page-numbers" href="#">8</a></li>
                            <li><a class="page-numbers" href="#">9</a></li>
                            <li><a href="#" class="last page-numbers">Next</a></li>
                        </ul>
                        <!--page-numbers-->
                    </div>
                    <!-- pagination -->

                </div>
                <!-- end:widget -->

            </section>
            <!-- end:widget-area-15 -->

        </div>
        <!-- end:col-a -->

        <aside class="sidebar pull-left">

            <div class="widget punica-social-widget">

                <h2 class="widget-title widget-title-s2"><span>Follow newsweek</span></h2>

                <ul class="clearfix">
                    <li class="mail-icon">
                        <a href="#" class="fa fa-envelope"></a>
                    </li>
                    <li class="facebook-icon">
                        <a href="#" class="fa fa-facebook"></a>
                    </li>
                    <li class="twitter-icon">
                        <a href="#" class="fa fa-twitter"></a>
                    </li>
                    <li class="gplus-icon">
                        <a href="#" class="fa fa-google-plus"></a>
                    </li>
                    <li class="linkedin-icon">
                        <a href="#" class="fa fa-linkedin"></a>
                    </li>
                    <li class="rss-icon">
                        <a href="#" class="fa fa-rss"></a>
                    </li>
                </ul>

                <form class="newsletter-form clearfix" method="post" action="processNewsletterForm.php">
                    <p>Get top stories emailed to you each day.</p>
                    <p class="input-email clearfix">
                        <input type="text" size="40" class="email" value="" name="email" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
                        <input type="submit" class="submit" value="Subcribe">
                    </p>
                </form>

            </div>
            <!-- end:punica-social-widget -->

            <div class="widget punica-tab-1-widget">

                <div class="punica-tab-container-1">

                    <ul class="nav nav-tabs punica-tabs-1">
                        <li class="active"><a href="#tab1-1" data-toggle="tab">Most popular</a></li>
                        <li class=""><a href="#tab1-2" data-toggle="tab">Comments</a></li>
                    </ul>
                    <!-- nav-tabs -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1-1">

                            <ul class="clearfix">

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-8.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">New York City Ebola Patient's Condition Upgraded from 'Serious' to 'Stable'</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-9.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">Suspected Suicide Bomber Kills 45 on Pakistani-Indian Border</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-10.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">Suspension is a feminist issue</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-11.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">Privately educated gain £1,500 salary premium</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-11.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">Privately educated gain £1,500 salary premium</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                            </ul>

                        </div>
                        <!-- tab-panel -->
                        <div class="tab-pane" id="tab1-2">

                            <ul class="clearfix">

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-11.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">Privately educated gain £1,500 salary premium</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-11.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">Privately educated gain £1,500 salary premium</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-8.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">New York City Ebola Patient's Condition Upgraded from 'Serious' to 'Stable'</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-9.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">Suspected Suicide Bomber Kills 45 on Pakistani-Indian Border</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                                <li>
                                    <article class="entry-item clearfix">
                                        <div class="entry-thumb pull-left">
                                            <a href="#"><img src="placeholders/post-image/post-10.jpg" alt=""></a>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">

                                            <header class="clearfix">
                                                <span class="entry-date pull-left clearfix">
                                                    <i class="fa fa-clock-o pull-left"></i>
                                                    <span class="month pull-left">Sep.</span>
                                                <span class="date pull-left">23</span>
                                                </span>
                                                <!-- end:entry-date -->
                                                <span class="entry-meta pull-left">,&nbsp;</span>
                                                <span class="entry-author clearfix pull-left">
                                                    <span class="pull-left">By&nbsp;</span>
                                                <a href="#" class="pull-left">Jack grove</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="#">Suspension is a feminist issue</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </li>

                            </ul>

                        </div>
                        <!-- tab-panel -->

                    </div>
                    <!-- tab-content -->

                </div>
                <!-- punica-tab-container-1 -->

            </div>
            <!-- end:punica-tab-1-widget -->

            <div class="widget punica-article-list-5-widget">

                <div class="widget-content">

                    <h2 class="widget-title widget-title-s4">Celebrity blogs</h2>

                    <ul class="clearfix">
                        <li>
                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a href="#" class="entry-categories orange">Foods</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img src="placeholders/post-image/post-2.jpg" alt=""></a>
                                    </div>
                                    <div class="mask"></div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a href="#" class="pull-left">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">10 Questions To Ask Before Getting Your Next Travel Credit Card</a></h6>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->
                        </li>
                        <li>
                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a href="#" class="entry-categories green">World</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img src="placeholders/post-image/post-3.jpg" alt=""></a>
                                    </div>
                                    <div class="mask"></div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a href="#" class="pull-left">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">10 Questions To Ask Before Getting Your Next Travel Credit Card</a></h6>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->
                        </li>
                        <li>
                            <article class="entry-item">
                                <div class="entry-thumb">
                                    <a href="#" class="entry-categories pink">Life style</a>
                                    <div class="punica-zoom-effect">
                                        <a href="#"><img src="placeholders/post-image/post-27.jpg" alt=""></a>
                                    </div>
                                    <div class="mask"></div>
                                </div>
                                <!-- end:entry-thumb -->
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a href="#" class="pull-left">Jack grove</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h6 class="entry-title"><a href="#">10 Questions To Ask Before Getting Your Next Travel Credit Card</a></h6>
                                </div>
                                <!-- end:entry-content -->
                            </article>
                            <!-- end:entry-item -->
                        </li>
                    </ul>

                </div>

            </div>
            <!-- end:punica-article-list-5-widget -->

        </aside>
        <!-- sidebar -->

        <div class="clear"></div>

    </div>
    <!-- end:wrapper -->

</div>

@if(!empty($lastFeaturestop))

    <div class="content shay">

        <div class="container shay">

            <div class="row homefeatures clearfix">
                <h1 style="margin-left: 5px;"><span style="font-weight: 700;">{{ $category->name }}</span>  <small style="color:#f1f1f1">|</small>

                        @foreach(\App\Categories::where('type', $category->id)->orderBy('name')->groupBy('name')->get() as $cat)

                                <a style="font-size:16px;margin-left:10px;color:#999;" data-type="{{ $cat->name_slug }}" href="/{{ $cat->name_slug }}"> {{ $cat->name }}</a>

                        @endforeach

                </h1>
                <div class="pull-l">
                    @foreach($lastFeaturestop->slice(0,1) as $item)
                        <div class="tile tile-2">
                            @include('._particles._lists.features_list', ['descof' => 'on','metaon' => 'on'])

                        </div>
                    @endforeach

                </div>
                <div class="pull-l">
                    @foreach($lastFeaturestop->slice(1,1) as $item)
                        <div class="tile tile-1">
                            @include('._particles._lists.features_list', ['descof' => 'on','metaon' => 'on'])

                        </div>
                    @endforeach

                </div>

                <div class="pull-l tway">
                    @foreach($lastFeaturestop->slice(2,2) as $item)
                        <div class="tile tile-3">
                            @include('._particles._lists.features_list', ['metaon' => 'on'])

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endif

    <div class="content">

        <div class="container">

            <div class="mainside cat">
                <div class="external-sign-in rss" style="margin:0;padding:0;width:auto;float:right">
                    <a class="Rss mini"  target=_blank style="width:24px;height:24px;margin:6px 0 0 0" href="{{ $category->name_slug }}.xml"></a></div>
                <style>.external-sign-in.rss a:after{ font-size:14px!important;  top: 5px!important;left:-7px}</style>
                <div class="colheader   none ">
                    @if(isset($search))
                            <h1>{{ $search }}</h1>
                    @elseif(isset($category->name))
                        <h1>{{ trans('index.latest', ['type' => $category->name ]) }}</h1>
                    @endif

                </div>


                @if($lastItems->total() > 0)
                    <div class="jscroll" data-auto="{!!  getcong('AutoLoadLists') ?: 'false' !!}">
                    @include('pages.catpostloadpage')
                    </div>
                    @else
                    @include('errors.emptycontent')

                @endif

            </div>
            <div class="sidebar">

                @foreach(\App\Widgets::where('type', 'CatSide')->where('display', 'on')->get() as $widget)
                    {!! $widget->text !!}
                @endforeach
                    @if($lastNews)

                    <div class="colheader" style="border:0;text-transform: uppercase">
                        <h1>{{ trans('index.weekly') }} {!! trans('index.top', ['type' => '<span style="color:#d92b2b">'.$category->name.'</span>' ]) !!}</h1>
                    </div>
                @include("_widgets.trendlist_sidebar")
                    @endif
                @include("_widgets/facebooklike")

            </div>
        </div>

    </div>


@endsection