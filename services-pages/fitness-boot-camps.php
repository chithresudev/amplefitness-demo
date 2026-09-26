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
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Fitness Boot <span>Camps</span></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $currentUrl ?>">home</a></li>
                            <li class="breadcrumb-item"><a href="<?php echo $currentUrl . '/services' ?>">services</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Fitness Boot Camps</li>
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
                            <img src="<?php echo $currentUrl . '/images/service-3.jpg' ?>" alt="">
                        </figure>
                    </div>
                    <!-- Service Featured Image End -->

                    <!-- Service Entry Start -->
                    <div class="service-entry">
                        <p class="wow fadeInUp">
                            Our boot camps are intense, exciting, and full of variety. These group-based sessions combine cardio, strength training, interval work, and bodyweight exercises, keeping your body guessing and your motivation sky-high. Ideal for fat-burning and increasing metabolic rate, they also create a sense of accountability and community.

                        </p>
                        <p class="wow fadeInUp" data-wow-delay="0.2s">
                            High-energy, group-based sessions that combine cardio, strength, and bodyweight exercises for a full-body blast. Fun, fast-paced, and highly effective for fat burn.
                        </p>
                        <ul class="wow fadeInUp" data-wow-delay="0.4s">
                            <h4>What You Get:</h4>
                            <li>Group motivation & camaraderie</li>
                            <li>Calorie-torching interval routines</li>
                            <li>Fat-burning and endurance building</li>
                            <li>Trainers guiding every rep.</li>
                            <li>
                                <h5>Ideal For: Weight loss, improved stamina, and people who love group dynamics.</h5>
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