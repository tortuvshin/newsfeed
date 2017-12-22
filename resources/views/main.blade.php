<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UnicMag - HTML5 Responsive Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/bootstrap.min.css" media="all" />
    <link rel="stylesheet" href="css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" href="css/superfish.css" media="all" />
    <link rel="stylesheet" href="css/owl.carousel.css" media="all" />
    <link rel="stylesheet" href="css/owl.theme.css" media="all" />
    <link rel="stylesheet" href="css/jquery.navgoco.css"/>
    <link rel="stylesheet" href="css/flexslider.css"/>
    <link rel="stylesheet" href="css/color-options.css" media="all" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="demo.css">
    <link rel="stylesheet" href="css/responsive.css"/>
    <script src="js/modernizr.custom.js"></script>


    <!-- Color Switch -->
    <link rel="stylesheet" href="css/skin/red.css" type="text/css" id="colors" />

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,300,400italic,700,700italic' rel='stylesheet' type='text/css'>

    {!! getcong('headcode') !!}

    @yield("header")

</head>
    
<body class="punica-home-1">

<div id="theme-option">
    <div class="theme-opt-wrapper">
        <p><em>You can use Unlimited Colors</em></p>
        <ul class="choose-color">
            <li><a href="#" class="color red">&nbsp;</a></li>
            <li><a href="#" class="color blue">&nbsp;</a></li>
            <li><a href="#" class="color cyan">&nbsp;</a></li>
            <li><a href="#" class="color pink">&nbsp;</a></li>
            <li><a href="#" class="color green">&nbsp;</a></li>            
            <li><a href="#" class="color oran">&nbsp;</a></li>
            <li><a href="#" class="color purple">&nbsp;</a></li>
        </ul>
        <div class="text-center"><a href="#" class="reset" onClick="return punica_theme_option_reset_CLICK();">Reset</a></div>
    </div><!--end:theme-opt-wrapper-->
    <a href="#" class="fa fa-cog open-close-button"> </a><!--open-close-button-->
</div><!--end:theme-option -->

<?php $DB_USER_LANG = isset($DB_USER_LANG) ? $DB_USER_LANG : '' ?>
@include("_particles.header")

@yield("content")

@include("_particles.footer")

<!-- end:punica-page-footer -->
    
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/colorswitch.js"></script>
<script src="js/custom.js" charset="utf-8"></script>

@yield("footer")
@include('.errors.swalerror')

<div id="auth-modal" class="modal auth-modal"></div>

<div class="hide">
    <input name="_requesttoken" id="requesttoken" type="hidden" value="{{ csrf_token() }}" />
</div>

{!!  getcong('footercode')  !!}

</body>

</html>
