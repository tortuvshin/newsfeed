<?php
$DB_PLUGIN_NEWS = getcong('p-buzzynews');
$DB_PLUGIN_LISTS = getcong('p-buzzylists');
$DB_PLUGIN_POLLS =getcong('p-buzzypolls');
$DB_PLUGIN_VIDEOS = getcong('p-buzzyvideos');
$DB_PLUGIN_QUIZS= getcong('p-buzzyquizzes');
$DB_PLUGIN_QUIZS=\App::getLocale();
?>
@extends("main")
@section('content')
    <div id="main-content">

	    <div class="breadcrumb clearfix">
	        <div class="wrapper">
	            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="">
	                <a href="{{ action('IndexController@index') }}" itemprop="url">
	                    <span itemprop="title">Нүүр</span>
	            </a>
	            </span>
	            <span>&nbsp;|&nbsp;</span>
	            <span itemtype="http://data-vocabulary.org/Breadcrumb" itemscope="" class="current-page"><span itemprop="title">404</span></span>
	        </div>
	        <!-- end:wrapper -->
	    </div>
	    <!-- breadcrumb -->

	    <div class="wrapper clearfix">

	        <section class="punica-error-404">

	            <div class="row">

	                <div class="col-md-5 col-sm-5">
	                    <h2 class="text-right">404</h2>
	                </div>
	                <!-- col-md-5 -->

	                <div class="col-md-7 col-sm-7">
	                    <h4>Хуудас олдсонгүй</h4>
	                    <p>Та нүүр хуудасруу буцах бол <a href="{{ action('IndexController@index') }}">энд</a> дарна уу</p>
	                </div>
	                <!-- col-md-7 -->

	            </div>
	            <!-- row -->

	        </section>
	        <!-- end:punica-error-404 -->

	    </div>
	    <!-- end:wrapper -->

	</div>
@endsection
