@extends('layouts.app-amp')

@section('metaTitle', $post->title)
@section('metaDescription', strip_tags($post->excerpt))

@section('metaHeader')
<?php
$firstImage = \TemplateHelper::getFirstImageObj($post);
$firstImageUrl = null;
if ($firstImage) {
    $firstImageUrl = \TemplateHelper::imageUrl($firstImage->url);
}

$authorName = '';

if ($author) {
    $authorName = $author->name;
}

$categoryName = '';
if (!empty($categories)) {
    $categoryName = $categories[0];
}

$timeStamp = $post->getDate('DateTimePublished', false);

$datePublished = date("Y-m-d");
$postDates = [];
if (!empty($timeStamp)) {
    $datePublished = date("Y-m-d", $timeStamp);
    $postDates['year'] = date("Y", $timeStamp);
    $postDates['month'] = date("m", $timeStamp);
    $postDates['day'] = date("d", $timeStamp);
}

$postExcerpt = ($post->excerpt) ? strip_tags($post->excerpt) : '';

$body = $post->body;
?>
<meta property="og:locale" content="en_US"/>
<meta property="og:type" content="article"/>
<meta property="og:title" content="{{ $post->title }}"/>
<meta property="og:description" content="{!! $postExcerpt !!}"/>
<meta property="og:url"
      content="{{ Config::get('app.url') }}/blog/{{ $post->slug }}"/>
<meta property="og:site_name" content="{{ Config::get('app.name') }}"/>
@if ($firstImageUrl)
<meta property="og:image" content="{{ $firstImageUrl }}"/>
@endif
<meta property="og:image:alt" content="{{ $post->title }} image"/>
<link rel="canonical"
      href="{{ Config::get('app.url') }}/blog/{{ $post->slug }}">
<script async custom-element="amp-analytics"
        src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
<script async custom-element="amp-facebook-comments" src="https://cdn.ampproject.org/v0/amp-facebook-comments-0.1.js"></script>
<script async custom-element="amp-facebook-page" src="https://cdn.ampproject.org/v0/amp-facebook-page-0.1.js"></script>
<script async custom-element="amp-youtube" src="https://cdn.ampproject.org/v0/amp-youtube-0.1.js"></script>
<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
<script async src="https://cdn.ampproject.org/v0.js"></script>
<script type="application/ld+json">
        { "@context": "http://schema.org",
         "@type": "BlogPosting",
         "mainEntityOfPage": {
         "@type": "WebPage",
         "@id": "{{ Config::get('app.url') }}"
        },
         "headline": "{{ $post->title }}",
         "image": "{{ $firstImageUrl }}",
         "editor": "{{ $authorName }}",
         "genre": "{{ $categoryName }}",
       "publisher": {
        "@type": "Organization",
        "name": "Gigtrooper",
            "logo": {
              "@type": "ImageObject",
              "url": "http://www.gigtrooper.com/images/logo.png"
            }
        },
         "url": "{{ Config::get('app.url') }}",
         "datePublished": "{{ $datePublished }}",
         "dateCreated": "{{ $datePublished }}",
         "dateModified": "{{ $datePublished }}",
         "description": "{{ $postExcerpt }}",
           "author": {
            "@type": "Person",
            "name": "{{ $authorName }}"
          }
         }


</script>
@endsection

@section('stylesheets')
    {{--<link href="{{ mix('css/bootstrap.css') }}" rel="stylesheet">--}}
