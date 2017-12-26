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
                                            <a href="#" class="pull-left">{{ $item->user->username }}</a>
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
                                            <a href="#" class="entry-categories pink">{{ $category->name }}</a>
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

            <section class="widget-area-15">
                @if($lastItems->total() > 0)
                    <div class="jscroll" data-auto="{!!  getcong('AutoLoadLists') ?: 'false' !!}">
                    
                        <div class="widget punica-post-list-1-widget">

                            @foreach($lastItems as $item)
                                <div class="col-md-4">

                                    <article class="entry-item">
                                        <div class="entry-thumb">
                                            <a class="entry-categories blue" href="#">News</a>
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
                    @include('errors.emptycontent')

                @endif
                <!-- end:widget -->

            </section>
            <!-- end:widget-area-15 -->

        </div>
        <!-- end:col-a -->

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
            <!-- end:punica-social-widget -->

            <div class="widget punica-tab-1-widget">

                <div class="punica-tab-container-1">

                    <ul class="nav nav-tabs punica-tabs-1">
                        <li class="active"><a href="#tab1-1" data-toggle="tab">Их уншсан</a></li>
                        <li class=""><a href="#tab1-2" data-toggle="tab">Их сэтгэгдэлтэй</a></li>  
                    </ul>
                    <!-- nav-tabs -->

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
                                                        <a href="{{ action('UsersController@index', [$item->user->username_slug ]) }}" class="pull-left">{{ $item->user->username }} </a>
                                                    </span>
                                                    <!-- end:entry-author -->
                                                </header>

                                                <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 60) }}</a></h6>

                                            </div>
                                            <!-- end:entry-content -->
                                        </article>
                                        <!-- end:entry-item -->

                                    </li>
                                    @endforeach
                            
                                @endif

                            </ul>

                        </div>
                        <!-- tab-panel -->
                        <div class="tab-pane" id="tab1-2">
                            
                            <ul class="clearfix">
                                
                                @if($lastNews)
                                    @foreach($lastNews->slice(1,10) as $key=>$item)
                                    <li>
                                        <article class="entry-item clearfix">
                                            <div class="entry-thumb pull-left">
                                                <a href="{{ makeposturl($item) }}"><img src="{{ makepreview($item->thumb, 'b', 'posts') }}" alt=""></a>
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
                                                        <a href="{{ action('UsersController@index', [$item->user->username_slug ]) }}" class="pull-left">{{ $item->user->username }} </a>
                                                    </span>
                                                    <!-- end:entry-author -->
                                                </header>

                                                <h6 class="entry-title"><a href="{{ makeposturl($item) }}">{{ str_limit($item->title, 100) }}</a></h6>

                                            </div>
                                            <!-- end:entry-content -->
                                        </article>
                                        <!-- end:entry-item -->

                                    </li>
                                    @endforeach
                            
                                @endif

                            </ul>

                        </div>
                        <!-- tab-panel -->

                    </div>
                    <!-- tab-content -->

                </div>
                <!-- punica-tab-container-1 -->
                
            </div>
            <!-- end:punica-tab-1-widget -->
            
        </aside>
        <!-- sidebar -->

        <div class="clear"></div>

    </div>
    <!-- end:wrapper -->

</div>

@endsection