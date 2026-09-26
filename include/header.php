<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
    $host     = $_SERVER['HTTP_HOST'];
    $request  = $_SERVER['REQUEST_URI'];

    // $currentUrl = $protocol . "://" . $host . dirname($_SERVER['SCRIPT_NAME']);
    $currentUrl = $protocol . "://" . $host;
    ?>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
    <meta name="description" content="Ample Fitness is more than just a gym- it's a lifestyle transformation hub. Known for our commitment to holistic well-being and performance-focused training, Ample Fitness is fast emerging as one of the most trusted fitness centers in Chennai.">
    <meta name="keywords" content="Gym, fitness center, Ample Fitness is more than just a gym- it's a lifestyle transformation hub. Known for our commitment to holistic well-being and performance-focused training, Ample Fitness is fast emerging as one of the most trusted fitness centers in Chennai.">
    <meta name="author" content="Ample fitness">
    <!-- Page Title -->
    <title>Ample - Fitness and Unisex Gym</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $currentUrl . '/images/favicon.png' ?>">
    <!-- Google Fonts Css-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600;700&amp;family=Rubik:ital,wght@0,300..900;1,300..900&amp;display=swap" rel="stylesheet">
    <!-- Bootstrap Css -->
    <link href="<?php echo $currentUrl . '/css/bootstrap.min.css' ?>" rel="stylesheet" media="screen">
    <!-- SlickNav Css -->
    <link href="<?php echo $currentUrl . '/css/slicknav.min.css' ?>" rel="stylesheet">
    <!-- Swiper Css -->
    <link rel="stylesheet" href="<?php echo $currentUrl . '/css/swiper-bundle.min.css' ?>">
    <!-- Font Awesome Icon Css-->
    <link href="<?php echo $currentUrl . '/css/all.min.css' ?>" rel="stylesheet" media="screen">
    <!-- Animated Css -->
    <link href="<?php echo $currentUrl . '/css/animate.css' ?>" rel="stylesheet">
    <!-- Magnific Popup Core Css File -->
    <link rel="stylesheet" href="<?php echo $currentUrl . '/css/magnific-popup.css' ?>">
    <!-- Mouse Cursor Css File -->
    <link rel="stylesheet" href="<?php echo $currentUrl . '/css/mousecursor.css' ?>">
    <!-- Main Custom Css -->
    <link href="<?php echo $currentUrl . '/css/ample.css' ?>" rel="stylesheet" media="screen">
</head>

<body>


    <!-- Preloader Start -->
    <!-- <div class="preloader">
        <div class="loading-container">
            <div class="loading"></div>
            <div id="loading-icon"><img src="images/loader.svg" alt=""></div>
        </div>
    </div> -->
    <!-- Preloader End -->

    <!-- Header Start -->
    <header class="main-header">
        <div class="header-sticky">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <!-- Logo Start -->
                    <a class="navbar-brand" href="<?php echo $currentUrl ?>" style="width:15%">
                        <img src="<?php echo $currentUrl . '/images/logo.png' ?>" alt="Logo">
                    </a>
                    <!-- Logo End -->

                    <!-- Main Menu Start -->
                    <div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="<?php echo $currentUrl ?>">Home</a>

                                </li>

                                <li class="nav-item"><a class="nav-link <?php echo $request == '/about-us' ? 'amplefit-text-color' : '' ?> " href="<?php echo $currentUrl . '/about-us' ?>">About Us</a>
                                <li class="nav-item"><a class="nav-link <?php echo $request == '/services' ? 'amplefit-text-color' : '' ?> " href="<?php echo $currentUrl . '/services' ?>">Services</a></li>
                                <li class="nav-item"><a class="nav-link <?php echo $request == '/gallery' ? 'amplefit-text-color' : '' ?>" href="<?php echo $currentUrl . '/gallery' ?>">Gallery</a></li>
                                <li class="nav-item"><a class="nav-link <?php echo $request == '/FAQs' ? 'amplefit-text-color' : '' ?>" href="<?php echo $currentUrl . '/FAQs' ?>">FAQs</a></li>
                                <li class="nav-item"><a class="nav-link <?php echo $request == '/contact-us' ? 'amplefit-text-color' : '' ?>" href="<?php echo $currentUrl . '/contact-us' ?>">Contact Us</a></li>
                            </ul>
                        </div>

                        <!-- Header Btn Start -->
                        <div class="header-btn">
                            <a href="javascript:void(0);" id="getOffersBtn" class="btn-default btn-highlighted">Get Offers</a>
                            <!-- <a href="<?php echo $currentUrl . '/contact-us' ?>" class="btn-default">Get Started</a> -->
                        </div>
                        <!-- Header Btn End -->
                    </div>
                    <!-- Main Menu End -->
                    <div class="navbar-toggle"></div>
                </div>
            </nav>
            <div class="responsive-menu"></div>
        </div>
    </header>
    <!-- Header End -->