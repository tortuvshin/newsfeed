@extends("app")
@section('head_title',  $post->title.' | '.getcong('sitename'))
@section('head_description', $post->body)
@section('head_image', asset('/upload/media/posts/'.$post->thumb.'-b.jpg'))
@section('head_url', Request::url())
@section('modedefault', 'mode-default')
@section("content")

@foreach($entrys as $key => $entry)

<div id="main-content" style="padding-top: 45px;">

    <div class="breadcrumb clearfix">
        <div class="wrapper">
            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
                <a href="index.html" itemprop="url">
                    <span itemprop="title">Home</span>
            </a>
            </span>
            <span>&nbsp;|&nbsp;</span>
            @if(isset($post->category->name_slug))   
                <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="current-page"><a href="{{ action('PagesController@showCategory', ['id' => $post->category->name_slug ]) }}"><span itemprop="title">{{ $post->category->name }}</span></a></span>
            @endif
        </div>
    </div>
    <!-- breadcrumb -->

    <div class="wrapper clearfix" style="padding-top: 20px;">

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

                <h2 class="entry-title">{{ $post->title }}</h2>

                <div class="tag-box clearfix">
                    <span class="pull-left fa fa-tags"></span>
                    @if ($post->tags != "")
                        @foreach(explode(',', $post->tags) as $tag)
                          <a class="pull-left" href="{{ action('PagesController@showtag', $tag) }}">{{$tag}}</a>
                        @endforeach
                    @endif
                </div>
                <!-- end:tag-box -->

                <div class="entry-thumb">
                    <img src="{{ makepreview($post->thumb, 'b', 'posts') }}" alt="{{ $post->title }}">
                </div>
                <!-- end:entry-thumb -->

                <div class="entry-content clearfix">

                    <p class="clearfix">{{ $post->body }}</p>

                    <p>{!! $entry->body !!}</p>

                </div>
                <!-- end:entry-content -->


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
            </div>
            <!-- end:entry-box -->

            <section id="related-articles">

                <h4>Төстэй мэдээлэл</h4>

                @if(isset($lastFeatures))
                    @if(count($lastFeatures) >= 1)
                    
                    <ul class="clearfix">
                        @foreach($lastFeatures as $item)
                        <li>
                            <article class="entry-item clearfix">
                                <div class="entry-thumb pull-left">
                                    <a class="entry-categories orange" href="#">Foods</a>
                                    <div class="punica-zoom-effect">
                                        <a href=""><img src="{{ makepreview($item->thumb, 's', 'posts') }}" alt=""></a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <header class="clearfix">
                                        <span class="entry-date pull-left clearfix">
                                            <i class="fa fa-clock-o pull-left"></i>
                                            <span class="month pull-left">Sep.</span>
                                        <span class="date pull-left">23</span>
                                        </span>
                                        <span class="entry-meta pull-left">,&nbsp;</span>
                                        <span class="entry-author clearfix pull-left">
                                            <span class="pull-left">By&nbsp;</span>
                                        <a class="pull-left" href="#">Jack grove</a>
                                        </span>
                                    </header>

                                    <h6 class="entry-title"><a href="">{{ str_limit($item->title, 30) }}</a></h6>
                                    <p>{{ str_limit($item->body, 60) }}</p>
                                </div>
                            </article>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                @endif
            </section>
            <!-- end:related-articles -->


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

@endforeach
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