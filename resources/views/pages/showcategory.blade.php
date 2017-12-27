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

                                            <p>{{ str_limit($item->body, 75) }}</p>
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
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                        <title>Parliament</title>
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">

                        <meta name="description" content="">
                        <meta name="keywords" content="">
                        <meta name="generator" content="Parliament">

                        <link href="./demo/form.css" rel="stylesheet">
                        <link href="./demo/chosen.css" rel="stylesheet">
                        <link href="./demo/datepicker.css" rel="stylesheet">
                        <link href="./demo/bootstrap-timepicker.css" rel="stylesheet">
                        <link href="./demo/daterangepicker.css" rel="stylesheet">
                        <link href="./demo/summernote.css" rel="stylesheet">
                        <link href="./demo/bootstrap.min.css" rel="stylesheet">
                        <link href="./demo/nprogress.css" rel="stylesheet">
                        <link href="./demo/bootstrap.vertical-tabs.css" rel="stylesheet">
                        <link href="./demo/bootstrap-responsive-tabs.css" rel="stylesheet">
                        <link href="./demo/ie10-viewport-bug-workaround.css" rel="stylesheet">
                        <link href="./demo/font-awesome.min.css" rel="stylesheet">
                        <link href="./demo/jquery.fancybox.css" rel="stylesheet">
                        <link href="./demo/jquery.raty.css" rel="stylesheet">
                        <link href="./demo/jquery-ui.css" rel="stylesheet">
                        <link href="./demo/ionicons.min.css" rel="stylesheet">
                        <link href="./demo/calendar.css" rel="stylesheet">
                        <link href="./demo/prettify.css" rel="stylesheet">
                        <link href="./demo/jquery.bxslider.css" rel="stylesheet">
                        <link href="./demo/youmax.css" rel="stylesheet">
                        <link href="./demo/styles.css" rel="stylesheet">

                        <link href="./demo/css" rel="stylesheet">

                        <script async="" src="./demo/analytics.js"></script>
                        <script type="text/javascript" async="" src="./demo/recaptcha__mn.js"></script>
                        <script id="facebook-jssdk" src="./demo/all.js"></script>
                        <script type="text/javascript">
                            app = {};
                            app.lang = 'mn-MN';
                            app.authenticated = false;
                            app.typeahead = {
                                users: '/friends/friendsuggest?username=%QUERY'
                            };
                            app.player = {
                                swf: '/themes/common/assets/js/jwplayer/jwplayer.flash.swf',
                                key: 'J0+IRhB3+LyO0fw2I+2qT2Df8HVdPabwmJVeDWFFoplmVxFF5uw6ZlnPNXo='
                            };
                            app.translate = {
                                file_empty: "Файл байхгүй ..",
                                file_choose: "Сонгох",
                                file_change: "Өөрчлөх",
                                editor_image_upload_not_supported: "Зураг сервэр рүү хуулах боломжгүй, та зөвхөн зургын холбоос оруулах боломжтой байна",
                                file_no_file_image: "Зөвхөн зураг (jpg, png, gif, bmp)",
                                file_no_file_document: "Зөвхөн документ (word, excel, pdf)",
                                file_no_file_video: "Зөвхөн дүрс бичлэг (mpeg, flv, mov, avi, mp4)",
                                file_no_file_audio: "Зөвхөн дуу (mp3, ogg, wav, wma)",
                                file_invalid_ext: "Энэ төрлийн файл сонгох боломжгүй",
                                file_invalid_size: "Файлын зөвшөөрөгдөх дээд хэмжээ хэтэрсэн байна",
                                embed_invalid: "Уучлаарай, гэхдээ таны оруулсан дүрс бичлэгийн хаягыг бид дэмжихгүй байгаа",
                                bulk_empty: "Сонгосон үйлдлийг хийхийн тулд 1 буюу түүнээс дээш бичлэг сонгоно уу",
                                bulk_min: "Та энэ үйлдлийг хийхийн тулд доод тал нь {0} бичлэг сонгоно уу",
                                bulk_max: "Та энэ үйлдлийг хийхийн тулд дээд тал нь {0} бичлэг сонгоно уу",
                                bulk_equal: "Та энэ үйлдлийг хийхийн тулд {0} бичлэг сонгох хэрэгтэй",
                                hub_slow_connection_text: "Манай шууд холболтын үйлчилгээг ашиглахад бэрхшээл гарч болзошгүйг анхаарна уу",
                                hub_slow_connection_title: "Интернэт удаан байна",
                                hub_reconnecting_text: "Бид шууд холболтын сервэр рүү дахин холбогдохоор оролдож байна",
                                hub_reconnecting_title: "Холболт түр саатлаа",
                                hub_reconnected_text: "Шууд холболтын сервэртэй амжилттай холбогдлоо",
                                hub_reconnected_title: "Холболтыг дахин сэргээлээ",
                                hub_disconnected_text: "Бид шууд холболт үүсгэж чадсангүй (эсвэл өмнөх холболт тасарсан), хэсэг хугацааны дараа дахин холбогдох болно",
                                hub_disconnected_title: "Шууд холболт тасарлаа",
                                hub_started_text: "Шууд холболтын сервэртэй амжилттай холбогдлоо",
                                hub_started_title: "Шууд холболт сэргэлээ",
                                block_text: "ТАНЫ ХҮСЭЛТИЙГ БОЛОВСРУУЛЖ БАЙНА, ТҮР ХҮЛЭЭНЭ ҮҮ..",
                                page_not_found: "Path you requested does not exist on the server"
                            };
                            app.csrf = {
                                input: '<input name="__RequestVerificationToken" type="hidden" value="1bhwMPKwdvD5JvBd6ybChhHcCeZm83Mb3jBXNvRHeIiTzCnI865qD5e-zH4gOYBj3fEmnsvhTLuLL3sRZ8egzMaU0AlZhyqOeY8G7byalCM1" />',
                                getKey: function() {
                                    return $(app.csrf.input).attr('name');
                                },
                                getValue: function() {
                                    return $(app.csrf.input).val();
                                }
                            };
                            app._readies = [];
                            app.ready = function(fn) {
                                app._readies.push(fn);
                            }
                            app.site = {
                                selectedId: null
                            };
                            app.login = '/my/login';
                            app.file = {
                                upload: '/files/upload'
                            };

                            app.hub = {
                                suppressMessages: true
                            };
                            app.hub.qs = {};
                            app.hub.qs['IDToken'] = 'agWipXE2PbJacPobCyg79gAKKeHlM6Jp2Bju9zADiAhMcCgGkmySyYS2WXU+YA0FFBPj0BQAAAA=';
                            app.hub.qs['group'] = 'public';

                            app.hub.url = '/signalr';

                            app.updates = [];

                            app._recaptchaLoaded = false;
                            app._recaptchas = [];
                            app._recaptchaRender = function(container, options) {
                                options = options || {
                                    sitekey: '6LdociYTAAAAAOkY3ToxRr1j2cEE_UOGKJZmaeub',
                                    theme: 'white'
                                };
                                grecaptcha.render(container, options);
                            };
                            app.recaptcha = function(container, options) {
                                if (app._recaptchaLoaded) {
                                    app._recaptchaRender(container, options);

                                    return;
                                }
                                app._recaptchas.push({
                                    container: container,
                                    options: options
                                });
                            };
                            window.onLoadRecaptcha = function() {
                                app._recaptchaLoaded = true;

                                for (var i = 0; i < app._recaptchas.length; i++) {
                                    var c = app._recaptchas[i];
                                    app._recaptchaRender(c.container, c.options);
                                }
                            };
                        </script>

                        <script src="./demo/api.js" async="" defer=""></script>

                        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                        <!--[if lt IE 9]>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/es5-shim/4.5.7/es5-shim.min.js"></script>
                            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
                            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
                        <![endif]-->

                        <link rel="shortcut icon" href="http://www.newsfeed.traveltomongolia.net/favicon.ico">

                        <!--Powered by IdeaSite - http://www.newsfeed.traveltomongolia.net-->
                        <!--Copyright (c) 2013-->
                        <style type="text/css">
                            .fb_hidden {
                                position: absolute;
                                top: -10000px;
                                z-index: 10001
                            }
                            
                            .fb_reposition {
                                overflow: hidden;
                                position: relative
                            }
                            
                            .fb_invisible {
                                display: none
                            }
                            
                            .fb_reset {
                                background: none;
                                border: 0;
                                border-spacing: 0;
                                color: #000;
                                cursor: auto;
                                direction: ltr;
                                font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
                                font-size: 11px;
                                font-style: normal;
                                font-variant: normal;
                                font-weight: normal;
                                letter-spacing: normal;
                                line-height: 1;
                                margin: 0;
                                overflow: visible;
                                padding: 0;
                                text-align: left;
                                text-decoration: none;
                                text-indent: 0;
                                text-shadow: none;
                                text-transform: none;
                                visibility: visible;
                                white-space: normal;
                                word-spacing: normal
                            }
                            
                            .fb_reset>div {
                                overflow: hidden
                            }
                            
                            .fb_link img {
                                border: none
                            }
                            
                            @keyframes fb_transform {
                                from {
                                    opacity: 0;
                                    transform: scale(.95)
                                }
                                to {
                                    opacity: 1;
                                    transform: scale(1)
                                }
                            }
                            
                            .fb_animate {
                                animation: fb_transform .3s forwards
                            }
                            
                            .fb_dialog {
                                background: rgba(82, 82, 82, .7);
                                position: absolute;
                                top: -10000px;
                                z-index: 10001
                            }
                            
                            .fb_reset .fb_dialog_legacy {
                                overflow: visible
                            }
                            
                            .fb_dialog_advanced {
                                padding: 10px;
                                -moz-border-radius: 8px;
                                -webkit-border-radius: 8px;
                                border-radius: 8px
                            }
                            
                            .fb_dialog_content {
                                background: #fff;
                                color: #333
                            }
                            
                            .fb_dialog_close_icon {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
                                cursor: pointer;
                                display: block;
                                height: 15px;
                                position: absolute;
                                right: 18px;
                                top: 17px;
                                width: 15px
                            }
                            
                            .fb_dialog_mobile .fb_dialog_close_icon {
                                top: 5px;
                                left: 5px;
                                right: auto
                            }
                            
                            .fb_dialog_padding {
                                background-color: transparent;
                                position: absolute;
                                width: 1px;
                                z-index: -1
                            }
                            
                            .fb_dialog_close_icon:hover {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
                            }
                            
                            .fb_dialog_close_icon:active {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
                            }
                            
                            .fb_dialog_loader {
                                background-color: #f6f7f9;
                                border: 1px solid #606060;
                                font-size: 24px;
                                padding: 20px
                            }
                            
                            .fb_dialog_top_left,
                            .fb_dialog_top_right,
                            .fb_dialog_bottom_left,
                            .fb_dialog_bottom_right {
                                height: 10px;
                                width: 10px;
                                overflow: hidden;
                                position: absolute
                            }
                            
                            .fb_dialog_top_left {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 0;
                                left: -10px;
                                top: -10px
                            }
                            
                            .fb_dialog_top_right {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -10px;
                                right: -10px;
                                top: -10px
                            }
                            
                            .fb_dialog_bottom_left {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -20px;
                                bottom: -10px;
                                left: -10px
                            }
                            
                            .fb_dialog_bottom_right {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/ye/r/8YeTNIlTZjm.png) no-repeat 0 -30px;
                                right: -10px;
                                bottom: -10px
                            }
                            
                            .fb_dialog_vert_left,
                            .fb_dialog_vert_right,
                            .fb_dialog_horiz_top,
                            .fb_dialog_horiz_bottom {
                                position: absolute;
                                background: #525252;
                                filter: alpha(opacity=70);
                                opacity: .7
                            }
                            
                            .fb_dialog_vert_left,
                            .fb_dialog_vert_right {
                                width: 10px;
                                height: 100%
                            }
                            
                            .fb_dialog_vert_left {
                                margin-left: -10px
                            }
                            
                            .fb_dialog_vert_right {
                                right: 0;
                                margin-right: -10px
                            }
                            
                            .fb_dialog_horiz_top,
                            .fb_dialog_horiz_bottom {
                                width: 100%;
                                height: 10px
                            }
                            
                            .fb_dialog_horiz_top {
                                margin-top: -10px
                            }
                            
                            .fb_dialog_horiz_bottom {
                                bottom: 0;
                                margin-bottom: -10px
                            }
                            
                            .fb_dialog_iframe {
                                line-height: 0
                            }
                            
                            .fb_dialog_content .dialog_title {
                                background: #6d84b4;
                                border: 1px solid #365899;
                                color: #fff;
                                font-size: 14px;
                                font-weight: bold;
                                margin: 0
                            }
                            
                            .fb_dialog_content .dialog_title>span {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
                                float: left;
                                padding: 5px 0 7px 26px
                            }
                            
                            body.fb_hidden {
                                -webkit-transform: none;
                                height: 100%;
                                margin: 0;
                                overflow: visible;
                                position: absolute;
                                top: -10000px;
                                left: 0;
                                width: 100%
                            }
                            
                            .fb_dialog.fb_dialog_mobile.loading {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
                                min-height: 100%;
                                min-width: 100%;
                                overflow: hidden;
                                position: absolute;
                                top: 0;
                                z-index: 10001
                            }
                            
                            .fb_dialog.fb_dialog_mobile.loading.centered {
                                width: auto;
                                height: auto;
                                min-height: initial;
                                min-width: initial;
                                background: none
                            }
                            
                            .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
                                width: 100%
                            }
                            
                            .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
                                background: none
                            }
                            
                            .loading.centered #fb_dialog_loader_close {
                                color: #fff;
                                display: block;
                                padding-top: 20px;
                                clear: both;
                                font-size: 18px
                            }
                            
                            #fb-root #fb_dialog_ipad_overlay {
                                background: rgba(0, 0, 0, .45);
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                top: 0;
                                width: 100%;
                                min-height: 100%;
                                z-index: 10000
                            }
                            
                            #fb-root #fb_dialog_ipad_overlay.hidden {
                                display: none
                            }
                            
                            .fb_dialog.fb_dialog_mobile.loading iframe {
                                visibility: hidden
                            }
                            
                            .fb_dialog_content .dialog_header {
                                -webkit-box-shadow: white 0 1px 1px -1px inset;
                                background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#738ABA), to(#2C4987));
                                border-bottom: 1px solid;
                                border-color: #1d4088;
                                color: #fff;
                                font: 14px Helvetica, sans-serif;
                                font-weight: bold;
                                text-overflow: ellipsis;
                                text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
                                vertical-align: middle;
                                white-space: nowrap
                            }
                            
                            .fb_dialog_content .dialog_header table {
                                -webkit-font-smoothing: subpixel-antialiased;
                                height: 43px;
                                width: 100%
                            }
                            
                            .fb_dialog_content .dialog_header td.header_left {
                                font-size: 12px;
                                padding-left: 5px;
                                vertical-align: middle;
                                width: 60px
                            }
                            
                            .fb_dialog_content .dialog_header td.header_right {
                                font-size: 12px;
                                padding-right: 5px;
                                vertical-align: middle;
                                width: 60px
                            }
                            
                            .fb_dialog_content .touchable_button {
                                background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#4966A6), color-stop(.5, #355492), to(#2A4887));
                                border: 1px solid #29487d;
                                -webkit-background-clip: padding-box;
                                -webkit-border-radius: 3px;
                                -webkit-box-shadow: rgba(0, 0, 0, .117188) 0 1px 1px inset, rgba(255, 255, 255, .167969) 0 1px 0;
                                display: inline-block;
                                margin-top: 3px;
                                max-width: 85px;
                                line-height: 18px;
                                padding: 4px 12px;
                                position: relative
                            }
                            
                            .fb_dialog_content .dialog_header .touchable_button input {
                                border: none;
                                background: none;
                                color: #fff;
                                font: 12px Helvetica, sans-serif;
                                font-weight: bold;
                                margin: 2px -12px;
                                padding: 2px 6px 3px 6px;
                                text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
                            }
                            
                            .fb_dialog_content .dialog_header .header_center {
                                color: #fff;
                                font-size: 16px;
                                font-weight: bold;
                                line-height: 18px;
                                text-align: center;
                                vertical-align: middle
                            }
                            
                            .fb_dialog_content .dialog_content {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
                                border: 1px solid #555;
                                border-bottom: 0;
                                border-top: 0;
                                height: 150px
                            }
                            
                            .fb_dialog_content .dialog_footer {
                                background: #f6f7f9;
                                border: 1px solid #555;
                                border-top-color: #ccc;
                                height: 40px
                            }
                            
                            #fb_dialog_loader_close {
                                float: left
                            }
                            
                            .fb_dialog.fb_dialog_mobile .fb_dialog_close_button {
                                text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
                            }
                            
                            .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
                                visibility: hidden
                            }
                            
                            #fb_dialog_loader_spinner {
                                animation: rotateSpinner 1.2s linear infinite;
                                background-color: transparent;
                                background-image: url(https://static.xx.fbcdn.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
                                background-repeat: no-repeat;
                                background-position: 50% 50%;
                                height: 24px;
                                width: 24px
                            }
                            
                            @keyframes rotateSpinner {
                                0% {
                                    transform: rotate(0deg)
                                }
                                100% {
                                    transform: rotate(360deg)
                                }
                            }
                            
                            .fb_iframe_widget {
                                display: inline-block;
                                position: relative
                            }
                            
                            .fb_iframe_widget span {
                                display: inline-block;
                                position: relative;
                                text-align: justify
                            }
                            
                            .fb_iframe_widget iframe {
                                position: absolute
                            }
                            
                            .fb_iframe_widget_fluid_desktop,
                            .fb_iframe_widget_fluid_desktop span,
                            .fb_iframe_widget_fluid_desktop iframe {
                                max-width: 100%
                            }
                            
                            .fb_iframe_widget_fluid_desktop iframe {
                                min-width: 220px;
                                position: relative
                            }
                            
                            .fb_iframe_widget_lift {
                                z-index: 1
                            }
                            
                            .fb_hide_iframes iframe {
                                position: relative;
                                left: -10000px
                            }
                            
                            .fb_iframe_widget_loader {
                                position: relative;
                                display: inline-block
                            }
                            
                            .fb_iframe_widget_fluid {
                                display: inline
                            }
                            
                            .fb_iframe_widget_fluid span {
                                width: 100%
                            }
                            
                            .fb_iframe_widget_loader iframe {
                                min-height: 32px;
                                z-index: 2;
                                zoom: 1
                            }
                            
                            .fb_iframe_widget_loader .FB_Loader {
                                background: url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat;
                                height: 32px;
                                width: 32px;
                                margin-left: -16px;
                                position: absolute;
                                left: 50%;
                                z-index: 4
                            }
                            
                            .fb_invisible_flow {
                                display: inherit;
                                height: 0;
                                overflow-x: hidden;
                                width: 0
                            }
                            
                            .fb_mobile_overlay_active {
                                height: 100%;
                                overflow: hidden;
                                position: fixed;
                                width: 100%
                            }
                            
                            .fb_shrink_active {
                                opacity: 1;
                                transform: scale(1, 1);
                                transition-duration: 200ms;
                                transition-timing-function: ease-out
                            }
                            
                            .fb_shrink_active:active {
                                opacity: .5;
                                transform: scale(.75, .75)
                            }
                        </style>
                        <style type="text/css">
                            .fancybox-margin {
                                margin-right: 15px;
                            }
                        </style>
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
                        <script src="./demo/jquery-1.9.1.min.js"></script>
                        <script src="./demo/bootstrap.js"></script>
                        <script src="./demo/dropdowns-enhancement.js"></script>
                        <script src="./demo/bootbox.min.js"></script>
                        <script src="./demo/jquery.unobtrusive-ajax.js"></script>
                        <script src="./demo/jquery.validate.js"></script>
                        <script src="./demo/jquery.validate.unobtrusive.js"></script>
                        <script src="./demo/jquery.cookies.2.2.0.min.js"></script>
                        <script src="./demo/jquery.lazyload.min.js"></script>
                        <script src="./demo/jquery.blockUI.min.js"></script>
                        <script src="./demo/jquery.maskedinput.min.js"></script>
                        <script src="./demo/jwplayer.js"></script>
                        <script src="./demo/jquery.newsTicker.min.js"></script>
                        <script src="./demo/jquery.marquee.js"></script>
                        <script src="./demo/url.min.js"></script>
                        <script src="./demo/nprogress.js"></script>
                        <script src="./demo/utilities.js"></script>
                        <script src="./demo/analytic.js"></script>
                        <script src="./demo/ace-elements.min.js"></script>
                        <script src="./demo/chosen.jquery.min.js"></script>
                        <script src="./demo/bootstrap-datepicker.min.js"></script>
                        <script src="./demo/bootstrap-timepicker.min.js"></script>
                        <script src="./demo/moment.min.js"></script>
                        <script src="./demo/daterangepicker.min.js"></script>
                        <script src="./demo/summernote.js"></script>
                        <script src="./demo/summernote-mn-MN.js"></script>
                        <script src="./demo/jquery.slimscroll.min.js"></script>
                        <script src="./demo/form.js"></script>
                        <script src="./demo/typeahead.min.js"></script>
                        <script src="./demo/micro-template.js"></script>
                        <script src="./demo/jquery.mousewheel.js"></script>
                        <script src="./demo/ie10-viewport-bug-workaround.js"></script>
                        <script src="./demo/jquery.bootstrap-responsive-tabs.min.js"></script>
                        <script src="./demo/jquery.easing.1.3.js"></script>
                        <script src="./demo/jquery-ui.js"></script>
                        <script src="./demo/jquery.bxslider.min.js"></script>
                        <script src="./demo/jquery.cycle.all.js"></script>
                        <script src="./demo/jquery.slimscroll.min(1).js"></script>
                        <script src="./demo/jquery.fancybox.pack.js"></script>
                        <script src="./demo/jquery.raty.js"></script>
                        <script src="./demo/calendar.js"></script>
                        <script src="./demo/youmax.js"></script>
                        <script src="./demo/scripts.js"></script>
                        <script src="./demo/jquery.history.js"></script>
                        <script src="./demo/jquery.form.js"></script>
                        <script src="./demo/jquery.scrollTo.js"></script>
                        <script src="./demo/jquery.transit.min.js"></script>
                        <script src="./demo/animation.js"></script>
                        <script src="./demo/ajaxify.js"></script>
                        <script src="./demo/scripts(1).js"></script>

                        <!-- Begin Google Analytics -->
                        <script type="text/javascript">
                            (function(i, s, o, g, r, a, m) {
                                i['GoogleAnalyticsObject'] = r;
                                i[r] = i[r] || function() {
                                    (i[r].q = i[r].q || []).push(arguments)
                                }, i[r].l = 1 * new Date();
                                a = s.createElement(o),
                                    m = s.getElementsByTagName(o)[0];
                                a.async = 1;
                                a.src = g;
                                m.parentNode.insertBefore(a, m)
                            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

                            app.analytic.create('UA-91534015-1', {
                                "cookieDomain": "none"
                            });

                            app.analytic.ready();

                            app.analytic.tracker('send', 'pageview');

                            $(function() {
                                $(window).on(app.event.AJAXIFY_NAVIGATED, function(e, url, relativeUrl) {
                                    app.analytic.tracker('set', 'page', relativeUrl);
                                    app.analytic.tracker('send', 'pageview');
                                });
                            });
                        </script>
                        <!-- End Google Analytics -->

                        <script id="wappalyzer" src="chrome-extension://gppongmhjkpfnbhagpmjfkannfbllamg/js/inject.js"></script>
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

                                                <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 60) }}</a></h6>

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

                                                <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 100) }}</a></h6>

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