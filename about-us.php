<!doctype html>
<html lang="en" class="pxp-root">
<head>
    <?php include 'includes/header-links.php'; ?>
    <title>About us | | <?php echo $website_name; ?></title>
</head>

<style type="text/css">
    body#about-us .pxp-header {
    background-color: white;
}
.pxp-page-image-hero-caption {
    position: relative;
    left: 0;
    right: 0;
    z-index: 2;
    top: 53%;
}
.pxp-section-cta, .pxp-section-cta-o {
    font-size: 16px;
    font-weight: 500;
    padding: 4px 20px;
}
</style>
    <body id="about-us">
         <!-- header file includes -->

        <?php include 'includes/header.php'; ?>

        <!-- header file includes -->


        <section class="pxp-page-image-hero pxp-cover" 
        style="background-image: url(images/about-us.jpg);">
            <div class="pxp-hero-opacity"></div>
            <div class="pxp-page-image-hero-caption">
                <div class="pxp-container">
                    <div class="row justify-content-center">
                        <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                            <h1 class="text-center">About us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-100">
            <div class="pxp-container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-xxl-6">
                        <h2 class="pxp-section-h2 text-center">About Us</h2>
                        <p class="pxp-text-light text-center">Wondering, Why You Should Trust Us?</p>
    
                        <div class="mt-4 mt-md-5 text-center">
                            <p>We help people find jobs and connect employers with the right candidates. Based in Canada, we're proud to be part of this diverse and lively country. More than a job company, we're like a friend guiding you toward a brighter future.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-100">
            <div class="pxp-container">
                <h2 class="pxp-section-h2 text-center">We want to know more about you</h2>
                <p class="pxp-text-light text-center">Select your profile</p>

                <div class="row justify-content-evenly mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top">
                    <div class="col-lg-4 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center pxp-animate-icon">
                            <div class="pxp-services-1-item-icon">
                                <img src="images/service-1-icon.png" alt="Candidate">
                            </div>
                            <div class="pxp-services-1-item-title">I am a candidate</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Find your Dream Job</div>

                            <div class="pxp-services-1-item-cta">
                                <a href="all-jobs" class="btn rounded-pill pxp-section-cta text-light">Find Job<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center pxp-animate-icon">
                            <div class="pxp-services-1-item-icon">
                                <img src="images/service-2-icon.png" alt="Employer">
                            </div>
                            <div class="pxp-services-1-item-title">I am an employer</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Connect with the Right Candidates</div>
                            <div class="pxp-services-1-item-cta">
                                <a href="employer" class="btn rounded-pill pxp-section-cta text-light">Apply Now<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 pxp-services-1-item-container">
                        <div class="pxp-services-1-item text-center pxp-animate-icon">
                            <div class="pxp-services-1-item-icon">
                                <img src="images/service-3-icon.png" alt="Press">
                            </div>
                            <div class="pxp-services-1-item-title">Contact US</div>
                            <div class="pxp-services-1-item-text pxp-text-light">Want to discuss something else?</div>
                            <div class="pxp-services-1-item-cta">
                                <a href="contact-us" class="btn rounded-pill pxp-section-cta text-light">Contact Us<span class="fa fa-angle-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- banner file include -->

        <?php include 'includes/why-choose-us.php'; ?>

        <!-- banner file include -->




        <!-- banner file include -->

        <?php include 'includes/testimonials.php'; ?>

        <!-- banner file include -->


        <!-- banner file include -->

        <?php include 'includes/news_letter.php'; ?>

        <!-- banner file include -->

        <!-- footer file includes -->

        <?php include 'includes/footer.php' ?>

        <!-- footer file includes -->

        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>