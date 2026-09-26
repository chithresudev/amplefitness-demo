<?php
include('include/header.php');
?>
<!-- Page Header Start -->
<div class="page-header parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Frequently <span>asked question</span></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">FAQs</li>
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
include('include/scroll-ticker.php')
?>

<!-- Page Faqs Start -->
<div class="page-faqs">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <!-- Page Single Sidebar Start -->
                <div class="page-single-sidebar">
                    <!-- Page Category List Start -->
                    <?php include('services-pages/service-list.php'); ?>

                    <!-- Page Category List End -->

                    <!-- Sidebar Cta Box Start -->
                    <div class="sidebar-cta-box wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Icon Box Start -->
                        <div class="sidebar-cta-logo">
                            <img src="images/sidebar-cta-logo.svg" alt="">
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
                            <a href="contact.html" class="btn-default">get a quote</a>
                        </div>
                        <!-- CTA Contact Button End -->
                    </div>
                    <!-- Sidebar Cta Box End -->
                </div>
                <!-- Page Single Sidebar End -->
            </div>

            <div class="col-lg-8">
                <!-- Page FAQs Catagery Start -->
                <div class="page-faqs-catagery">
                    <!-- FAQs section start -->
                    <div class="page-single-faqs page-faq-accordion" id="faq_1">
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">General Fitness <span>Questions</span></h2>
                        </div>
                        <!-- FAQ Accordion Start -->
                        <div class="faq-accordion" id="accordion">
                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp">
                                <h2 class="accordion-header" id="heading1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                        What are your membership plans?
                                    </button>
                                </h2>
                                <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            We offer flexible membership options — monthly, quarterly, half-yearly, and annual plans. You can also choose between personal training, group fitness, or full-access packages. Visit our front desk or contact us for a plan that suits your goals.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.2s">
                                <h2 class="accordion-header" id="heading2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                                        Do you offer a free trial or demo session?
                                    </button>
                                </h2>
                                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Yes! We offer a one-time free trial session so you can experience the Ample fitness vibe, interact with our trainers, and explore the facility before making a decision.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.4s">
                                <h2 class="accordion-header" id="heading3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                                        What are your operating hours?
                                    </button>
                                </h2>
                                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>We’re open from 5:00 AM to 10:00 PM, Monday to Saturday. Sunday hours may vary based on group classes or personal training schedules.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.6s">
                                <h2 class="accordion-header" id="heading4">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                                        Is there a personal trainer available?
                                    </button>
                                </h2>
                                <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="heading4" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Absolutely! Our certified personal trainers are available to guide you with customized fitness plans, correct form, and goal-specific coaching. You can opt for personal training as part of your membership.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading5">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                                        What kind of workouts do you offer?
                                    </button>
                                </h2>
                                <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="heading5" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>Ample fitness offers a wide range of programs including functional training, strength & conditioning, weight loss workouts, muscle building, cardio sessions, boot camps, and group classes.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading6">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
                                        Do you provide diet or nutrition plans?
                                    </button>
                                </h2>
                                <div id="collapse6" class="accordion-collapse collapse" aria-labelledby="heading6" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Yes. Our in-house nutrition experts will assess your body type and goals to create customized diet plans. Nutrition coaching is available as an add-on or with select memberships.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading7">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse7" aria-expanded="false" aria-controls="collapse7">
                                        Can beginners join your programs?
                                    </button>
                                </h2>
                                <div id="collapse7" class="accordion-collapse collapse" aria-labelledby="heading7" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Definitely! We cater to all fitness levels — from beginners to advanced. Our trainers ensure that workouts are scaled and safe, helping you progress at your own pace.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->
                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading8">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                                        Do you have separate workout zones for men and women?
                                    </button>
                                </h2>
                                <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            While we offer a shared training space, we also respect individual preferences. Ladies-only group classes and female trainers are available upon request.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->
                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading9">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                                        What should I bring to the gym?
                                    </button>
                                </h2>
                                <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Just carry a water bottle, towel, comfortable workout wear, and clean shoes. We provide sanitization stations, locker facilities, and all workout equipment.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading10">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                                        How do I book a session or class?
                                    </button>
                                </h2>
                                <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            You can book sessions through our front desk, mobile app (if available), or by contacting us via email or phone. Advance booking is recommended for group classes and personal training.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading11">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                                        Can I cancel or freeze my membership?
                                    </button>
                                </h2>
                                <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Yes, we offer flexible options. You can freeze your membership due to travel, medical reasons, or emergencies. Cancellation policies vary by plan — please contact our support team for specific terms.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading12">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                                        Are locker facilities available?
                                    </button>
                                </h2>
                                <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Yes, we offer secure locker facilities for all members to store their belongings during workouts. Please bring your own lock or request one at the front desk.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->

                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading13">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                                        Is parking available?
                                    </button>
                                </h2>
                                <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            Yes, we provide convenient and secure parking space for both two-wheelers and four-wheelers near the gym entrance.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->
                            <!-- FAQ Item Start -->
                            <div class="accordion-item wow fadeInUp" data-wow-delay="0.8s">
                                <h2 class="accordion-header" id="heading14">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                                        What COVID-19 safety measures are in place?
                                    </button>
                                </h2>
                                <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14" data-bs-parent="#accordion">
                                    <div class="accordion-body">
                                        <p>
                                            We follow strict hygiene protocols, including regular sanitization of equipment, temperature checks, limited class sizes, and contactless check-ins. Your safety is our top priority.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- FAQ Item End -->
                        </div>
                        <!-- FAQ Accordion End -->
                    </div>
                    <!-- FAQs section End -->
                </div>
                <!-- FAQ Accordion End -->
            </div>
            <!-- FAQs section End -->
        </div>
    </div>
</div>
</div>
</div>
<!-- Page Faqs End -->


<?php
include('include/scroll-ticker.php');
include('include/footer.php');
?>