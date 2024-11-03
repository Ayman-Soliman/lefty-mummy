<?php
  // ob_start();
    include 'includes/header.php';
    include 'includes/navbar.php';
    // include 'config/dbcon.php';
    
?>

<section class="section-padding flex-center flex-col pt-5" id="contact-us">
    <div class="contact-us pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 flex-center">
                    <div id="map" class=" flex-center hide-mobile">
                      <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90186.37207676383!2d-80.13495239500924!3d25.9317678710111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9ad1877e4a82d%3A0xa891714787d1fb5e!2sPier%20Park!5e1!3m2!1sen!2sth!4v1637512439384!5m2!1sen!2sth" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe> -->
                        <img src="assets/images/thumbnails/thumb-007.jpeg" alt="Discover premium laser-cut digital designs at 'Lefty-Mummy store' for creating personalized wooden gift boxes. Perfect for lovers, friends, family and more! Download now and start crafting meaningful, handmade gifts with ease." style=" width:90%">
                        
                      <!-- You can simply copy and paste "Embed a map" code from Google Maps for any location. -->
                      
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Say Hello. Don't Be Shy!</h2>
                        <span>We're here to help and answer any questions you might have. We look forword to hearing from you!</span>
                    </div>
                    <form id="contact" action="contact-form-handler.php" method="post">
                        <div class="row">
                          <div class="col-lg-6">
                            <fieldset>
                              <input name="name" type="text" id="name" placeholder="Your name" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-6">
                            <fieldset>
                              <input name="email" type="text" id="email" placeholder="Your email" required="">
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="message" rows="6" id="message" placeholder="Your message" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <!-- <label class="block mb-5 bold c-main" for="">Active</label> -->
                            <div class="flex-center-mobile flex m-10 txt-c-mobile">
                                <label class="swich-checkbox">
                                    <input class="toggle-checkbox" name="status" type="checkbox">
                                    <div class="toggle-switch relative bg-grey"></div>
                                </label>
                                <p class="c-grey disc ml-10">I'm Not Robot</p>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" name="contact_form_btn" class="main-dark-button"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                          </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area Ends ***** -->

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Subscribe To Our Newsletter To Get Special Discounts</h2>
                        <!-- <span>Details to details is what makes Hexashop different from the other themes.</span> -->
                    </div>
                    <form id="subscribe" action="functions/subscribe.php" method="POST">
                        <div class="row">
                            <div class="col-lg-5">
                            <fieldset>
                                <input name="name" type="text" id="name" placeholder="Your Name" required>
                            </fieldset>
                            </div>
                            <div class="col-lg-5">
                            <fieldset>
                                <input name="email" type="email" id="email" placeholder="Your Email Address" required>
                            </fieldset>
                            </div>
                            <div class="col-lg-2">
                            <fieldset>
                                <button type="submit" id="subscribe_btn" class="main-dark-button" name="subscribe_btn"><i class="fa fa-paper-plane"></i></button>
                            </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-12">
                            <ul>
                                <li>Email:<br><span>contact@lefty-mummy.com</span></li>
                                <li>Social Media:<br><span><a href="https://www.facebook.com/leftyMummy">Facebook</a>,<a href="https://youtube.com/@leftymummycompilation5340?si=RD6crPSBc-hEqq0l">YouTube</a>
                                <!-- , <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li> -->
                                <!-- <li>Phone:<br><span>+02-10-020-0340</span></li> -->
                            </ul>
                        </div>
                        <!-- <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>contact@lefty-mummy.com</span></li>
                                <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->
</section>

<?php include 'includes/footer.php' ?>