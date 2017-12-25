@extends("app")
@section('head_title',  $post->title.' | '.getcong('sitename'))
@section('head_description', $post->body)
@section('head_image', asset('/upload/media/posts/'.$post->thumb.'-b.jpg'))
@section('head_url', Request::url())
@section('modedefault', 'mode-default')
@section("content")
<div id="main-content">

    <div class="breadcrumb clearfix">
        <div class="wrapper">
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                <a href="index.html" itemprop="url">
                    <span itemprop="title">Home</span>
            </a>
            </span>
            <span>&nbsp;|&nbsp;</span>
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="current-page"><span itemprop="title">Single post</span></span>
        </div>
        <!-- end:wrapper -->
    </div>
    <!-- breadcrumb -->

    <div class="wrapper clearfix">

        <div class="col-a pull-left">

            <div class="entry-box">

                <header class="entry-box-header clearfix">
                    <span class="entry-date pull-left clearfix">
                        <i class="fa fa-clock-o pull-left"></i>
                        <span class="month pull-left">Sep.</span>
                    <span class="date pull-left">23</span>
                    </span>
                    <span class="entry-meta pull-left">,&nbsp;</span>
                    <span class="entry-author clearfix pull-left">
                        <span class="pull-left">By&nbsp;</span>
                    <a href="#" class="pull-left">Jack grove</a>
                    </span>
                </header>
                <!-- end:entry-box-header -->

                <h2 class="entry-title">New York City Ebola Patient's Condition Upgraded from 'Serious' to 'Stable'</h2>

                <div class="tag-box clearfix">
                    <span class="pull-left fa fa-tags"></span>
                    <a class="pull-left" href="#">Featured</a>
                    <a class="pull-left" href="#">Houston</a>
                    <a class="pull-left" href="#">Technology</a>
                </div>
                <!-- end:tag-box -->

                <div class="entry-thumb">
                    <img src="placeholders/post-image/post-39.jpg" alt="">
                </div>
                <!-- end:entry-thumb -->

                <div class="entry-content clearfix">

                    <p class="clearfix"><span class="punica-dropcap punica-dropcap-boxed">L</span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque </p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed urna metus. Praesent eget imperdiet lectus. Suspendisse ut luctus mi. In pharetra scelerisque arcu sit amet ultricies. Quisque volutpat lacus in risus suscipit scelerisque. In vitae pharetra diam. Sed id lacinia leo, et gravida neque. In arcu dui, mattis non justo eget, imperdiet suscipit enim.</p>

                    <blockquote>
                        <p>Lavabat quo sanctis oravit ecce sit in rei finibus veteres hoc. Suam ut diem finito servis omin adventu nihil docta mare non coepit. Scitote si Ave de memor cresceret nomina petitus.</p>
                    </blockquote>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed urna metus. Praesent eget imperdiet lectus. Suspendisse ut luctus mi. In pharetra scelerisque arcu sit amet ultricies. Quisque volutpat lacus in risus suscipit scelerisque. In vitae pharetra diam. Sed id lacinia leo, et gravida neque. In arcu dui, mattis non justo eget, imperdiet suscipit enim.</p>

                    <iframe height="400" src="http://player.vimeo.com/video/51315610"></iframe>

                    <blockquote class="pull-right">
                        <p>Lavabat quo sanctis oravit ecce sit in rei finibus veteres hoc. Suam ut diem finito servis omin adventu nihil docta mare non coepit. Scitote si Ave de memor cresceret nomina petitus.</p>
                    </blockquote>

                    <p>Lorem ipsum dolor sit amet, scelerata nunc intuens munus oblitus ait regem orem ipsum dolor sit amet, scelerata nunc intuens munus oblitus ait regem orem ipsum dolor sit</p>

                    <p>Nomin adventu nihil docta mare non coepit. Scitote si Ave de memor cresceret nomina petitus. Lorem ipsum dolor sit amet.</p>

                    <p>Scelerata nunc intuens munus oblitus ait regem orem ipsum dolor sit lorem ipsum dolor sit amet, scelerata nunc intuens munus oblitus ait regem orem ipsum</p>

                    <p>Dolor sit amet, scelerata nunc intuens munus oblitus ait regem orem ipsum dolor sit dolor sit amet, scelerata nunc intuens munus oblitus ait regem orem intuens munus oblitus ait regem orem ipsum dolor sit</p>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed urna metus. Praesent eget imperdiet lectus. Suspendisse ut luctus mi. In pharetra scelerisque arcu sit amet ultricies. Quisque volutpat lacus in risus suscipit scelerisque. In vitae pharetra diam. Sed id lacinia leo, et gravida neque. In arcu dui, mattis non justo eget, imperdiet suscipit enim. Praesent metus nulla, iaculis eget justo in, fringilla tincidunt nisl. Quisque varius ipsum ligula, sit amet dictum nisi auctor a. Integer posuere neque eget sapien dignissim dignissim.</p>

                    <p>Boblitus ait regem orem ipsum dolor sit amet, scelerata nunc intuens munus oblitus ait regem orem ipsum dolor sit lorem ipsum dolor sit amet scelerata nunc intuens munus oblitus ait regem orem ipsum dolor sit amet</p>

                </div>
                <!-- end:entry-content -->

                <div class="page-links-wrapper">

                    <div class="page-links">

                        <span>1</span>

                        <a href="#"><span>2</span></a>

                        <a href="#"><span>3</span></a>

                    </div>
                    <!-- page-links -->

                </div>
                <!-- page-links-wrapper -->

                <div class="social-box">

                    <ul class="clearfix">
                        <li class="facebook-icon"><a href="#" class="clearfix"><i class="fa fa-facebook pull-left"></i><span class="pull-left">Facebook</span></a></li>
                        <li class="twitter-icon"><a href="#" class="clearfix"><i class="fa fa-twitter pull-left"></i><span class="pull-left">Twitter</span></a></li>
                        <li class="gplus-icon"><a href="#" class="clearfix"><i class="fa fa-google-plus pull-left"></i><span class="pull-left">Google+</span></a></li>
                        <li class="pinterest-icon"><a href="#" class="clearfix"><i class="fa fa-pinterest pull-left"></i><span class="pull-left">Pinterest</span></a></li>
                        <li class="linkedin-icon"><a href="#" class="clearfix"><i class="fa fa-linkedin pull-left"></i><span class="pull-left">LinkedIn</span></a></li>
                        <li class="digg-icon"><a href="#" class="clearfix"><i class="fa fa-digg pull-left"></i><span class="pull-left">Digg</span></a></li>
                        <li class="vk-icon"><a href="#" class="clearfix"><i class="fa fa-vk pull-left"></i><span class="pull-left">VKontakte</span></a></li>
                    </ul>

                </div>
                <!-- end:social-box -->

                <section class="about-author clearfix">
                    <h4>ABOUT THE AUTHOR</h4>
                    <div class="author-avatar pull-left">
                        <a href="#"><img src="placeholders/avatar/avatar-1.jpg" alt=""></a>
                    </div>
                    <div class="author-content">
                        <h5><a href="#">Admin</a></h5>
                        <p>Journalist, writer and broadcaster, based in London and Paris, her latest book is Touché: A French Woman's Take on the English. Read more articles from Agnes.</p>
                        <ul class="social-links clearfix">
                            <li>
                                <a href="#" class="fa fa-facebook"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-instagram"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-youtube"></a>
                            </li>
                            <li>
                                <a href="#" class="fa fa-rss"></a>
                            </li>
                        </ul>
                    </div>

                </section>
                <!-- end:about-author -->

                <footer class="entry-box-footer clearfix">

                    <div class="prev-article-item pull-left">
                        <article class="entry-item">
                            <img alt="" src="placeholders/post-image/post-40.jpg">
                            <div class="entry-content">
                                <a class="prev-post" href="#">Previous post</a>
                                <h4 class="entry-title"><a href="#">Hackers' Shocking, Pointless Defeat of The Interview</a></h4>
                            </div>
                        </article>
                    </div>

                    <div class="next-article-item pull-left">
                        <article class="entry-item">
                            <img alt="" src="placeholders/post-image/post-41.jpg">
                            <div class="entry-content">
                                <a class="next-post" href="#">Next post</a>
                                <h4 class="entry-title"><a href="#">Six Books We Missed This Year</a></h4>
                            </div>
                        </article>
                    </div>

                </footer>
                <!-- end:entry-box-footer -->

            </div>
            <!-- end:entry-box -->

            <section id="related-articles">

                <h4>Related post</h4>

                <ul class="clearfix">
                    <li>
                        <article class="entry-item clearfix">
                            <div class="entry-thumb pull-left">
                                <a class="entry-categories orange" href="#">Foods</a>
                                <div class="punica-zoom-effect">
                                    <a href="#"><img src="placeholders/post-image/post-42.jpg" alt=""></a>
                                </div>
                            </div>
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

                                <h6 class="entry-title"><a href="#">They Are Wearing the Best From Paris Week District</a></h6>
                                <p>Vestibulum semper libero id ultrices. Pellentesque sit amet erat magna, quis laoreet massa.Pellentesque sodales fermentum porta. Cras eu porttitor.</p>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article class="entry-item clearfix">
                            <div class="entry-thumb pull-left">
                                <a class="entry-categories green" href="#">World</a>
                                <div class="punica-zoom-effect">
                                    <a href="#"><img src="placeholders/post-image/post-43.jpg" alt=""></a>
                                </div>
                            </div>
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

                                <h6 class="entry-title"><a href="#">They Are Wearing the Best From Paris Week District</a></h6>
                                <p>Vestibulum semper libero id ultrices. Pellentesque sit amet erat magna, quis laoreet massa.Pellentesque sodales fermentum porta. Cras eu porttitor.</p>
                            </div>
                        </article>
                    </li>
                    <li>
                        <article class="entry-item clearfix">
                            <div class="entry-thumb pull-left">
                                <a class="entry-categories pink" href="#">Life style</a>
                                <div class="punica-zoom-effect">
                                    <a href="#"><img src="placeholders/post-image/post-44.jpg" alt=""></a>
                                </div>
                            </div>
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

                                <h6 class="entry-title"><a href="#">They Are Wearing the Best From Paris Week District</a></h6>
                                <p>Vestibulum semper libero id ultrices. Pellentesque sit amet erat magna, quis laoreet massa.Pellentesque sodales fermentum porta. Cras eu porttitor.</p>
                            </div>
                        </article>
                    </li>
                </ul>

            </section>
            <!-- end:related-articles -->

            <section id="comments">
                <h4>10 Comments</h4>
                <ol class="comments-list clearfix">
                    <li class="comment clearfix">
                        <article class="comment-wrap clearfix">
                            <div class="comment-avatar pull-left">
                                <img src="placeholders/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="comment-body clearfix">
                                <header class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="#">Mary says:</a></h6>
                                        <span class="entry-date">Mar 23, 2014 at 7:59 pm</span>
                                    </div>

                                    <div class="comment-button pull-right">
                                        <a href="#" class="comment-edit-link">Edit</a>
                                        <a href="#" class="comment-reply-link">Reply</a>
                                    </div>
                                    <div class="clear"></div>
                                </header>
                                <div class="comment-content">
                                    <p>Proin eleifend volutpat massa, vitae venenatis quam cursus sit amet. Aenean sed lacus enim. Fusce adipiscing tristique lorem, non pellentesque nisi porta elementum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>
                            </div>
                            <!--comment-body -->
                        </article>
                        <ul class="children">
                            <li class="comment clearfix">
                                <article class="comment-wrap clearfix">
                                    <div class="comment-avatar pull-left">
                                        <img src="placeholders/avatar/avatar-2.jpg" alt="">
                                    </div>
                                    <div class="comment-body clearfix">
                                        <header class="clearfix">
                                            <div class="pull-left">
                                                <h6><a href="#">Punic says:</a></h6>
                                                <span class="entry-date">Mar 23, 2014 at 7:59 pm</span>
                                            </div>

                                            <div class="comment-button pull-right">
                                                <a href="#" class="comment-edit-link">Edit</a>
                                                <a href="#" class="comment-reply-link">Reply</a>
                                            </div>
                                            <div class="clear"></div>
                                        </header>
                                        <div class="comment-content">
                                            <p>Proin eleifend volutpat massa, vitae venenatis quam cursus sit amet. Aenean sed lacus enim. Fusce adipiscing tristique lorem, non pellentesque nisi porta elementum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                        </div>
                                    </div>
                                    <!--comment-body -->
                                </article>
                            </li>
                        </ul>
                    </li>
                    <li class="comment clearfix">
                        <article class="comment-wrap clearfix">
                            <div class="comment-avatar pull-left">
                                <img src="placeholders/avatar/avatar-2.jpg" alt="">
                            </div>
                            <div class="comment-body clearfix">
                                <header class="clearfix">
                                    <div class="pull-left">
                                        <h6><a href="#">Mary says:</a></h6>
                                        <span class="entry-date">Mar 23, 2014 at 7:59 pm</span>
                                    </div>

                                    <div class="comment-button pull-right">
                                        <a href="#" class="comment-edit-link">Edit</a>
                                        <a href="#" class="comment-reply-link">Reply</a>
                                    </div>
                                    <div class="clear"></div>
                                </header>
                                <div class="comment-content">
                                    <p>Proin eleifend volutpat massa, vitae venenatis quam cursus sit amet. Aenean sed lacus enim. Fusce adipiscing tristique lorem, non pellentesque nisi porta elementum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>
                            </div>
                            <!--comment-body -->
                        </article>
                    </li>
                </ol>
                <!--comments-list-->

                <div class="pagination">
                    <a href="#comments" class="prev page-numbers">Previous</a>
                    <a href="#comments" class="page-numbers">1</a>
                    <span class="page-numbers current">2</span>
                    <a href="#comments" class="page-numbers">3</a>
                    <a href="#comments" class="next page-numbers">Next</a>
                </div>
                <!-- pagination -->

                <div class="clear"></div>

            </section>
            <!-- end:comments -->

            <section id="respond">
                <h4>Post your comments</h4>
                <form class="comment-form" action="processForm.php" method="post" novalidate="novalidate">
                    <p>Your email address will not be published. Required fields are marked *</p>

                    <p class="input-block">
                        <label class="required" for="comment_name">Name <span>(*)</span></label>
                        <input type="text" class="valid" name="name" id="comment_name" placeholder="Name (*)">
                    </p>

                    <p class="input-block">
                        <label class="required" for="comment_email">Email <span>(*)</span></label>
                        <input type="text" class="valid" name="email" id="comment_email" placeholder="Email (*)">
                    </p>

                    <p class="input-block">
                        <label class="required" for="comment_url">Website</label>
                        <input type="text" id="comment_url" placeholder="Website" class="valid" name="url">
                    </p>

                    <p class="textarea-block">
                        <label class="required" for="comment_message">Your comment <span>(*)</span></label>
                        <textarea rows="6" cols="88" id="comment_message" name="message" placeholder="Your comments (*)"></textarea>
                    </p>

                    <p class="comment-button clearfix">
                        <input type="submit" class="input-submit" id="submit-comment" value="Send Comment">
                    </p>

                </form>
                <div id="response"></div>
            </section>
            <!-- end:respond -->

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

            <div class="widget punica-watching-list-widget">

                <h2 class="widget-title widget-title-s2"><span>Watching</span></h2>

                <article class="last-item">
                    <div class="entry-thumb">
                        <a href="#" class="entry-categories blue">News</a>
                        <div class="punica-zoom-effect">
                            <a href="#"><img src="placeholders/post-image/post-26.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- end:entry-thumb -->
                    <div class="entry-content">
                        <header class="clearfix">
                            <span class="entry-time-ago pull-left clearfix">
                                <i class="fa fa-clock-o pull-left"></i>
                                <span class="pull-left">18M</span>
                            </span>
                            <!-- end:entry-time-ago -->
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
                <!-- end:last-item -->

                <ul class="older-post">
                    <li>
                        <article class="entry-item">
                            <div class="entry-content">
                                <header class="clearfix">
                                    <span class="entry-time-ago pull-left clearfix">
                                        <i class="fa fa-clock-o pull-left"></i>
                                        <span class="pull-left">1H</span>
                                    </span>
                                    <!-- end:entry-time-ago -->
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
                        <article class="entry-item">
                            <div class="entry-content">
                                <header class="clearfix">
                                    <span class="entry-time-ago pull-left clearfix">
                                        <i class="fa fa-clock-o pull-left"></i>
                                        <span class="pull-left">3H</span>
                                    </span>
                                    <!-- end:entry-time-ago -->
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
                        <article class="entry-item">
                            <div class="entry-content">
                                <header class="clearfix">
                                    <span class="entry-time-ago pull-left clearfix">
                                        <i class="fa fa-clock-o pull-left"></i>
                                        <span class="pull-left">7H</span>
                                    </span>
                                    <!-- end:entry-time-ago -->
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
                </ul>
                <!-- end:older-post -->

            </div>
            <!-- end:punica-watching-list-widget -->

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

            <div class="widget punica-ads-3-widget">
                <a href="#"><img alt="" src="placeholders/banner-3.jpg"></a>
            </div>
            <!-- end:punica-ads-3-widget -->

            <div class="widget punica-poll-widget">

                <h2 class="widget-title widget-title-s2"><span>UnicMag Poll</span></h2>

                <div class="widget-content">

                    <h6>What 2014 Spring trend will you incorporate into your wardrobe this season?</h6>

                    <ul>
                        <li class="clearfix">
                            <input type="checkbox" id="checkbox-1-0" class="regular-checkbox">
                            <label for="checkbox-1-0"></label> The Crop Top</li>
                        <li class="clearfix">
                            <input type="checkbox" id="checkbox-1-1" class="regular-checkbox">
                            <label for="checkbox-1-1"></label> Bright Orange Pieces</li>
                        <li class="clearfix">
                            <input type="checkbox" id="checkbox-1-2" class="regular-checkbox">
                            <label for="checkbox-1-2"></label> Metallic Fabrics</li>
                        <li class="clearfix">
                            <input type="checkbox" id="checkbox-1-3" class="regular-checkbox">
                            <label for="checkbox-1-3"></label> Floral Accessories</li>
                        <li class="clearfix">
                            <input type="checkbox" id="checkbox-1-4" class="regular-checkbox">
                            <label for="checkbox-1-4"></label> The Crop Top</li>
                        <li class="clearfix">
                            <input type="checkbox" id="checkbox-1-5" class="regular-checkbox">
                            <label for="checkbox-1-5"></label> Bright Orange Pieces</li>
                        <li class="clearfix">
                            <input type="checkbox" id="checkbox-1-6" class="regular-checkbox">
                            <label for="checkbox-1-6"></label> Metallic Fabrics</li>
                        <li class="clearfix">
                            <input type="checkbox" id="checkbox-1-7" class="regular-checkbox">
                            <label for="checkbox-1-7"></label> Floral Accessories</li>
                    </ul>

                </div>
                <!-- end:widget-content -->

            </div>
            <!-- end:punica-poll-widget -->

        </aside>
        <!-- sidebar -->

        <div class="clear"></div>

    </div>
    <!-- end:wrapper -->