<style amp-custom>.container-fluid:after,.container:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.row.add-clearfix>.col-xs-2:nth-child(6n+1),.row.add-clearfix>.col-xs-3:nth-child(4n+1),.row.add-clearfix>.col-xs-4:nth-child(3n+1),.row.add-clearfix>.col-xs-6:nth-child(2n+1),.row:after{clear:both}.single .single-navigation a.button span,.single .single-navigation i,img{vertical-align:middle}.image-container amp-img,.img-thumbnail,.mobile-section .image-wrapper amp-img{max-width:100%}[role=button],a.button{cursor:pointer}*,:after,:before{box-sizing:border-box}body{line-height:1.42857143}button,input,select,textarea{font-family:inherit;font-size:inherit;line-height:inherit}a:focus,a:hover{color:#23527c;text-decoration:underline}.navbar-brand:focus,.navbar-brand:hover,a{text-decoration:none}a:focus{outline:-webkit-focus-ring-color auto 5px;outline-offset:-2px}figure{margin:0}.img-responsive{display:block;max-width:100%;height:auto}.img-thumbnail{padding:4px;line-height:1.42857143;background-color:#fff;border:1px solid #ddd;border-radius:4px;transition:all .2s ease-in-out;display:inline-block;height:auto}.container-fluid:after,.container-fluid:before,.container:after,.container:before,.row:after,.row:before{content:" ";display:table}.img-circle{border-radius:50%}hr{margin-top:20px;margin-bottom:20px;border:0;border-top:1px solid #eee}.container,.container-fluid{margin-right:auto;margin-left:auto;padding-left:15px;padding-right:15px}@media (min-width:768px){.container{width:750px}}@media (min-width:992px){.container{width:970px}}@media (min-width:1200px){.container{width:1170px}}.row{margin-left:-15px;margin-right:-15px}.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9,.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9,.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{position:relative;min-height:1px;padding-left:15px;padding-right:15px}.col-xs-1,.col-xs-10,.col-xs-11,.col-xs-12,.col-xs-2,.col-xs-3,.col-xs-4,.col-xs-5,.col-xs-6,.col-xs-7,.col-xs-8,.col-xs-9{float:left}.col-xs-1{width:8.33333333%}.col-xs-2{width:16.66666667%}.col-xs-3{width:25%}.col-xs-4{width:33.33333333%}.col-xs-5{width:41.66666667%}.col-xs-6{width:50%}.col-xs-7{width:58.33333333%}.col-xs-8{width:66.66666667%}.col-xs-9{width:75%}.col-xs-10{width:83.33333333%}.col-xs-11{width:91.66666667%}.col-xs-12{width:100%}.col-xs-pull-0{right:auto}.col-xs-pull-1{right:8.33333333%}.col-xs-pull-2{right:16.66666667%}.col-xs-pull-3{right:25%}.col-xs-pull-4{right:33.33333333%}.col-xs-pull-5{right:41.66666667%}.col-xs-pull-6{right:50%}.col-xs-pull-7{right:58.33333333%}.col-xs-pull-8{right:66.66666667%}.col-xs-pull-9{right:75%}.col-xs-pull-10{right:83.33333333%}.col-xs-pull-11{right:91.66666667%}.col-xs-pull-12{right:100%}.col-xs-push-0{left:auto}.col-xs-push-1{left:8.33333333%}.col-xs-push-2{left:16.66666667%}.col-xs-push-3{left:25%}.col-xs-push-4{left:33.33333333%}.col-xs-push-5{left:41.66666667%}.col-xs-push-6{left:50%}.col-xs-push-7{left:58.33333333%}.col-xs-push-8{left:66.66666667%}.col-xs-push-9{left:75%}.col-xs-push-10{left:83.33333333%}.col-xs-push-11{left:91.66666667%}.col-xs-push-12{left:100%}.col-xs-offset-0{margin-left:0}.col-xs-offset-1{margin-left:8.33333333%}.col-xs-offset-2{margin-left:16.66666667%}.col-xs-offset-3{margin-left:25%}.col-xs-offset-4{margin-left:33.33333333%}.col-xs-offset-5{margin-left:41.66666667%}.col-xs-offset-6{margin-left:50%}.col-xs-offset-7{margin-left:58.33333333%}.col-xs-offset-8{margin-left:66.66666667%}.col-xs-offset-9{margin-left:75%}.col-xs-offset-10{margin-left:83.33333333%}.col-xs-offset-11{margin-left:91.66666667%}.col-xs-offset-12{margin-left:100%}@media (min-width:768px){.col-sm-1,.col-sm-10,.col-sm-11,.col-sm-12,.col-sm-2,.col-sm-3,.col-sm-4,.col-sm-5,.col-sm-6,.col-sm-7,.col-sm-8,.col-sm-9{float:left}.col-sm-1{width:8.33333333%}.col-sm-2{width:16.66666667%}.col-sm-3{width:25%}.col-sm-4{width:33.33333333%}.col-sm-5{width:41.66666667%}.col-sm-6{width:50%}.col-sm-7{width:58.33333333%}.col-sm-8{width:66.66666667%}.col-sm-9{width:75%}.col-sm-10{width:83.33333333%}.col-sm-11{width:91.66666667%}.col-sm-12{width:100%}.col-sm-pull-0{right:auto}.col-sm-pull-1{right:8.33333333%}.col-sm-pull-2{right:16.66666667%}.col-sm-pull-3{right:25%}.col-sm-pull-4{right:33.33333333%}.col-sm-pull-5{right:41.66666667%}.col-sm-pull-6{right:50%}.col-sm-pull-7{right:58.33333333%}.col-sm-pull-8{right:66.66666667%}.col-sm-pull-9{right:75%}.col-sm-pull-10{right:83.33333333%}.col-sm-pull-11{right:91.66666667%}.col-sm-pull-12{right:100%}.col-sm-push-0{left:auto}.col-sm-push-1{left:8.33333333%}.col-sm-push-2{left:16.66666667%}.col-sm-push-3{left:25%}.col-sm-push-4{left:33.33333333%}.col-sm-push-5{left:41.66666667%}.col-sm-push-6{left:50%}.col-sm-push-7{left:58.33333333%}.col-sm-push-8{left:66.66666667%}.col-sm-push-9{left:75%}.col-sm-push-10{left:83.33333333%}.col-sm-push-11{left:91.66666667%}.col-sm-push-12{left:100%}.col-sm-offset-0{margin-left:0}.col-sm-offset-1{margin-left:8.33333333%}.col-sm-offset-2{margin-left:16.66666667%}.col-sm-offset-3{margin-left:25%}.col-sm-offset-4{margin-left:33.33333333%}.col-sm-offset-5{margin-left:41.66666667%}.col-sm-offset-6{margin-left:50%}.col-sm-offset-7{margin-left:58.33333333%}.col-sm-offset-8{margin-left:66.66666667%}.col-sm-offset-9{margin-left:75%}.col-sm-offset-10{margin-left:83.33333333%}.col-sm-offset-11{margin-left:91.66666667%}.col-sm-offset-12{margin-left:100%}}@media (min-width:992px){.col-md-1,.col-md-10,.col-md-11,.col-md-12,.col-md-2,.col-md-3,.col-md-4,.col-md-5,.col-md-6,.col-md-7,.col-md-8,.col-md-9{float:left}.col-md-1{width:8.33333333%}.col-md-2{width:16.66666667%}.col-md-3{width:25%}.col-md-4{width:33.33333333%}.col-md-5{width:41.66666667%}.col-md-6{width:50%}.col-md-7{width:58.33333333%}.col-md-8{width:66.66666667%}.col-md-9{width:75%}.col-md-10{width:83.33333333%}.col-md-11{width:91.66666667%}.col-md-12{width:100%}.col-md-pull-0{right:auto}.col-md-pull-1{right:8.33333333%}.col-md-pull-2{right:16.66666667%}.col-md-pull-3{right:25%}.col-md-pull-4{right:33.33333333%}.col-md-pull-5{right:41.66666667%}.col-md-pull-6{right:50%}.col-md-pull-7{right:58.33333333%}.col-md-pull-8{right:66.66666667%}.col-md-pull-9{right:75%}.col-md-pull-10{right:83.33333333%}.col-md-pull-11{right:91.66666667%}.col-md-pull-12{right:100%}.col-md-push-0{left:auto}.col-md-push-1{left:8.33333333%}.col-md-push-2{left:16.66666667%}.col-md-push-3{left:25%}.col-md-push-4{left:33.33333333%}.col-md-push-5{left:41.66666667%}.col-md-push-6{left:50%}.col-md-push-7{left:58.33333333%}.col-md-push-8{left:66.66666667%}.col-md-push-9{left:75%}.col-md-push-10{left:83.33333333%}.col-md-push-11{left:91.66666667%}.col-md-push-12{left:100%}.col-md-offset-0{margin-left:0}.col-md-offset-1{margin-left:8.33333333%}.col-md-offset-2{margin-left:16.66666667%}.col-md-offset-3{margin-left:25%}.col-md-offset-4{margin-left:33.33333333%}.col-md-offset-5{margin-left:41.66666667%}.col-md-offset-6{margin-left:50%}.col-md-offset-7{margin-left:58.33333333%}.col-md-offset-8{margin-left:66.66666667%}.col-md-offset-9{margin-left:75%}.col-md-offset-10{margin-left:83.33333333%}.col-md-offset-11{margin-left:91.66666667%}.col-md-offset-12{margin-left:100%}}@media (min-width:768px){.form-inline .form-control-static,.form-inline .form-group{display:inline-block}.form-inline .control-label,.form-inline .form-group{margin-bottom:0;vertical-align:middle}.form-inline .form-control{display:inline-block;width:auto;vertical-align:middle}.form-inline .input-group{display:inline-table;vertical-align:middle}.form-inline .input-group .form-control,.form-inline .input-group .input-group-btn{width:auto}.form-inline .input-group>.form-control{width:100%}.form-inline .checkbox,.form-inline .radio{display:inline-block;margin-top:0;margin-bottom:0;vertical-align:middle}.form-inline .checkbox label,.form-inline .radio label{padding-left:0}.form-inline .checkbox input[type=checkbox],.form-inline .radio input[type=radio]{position:relative;margin-left:0}.form-inline .has-feedback .form-control-feedback{top:0}}.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before{content:" ";display:table}.navbar{position:relative;min-height:50px;margin-bottom:20px;border:1px solid transparent}.navbar-collapse{overflow-x:visible;padding-right:15px;padding-left:15px;border-top:1px solid transparent;box-shadow:inset 0 1px 0 rgba(255,255,255,.1);-webkit-overflow-scrolling:touch}.navbar-collapse.in{overflow-y:auto}.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse{max-height:340px}@media (max-device-width:480px) and (orientation:landscape){.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse{max-height:200px}}.container-fluid>.navbar-collapse,.container-fluid>.navbar-header,.container>.navbar-collapse,.container>.navbar-header{margin-right:-15px;margin-left:-15px}@media (min-width:768px){.navbar{border-radius:4px}.navbar-header{float:left}.navbar-collapse{width:auto;border-top:0;box-shadow:none}.navbar-collapse.collapse{display:block;height:auto;padding-bottom:0;overflow:visible}.navbar-collapse.in{overflow-y:visible}.navbar-fixed-bottom .navbar-collapse,.navbar-fixed-top .navbar-collapse,.navbar-static-top .navbar-collapse{padding-left:0;padding-right:0}.container-fluid>.navbar-collapse,.container-fluid>.navbar-header,.container>.navbar-collapse,.container>.navbar-header{margin-right:0;margin-left:0}.navbar-static-top{border-radius:0}}.navbar-static-top{z-index:1000;border-width:0 0 1px}.navbar-fixed-bottom,.navbar-fixed-top{position:fixed;right:0;left:0;z-index:1030}.navbar-fixed-top{top:0;border-width:0 0 1px}.navbar-fixed-bottom{bottom:0;margin-bottom:0;border-width:1px 0 0}.navbar-brand{float:left;padding:15px;font-size:18px;line-height:20px;height:50px}.navbar-brand>img{display:block}@media (min-width:768px){.navbar-fixed-bottom,.navbar-fixed-top{border-radius:0}.navbar>.container .navbar-brand,.navbar>.container-fluid .navbar-brand{margin-left:-15px}}.navbar-toggle{position:relative;float:right;margin-right:15px;padding:9px 10px;margin-top:8px;margin-bottom:8px;background-color:transparent;background-image:none;border:1px solid transparent;border-radius:4px}.navbar-toggle:focus{outline:0}.navbar-toggle .icon-bar{display:block;width:22px;height:2px;border-radius:1px}.navbar-toggle .icon-bar+.icon-bar{margin-top:4px}.navbar-nav{margin:7.5px -15px}.navbar-nav>li>a{padding-top:10px;padding-bottom:10px;line-height:20px}@media (max-width:767px){.navbar-nav .open .dropdown-menu{position:static;float:none;width:auto;margin-top:0;background-color:transparent;border:0;box-shadow:none}.navbar-nav .open .dropdown-menu .dropdown-header,.navbar-nav .open .dropdown-menu>li>a{padding:5px 15px 5px 25px}.navbar-nav .open .dropdown-menu>li>a{line-height:20px}.navbar-nav .open .dropdown-menu>li>a:focus,.navbar-nav .open .dropdown-menu>li>a:hover{background-image:none}}@media (min-width:768px){.navbar-toggle{display:none}.navbar-nav{float:left;margin:0}.navbar-nav>li{float:left}.navbar-nav>li>a{padding-top:15px;padding-bottom:15px}}.navbar-form{padding:10px 15px;border-top:1px solid transparent;border-bottom:1px solid transparent;box-shadow:inset 0 1px 0 rgba(255,255,255,.1),0 1px 0 rgba(255,255,255,.1);margin:8px -15px}@media (min-width:768px){.navbar-form .form-control-static,.navbar-form .form-group{display:inline-block}.navbar-form .control-label,.navbar-form .form-group{margin-bottom:0;vertical-align:middle}.navbar-form .form-control{display:inline-block;width:auto;vertical-align:middle}.navbar-form .input-group{display:inline-table;vertical-align:middle}.navbar-form .input-group .form-control,.navbar-form .input-group .input-group-btn{width:auto}.navbar-form .input-group>.form-control{width:100%}.navbar-form .checkbox,.navbar-form .radio{display:inline-block;margin-top:0;margin-bottom:0;vertical-align:middle}.navbar-form .checkbox label,.navbar-form .radio label{padding-left:0}.navbar-form .checkbox input[type=checkbox],.navbar-form .radio input[type=radio]{position:relative;margin-left:0}.navbar-form .has-feedback .form-control-feedback{top:0}.navbar-form{width:auto;border:0;margin-left:0;margin-right:0;padding-top:0;padding-bottom:0;box-shadow:none}}@media (max-width:767px){.navbar-form .form-group{margin-bottom:5px}.navbar-form .form-group:last-child{margin-bottom:0}}.navbar-nav>li>.dropdown-menu{margin-top:0;border-top-right-radius:0;border-top-left-radius:0}.navbar-fixed-bottom .navbar-nav>li>.dropdown-menu{margin-bottom:0;border-radius:4px 4px 0 0}.navbar-btn{margin-top:8px;margin-bottom:8px}.navbar-btn.btn-sm{margin-top:10px;margin-bottom:10px}.navbar-btn.btn-xs{margin-top:14px;margin-bottom:14px}.navbar-text{margin-top:15px;margin-bottom:15px}@media (min-width:768px){.navbar-text{float:left;margin-left:15px;margin-right:15px}.navbar-left{float:left}.navbar-right{float:right;margin-right:-15px}.navbar-right~.navbar-right{margin-right:0}}.navbar-default{background-color:#f8f8f8;border-color:#e7e7e7}.navbar-default .navbar-brand{color:#777}.navbar-default .navbar-brand:focus,.navbar-default .navbar-brand:hover{color:#5e5d5d;background-color:transparent}.navbar-default .navbar-nav>li>a,.navbar-default .navbar-text{color:#777}.navbar-default .navbar-nav>li>a:focus,.navbar-default .navbar-nav>li>a:hover{color:#333;background-color:transparent}.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:focus,.navbar-default .navbar-nav>.active>a:hover{color:#555;background-color:#e7e7e7}.navbar-default .navbar-nav>.disabled>a,.navbar-default .navbar-nav>.disabled>a:focus,.navbar-default .navbar-nav>.disabled>a:hover{color:#ccc;background-color:transparent}.navbar-default .navbar-toggle{border-color:#ddd}.navbar-default .navbar-toggle:focus,.navbar-default .navbar-toggle:hover{background-color:#ddd}.navbar-default .navbar-toggle .icon-bar{background-color:#888}.navbar-default .navbar-collapse,.navbar-default .navbar-form{border-color:#e7e7e7}.navbar-default .navbar-nav>.open>a,.navbar-default .navbar-nav>.open>a:focus,.navbar-default .navbar-nav>.open>a:hover{background-color:#e7e7e7;color:#555}@media (max-width:767px){.navbar-default .navbar-nav .open .dropdown-menu>li>a{color:#777}.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover{color:#333;background-color:transparent}.navbar-default .navbar-nav .open .dropdown-menu>.active>a,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover{color:#555;background-color:#e7e7e7}.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:focus,.navbar-default .navbar-nav .open .dropdown-menu>.disabled>a:hover{color:#ccc;background-color:transparent}}.navbar-default .navbar-link{color:#777}.navbar-default .navbar-link:hover{color:#333}.navbar-default .btn-link{color:#777}.navbar-default .btn-link:focus,.navbar-default .btn-link:hover{color:#333}.navbar-default .btn-link[disabled]:focus,.navbar-default .btn-link[disabled]:hover{color:#ccc}@font-face{font-family:FontAwesome;src:url(../fonts/fontawesome-webfont.eot?v=4.0.3);src:url(../fonts/fontawesome-webfont.eot?#iefix&v=4.0.3) format("embedded-opentype"),url(../fonts/fontawesome-webfont.woff?v=4.0.3) format("woff"),url(../fonts/fontawesome-webfont.ttf?v=4.0.3) format("truetype"),url(../fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular) format("svg");font-weight:400;font-style:normal}ol,ul{margin:0;list-style-type:none}.pull-left{float:left}.pull-right{float:right}@font-face{font-family:soap-icons;src:url(../fonts/soap-icons.eot?26664784);src:url(../fonts/soap-icons.eot?26664784#iefix) format("embedded-opentype"),url(../fonts/soap-icons.woff?26664784) format("woff"),url(../fonts/soap-icons.ttf?26664784) format("truetype"),url(../fonts/soap-icons.svg?26664784#soap-icons) format("svg");font-weight:400;font-style:normal}[class*=" soap-icon"],[class^=soap-icon]{vertical-align:baseline}[class*=" soap-icon"]:before,[class^=soap-icon]:before{font-family:soap-icons;font-style:normal;font-weight:400;speak:none;display:inline-block;text-decoration:inherit;text-align:center;font-variant:normal;text-transform:none;line-height:1em}.box-title small,.post .entry-date,.post-meta,.time{text-transform:uppercase}.glyphicon.circle,[class*=" soap-icon"].circle,[class^=soap-icon].circle{border:1px solid;width:1.8em;height:1.8em;line-height:1.7333em;border-radius:50%;display:inline-block;text-align:center}.soap-icon-twitter:before{content:'\e8a8'}.soap-icon-instagram:before{content:'\e8b5'}.soap-icon-facebook:before{content:'\e8a0'}.soap-icon-youtube:before{content:'\e8ab'}.soap-icon-linkedin:before{content:'\e8b0'}.soap-icon-longarrow-left:before{content:'\e88a'}.soap-icon-longarrow-right:before{content:'\e88b'}.soap-icon-user:before{content:'\e8b7'}@font-face{font-family:NexaBlack;src:url(../fonts/NexaBlack.eot?) format("eot"),url(../fonts/NexaBlack.otf) format("opentype"),url(../fonts/NexaBlack.woff) format("woff"),url(../fonts/NexaBlack.ttf) format("truetype"),url(../fonts/NexaBlack.svg#NexaBlack) format("svg")}section#content{min-height:400px;padding-top:40px;text-align:left;background:#f5f5f5}section#content:after{display:table;content:"";clear:both}.box{margin-bottom:30px}.large-block{margin-bottom:70px}article{margin-bottom:20px}#main{margin-bottom:40px}.post-title,.sidebar .image-box.style14{margin-bottom:0}.box-title{line-height:1em}.box-title small{font-size:10px;color:#838383;display:block;margin-top:4px}.box-title small [class^=soap-icon]{color:#fdb714;font-size:1.3333em}h2.box-title small{font-size:11px}h1.box-title small{font-size:12px}.author .name,.box-title,.breadcrumbs,.icon-box.style1,.icon-box.style2,.icon-box.style3 .description,.icon-box.style5,.post-meta,.post-title,.price,.price-wrapper,.s-title,.search-results-title,.title,a.button,button,dl,input[type=button].button,label,span.info,ul.tabs a{letter-spacing:.04em}a.button{display:inline-block;background:#d9d9d9;font-size:.8333em;line-height:1.8333em;text-align:center}a.button:hover{background:#98ce44}a.button.btn-mini{padding-left:10px;padding-right:10px}a.button.btn-large,a.button.btn-medium,a.button.btn-small,a.button.full-width{font-weight:700}blockquote,q{quotes:'\201C' '\201D' '\2018' '\2019'}blockquote{font-size:1.3333em;line-height:1.6em;padding:20px 20px 20px 40px;border-left:none;position:relative;text-indent:-19px}blockquote p{font-size:1em}blockquote:after,blockquote:before{font-family:Georgia,serif;font-size:2.5em;vertical-align:middle;line-height:0}blockquote:before{content:open-quote;margin-right:4px}blockquote:after{content:close-quote;margin-left:3px}blockquote.style1,blockquote.style2{background:#fff;font-style:italic}blockquote.style1 p,blockquote.style2 p{display:inline}blockquote.style1{border-left:3px solid #fdb714;position:relative}blockquote.style1>span.triangle:before{text-indent:0;content:"\f0da";font-family:FontAwesome;color:#fdb714;position:absolute;left:-1px;top:50%;margin-top:-11px;font-style:normal}blockquote.style1:after,blockquote.style1:before{color:#f5f5f5}blockquote.style1.border-color-blue{border-color:#01b7f2}blockquote.style1.border-color-blue>span.triangle:before{color:#01b7f2}blockquote.style2{color:#0ab596}blockquote.style2:after,blockquote.style2:before{color:#fdb714}.selected-effect{display:block;position:relative;overflow:hidden;background:#0ab596}.selected-effect amp-img{-moz-opacity:.5;-khtml-opacity:.5;opacity:.5}.selected-effect:after{position:absolute;color:#fff;background:0 0;content:"\e8ba";font-family:soap-icons;font-size:1.6667em;text-align:center;line-height:50px;border:2px solid #fff;border-radius:50%;width:50px;height:50px;left:50%;top:50%;margin-left:-25px;margin-top:-25px}.animated .hover-effect{z-index:0}.social-icons li{float:left;text-align:center;overflow:hidden}.social-icons li a{width:32px;margin-right:4px;height:32px;display:inline-block;background:#d9d9d9;color:#fff;line-height:32px;font-size:1.3333em;transition:opacity .3s ease-in}.social-icons li a:hover,.social-icons.style1 a:hover{background:#0ab596}.social-icons li:last-child{margin-right:0}.social-icons.icon-circle a{border-radius:50%;overflow:hidden}.social-icons.style2 a{border-radius:50%}.social-icons.full-width{display:block}.social-icons.full-width li{display:table-cell;float:none;width:1%;margin:0;text-align:center}.social-icons li:hover i{animation:toRightFromLeft .3s forwards;display:block}.time{font-size:.8333em;line-height:19px}.time [class^=soap-icon]{float:left;font-size:18px;color:#fdb714;margin-right:5px}.post-meta{font-size:.8333em}.title{color:#2d3e52}.toggle-container{background:#fff}.toggle-container .panel{margin-bottom:0;box-shadow:none;border-radius:0;border:none;border-bottom:2px solid #f5f5f5;position:relative}.toggle-container .panel:last-child{border:none}.toggle-container .panel .panel-title{padding:0;color:#2d3e52;font-size:1.1667em;position:relative}.toggle-container .panel .panel-title a{white-space:normal;display:block;padding:15px}.toggle-container .panel h1.panel-title{font-size:2em}.toggle-container .panel h2.panel-title{font-size:1.6667em}.toggle-container .panel h3.panel-title{font-size:1.5em}.toggle-container .panel h4.panel-title{font-size:1.3333em}.toggle-container .panel h5.panel-title{font-size:1.1667em}.toggle-container .panel h6.panel-title{font-size:1em}.toggle-container .panel.style1 .panel-title>a{line-height:24px}.toggle-container .panel.style1 .panel-title>a:before{display:block;content:"\f068";font-family:FontAwesome;margin-right:16px;line-height:24px;font-size:10px;float:left;width:24px;height:24px;text-align:center;color:#9e9e9e;background:#f5f5f5;border-radius:50%}.toggle-container .panel.style1 .panel-title>a.collapsed:before{content:"\f067";color:#fff;background:#0ab596}.toggle-container .panel.style1 .panel-content{padding:10px 15px 15px 55px}.toggle-container .panel.style1.arrow-right .panel-title{position:relative}.toggle-container .panel.style1.arrow-right .panel-title>a{padding-right:36px}.toggle-container .panel.style1.arrow-right .panel-title>a:before{float:none;position:absolute;right:0;height:16px;line-height:17px;width:16px;font-size:9px;border:none;margin-top:-8px;top:50%}.toggle-container .panel.style1.arrow-right .panel-content{padding:10px 15px}.toggle-container .panel.style2 .panel-title{padding:0}.toggle-container .panel.style2 .panel-title>a{display:block;line-height:normal;padding:15px 20px;color:#0ab596}.toggle-container .panel.style2 .panel-title>a.collapsed{color:inherit;position:relative}.toggle-container .panel.style2 .panel-title>a.collapsed:hover{color:#0ab596}.toggle-container .panel.style2 .panel-title>a:after{content:"\f068";font-family:FontAwesome;font-size:10px;width:30px;height:30px;display:block;position:absolute;right:15px;bottom:0;color:#9e9e9e;background:#f5f5f5;text-align:center;line-height:30px}.post figure amp-img,.toggle-container.with-image>.image-container>amp-img{height:auto;width:100%}.toggle-container .panel.style2 .panel-title>a.collapsed:after{content:"\f067";color:#fff;background:#0ab596}.toggle-container .panel.style2 .panel-content{padding:0 15px 30px 20px}.toggle-container.with-image>.image-container{background:#0ab596}.toggle-container.with-image .panel>amp-img{display:none}.toggle-container.with-image .panel-title>a{color:#01b7f2}.toggle-container.with-image .panel-title>a.collapsed{color:inherit}.toggle-container.with-image .panel-title>a.collapsed:hover{color:#01b7f2}.sidebar .image-box.style14 .box{padding-bottom:15px;border-bottom:1px solid #f5f5f5;margin-bottom:15px}.sidebar .image-box.style14 .box:last-child{border:none;margin-bottom:0;padding-bottom:0}.border-box{border:15px solid #f5f5f5}.post{position:relative}.post .entry-date{background:#2d3e52;padding:7px 15px;color:#fff;text-align:center;position:absolute;left:0;top:10px}.post .entry-date .date{margin:0;font-size:1.6667em;display:block;font-weight:400}.post .entry-date .month{margin:0;font-size:.8333em;font-weight:400}.single .details{margin-bottom:30px}.comment-list .the-comment .comment-text :last-child{margin-bottom:0}.single .single-navigation a.button{font-weight:400}.single .single-navigation i{font-size:1.25em;font-weight:400;line-height:0}.single .single-navigation .prev i{margin-right:20px}.single .single-navigation .next i{margin-left:20px}.about-author .about-author-container{background:#fff;padding:0 20px}.about-author .about-author-content{display:table;border-bottom:1px solid #f5f5f5}.about-author .avatar{display:table-cell;padding:20px 20px 20px 0;border-right:1px solid #f5f5f5}.about-author .description{display:table-cell;padding:20px;vertical-align:top}.about-author .wrote-posts-count span,.mobile-section .description{vertical-align:middle}.about-author .description p{line-height:1.8333em}.about-author .about-author-meta{padding:15px 0}.about-author .social-icons{float:right}.about-author .wrote-posts-count{line-height:28px;font-size:1.1667em}.about-author .wrote-posts-count i{font-size:1.8333em;color:#0ab596;float:left;margin-right:10px}.single .avatar amp-img{border-radius:50%;width:96px;height:96px}.comment-list .the-comment{padding-top:20px;margin-top:20px;border-top:1px solid #f5f5f5}.comment-list .the-comment .comment-text{padding-right:50px}.comment-list>li.comment:first-child>.the-comment{padding-top:0;margin-top:0;border-top:none}.comment-list .avatar{margin-right:30px;float:left}.comment-list .avatar amp-img{width:72px;height:72px}.comment-list ul.children{padding-left:50px}.author a{display:inline-block;border-radius:50%;overflow:hidden;margin-left:1px}.author amp-img{-webkit-backface-visibility:visible}#header .ribbon.currency>ul.menu li a,#header .topnav ul.quick-menu>li>a{font-size:.8333em;text-transform:uppercase}#header,#header .ribbon,#header .ribbon>a{position:relative}.animated{visibility:hidden}body.is-mobile .animated{visibility:visible}#header{z-index:999}#header .topnav{height:30px;background:#0ab596;width:100%}#header .topnav ul.quick-menu>li{float:left;margin-left:20px}#header .topnav ul.quick-menu>li:first-child{margin-left:0}#header .topnav ul.quick-menu>li>a{color:#fff;line-height:30px;display:block}#header .ribbon>a{padding:0 10px 0 0;text-transform:uppercase}#header .ribbon>a:after{display:inline-block;position:absolute;right:0;content:"\f0d7";font-family:FontAwesome;color:#fff}#header .ribbon:hover>ul.menu{top:28px;visibility:visible;-moz-opacity:1;-khtml-opacity:1;opacity:1}#header .ribbon>ul.menu{position:absolute;left:-15px;top:-9999px;z-index:99;visibility:hidden}#header .ribbon>ul.menu.left{left:auto;right:-10px}#header .main-header{height:auto;position:relative;width:100%}#header .logo{padding:0;text-align:left;margin:10px 0 0;height:auto}#header .mobile-menu-toggle{background:url(../images/icon/mobile-menu.png) center center no-repeat #0ab596;margin:0;height:66px;width:66px;padding:22px;position:absolute;right:0;top:0;bottom:0;text-indent:-9999px;display:none}#header .mobile-menu-toggle .icon-bar{background:#fff}#header.style1{background:#0ab596;padding-top:30px}#header.style1 *{color:#fff}#header.style1 .logo{margin:0 0 0 -77px;float:none;position:absolute;left:50%;top:32px}#header.style1 .logo a{width:155px;position:relative}#header.style1 .logo a:after{position:absolute;display:block;width:130px;height:30px;background:url(../images/logo_txt.png) no-repeat #0ab596;content:"";top:0;right:0}#header.style1 .logo amp-img{-moz-opacity:1;-khtml-opacity:1;opacity:1}#header.style1 .social-icons{float:right}#header.style1 .social-icons li a{background:0 0;border:1px solid transparent;overflow:hidden}#header.style1 .social-icons li a:hover{border:1px solid #5cd9c2}#header.style1 .social-icons li a:hover i{display:block;animation:toBottomFromTop .3s forwards}#header.style1 #main-menu{border-top:1px solid #5cd9c2}#header.style1 #main-menu ul.menu{margin:0 auto;float:none}#header.style1 #main-menu ul.menu>li{padding-left:0;padding-right:0;margin-right:15px}#header.style1 #main-menu ul.menu>li>a{padding-left:20px;padding-right:20px;height:50px;line-height:50px;font-weight:700}#header.style1 #main-menu ul.menu>li.active>a,#header.style1 #main-menu ul.menu>li:hover>a{color:#fff;background:#5cd9c2}#header.style1 #main-menu ul.menu>li:hover>ul{top:47px}#footer .logo a,#header .logo a{background:url(../images/logo.png) no-repeat;display:block}#footer .logo amp-img,#header .logo amp-img{-moz-opacity:0;-khtml-opacity:0;opacity:0}.menu>li{position:relative}#main-menu ul.menu{margin:0;float:right}#main-menu ul.menu li{-webkit-backface-visibility:hidden;-webkit-transform:none}#main-menu ul.menu>li{float:left;padding-left:20px;padding-right:20px}#main-menu ul.menu>li:first-child{padding-left:0}#main-menu ul.menu>li:last-child{padding-right:0}#main-menu ul.menu>li:hover>ul{top:66px;visibility:visible;height:auto;-moz-opacity:1;-khtml-opacity:1;opacity:1;z-index:1000}#main-menu ul.menu>li>a{font-weight:400;display:block;padding:0;height:68px;line-height:68px;text-transform:uppercase;letter-spacing:.04em}#main-menu ul.menu>li.active>a{color:#0ab596;font-weight:700}#main-menu ul.menu>li:hover>a{color:#0ab596}#main-menu ul.menu>li>ul.left{left:auto;right:-10px}#main-menu ul.menu>li ul{visibility:hidden;position:absolute;left:0;top:-9999px;z-index:-1;width:180px;padding:0;background:#0ab596}#main-menu ul.menu>li ul li{text-align:left;position:relative}#main-menu ul.menu>li ul li:first-child{border-top:none}#main-menu ul.menu>li ul li:hover>ul{top:0;display:block;visibility:visible;-moz-opacity:1;-khtml-opacity:1;opacity:1;z-index:1000}#main-menu ul.menu>li ul li>a{border-top:1px solid #2fcaae;white-space:nowrap;color:#fff;padding:12px 20px 12px 18px;display:block;font-size:.9167em;-moz-opacity:.7;-khtml-opacity:.7;opacity:.7}#main-menu ul.menu>li ul li.active>a,#main-menu ul.menu>li ul li:hover>a{background:#2fcaae;-moz-opacity:1;-khtml-opacity:1;opacity:1}#main-menu ul.menu>li li>ul{left:180px}#main-menu ul.menu>li li>ul.left{left:-180px}ul.menu.mini{min-width:180px;border:2px solid #0ab596;background:#fff}ul.menu.mini li{padding:0 20px;float:none;margin:0}ul.menu.mini li a{border-bottom:1px solid #f5f5f5;display:block;padding:10px 0;color:inherit;line-height:normal;font-size:.9167em;text-align:left}ul.menu.mini li.active,ul.menu.mini li:hover{background:#f5f5f5}ul.menu.mini li.active a,ul.menu.mini li:hover a{color:#0ab596;font-weight:700}.mobile-menu{background:#0ab596;text-align:left}.mobile-menu li{list-style-type:none;margin:0}.mobile-menu .close-sidebar{padding:15px 10px}.mobile-menu a{color:#fff;-moz-opacity:.7;-khtml-opacity:.7;opacity:.7;display:block;padding:15px;background:0 0}.mobile-menu li.active>a,.mobile-menu li:hover>a{-moz-opacity:1;-khtml-opacity:1;opacity:1}.mobile-menu>ul.menu>li{float:none;padding-left:15px;padding-right:15px}.mobile-menu>ul.menu>li>a{font-size:1.1667em;border-top:1px solid #2fcaae;text-transform:uppercase;font-weight:700}.mobile-menu>ul.menu>li.menu-item-has-children{position:relative}.mobile-menu>ul.menu>li.menu-item-has-children.open{background:#2fcaae}.mobile-menu>ul.menu>li.menu-item-has-children>.dropdown-toggle{position:absolute;right:1px;top:7px;height:34px;line-height:34px;padding:0 15px;background:0 0;display:inline-block;font-family:FontAwesome;font-size:1.3333em;font-weight:400;-moz-opacity:.7;-khtml-opacity:.7;opacity:.7}.mobile-menu>ul.menu>li.menu-item-has-children>.dropdown-toggle:after{content:"\f056"}.mobile-menu>ul.menu>li.menu-item-has-children>.dropdown-toggle.collapsed:after{content:"\f055"}.mobile-menu>ul.menu>li.menu-item-has-children.open>a{color:#fff;-moz-opacity:1;-khtml-opacity:1;opacity:1}.mobile-menu>ul.menu>li.menu-item-has-children.open>.dropdown-toggle,.mobile-menu>ul.menu>li.menu-item-has-children:hover>.dropdown-toggle,.mobile-menu>ul.menu>li.menu-item-has-children:hover>a{-moz-opacity:1;-khtml-opacity:1;opacity:1}.mobile-menu>ul.menu>li.menu-item-has-children>ul{border-top:1px solid #0ab596}.mobile-menu>ul.menu>li:first-child>a{border-top:none}.mobile-menu>ul.menu>li:last-child>a{border-bottom:1px solid #2fcaae}.mobile-menu>ul.menu>li>ul li>a{padding-left:15px;font-size:1.0833em;position:relative}.mobile-menu>ul.menu>li>ul li>a:before{font-family:FontAwesome;content:"\f111";display:block;font-size:4px;position:absolute;left:0}.mobile-menu>ul.menu>li>ul li.menu-item-has-children>a{padding-left:0;color:#fff;-moz-opacity:1;-khtml-opacity:1;opacity:1;font-size:1.1667em;font-weight:700;text-transform:uppercase}.mobile-menu>ul.menu>li>ul li.menu-item-has-children>a:before{content:"";display:none}.mobile-menu>ul.menu>li>ul li.menu-item-has-children>ul{border-bottom:1px solid #0ab596}.mobile-menu>ul.menu>li>ul li.menu-item-has-children:last-child>ul{border-bottom:none}.mobile-menu>ul.menu>li li li.menu-item-has-children>a{padding-left:10px}.mobile-menu>ul.menu>li li li.menu-item-has-children>a:before{display:none}.mobile-menu .mobile-topnav{margin:0 auto;padding:0 5px}.mobile-menu .mobile-topnav>li{float:left;position:relative;color:#5cd9c2}.mobile-menu .mobile-topnav>li>a{font-size:.8333em;padding:0 10px;margin:22px 10px;line-height:1em;width:auto}.mobile-menu .mobile-topnav>li:after{content:"|";position:absolute;right:-1px;top:50%;margin-top:-10px}.mobile-menu .mobile-topnav>li:last-child:after{display:none}.mobile-menu .mobile-topnav>li:first-child a{margin-left:0}.mobile-menu .mobile-topnav .menu.mini{left:0;top:40px;visibility:visible;display:none;min-width:100px}.mobile-menu .mobile-topnav .menu.mini li>a{padding:10px 0}.mobile-menu .mobile-topnav .menu.mini.left{left:0;right:auto}#footer .footer-wrapper{padding:80px 0}#footer .footer-wrapper>.container>.row>div{margin-top:20px}#footer .discover li{line-height:2.6667em;font-size:1.0833em}#footer h2{margin-bottom:20px}#footer .bottom{height:60px}#footer .bottom .logo{margin:18px 0 0}#footer .bottom .copyright{font-size:1.0833em;margin:23px 20px 0}#footer .bottom #back-to-top{margin-top:20px;display:block;font-size:16px;color:#2d3e52}#footer .bottom #back-to-top i{border-color:#0ab596;font-weight:700;overflow:hidden}#footer .bottom #back-to-top:hover>i:before{animation:toTopFromBottom .3s forwards;display:inline-block}#footer #main-menu .menu>li.menu-item-has-children>ul{top:auto;bottom:66px}.mobile-section .table-wrapper{table-layout:fixed;width:100%}.mobile-section .image-wrapper{vertical-align:bottom;padding-top:50px}.col-sms-1,.col-sms-10,.col-sms-11,.col-sms-12,.col-sms-2,.col-sms-3,.col-sms-4,.col-sms-5,.col-sms-6,.col-sms-7,.col-sms-8,.col-sms-9{position:relative;min-height:1px;padding-left:15px;padding-right:15px}@media (min-width:481px) and (max-width:767px){.col-sms-1,.col-sms-10,.col-sms-11,.col-sms-12,.col-sms-2,.col-sms-3,.col-sms-4,.col-sms-5,.col-sms-6,.col-sms-7,.col-sms-8,.col-sms-9{float:left}.col-sms-12{width:100%}.col-sms-11{width:91.66666667%}.col-sms-10{width:83.33333333%}.col-sms-9{width:75%}.col-sms-8{width:66.66666667%}.col-sms-7{width:58.33333333%}.col-sms-6{width:50%}.col-sms-5{width:41.66666667%}.col-sms-4{width:33.33333333%}.col-sms-3{width:25%}.col-sms-2{width:16.66666667%}.col-sms-1{width:8.33333333%}.col-sms-pull-12{right:100%}.col-sms-pull-11{right:91.66666667%}.col-sms-pull-10{right:83.33333333%}.col-sms-pull-9{right:75%}.col-sms-pull-8{right:66.66666667%}.col-sms-pull-7{right:58.33333333%}.col-sms-pull-6{right:50%}.col-sms-pull-5{right:41.66666667%}.col-sms-pull-4{right:33.33333333%}.col-sms-pull-3{right:25%}.col-sms-pull-2{right:16.66666667%}.col-sms-pull-1{right:8.33333333%}.col-sms-pull-0{right:0}.col-sms-push-12{left:100%}.col-sms-push-11{left:91.66666667%}.col-sms-push-10{left:83.33333333%}.col-sms-push-9{left:75%}.col-sms-push-8{left:66.66666667%}.col-sms-push-7{left:58.33333333%}.col-sms-push-6{left:50%}.col-sms-push-5{left:41.66666667%}.col-sms-push-4{left:33.33333333%}.col-sms-push-3{left:25%}.col-sms-push-2{left:16.66666667%}.col-sms-push-1{left:8.33333333%}.col-sms-push-0{left:0}.col-sms-offset-12{margin-left:100%}.col-sms-offset-11{margin-left:91.66666667%}.col-sms-offset-10{margin-left:83.33333333%}.col-sms-offset-9{margin-left:75%}.col-sms-offset-8{margin-left:66.66666667%}.col-sms-offset-7{margin-left:58.33333333%}.col-sms-offset-6{margin-left:50%}.col-sms-offset-5{margin-left:41.66666667%}.col-sms-offset-4{margin-left:33.33333333%}.col-sms-offset-3{margin-left:25%}.col-sms-offset-2{margin-left:16.66666667%}.col-sms-offset-1{margin-left:8.33333333%}.col-sms-offset-0{margin-left:0}}@media (min-width:481px){.row.add-clearfix>.col-sms-2:nth-child(2n+1),.row.add-clearfix>.col-sms-2:nth-child(3n+1),.row.add-clearfix>.col-sms-2:nth-child(4n+1){clear:none}.row.add-clearfix>.col-sms-2:nth-child(6n+1){clear:both}.row.add-clearfix>.col-sms-3:nth-child(2n+1),.row.add-clearfix>.col-sms-3:nth-child(3n+1){clear:none}.row.add-clearfix>.col-sms-3:nth-child(4n+1){clear:both}.row.add-clearfix>.col-sms-4:nth-child(2n+1){clear:none}.row.add-clearfix>.col-sms-4:nth-child(3n+1),.row.add-clearfix>.col-sms-6:nth-child(2n+1){clear:both}}@media (min-width:768px){.row.add-clearfix>.col-sm-2:nth-child(2n+1),.row.add-clearfix>.col-sm-2:nth-child(3n+1),.row.add-clearfix>.col-sm-2:nth-child(4n+1){clear:none}.row.add-clearfix>.col-sm-2:nth-child(6n+1){clear:both}.row.add-clearfix>.col-sm-3:nth-child(2n+1),.row.add-clearfix>.col-sm-3:nth-child(3n+1){clear:none}.row.add-clearfix>.col-sm-3:nth-child(4n+1){clear:both}.row.add-clearfix>.col-sm-4:nth-child(2n+1){clear:none}.row.add-clearfix>.col-sm-4:nth-child(3n+1),.row.add-clearfix>.col-sm-6:nth-child(2n+1){clear:both}}@media (min-width:992px){.mobile-menu,.visible-mobile{display:none}.row.add-clearfix>.col-md-2:nth-child(2n+1),.row.add-clearfix>.col-md-2:nth-child(3n+1),.row.add-clearfix>.col-md-2:nth-child(4n+1){clear:none}.row.add-clearfix>.col-md-2:nth-child(6n+1){clear:both}.row.add-clearfix>.col-md-3:nth-child(2n+1),.row.add-clearfix>.col-md-3:nth-child(3n+1){clear:none}.row.add-clearfix>.col-md-3:nth-child(4n+1){clear:both}.row.add-clearfix>.col-md-4:nth-child(2n+1){clear:none}.row.add-clearfix>.col-md-4:nth-child(3n+1),.row.add-clearfix>.col-md-6:nth-child(2n+1){clear:both}}@media (min-width:1200px){.container{padding-left:0;padding-right:0}}@media (min-width:992px) and (max-width:1199px){.container{padding-left:0;padding-right:0}}@media (max-width:1199px){[class^=col-lg-].pull-left,[class^=col-lg-].pull-right{float:none}}@media (max-width:991px){.block-sm,[class*=" col-md-"].pull-left,[class*=" col-md-"].pull-right,[class^=col-md-].pull-left,[class^=col-md-].pull-right{float:none}.container{width:auto;padding-left:15px;padding-right:15px}#header{padding-top:0;background:0 0}#header .logo{float:none;position:static;padding-top:19px;height:66px;margin:0;display:block}#header .logo a:after{display:none}#header .logo a{background-size:auto 30px}#header .logo img{height:30px;width:auto}#header .main-navigation{background:#fff}#header .mobile-menu-toggle{display:block}#header #main-menu,#header .topnav,.hidden-mobile{display:none}.hidden-table-sm.table-wrapper,.hidden-table-sm.table-wrapper>.table-cell,.hidden-table-sm.table-wrapper>.table-row>.table-cell{display:block}.block-sm{margin-bottom:10px}dl.term-description dd{padding-left:20px}.hidden-table-sm.table-wrapper.intro{border:15px solid #f5f5f5}.hidden-table-sm.table-wrapper>.table-cell.pull-left,.hidden-table-sm.table-wrapper>.table-row>.table-cell.pull-left{float:left}.hidden-table-sm.table-wrapper>.table-cell.pull-right,.hidden-table-sm.table-wrapper>.table-row>.table-cell.pull-right{float:right}}@media (min-width:768px) and (max-width:991px){.tab-container.full-width-style ul.tabs{width:20%}.tab-container.full-width-style .tab-content{width:80%}}@media (max-width:767px){.breadcrumbs{display:none}.image-box.style2 figure,[class*=" col-sm-"].pull-left,[class*=" col-sm-"].pull-right,[class^=col-sm-].pull-left,[class^=col-sm-].pull-right{float:none}.image-box.style2 .details{padding-left:20px;padding-bottom:20px}}@media (max-width:480px){.hidden-table-xs.table-wrapper,.hidden-table-xs.table-wrapper>.table-cell,.hidden-table-xs.table-wrapper>.table-row>.table-cell,.visible-sms{display:block}.image-box-style.style2 figure{width:100%;float:none}.image-box-style.style2 .details{padding:20px}.hidden-table-xs.table-wrapper.intro{border:15px solid #f5f5f5}.hidden-table-xs.table-wrapper>.table-cell.pull-left,.hidden-table-xs.table-wrapper>.table-row>.table-cell.pull-left{float:left}.hidden-table-xs.table-wrapper>.table-cell.pull-right,.hidden-table-xs.table-wrapper>.table-row>.table-cell.pull-right{float:right}}@media (max-width:320px){.container{width:314px}.row{padding:0 3px}}html{-webkit-tap-highlight-color:transparent;font-size:19px;min-height:100%}body{font:75%/150% Arial,Helvetica,sans-serif;background-color:#fff;color:#838383;overflow-x:hidden;-webkit-font-smoothing:antialiased;-ms-overflow-style:scrollbar;oveflow-y:scroll}a{color:inherit}.logo amp-img{width:160px;height:37px}a.button{border:none;color:#fff;padding:0 15px;white-space:nowrap}a.button.btn-large{padding:0 32px;height:43px;font-size:1.1667em;line-height:43px}a.button.btn-medium{padding:0 32px;height:34px;line-height:34px;font-size:1em}a.button.btn-small{height:28px;padding:0 24px;line-height:28px;font-size:.9167em}a.button.btn-mini{height:19px;padding:0 20px;font-size:.8333em;line-height:19px}a.button.full-width{padding-left:0;padding-right:0;width:100%}.page-title-container{height:56px;background:#2d3e52}.page-title-container .page-title .entry-title{color:#fff;line-height:56px}h1,h2,h4{line-height:1.25em}h1,h2,h3,h4,h5,h6{margin:0 0 15px;font-weight:400;color:#2d3e52}h1{font-size:2em}h2{font-size:1.6667em}h3{font-size:1.5em;line-height:1.2222em}h4{font-size:1.3333em}h5{font-size:1.1666em;line-height:1.1428em}h6{font-size:1em}.box-title,.image-box{color:#2d3e52;margin-bottom:10px}.image-box .box amp-img{width:100%;height:auto}.single .post .details{background:#fff;padding:20px 20px 10px}.travelo-box{background:#fff;padding:20px;margin-bottom:30px}ul.check li:before{content:"\e8ba";margin-right:10px;color:#98ce44;font-family:soap-icons;font-size:1.3333em;line-height:1em}ul.category-menu{padding:0}.filters-container ul.categories-filter li{padding:0;background:0 0;border-bottom:1px solid #f5f5f5}.text-center{text-align:center}ul.check{line-height:2em}</style>
@endsection

@section('bodyClass')
single single-pos
@endsection

@section('title')
Blog
@endsection

@section('headercontainer')
@parent
<div class="row">
    <div class="col-sm-12 text-center">
        <div class="sticky-ads">
            <amp-ad height=100
                    layout="fixed-height"
                    type="adsense"
                    data-ad-client="ca-pub-4838720912538149"
                    data-ad-slot="4271397717">
            </amp-ad>
        </div>
    </div>
</div>
@endsection


@section('content')
<div class="row">
    <div id="main" class="col-sm-8 col-md-9">
        <div class="post {{ (empty($firstImage)) ?
                                'without-featured-item' : '' }}">
            @if ($firstImageUrl)
            <figure class="image-container">

                <amp-img
                        width="{{ $firstImage->width }}"
                        height="{{ $firstImage->height }}"
                        layout="responsive"
                        src="{{ $firstImageUrl }}"
                        alt="{{ $post->title }} image"
                ></amp-img>

            </figure>
            @endif

            <div class="details">
                <amp-social-share type="facebook"
                                  data-param-app_id="471033783229489"></amp-social-share>
                <amp-social-share type="twitter"></amp-social-share>
                <h1 class="entry-title">{{ $post->title }}</h1>
                <div class="post-content">
                    {!! \TemplateHelper::ampify($body) !!}
                </div>
                <div class="sharethis-inline-share-buttons"></div>
                <hr/>
                <div class="clearfix"></div>
                <div class="post-meta">
                    <div class="entry-date">
                        <label class="date">
                            {{ (!empty($postDates["day"]))? $postDates["day"] : '' }}
                        </label>
                        <label class="month">
                            @php
                                    if (!empty($postDates["month"]))
                                    {
                                      $time  = mktime(0, 0, 0, $postDates["month"]);
                                      $month = strftime("%b", $time);
                                      echo $month;
                                    }
                                @endphp
                            </label>
                        </div>
                        <div class="entry-author fn">
                            <i class="icon soap-icon-user"></i> Posted By:
                            <a href="#" class="author">
                                {{ $authorName }}
                            </a>
                        </div>
                        <div class="entry-action">
                            {{--<a href="{{ $url }}#post-comments" class="button entry-comment btn-small"><i--}}
                            {{--class="soap-icon-comment"></i><span>--}}
                            {{--{{ TemplateHelper::fbCommentCount($url) }}--}}
                            {{--Comments</span></a>--}}
                            <span class="entry-tags"><i
                                        class="soap-icon-features"></i><span>{!! $post->getFieldValue('Tag') !!}</span></span>
                        </div>
                    </div>
                </div>
                <div id="nearbottom"></div>
                @if ($popularPosts)

                    <div class="row image-box listing-style1">
                        <h2 class="text-center">Popular Posts</h2>
                        @foreach ($popularPosts as $post)
                            <div class="col-sm-6 col-md-3 popular-post">
                                <article class="box">
                                    @php
                                        $first = \TemplateHelper::getFirstImageObj($post);
                                    @endphp
                                    @if ($first)
                                        <figure>
                                            <a href="/blog/{{ $post->slug }}">
                        <span>
                          <amp-img layout="responsive" width="192" height="102" alt="{{ $post->title }} image"
                                   src="{{ \TemplateHelper::imageUrl($first->getThumbUrl()) }}"></amp-img>
                        </span>
                                            </a>
                                        </figure>
                                    @endif
                                    <div class="details">
                                        <h4 class="box-title">
                                            <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                                        </h4>

                                        <div class="description">
                                            {!! $post->subTitle !!}
                                        </div>

                                        <div class="action text-center">
                                            <a class="button btn-small"
                                               href="/blog/{{ $post->slug }}">VIEW
                                                POST</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>

                @endif
                <div class="single-navigation block">
                    <div class="row">
                        <div class="col-xs-6">
                            @if ($prevPost!= null)
                                <a rel="prev" href="{{ $prevPost->slug }}"
                                   class="button btn-large prev
                                full-width"><i
                                            class="soap-icon-longarrow-left"></i><span>Previous Post</span></a>
                            @endif
                        </div>

                        <div class="col-xs-6">
                            @if ($nextPost != null)
                                <a rel="next" href="{{ $nextPost->slug }}"
                                   class="button btn-large next
                                full-width"><span>Next Post</span><i
                                            class="soap-icon-longarrow-right"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="about-author block">
                    @if ($author)

                        <h2>About Author</h2>
                        <div class="about-author-container">
                            <div class="about-author-content">
                                @php
                                    $images = $author->getJsonToArray('Avatar');
                                @endphp
                                @if (!empty($images))
                                    <div class="avatar">
                                        <amp-img src="{{ TemplateHelper::imageUrl($images[0]['url']) }}"
                                             width="96"
                                                 height="96" alt=""></amp-img>
                                    </div>
                                @endif
                                <div class="description">
                                    <h4>{{ $author->name }}</h4>
                                    <p>{!! $author->aboutMe !!}</p>
                                </div>
                            </div>
                            <div class="about-author-meta clearfix">
                                <ul class="social-icons">
                                    @if ($author->twitterUrl)
                                        <li><a target="_blank"
                                               href="{{ $author->twitterUrl }}"><i
                                                        class="soap-icon-twitter"></i></a>
                                        </li>
                                    @endif
                                    @if ($author->instagramUrl)
                                        <li><a target="_blank"
                                               href="{{ $author->instagramUrl }}">
                                                <i class="soap-icon-instagram"></i></a>
                                        </li>
                                    @endif
                                    @if ($author->facebookUrl)
                                        <li><a target="_blank"
                                               href="{{ $author->facebookUrl }}">
                                                <i class="soap-icon-facebook"></i></a>
                                        </li>
                                    @endif
                                    @if ($author->linkedInUrl)
                                        <li><a target="_blank"
                                               href="{{ $author->linkedInUrl }}">
                                                <i class="soap-icon-linkedin"></i></a>
                                        </li>
                                    @endif
                                </ul>
                                {{--<a href="#" class="wrote-posts-count"><i class="soap-icon-slider"></i><span><b>30</b> Posts</span></a>--}}
                            </div>
                        </div>
                    @endif
                </div>

                <div class="comments-container block">
                    <a name="post-comments"></a>
                    <amp-facebook-comments width=486 height=657
                                           layout="responsive"
                                           data-numposts="5"
                                           data-href="{{ \Request::url() }}">
                    </amp-facebook-comments>

                </div>

            </div>
        </div>
        @include('blog.sidebar-amp')
    </div>

@endsection

@section('beforebody')
    {{--<amp-sticky-ad layout="nodisplay">--}}
        {{--<amp-ad width=300 height=100--}}
                {{--type="doubleclick"--}}
                {{--data-slot="/21717544879/stickyAd">--}}
        {{--</amp-ad>--}}
    {{--</amp-sticky-ad>--}}
@endsection