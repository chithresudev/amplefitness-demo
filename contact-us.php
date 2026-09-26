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
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Contact <span>us</span></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">contact us</li>
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
include('include/scroll-ticker.php');
?>


<!-- Page Contact Us Start -->
<div class="page-contact-us">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <!-- Contact Us Content Start -->
                <div class="contact-us-content">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <div class="section-bg-title wow fadeInUp">
                            <span>contact us</span>
                        </div>
                        <h3 class="wow fadeInUp" data-wow-delay="0.2s">contact us</h3>
                        <h2 class="text-anime-style-2" data-cursor="-opaque">Reach out and connect with our <span>dedicated team today</span></h2>
                    </div>
                    <!-- Section Title End -->

                    <!-- Contact Form Start -->
                    <div class="contact-form">
                        <form id="contactForm" action="#" method="POST" data-toggle="validator" class="wow fadeInUp" data-wow-delay="0.4s">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="fname" class="form-control" id="fname" placeholder="First name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="lname" class="form-control" id="lname" placeholder="Last name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone No." required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-5">
                                    <textarea name="message" class="form-control" id="message" rows="4" placeholder="Message"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-default" id="contactSubmitBtn">
                                        <span class="btn-text">send request</span>
                                        <span class="btn-spinner" aria-hidden="true"></span>
                                    </button>
                                    <div id="msgSubmit" class="form-msg"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->
                </div>
                <!-- Contact Us Content End -->
            </div>

            <div class="col-lg-6">
                <!-- Contact Us Image Start -->
                <div class="contact-us-image">
                    <div class="contact-us-img">
                        <figure class="image-anime">
                            <img src="images/contact-us-image.jpg" alt="">
                        </figure>
                    </div>

                    <!-- Contact Image Content Start -->
                    <div class="contact-image-content">
                        <!-- Section Title Start -->
                        <div class="section-title">
                            <h2 class="text-anime-style-2" data-cursor="-opaque">Have you any query fell please free contact</h2>
                        </div>
                        <!-- Section Title End -->

                        <ul class="wow fadeInUp">
                            <li><img src="images/icon-phone-white.svg" alt=""><a href="tel:+918807722713">+91 880 772 2713</a></li>
                        </ul>
                    </div>
                    <!-- Contact Image Content End -->
                </div>
                <!-- Contact Us Image End -->
            </div>

            <div class="col-lg-12">
                <!-- Contact Info Box Start -->
                <div class="contact-info-box">
                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="images/icon-phone.svg" alt="">
                        </div>
                        <div class="contact-info-content">
                            <h3>Contact Us</h3>
                            <p><a href="tel:+918807722713">+91 880 772 2713</a></p>
                        </div>
                    </div>
                    <!-- Contact Info Item End -->

                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.2s">
                        <div class="icon-box">
                            <img src="images/icon-mail.svg" alt="">
                        </div>
                        <div class="contact-info-content">
                            <h3>Email Us</h3>
                            <p><a href="mailto:contact@amplefitness.in">contact@amplefitness.in</a></p>
                        </div>
                    </div>
                    <!-- Contact Info Item End -->

                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.4s">
                        <div class="icon-box">
                            <img src="images/icon-clock.svg" alt="">
                        </div>
                        <div class="contact-info-content">
                            <h3>Working Hours</h3>
                            <p>Mon - Sat : 05:00 AM - 11:00 PM</p>
                            <p>Sun : 07:00 AM - 07:00 PM</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End -->

                    <!-- Contact Info Item Start -->
                    <div class="contact-info-item wow fadeInUp" data-wow-delay="0.6s">
                        <div class="icon-box">
                            <img src="images/icon-location.svg" alt="">
                        </div>
                        <div class="contact-info-content">
                            <h3>location</h3>
                            <p>3rd floor, suprageet complex, No:304, TT Krishnamachari Rd, Parthasarathypuram, Alwarpet, Chennai, Tamil Nadu 600018</p>
                        </div>
                    </div>
                    <!-- Contact Info Item End -->
                </div>
                <!-- Contact Info Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Contact Us End -->

<!-- Google Map Section Start -->
<div class="google-map">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Google Map IFrame Start -->
                <div class="google-map-iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2546.6570441548047!2d80.2576846995957!3d13.044663222847541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5267f91fac7f03%3A0xb1dddd79df157587!2sAmple%20Fitness!5e0!3m2!1sen!2sin!4v1750497285336!5m2!1sen!2sin" width="600" height="300" style="border:0;" allowfullscreen="" loading="lazy" width="100" height="450" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <!-- Google Map IFrame End -->
            </div>
        </div>
    </div>
</div>
<!-- Google Map Section End -->
<?php
include('include/footer.php');
?>