</div>
    <div class="content">

        <div class="container">
            <div class="mainside postmainside">

                <div class="post-content" style="margin-top:7px;background: transparent" itemscope="" itemtype="http://schema.org/Article">

                    <div class="post">
                        <div class="post-head">
                            @if($post->approve == 'draft')
                                <div class="label label-staff" >{{ trans('updates.thisdraftpost') }}</div>
                            @endif
                            <h1 itemprop="name" class="post-title">
                                {{ $post->title }}
                            </h1>


                            @can('update-post', $post)

                            @if(Auth::user()->usertype=='Admin')

                                <h5 class="pull-r" style="color:#aaa;line-height: 26px">{{ trans('index.admintools') }}</h5>

                                @if($post->approve == 'no')
                                    <a href="{{ action('Admin\PostsController@approvepost', $post->id) }}" class="button button-orange button-small"><i class="fa fa-check-square-o iconp"></i> {{ trans('index.approve') }}</a>
                                @endif
                            @else
                                @if((getcong('UserEditPosts')=='true' and getcong('UserDeletePosts')=='true'))
                                    <h5 class="pull-r" style="color:#aaa;line-height: 26px">{{ trans('index.ownertools') }}</h5>
                                @endif
                                @if($post->approve == 'no')
                                    <a href="#" class="button button-orange button-small" style="cursor: default"><i class="fa fa-circle-o-notch fa-spin iconp"></i> {{ trans('index.waitapprove') }}</a>
                                @endif
                            @endif

                            @if(getcong('UserEditPosts')=='true' or Auth::user()->usertype=='Admin')
                                <a href="{{ action('PostsController@CreateEdit', [$post->id]) }}" class="button button-green button-small" ><i class="fa fa-pencil-square iconp"></i> {{ trans('index.edit') }}</a>
                            @endif
                            @if(getcong('UserDeletePosts')=='true' or Auth::user()->usertype=='Admin')
                                <a href="{{ action('PostsController@sendtrashpost', [$post->id]) }}" onclick="confim()" class="button button-red button-small " ><i class="fa fa-trash"></i></a>
                            @endif
                            <BR><BR>
                            @endcan

                            <p>
                                {!! nl2br($post->body) !!}
                            </p>

                            <div class="post-head__bar">
                                @if(isset($post->user->username_slug))
                                    <div class="user-info {{ $post->user->genre }} answerer">
                                        <div class="avatar left">
                                            <img src="{{ makepreview($post->user->icon , 's', 'members/avatar') }}" width="45" height="45" alt="{{ $post->user->username }}">
                                        </div>
                                        <div class="info">


                                            <a class="name" href="{{ action('UsersController@index', [$post->user->username_slug ]) }}" target="_self">{{ $post->user->username}}</a>

                                            @if($post->user->usertype == 'Admin')
                                                <div class="label label-admin" style="margin-left:5px">{{ trans('updates.usertypeadmin') }}</div>
                                            @elseif($post->user->usertype == 'Staff')
                                                <div class="label label-staff" style="margin-left:5px">{{ trans('updates.usertypestaff') }}</div>
                                            @elseif($post->user->usertype == 'banned')
                                                <div class="label label-banned" style="margin-left:5px">{{ trans('updates.usertypebanned') }}</div>
                                            @endif




                                            <div class="detail">
                                                {!! trans('index.postedon', ['time' => '<time itemprop="datePublished">'.$post->published_at->diffForHumans() .'</time>' ]) !!}

                                                @unless($post->updated_at==$post->published_at)
                                                    , {!! trans('index.updatedon', ['time' => '<time itemprop="datePublished">'.$post->updated_at->diffForHumans() .'</time>' ]) !!}
                                                @endunless
                                            </div>

                                        </div>
                                    </div>
                                @endif

                                <div class="post-head__meta">
                                    <div class="posted-on">


                                    </div>

                                    <div class="topics-container clearfix">
                                        @if(isset($post->category->name_slug))
                                            <div class="item_category">
                                                <a href="{{ action('PagesController@showCategory', ['id' => $post->category->name_slug ]) }}">{{ $post->category->name }}</a>
                                            </div>
                                        @endif


                                        <div class="clear"></div>

                                    </div>

                                </div>

                            </div>
                            <div class="clear"></div>
                            @include("_particles.others.postsociallinks")
                            <div class="clear"></div>

                            @foreach(\App\Widgets::where('type', 'PostShareBw')->where('display', 'on')->get() as $widget)
                                {!! $widget->text !!}
                            @endforeach

                        </div>

                        <div class="clear"></div>

                        <article class="post-body" id="post-body" itemprop="text">

                            @include("_particles._lists.entryslists")

                        </article>

                    </div>
                    @if ($post->tags != "")
                        @foreach(explode(',', $post->tags) as $tag)
                          <span class="tagy"><a href="{{ action('PagesController@showtag', $tag) }}"><i class="fa fa-tag"></i> {{$tag}}</a></span>
                        @endforeach
                    @endif


                    @foreach(\App\Widgets::where('type', 'PostBelow')->where('display', 'on')->get() as $widget)
                        {!! $widget->text !!}
                    @endforeach


                </div>

                @include("_forms._reactionforms")

                @include("_forms._commentforms")

            </div>
            <div class="sidebar">

                @foreach(\App\Widgets::where('type', 'PostPageSidebar')->where('display', 'on')->get() as $widget)
                    {!! $widget->text !!}
                @endforeach

                <div class="colheader" style="border:0;text-transform: uppercase;">
                    <h1>{{ trans('index.today') }} {!! trans('index.top', ['type' => '<span style="color:#d92b2b">'.trans('index.posts').'</span>' ]) !!}</h1>
                </div>

                @include("_widgets.trendlist_sidebar")

                @include("_widgets.facebooklike")

            </div>
            <div class="clear"></div>
            <br><br> <br>
            @if(isset($lastFeatures))
                @if(count($lastFeatures) >= 3)
                    <div class="colheader">
                        <h1>{{ trans('index.maylike') }}</h1>
                    </div>
                    @include("_widgets.post-between-comments")
                @endif
            @endif
        </div>

    </div>


