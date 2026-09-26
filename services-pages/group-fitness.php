<?php

include('../include/header.php');
?>

<!-- Page Header Start -->
<div class="page-header parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Group <span>Fitness</span></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $currentUrl ?>">home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo $currentUrl . '/services' ?>">services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Group Fitness</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<?php
include('../include/scroll-ticker.php');
?>

<!-- Page Service Single Start -->
<div class="page-service-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <!-- Page Single Sidebar Start -->
                <div class="page-single-sidebar">
                    <?php include('service-list.php'); ?>

                    <!-- Sidebar Cta Box Start -->
                    <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Icon Box Start -->
                        <div class="sidebar-cta-logo">
                            <img src="<?php echo $currentUrl . '/images/sidebar-cta-logo.svg' ?>" alt="">
                        </div>
                        <!-- Icon Box End -->

                        <!-- CTA Contact Content Start -->
                        <div class="cta-contact-content">
                            <p>Small Steps, Big Transformations</p>
                            <h3>Empowering every individual through fitness</h3>
                        </div>
                        <!-- CTA Contact Content End -->

                        <!-- CTA Contact Button Start -->
                        <div class="cta-contact-btn">
                            <a href="<?php echo $currentUrl . '/contact-us' ?>" class="btn-default">get a quote</a>
                        </div>
                        <!-- CTA Contact Button End -->
                    </div>
                    <!-- Sidebar Cta Box End -->
                </div>
                <!-- Page Single Sidebar End -->
            </div>

            <div class="col-lg-8">
                <!-- Service Single Content Start -->
                <div class="service-details-content">
                    <!-- Service Featured Image Start -->
                    <div class="service-featured-image">
                        <figure class="image-anime reveal">
                            <img src="<?php echo $currentUrl . '/images/post-5.jpg' ?>" alt="">
                        </figure>
                    </div>
                    <!-- Service Featured Image End -->

                    <!-- Service Entry Start -->
                    <div class="service-entry">
                        <p class="wow fadeInUp">
                            Group classes offer the perfect mix of motivation and energy. Choose from a variety of formats — including circuit training, HIIT, bodyweight conditioning, and more. These sessions are fun, social, and designed to help you push beyond your limits with the power of community support.
                        </p>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            Train with the energy of a community. Our group classes are full of variety — from HIIT and circuits to mobility and core workouts — all led by expert coaches. </p>
                        <ul class="wow fadeInUp" data-wow-delay="0.4s">
                            <h4>What You Get:</h4>
                            <li>Dynamic class formats</li>
                            <li>Motivation from peers & trainers</li>
                            <li>Music-driven, high-energy environment</li>
                            <li>Full-body workout with fun</li>
                            <li>
                                <h5>Ideal For: All fitness levels — especially those who love group energy and structure.</h5>
                            </li>

                        </ul>

                    </div>
                    <!-- Service Entry End -->
                </div>
                <!-- Service Single Content End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Service Single End -->

<?php
include('../include/scroll-ticker.php');
include('../include/footer.php');
?>