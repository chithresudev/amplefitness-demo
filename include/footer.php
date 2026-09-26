   <!-- Footer Main Start -->
   <footer class="footer-main light-section">
       <div class="container">
           <div class="row">
               <div class="col-lg-3">
                   <!-- About Footer start -->
                   <div class="about-footer">
                       <!-- Footer Logo Start -->
                       <div class="footer-logo">
                           <img src="<?php echo $currentUrl . '/images/logo.png' ?>" alt="">
                       </div>
                       <!-- Footer Logo End -->

                       <!-- Footer Contact Box Start -->
                       <div class="about-footer-content">
                           <p>Whether you’re ready to begin your transformation journey or just have a few questions, we’re here for you.</p>
                       </div>
                       <!-- Footer Contact Box End -->

                   </div>
                   <!-- About Footer End -->
               </div>

               <div class="col-lg-3 col-md-6">
                   <!-- Footer Links Start -->
                   <div class="footer-links">
                       <h3>contact us</h3>

                       <!-- Footer Contact Item Start -->
                       <div class="footer-contact-item">
                           <div class="icon-box">
                               <img src="<?php echo $currentUrl . '/images/icon-phone.svg' ?>" alt="">
                           </div>
                           <div class="footer-contact-content">
                               <p><a href="tel:+918807722713">+91 880 772 2713</a></p>
                           </div>
                       </div>
                       <!-- Footer Contact Item End -->

                       <!-- Footer Contact Item Start -->
                       <div class="footer-contact-item">
                           <div class="icon-box">
                               <img src="<?php echo $currentUrl . '/images/icon-mail.svg' ?>" alt="">
                           </div>
                           <div class="footer-contact-content">
                               <p><a href="mailto:info@domainname.com">contact@amplefitness.in</a></p>
                           </div>
                       </div>
                       <!-- Footer Contact Item End -->
                   </div>
                   <!-- Footer Links End -->
               </div>

               <div class="col-lg-3 col-md-6">
                   <!-- Footer Links start -->
                   <div class="footer-links">
                       <h3>our gym timing</h3>
                       <ul>
                           <li>Mon - Sat : 05:00 AM - 11:00 PM</li>
                           <li>Sun : 07:00 AM - 07:00 PM</li>
                       </ul>
                   </div>
                   <!-- Footer Links end -->
               </div>

               <div class="col-lg-3 col-md-12">
                   <!-- Footer Links start -->
                   <div class="footer-links">
                       <h3>our location</h3>
                       <ul>
                           <li>3rd floor, suprageet complex, No:304, TT Krishnamachari Rd, Parthasarathypuram, Alwarpet, Chennai, Tamil Nadu 600018</li>
                       </ul>
                   </div>
                   <!-- Footer Links end -->
               </div>

               <div class="col-lg-12">
                   <!-- Footer Copyright Section Start -->
                   <div class="footer-copyright">
                       <!-- Footer Copyright Start -->
                       <div class="footer-copyright-text">
                           <p>Copyright © <?php echo date('Y') ?> All Rights Reserved. Designed By <a href="https://cyrison.com">Cyrison</a></p>
                       </div>
                       <!-- Footer Copyright End -->

                       <!-- Footer Social Link Start -->
                       <div class="footer-social-links">
                           <ul>
                               <li><a href="https://www.instagram.com/amplefitness_alwarpet/?hl=en"><i class="fa-brands fa-instagram"></i></a></li>
                               <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fa-brands fa-dribbble"></i></a></li>
                           </ul>
                       </div>
                       <!-- Footer Social Link End -->
                   </div>
                   <!-- Footer Copyright Section End -->
               </div>
           </div>
       </div>
   </footer>
   <!-- Footer Main End -->

   <!-- Voucher Popup Start -->
   <?php
   require_once __DIR__ . '/../admin/includes/data-store.php';
   $voucherDiscountPercent = (int) get_settings()['discount_percent'];
   ?>
   <div class="voucher-popup-overlay" id="voucherPopupOverlay" data-endpoint="<?php echo $currentUrl . '/include/voucher-lead.php' ?>">
       <div class="voucher-popup">
           <button type="button" class="voucher-popup-close" id="voucherPopupClose" aria-label="Close">&times;</button>

           <div class="voucher-popup-left">
               <img src="<?php echo $currentUrl . '/images/logo.png' ?>" alt="Ample Fitness" class="voucher-popup-logo">
               <div class="voucher-popup-offer">
                   <span class="voucher-popup-offer-value"><?php echo $voucherDiscountPercent ?>%</span>
                   <span class="voucher-popup-offer-label">Off</span>
               </div>
               <h3>Unlock Your <span>Discount Voucher</span></h3>
               <p>Share your name and mobile number, our team will call you with an exclusive membership discount code.</p>
           </div>

           <div class="voucher-popup-right">
               <form id="voucherForm" data-toggle="validator">
                   <div class="form-group mb-3">
                       <input type="text" name="voucher_name" id="voucher_name" class="form-control" placeholder="Enter your name" required>
                       <div class="help-block with-errors"></div>
                   </div>

                   <div class="form-group mb-4">
                       <input type="tel" name="voucher_phone" id="voucher_phone" class="form-control" placeholder="Enter your mobile number" pattern="[6-9][0-9]{9}" maxlength="10" title="Enter a valid 10-digit mobile number" required>
                       <div class="help-block with-errors"></div>
                   </div>

                   <button type="submit" class="btn-default">Claim My Voucher</button>
                   <div id="voucherMsgSubmit" class="voucher-msg"></div>
               </form>

               <a href="javascript:void(0);" class="voucher-popup-skip" id="voucherPopupSkip">No, thanks</a>
               <p class="voucher-popup-disclaimer">*Valid for new members only. Our team will contact you shortly with your code.</p>
           </div>
       </div>
   </div>
   <!-- Voucher Popup End -->

   <script src="<?php echo $currentUrl . '/js/jquery-3.7.1.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/bootstrap.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/validator.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/jquery.slicknav.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/swiper-bundle.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/jquery.waypoints.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/jquery.counterup.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/jquery.magnific-popup.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/SmoothScroll.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/parallaxie.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/gsap.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/magiccursor.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/SplitText.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/ScrollTrigger.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/jquery.mb.YTPlayer.min.js' ?>"></script>
   <script src="<?php echo $currentUrl . '/js/wow.min.js' ?>"></script>
   <!-- Main Custom js file -->
   <script src="<?php echo $currentUrl . '/js/function.js' ?>"></script>
   <!-- Voucher Popup js file -->
   <script src="<?php echo $currentUrl . '/js/voucher-popup.js' ?>"></script>
   </body>

   </html>