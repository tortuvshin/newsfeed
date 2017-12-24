<header id="punica-page-header">

    <div id="header-top" class="clearfix">

        <div class="wrapper clearfix">

            <div class="left-col pull-left">
                
                <div class="widget widget_awesomeweatherwidget">

                    <div class="awesome-weather-wrap awecf temp5 awe_with_stats awe_wide" id="awesome-weather-hanoi">
                
                        <div class="awesome-weather-header">Улаанбаатар хот</div>
                        
                        <div class="awesome-weather-current-temp">
                            23<sup>C</sup>
                        </div> <!-- /.awesome-weather-current-temp -->
                
                            
                            <div class="awesome-weather-todays-stats">
                                <div class="awe_desc">Үүлэрхэг</div>
                                <div class="awe_wind">Салхи: 9м/с</div>
                                <div class="awe_highlow"> 23 градус </div>    
                            </div> <!-- /.awesome-weather-todays-stats -->
                    </div> <!-- /.awesome-weather-wrap -->
                </div>
                <!-- end:widget_awesomeweatherwidget -->

            </div>
            <!-- end:left-col -->

            <div class="right-col pull-right">
                <div class="top-banner"><a href="#"><img src="/placeholders/banner-1.jpg" alt=""></a></div>
            </div>
            <!-- end:right-col -->
            
        </div>
        <!-- end:wrapper -->

    </div>
    <!-- end:header-top -->

    <div id="header-middle" class="clearfix">

        <div class="wrapper clearfix">
            
            <div id="logo-image" class="pull-left" style="height: 75px; padding-top: 25px; font-family: fantasy;"><a href="{{ action('IndexController@index') }}" style="color: white; font-size: 40px;">Newsfeed</a></div>

            <nav id="main-nav" class="pull-left">
                
                <ul id="main-menu" class="clearfix">
                    <li class="current-menu-item">
                        <a href="{{ action('IndexController@index') }}">Нүүр</a>
                    </li>
                    @foreach(\App\Categories::where("main", '1')->where("disabled", '0')->orwhere("main", '2')->
                    where("disabled", '0')->orderBy('order')->limit(5)->get() as $categorys)
                      <li>
                         <a href="{{ url($categorys->name_slug) }}" data-type="{{ $categorys->id }}">{{ $categorys->name }} </a>
                            
                      </li>
                    @endforeach
                </ul>
                <!-- end:main-menu -->

                <i class='fa fa-align-justify'></i>
                
                <div class="mobile-menu-wrapper">
                    <ul id="mobile-menu">
                        <li class="current-menu-item">
                            <a href="{{ action('IndexController@index') }}">Нүүр</a>
                        </li>
                        @foreach(\App\Categories::where("main", '1')->where("disabled", '0')->orwhere("main", '2')->
                        where("disabled", '0')->orderBy('order')->limit(5)->get() as $categorys)
                          <li>
                             <a href="{{ url($categorys->name_slug) }}" data-type="{{ $categorys->id }}">{{ $categorys->name }} </a>
                                
                          </li>
                        @endforeach
                    </ul>
                    <!-- mobile-menu -->
                </div>
                <!-- mobile-menu-wrapper -->

            </nav>
            <!-- end:main-nav -->

            <div class="sb-search-wrapper">
                <div id="sb-search" class="sb-search">
                    <form>
                        <input class="sb-search-input" placeholder="Enter your search term..." type="text" value="" name="search" id="search">
                        <input class="sb-search-submit" type="submit" value="">
                        <span class="sb-icon-search"></span>
                    </form>
                </div><!--sb-search-->
            </div>
            <!-- end:sb-search-wrapper -->

        </div>
        <!-- end:wrapper -->
        
    </div>
    <!-- end:header-middle -->

    <div id="header-bottom" class="clearfix">
        
        <div class="wrapper clearfix">
            
            <ul class="social-links pull-left clearfix">
                <li><a href="#" class="fa fa-facebook"></a></li>
                <li><a href="#" class="fa fa-twitter"></a></li>
                <li><a href="#" class="fa fa-tumblr"></a></li>
                <li><a href="#" class="fa fa-rss"></a></li>
                <li><a href="#" class="fa fa-skype"></a></li>
                <li><a href="#" class="fa fa-youtube"></a></li>
                <li><a href="#" class="fa fa-google-plus"></a></li>
            </ul>
            <!-- end:social-links -->

            <nav id="secondary" class="pull-left">
                @foreach(\App\Categories::where("main", '1')->where("disabled", '0')->orwhere("main", '2')->where("disabled", '0')->orderBy('order')->limit(5)->get() as $cat)
                    <ul id="secondary-menu" class="pull-left clearfix">
                        <li>
                            <a href="{{ url('/'.$cat->name_slug) }}"> {{ $cat->name }}</a>
                        </li>
                    </ul>
                @endforeach
                <!-- end:secondary-menu -->
            </nav>
            <!-- end:secondary-nav -->

        </div>
        <!-- end:wrapper -->

    </div>
    <!-- end:header-bottom -->
    
</header>