@endsection
@section('footer')
    @if($post->type=="quiz")
    <script>
         BuzzyQuizzes = {
            'lang_1': '{{ trans('buzzyquiz.shareonface') }}',
            'lang_2': '{{ trans('buzzyquiz.shareontwitter') }}',
            'lang_3': '{{ trans('buzzyquiz.shareface') }}',
            'lang_4': '{{ trans('buzzyquiz.sharetweet') }}',
            'lang_5': '{{ trans('buzzyquiz.sharedone') }}',
            'lang_6': '{{ trans('buzzyquiz.sharedonedesc') }}'
        };


        $( document ).ready(function() {

            App.initQuizzesClicks();
        });
    </script>
    @endif
    @if($post->type=="poll")
    <script>
        $( document ).ready(function() {
            $('.poll_main_color').each(function(i){
                $(this).css('width', $(this).attr('data-percent')+'%');
            });
        });
    </script>
    @endif
    <script async defer src="//platform.instagram.com/{{  getcong('sitelanguage') > "" ? getcong('sitelanguage') : 'en_US' }}/embeds.js"></script>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>



    <style> .fb_dialog{z-index:999999999} </style>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/{{  getcong('sitelanguage') > "" ? getcong('sitelanguage') : 'en_US' }}/sdk.js#xfbml=1{!! getcong('facebookapp') > "" ? '&appId='.getcong('facebookapp') : '' !!}&version=v2.4";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

@endsection