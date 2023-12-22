        <footer class="pxp-main-footer mt-100">
            <div class="pxp-main-footer-top pt-100 pb-100" style="background-color: var(--pxpMainColorLight);">
                <div class="pxp-container">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 col-xxl-4 mb-4">
                            <div class="pxp-footer-logo">
                                <a href="./" class="pxp-animate">
                        <img src="images/logo.png">
                    </a>
                            </div>
                            <div class="pxp-footer-section mt-3 mt-md-4">
                                <p><?php echo $website_name; ?> is on a mission to connect the deserving candidates from India and Middle Eastern countries with the amazing job opportunities in Canada. Opt for LMN Recruitment and unlock your true potential.</p>
                                 <a class="btn rounded-pill pxp-nav-btn "  href="contact-us" role="button">Contact Us</a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-7 col-xxl-8">
                            <div class="row">
                                <div class="col-md-6 col-xl-4 col-xxl-3 mb-4">
                                    <div class="pxp-footer-section">
                                        <h3>Quick Links</h3>
                                        <ul class="pxp-footer-list">
                                            <li><a href="contact-us">Contact us</a></li>
                                            <li><a href="about-us">About us</a></li>
                                            <li><a href="all-jobs">Find Jobs</a></li>
                                            <li><a href="employer">Employer</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-xl-6 col-xxl-4 mb-4">
                                    <div class="pxp-footer-section">
                                        <h3>More Information</h3>
                                        <ul class="pxp-footer-list">
                                            <?php
                                            if(isset($_SESSION['rc_candidates'])){
                                                // Candidate is logged in
                                            ?>
                                                <li><a href="candidate/dashboard">Dashboard</a></li>
                                                <li><a href="candidate/candidate-profile">Profile</a></li>
                                                <li><a href="candidate/candidate-applications">My Applications</a></li>
                                            <?php
                                            } elseif (isset($_SESSION['admin'])) {
                                                // Admin is logged in
                                            ?>
                                                <li><a href="admin">Admin Dashboard</a></li>
                                                <li><a href="admin//manage-jobs">Manage Jobs</a></li>
                                                <!-- Add more admin-specific links as needed -->
                                            <?php
                                            } else {
                                                // No user is logged in
                                            ?>
                                                <li><a href="sign-in">Sign In</a></li>
                                                <li><a href="sign-up">Sign Up</a></li>
                                            <?php
                                            }
                                            ?>

                                            <li><a href="privacy-policy">Privacy Policy</a></li>
                                            <li><a href="cookies-policy">Cookies Policy</a></li>
                                            <li><a href="terms-condition">Terms & Condition</a></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-4 col-xxl-3 mb-4">
                                    <div class="pxp-footer-section">
                                        <h3>Contact Info</h3>
                                        <ul class="pxp-footer-list">
                                            <li>
                                                <a href="mailto:<?php echo $email; ?>">
                                                <?php echo $email; ?>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="tel:<?php echo $phone_number; ?>">
                                                <?php echo $phone_number; ?>
                                                </a>
                                            </li>

                                            <li>
                                                
                                                <?php echo $address; ?>
                                                
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pxp-footer-social mt-3 mt-lg-0">
                                        <ul class="list-unstyled">
                                            <li class="mx-0"><a target="_blank" href="<?php echo $facebook; ?>"><span class="fa fa-facebook"></span></a></li>
                                            <li><a target="_blank" href="<?php echo $twitter; ?>"><span class="fa fa-twitter"></span></a></li>
                                            <li><a target="_blank" href="<?php echo $instagram; ?>"><span class="fa fa-instagram"></span></a></li>
                                            <li><a target="_blank" href="<?php echo $linkedin; ?>"><span class="fa fa-linkedin"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pxp-main-footer-bottom pt-4 pb-4 text-light" style="background-color: var(--pxpMainColor);">
                <div class="pxp-container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-auto">
                            <div class="pxp-footer-copyright text-light">
                                © <?php echo date("Y"); ?> <?php echo $website_name; ?>. All Right Reserved.</div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

      <?php include 'includes/login_popup.php' ?>

        <div class="modal fade pxp-user-modal" id="pxp-signup-modal" aria-hidden="true" aria-labelledby="signupModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="pxp-user-modal-fig text-center">
                            <img src="images/signup-fig.png" alt="Sign up">
                        </div>
                        <h5 class="modal-title text-center mt-4" id="signupModal">Create an account</h5>
                        <form class="mt-4">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="pxp-signup-email" placeholder="Email address">
                                <label for="pxp-signup-email">Email address</label>
                                <span class="fa fa-envelope-o"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="pxp-signup-password" placeholder="Create password">
                                <label for="pxp-signup-password">Create password</label>
                                <span class="fa fa-lock"></span>
                            </div>
                            <a href="#" class="btn rounded-pill pxp-modal-cta">Continue</a>
                            <div class="mt-4 text-center pxp-modal-small">
                                Already have an account? <a role="button" class="" data-bs-target="#pxp-signin-modal" data-bs-toggle="modal">Sign in</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



