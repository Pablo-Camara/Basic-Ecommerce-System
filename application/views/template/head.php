<!DOCTYPE html>
<!-- ==============================
    Project:        Light Life - Hemp Shop
    Version:        1.0
    Author:         Pablo Camara
    Email:          pablo.dev.acc@gmail.com
================================== -->
<html lang="{{ app()->getLocale() }}" class="no-js">
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Light Life - Hemp Shop<?= isset($page_title) ? ' - '.$page_title : '' ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta content="Legal Marijuana, CBD, Grinders and Other Accessories - Italia" name="description"/>
    <meta content="Pablo Camara" name="author"/>

    <meta property="og:url"           content="http://www.light-life.it" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Light Life - Hemp Shop - Home" />
    <meta property="og:description"   content="Hemp Shop - Chivasso - Italia - Light Life" />
    <meta property="og:image"         content="http://www.light-life.it/resources/img/legalweeddelivery.gif" />

    <!-- GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
    <link href="<?= site_url('/resources/vendor/simple-line-icons/simple-line-icons.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= site_url('/resources/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>

    <!-- PAGE LEVEL PLUGIN STYLES -->
    <link href="<?= site_url('/resources/css/animate.min.css') ?>" rel="stylesheet">


    <!-- THEME STYLES -->
    <link href="<?= site_url('/resources/css/layout.min.css') ?>?now=<?= date('d/m/Y H:i:s'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= site_url('/resources/vendor/swiper/css/swiper.min.css') ?>?now=now" rel="stylesheet" type="text/css"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico"/>


    <?php if(isset($show_map) && $show_map): ?>
    <script type="text/javascript">
        window.gmapPin = '<?= site_url('/resources/img/widgets/gmap-pin.png') ?>';
    </script>
    <?php endif; ?>



</head>
<!-- END HEAD -->

<!-- BODY -->
<body class="<?= isset($body_classes) ? $body_classes : '' ?>">

<?php
    $caller_controller->load->view('template/components/navbar',$data ? $data: null);
    $caller_controller->load->view('template/components/parallax',$data ? $data: null);
    $caller_controller->load->view('template/components/featured_slides',$data ? $data: null);

    if(isset($show_article,$article_title,$article_description) && $show_article && $article_title && $article_description): ?>

    <div class="article-item">
        <div class="article-container">
            <h1 class="carousel-title medium"><?= $article_title; ?></h1>
            <p style="color: white; font-size: 16px;"><?= $article_description; ?></p>
        </div>
    </div>

<?php
    endif;
    if(!isset($hide_head_categories) || $hide_head_categories === false){
        $caller_controller->load->view('template/components/categories',$data ? $data: null);
    }
?>