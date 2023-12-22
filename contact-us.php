<!doctype html>
<html lang="en" class="pxp-root">
    <head>
        <?php include 'includes/header-links.php'; ?>
        <title>Contact us | <?php echo $website_name; ?></title>
    </head>

<style type="text/css">
    body#contact-us .pxp-header {
    background-color: white;
}
.pxp-page-image-hero-caption {
    position: relative;
    left: 0;
    right: 0;
    z-index: 2;
    top: 53%;
}
</style>    
    <body id="contact-us">
        <!-- header file includes -->

        <?php include 'includes/header.php'; ?>

        <!-- header file includes -->


         <section class="pxp-page-image-hero pxp-cover" 
         style="background-image: url(images/contact-us.jpg);">
            <div class="pxp-hero-opacity"></div>
            <div class="pxp-page-image-hero-caption">
                <div class="pxp-container">
                    <div class="row justify-content-center">
                        <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                            <h1 class="text-center">Contact us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="mt-100 pxp-no-hero">
            <div class="pxp-container">
                <h2 class="pxp-section-h2 text-center">We'd love to hear from you</h2>
                <p class="pxp-text-light text-center">Get in touch with us</p>

                <div class="row mt-4 mt-md-5 justify-content-center pxp-animate-in pxp-animate-in-top">
                    <div class="col-lg-4 col-xxl-3 pxp-contact-card-1-container">
                        <a href="https://maps.app.goo.gl/9nVdvT4qYBAyEQsg9" class="pxp-contact-card-1" target="_blank">
                            <div class="pxp-contact-card-1-icon-container">
                                <div class="pxp-contact-card-1-icon">
                                    <span class="fa fa-globe"></span>
                                </div>
                            </div>
                            <div class="pxp-contact-card-1-title"><?php echo $address; ?></div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-xxl-3 pxp-contact-card-1-container">
                        <a href="tel:<?php echo $phone_number; ?>" class="pxp-contact-card-1">
                            <div class="pxp-contact-card-1-icon-container">
                                <div class="pxp-contact-card-1-icon">
                                    <span class="fa fa-phone"></span>
                                </div>
                            </div>
                            <div class="pxp-contact-card-1-title"><?php echo $phone_number; ?></div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-xxl-3 pxp-contact-card-1-container">
                        <a href="mailto:<?php echo $email; ?>" class="pxp-contact-card-1">
                            <div class="pxp-contact-card-1-icon-container">
                                <div class="pxp-contact-card-1-icon">
                                    <span class="fa fa-envelope-o"></span>
                                </div>
                            </div>
                            <div class="pxp-contact-card-1-title"><?php echo $email; ?></div>
                        </a>
                    </div>
                </div>

                <div class="row mt-100 justify-content-center pxp-animate-in pxp-animate-in-top" id="contact">
                    <div class="col-lg-8 col-xxl-8">
                        <div class="pxp-contact-us-form pxp-has-animation pxp-animate">
                            <h2 class="pxp-section-h2 text-center">Contact Us</h2>
                           
                            <form class="mt-4" action="contact-form" method="post">
                                <input type="text" id="ipAddress" name="ipAddress" readonly hidden>
                                <input type="text" id="country" name="country" readonly hidden>
                                <div class="mb-3">
                                    <label for="contact-us-name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="contact-us-name" placeholder="Enter your name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="contact-us-email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="contact-us-email" placeholder="Enter your email address" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="contact-us-message" class="form-label">Message</label>
                                    <textarea class="form-control" id="contact-us-message" placeholder="Type your message here..." name="message"></textarea>
                                </div>
                                <?php if (isset($_GET['successful'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                                      <strong><?=$_GET['successful']?></strong> 
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                             <?php } ?>
                                <button type="submit" name="submit" class="btn rounded-pill pxp-section-cta d-block">Send Message</button>


                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

          <script>
            window.addEventListener('load', function () {
              // Get user's location based on IP address using ipinfo.io API
              fetch('https://ipinfo.io?token=885c0059793c07')
                .then(response => response.json())
                .then(data => {
                  // Populate form fields with location information
                  document.getElementById('ipAddress').value = data.ip || 'N/A';
                  document.getElementById('country').value = data.country || 'N/A';
                })
                .catch(error => console.error('Error fetching location:', error));
            });
    </script>


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