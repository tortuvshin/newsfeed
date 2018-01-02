@extends("main")

@section('head_title', $category->name .' | '.getcong('sitename') )
@section('head_description', $category->description )

@section("content")

<div id="main-content" style="padding-top: 45px;">

    <div class="breadcrumb clearfix">
        <div class="wrapper">
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                <a href="{{ action('IndexController@index') }}" itemprop="url">
                    <span itemprop="title">Нүүр</span>
            </a>
            </span>
            <span>&nbsp;|&nbsp;</span>
            <span itemtype="" itemscope="" class="current-page">
                <a href="{{ $category->name_slug }}" itemprop="url">
                    <span itemprop="title">{{ $category->name }}</span>
                </a>
            </span>
        </div>
        <!-- end:wrapper -->
    </div>
    <!-- breadcrumb -->
    <div class="wrapper clearfix">
        @if(!empty($lastFeaturestop))
            <div class="widget-area-4">

                <div class="widget punica-article-list-3-widget">

                    <div class="widget-content clearfix">

                        <div class="mask"></div>
                        @if($lastFeaturestop)
                            @foreach($lastFeaturestop->slice(0,1) as $key=>$item)
                            <article class="last-item pull-left">

                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">{{ $item->created_at->diffForHumans() }}</span>
                                        </span>
                                        <!-- end:entry-date -->
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <a href="{{ action('UsersController@index', [$item->user->username_slug ]) }}" class="pull-left">{{ $item->user->username }}</a>
                                        </span>
                                        <!-- end:entry-author -->
                                    </header>

                                    <h2 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 100) }}</a></h2>
                                    <p class="entry-excerpt">{{ str_limit($item->body, 200) }}</p>
                                </div>
                                
                            </article>
                            @endforeach
                    
                        @endif
                        
                        <!-- end:last-item -->
                        
                        <ul class="older-post clearfix pull-left">
                            @if($lastFeaturestop)
                                @foreach($lastFeaturestop->slice(0,4) as $key=>$item)
                                <li>
                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <a href="{{ $category->name_slug }}" class="entry-categories blue">{{ $category->name }}</a>
                                            <div class="punica-zoom-effect"><a href="{{ makeposturl($item) }}"><img src="{{ makepreview($item->thumb, 'b', 'posts') }}" alt=""></a></div>
                                        </div>
                                        <!-- end:entry-thumb -->
                                        <div class="entry-content">
                                            <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 50) }}</a></h6>
                                        </div>
                                    </article>
                                    <!-- end:entry-item -->
                                </li>
                                @endforeach
                        
                            @endif
                        </ul>
                        
                    </div>
                    <!-- end:widget-content -->   
                </div>
                <!-- end:punica-article-list-3-widget -->
                
            </div>
        @endif

        <div class="col-a pull-left">
            @if ($category->name_slug != 'gishuud')
       
            <section class="widget-area-15">
                @if($lastItems->total() > 0)
                    <div class="jscroll" data-auto="{!!  getcong('AutoLoadLists') ?: 'false' !!}">
                    
                        <div class="widget punica-post-list-1-widget">

                            @foreach($lastItems as $item)
                                <div class="col-md-4">

                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <a class="entry-categories blue" href="{{ $category->name_slug }}">{{ $category->name }}</a>
                                            <div class="punica-zoom-effect">
                                                <a href="{{ makeposturl($item) }}"><img alt="" src="{{ makepreview($item->thumb, 'b', 'posts') }}"></a>
                                            </div>
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
                                                <a class="pull-left" href="{{ action('UsersController@index', [$item->user->username_slug ]) }}">{{ $item->user->username }}</a>
                                                </span>
                                                <!-- end:entry-author -->
                                            </header>

                                            <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->body, 50) }}</a></h6>

                                        </div>
                                        <!-- end:entry-content -->
                                    </article>
                                    <!-- end:entry-item -->

                                </div>
                            @endforeach
                            @if($lastItems->nextPageUrl())
                                <li>
                                    <a href="{{ $lastItems->nextPageUrl() }}" class="page-next btn-more"> {{ trans('updates.loadmore') }} </a>

                                </li>
                            @endif
                        </div>
                    </div>
                    @else
                    <section class="punica-error-404">

                        <div class="row">

                            <div class="col-md-12 col-sm-12" align="center">
                                <h4>Мэдээлэл байхгүй байна</h4>
                                <p>Та нүүр хуудасруу буцах бол <a href="{{ action('IndexController@index') }}">энд</a> дарна уу</p>
                            </div>
                            <!-- col-md-7 -->

                        </div>
                        <!-- row -->

                    </section>

                @endif
                <!-- end:widget -->

            </section>
            <!-- end:widget-area-15 -->
            @else
                <!-- <section class="widget-area-15"> -->
                    
                        <!DOCTYPE html>
                     <html class="disable-scroll">

                    <head>
            
                        <link href="./demo/styles.css" rel="stylesheet">

                    </head>

                    <body><a href="http://www.newsfeed.traveltomongolia.net/cv#" class="back-to-top" style="display: none;">Back to Top</a>

                        <div id="fb-root" class=" fb_reset">
                            <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
                                <div></div>
                            </div>
                            <div style="position: absolute; top: -10000px; height: 0px; width: 0px;">
                                <div>
                                    <iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="./demo/lY4eZXm_YWu.html" style="border: none;"></iframe>
                                    <iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="./demo/lY4eZXm_YWu(1).html" style="border: none;"></iframe>
                                </div>
                            </div>
                        </div>

                        <script>
                            window.fbAsyncInit = function() {
                                FB.init({
                                    appId: '227244660944594',
                                    xfbml: true,
                                    version: 'v2.5'
                                });
                            };
                            (function(d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id)) {
                                    return;
                                }
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/en_US/all.js";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));
                        </script>


                        <div class="content">
                           
                            <div id="page_container">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-sm-9">
                                            <div class="page-header">
                                                <h3 class="cvTitle">
                                                    Монгол Улсын Их Хурлын гишүүд
                                                </h3>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/90">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/17562a27-4bd3-4482-ab57-33e354dcee55.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            НАМСРАЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">АМАРЗАЯА</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/95">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/ef75c904-e069-47f9-96f2-4fc470f3db41.JPG" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ТӨМӨРБААТАРЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">АЮУРСАЙХАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/96">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/0fb915b8-679b-44fb-a0e8-721611ee2db3.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ОКТЯБРИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БААСАНХҮҮ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/97">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/fde25f8d-059a-4b7d-9698-647eb9b190d4.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЁНДОНПЭРЭНЛЭЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БААТАРБИЛЭГ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын Байнгын хорооны дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/98">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/eba54ae8-9936-4da9-a1e8-1ff13c34cb5c.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ХАВДИСЛАМЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БАДЕЛХАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/99">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/dff376f4-02ea-4d91-a5b2-efe281a84210.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            СҮХБААТАРЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БАТБОЛД</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/100">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/67e6aa71-4936-460b-a046-57fb04fff56b.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЖАЛБАСҮРЭНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БАТЗАНДАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/101">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/56100811-607e-4165-97ba-ca87344e8fab.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БАТЖАРГАЛЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БАТЗОРИГ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/168">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/e213ab68-d5c7-4f47-a31c-e74765115783.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ОТГООГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БАТНАСАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/102">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/dcd62228-8283-41c4-ad7a-4e24b2a9812e.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БААГААГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БАТТӨМӨР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/103">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/68b665ba-ba1b-445f-a2d6-9b58b48f6ccf.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БАДМААНЯМБУУГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БАТ-ЭРДЭНЭ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/104">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/eba75919-682d-48a6-b7de-25e23ec5db91.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЖАДАМБЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БАТ-ЭРДЭНЭ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/105">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/13842a63-dee0-4255-a023-b3ea0c06f918.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            МАГВАНЫ
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БИЛЭГТ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/106">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/780fb6fa-78b4-46c0-b8cb-02fcb57b7542.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЛУВСАНВАНДАНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БОЛД</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/107">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/608b157f-2859-4b7a-aac0-38605e2b4002.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ХАЯНГААГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БОЛОРЧУЛУУН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/108">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/b66dad1b-dadc-4cef-ab4f-2b2ebf7515dc.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            САНДАГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">БЯМБАЦОГТ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/169">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/d46c1bed-29bd-4a49-bfff-6391aadffb41.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЖАМБАЛЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ГАНБААТАР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/109">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/0bb36503-9c4f-43b4-b460-6542c3aececf.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДАВААГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ГАНБОЛД</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/110">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/6f258bb1-1770-4427-9c0e-254754979735.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДОРЖДУГАРЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ГАНТУЛГА</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/111">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/1e0cc7e2-56f3-4a86-9a08-b4cc77fd307b.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЦЭДЭНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ГАРАМЖАВ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/112">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/a117f9bc-371c-414c-871d-c242103fed78.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЦЭРЭНПИЛИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ДАВААСҮРЭН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/113">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/bc644708-8540-444c-a659-21025da8f730.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДОРЖДАМБЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ДАМБА-ОЧИР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын Байнгын хорооны дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/114">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/64de09f1-1953-4253-82db-57e67cd040d3.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БОРХҮҮГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ДЭЛГЭРСАЙХАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/115">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/5bc62d57-4a01-4bfb-b7c5-3e08306c4652.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БОЛДЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЖАВХЛАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/116">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/e923a9b2-3cb2-47fe-a6e0-4ebba702dd62.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            САМАНДЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЖАВХЛАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/117">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/9e095122-e333-4bee-84e4-b2569de27635.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ГОМБОЖАВЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЗАНДАНШАТАР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/118">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/ed253ba0-3f50-422a-ba32-eae6536618e2.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДАНЗАНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЛҮНДЭЭЖАНЦАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын Байнгын хорооны дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/119">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/290fa455-5769-4d11-84c1-102decb5dd73.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЛХАГВЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">МӨНХБААТАР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/120">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/b4eaab51-546b-4d3c-a490-60aa57145084.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЖАМЪЯНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">МӨНХБАТ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/121">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/5e51cfc1-31dd-4925-b01a-f836dae7d5ef.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЦЭНДИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">МӨНХ-ОРГИЛ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/122">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/d5a668a1-197c-4612-af93-6cc75553cf59.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ГОМПИЛДООГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">МӨНХЦЭЦЭГ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/123">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/7de50a5b-2767-4474-8ad6-28646af5050d.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДАКЕЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">МУРАТ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/124">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/68c3842d-4391-4303-897f-12812901cdae.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЗАГДХҮҮГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">НАРАНТУЯА</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/125">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/516a68bf-1883-47a1-ac9a-4af691ebeacb.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БАТСҮХИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">НАРАНХҮҮ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/126">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/167921b2-d74c-47d8-be79-ac6ebd580e16.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            НЯМТАЙШИРИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">НОМТОЙБАЯР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/127">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/4a29d9b3-3429-4fee-aebd-11f3dc0c4b7f.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ХИШГЭЭГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">НЯМБААТАР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/93">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/c5a1836b-842a-47b9-adcc-4adf7d6daeb8.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЦЭНДИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">НЯМДОРЖ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/128">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/cf781644-cdd9-4ea6-8168-35a0d43230d8.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            НАВААН-ЮНДЭНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ОЮУНДАРЬ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/129">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/590b7060-9a18-4929-98f0-639d8c56b2cd.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДУЛАМСҮРЭНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ОЮУНХОРОЛ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/130">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/675ed70b-a073-4f62-a7bc-3d4ef416185f.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            МӨНХӨӨГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ОЮУНЧИМЭГ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын Байнгын хорооны дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/131">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/c5268351-ea96-41f0-922e-36197d3f56a7.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЛУВСАННАМСРАЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ОЮУН-ЭРДЭНЭ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/132">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/1dd2ed6e-fbf4-4b94-8d65-dde904bc104f.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БӨХЧУЛУУНЫ
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ПҮРЭВДОРЖ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/133">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/0ee6b4e7-81b6-4b84-a912-b2097cd53301.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ШАТАРБАЛЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">РАДНААСЭД</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын Байнгын хорооны дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/94">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/0fb3bae6-70d1-4bd3-852f-dd57040a9728.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЯДАМСҮРЭНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">САНЖМЯТАВ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын дэд дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/134">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/b82a6da4-5166-4973-bbd6-254267f53391.JPG" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДАВААЖАНЦАНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">САРАНГЭРЭЛ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/136">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/6e6f8e5d-1b7d-4cab-b394-ab0959be8586.JPG" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БАТСҮХИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">САРАНЧИМЭГ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/137">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/cffca859-7ab0-4fe3-a0a8-86a01e6c8624.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЯНГУГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">СОДБААТАР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/138">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/8cbde567-b558-4e1d-93df-aca51acaf0b1.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ОТГОНБИЛЭГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">СОДБИЛЭГ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын Байнгын хорооны дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/139">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/22280166-1249-4ff9-bec7-cdb990b7b313.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ГОМБОЖАЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">СОЛТАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/140">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/0fb6202f-d366-4f09-bbc8-4363560ae178.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДОЛГОРСҮРЭНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">СУМЪЯАБАЗАР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/141">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/519f3b7f-2d45-468f-bdee-f6ee66a127cc.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            АГВААНСАМДАНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">СҮХБАТ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/142">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/3a0023de-8771-47aa-99ce-27f5d5b0edbe.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДУЛАМДОРЖИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ТОГТОХСҮРЭН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/144">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/566c5959-7c02-47c5-810d-a5cdc7723c17.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ГАНЗОРИГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ТЭМҮҮЛЭН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/145">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/ca591d02-136e-4621-9232-170ea87dc33e.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДЭНДЭВИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ТЭРБИШДАГВА</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/146">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/22df540c-0c5d-48f4-a7c9-c770c535b241.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЧҮЛТЭМИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">УЛААН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/147">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/c0a0223f-9e56-4691-9634-696607302a4a.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БАТБАЯРЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">УНДАРМАА</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/148">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/bae23536-e0c8-48a5-b846-a79cda329a9f.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            АГВААНЛУВСАНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">УНДРАА</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/149">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/e0e9a41e-ecb7-423c-ac41-6a531addac61.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            НЯМ-ОСОРЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">УЧРАЛ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/150">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/d4f2443d-ec72-4beb-a08b-67df9dd2d5f6.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДАМДИНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ХАЯНХЯРВАА</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурал дахь Намын бүлгийн дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/151">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/e32536e0-cbbb-4e15-98a3-29b885d02c80.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЧИМЭДИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ХҮРЭЛБААТАР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/152">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/f4d3c847-b5fc-4971-82c6-fec6f302e5de.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЦЭДЭНБАЛЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЦОГЗОЛМАА</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/153">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/6eb28818-4d7d-496b-9b92-fb3e78c8c86f.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДАМДИНЫ
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЦОГТБААТАР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/154">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/bebca644-f8b2-40cc-a52e-0bb5b94d6461.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            НАМСРАЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЦЭРЭНБАТ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/155">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/91fdcc35-c429-4a18-af86-44f1f825db83.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            СОДНОМЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЧИНЗОРИГ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/156">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/ad5a3e5e-f8db-41cf-a48a-80a4e6be1cfc.jpg" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БАТТОГТОХЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЧОЙЖИЛСҮРЭН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын Байнгын хорооны дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/157">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/869b9161-9399-4516-af84-a659397ced2c.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЛХАГВААГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭЛДЭВ-ОЧИР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын Байнгын хорооны дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/158">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/33168e27-1ad1-4d28-8c5f-cd12759f83f0.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            БЯМБАСҮРЭНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭНХ-АМГАЛАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/159">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/cb45718b-8d14-4765-866b-e283e8d5b3b1.JPG" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЛУВСАНЦЭРЭНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭНХ-АМГАЛАН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурлын дэд дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/160">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/074e39d3-09da-4366-af03-aff2cc470329.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЖАДАМБЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭНХБАЯР</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/161">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/29406819-9c2d-4815-a14e-2467b1cb5346.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            НЯМААГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭНХБОЛД</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/162">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/5558766a-6249-4e03-b065-6b28e0713b85.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЛУВСАНГИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭНХБОЛД</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/89">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/d8543404-b273-43f7-8812-560001979942.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            МИЕЭГОМБЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭНХБОЛД</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын дарга, Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/163">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/3eab1037-d4d7-42a0-8f01-bd71f280ff35.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ӨЛЗИЙСАЙХАНЫ
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭНХТҮВШИН</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/164">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/5f5a11ff-40ac-4e0f-88b0-3474c640c0f4.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            СОДНОМЗУНДУЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭРДЭНЭ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/165">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/2ae19dd9-533f-4dfa-916e-c9416c3c8e96.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ДОНДОГДОРЖИЙН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭРДЭНЭБАТ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн, Монгол Улсын Их Хурал дахь Намын бүлгийн дарга </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row cvRow">
                                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 cvBox">
                                                    <a href="http://www.newsfeed.traveltomongolia.net/cv/166">
                                                        <div class="cvInner">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <img src="./demo/6f403c86-47c9-41f8-843b-2589416155c0.png" class="img-responsive">
                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                                                    <div class="cvInfo">
                                                                        <div class="cvName">
                                                                            ЖАРГАЛТУЛГЫН
                                                                            <div class="clearfix"></div>
                                                                            <b class="cvLastName">ЭРДЭНЭБАТ</b>
                                                                        </div>
                                                                        <div class="cvAppointment">
                                                                            Монгол Улсын Их Хурлын гишүүн </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </body>

                    </html>
                 <!-- </section> -->
            @endif
        </div>

        @if ($category->name_slug != 'gishuud')
        <aside class="sidebar pull-left">

            <div class="widget punica-social-widget">

                <h2 class="widget-title widget-title-s2"><span>Дагах</span></h2>

                <ul class="clearfix">
                    <li class="mail-icon"><a href="#" class="fa fa-envelope"></a></li>
                    <li class="facebook-icon"><a href="#" class="fa fa-facebook"></a></li>
                    <li class="twitter-icon"><a href="#" class="fa fa-twitter"></a></li>
                    <li class="gplus-icon"><a href="#" class="fa fa-google-plus"></a></li>
                    <li class="linkedin-icon"><a href="#" class="fa fa-linkedin"></a></li>
                    <li class="rss-icon"><a href="#" class="fa fa-rss"></a></li>
                </ul>

                <form class="newsletter-form clearfix" method="post" action="processNewsletterForm.php">
                    <p>Мэйл хаягаа бүртгүүлж шинэ мэдээлэл цаг алдалгүй аваарай.</p>
                    <p class="input-email clearfix">
                        <input type="text" size="40" class="email" value="" name="email" onblur="if(this.value=='')this.value=this.defaultValue;" onfocus="if(this.value==this.defaultValue)this.value='';">
                        <input type="submit" class="submit" value="Бүртгүүлэх">
                    </p>                    
                </form>
                
            </div>
            <div class="widget punica-tab-1-widget">

                <div class="punica-tab-container-1">

                    <ul class="nav nav-tabs punica-tabs-1">
                        <li class="active"><a href="#tab1-1" data-toggle="tab">Их уншсан</a></li>
                        <li class=""><a href="#tab1-2" data-toggle="tab">Их сэтгэгдэлтэй</a></li>  
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1-1">

                            <ul class="clearfix">
                                
                                @if($lastNews)
                                    @foreach($lastNews->slice(0,10) as $key=>$item)
                                    <li>
                                        <article class="entry-item clearfix">
                                            <div class="entry-thumb pull-left">
                                                <a href="{{ makeposturl($item) }}"><img src="{{ makepreview($item->thumb, 'b', 'posts') }}" alt=""></a>
                                            </div>
                                            <div class="entry-content">
                                    
                                                <header class="clearfix">
                                                    <span class="entry-date pull-left clearfix">
                                                        <i class="fa fa-clock-o pull-left"></i>
                                                        <span class="month pull-left">{{ $item->created_at->diffForHumans() }}</span>
                                                    </span>
                                                    <span class="entry-meta pull-left">,&nbsp;</span>
                                                    <span class="entry-author clearfix pull-left">
                                                        <a href="{{ action('UsersController@index', [$item->user->username_slug ]) }}" class="pull-left">{{ $item->user->username }} </a>
                                                    </span>
                                                </header>

                                                <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 35) }}</a></h6>

                                            </div>
                                        </article>

                                    </li>
                                    @endforeach
                            
                                @endif

                            </ul>

                        </div>
                        <div class="tab-pane" id="tab1-2">
                            
                            <ul class="clearfix">
                                
                                @if($lastNews)
                                    @foreach($lastNews->slice(1,10) as $key=>$item)
                                    <li>
                                        <article class="entry-item clearfix">
                                            <div class="entry-thumb pull-left">
                                                <a href="{{ makeposturl($item) }}"><img src="{{ makepreview($item->thumb, 'b', 'posts') }}" alt=""></a>
                                            </div>
                                            <div class="entry-content">
                                    
                                                <header class="clearfix">
                                                    <span class="entry-date pull-left clearfix">
                                                        <i class="fa fa-clock-o pull-left"></i>
                                                        <span class="month pull-left">{{ $item->created_at->diffForHumans() }}</span>
                                                    </span>
                                                    <span class="entry-meta pull-left">,&nbsp;</span>
                                                    <span class="entry-author clearfix pull-left">
                                                        <a href="{{ action('UsersController@index', [$item->user->username_slug ]) }}" class="pull-left">{{ $item->user->username }} </a>
                                                    </span>
                                                </header>

                                                <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 35) }}</a></h6>

                                            </div>
                                        </article>

                                    </li>
                                    @endforeach
                            
                                @endif

                            </ul>

                        </div>

                    </div>

                </div>
                
            </div>
            
        </aside>
        @endif
        <div class="clear"></div>

    </div>
</div>

@endsection