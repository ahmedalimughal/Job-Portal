<div class="pxp-preloader"><span>Loading...</span></div>
        <header class="pxp-header fixed-top pxp-bigger">
            <div class="pxp-container">
                <div class="pxp-header-container">
                    <div class="pxp-logo">
                        <a href="./" class="pxp-animate">
                        <img src="images/logo.png">
                    </a>
                    </div>
                    <div class="pxp-nav-trigger navbar d-xl-none flex-fill">
                        <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
                            <div class="pxp-line-1"></div>
                            <div class="pxp-line-2"></div>
                            <div class="pxp-line-3"></div>
                        </a>
                        <div class="offcanvas offcanvas-start pxp-nav-mobile-container" tab./="-1" id="pxpMobileNav">
                            <div class="offcanvas-header">
                                <div class="pxp-logo">
                                   <a href="./" class="pxp-animate">
                                        <img src="images/logo.png">
                                    </a>
                                </div>
                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <nav class="pxp-nav-mobile">
                                    <ul class="navbar-nav justify-content-end flex-grow-1">
                                        <li class="nav-item ">
                                            <a role="button" class="nav-link" href="./">Home</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a role="button" class="nav-link" href="all-jobs">Find Jobs</a>
                                        </li>
                                        
                                        <li class="nav-item ">
                                            <a role="button" class="nav-link" href="employer">Employer</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a role="button"class="nav-link" href="about-us">About Us</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a role="button"class="nav-link" href="contact-us">Contact Us</a>
                                        </li>
                                        
                                        
                                        <li class="nav-item dropdown">
                                            <a href="candidate-dashboard" role="button" class="nav-link">Candidate Dashboard</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="pxp-header-right">
                        <nav class="pxp-nav dropdown-hover-all d-none d-xl-block">
                            <ul>
                                <li class="dropdown">
                                    <a role="button" class="nav-link" href="./">Home</a>
                                </li>
                                <li class="dropdown">
                                     <a role="button" class="nav-link" href="all-jobs">Find Jobs</a>
                                </li>
                                
                                <li class="dropdown">
                                    <a role="button" class="nav-link" href="employer">Employer</a>
                                </li>
                                <li class="dropdown">
                                    <a role="button"class="nav-link" href="about-us">About Us</a>
                                </li>
                                <li class="dropdown">
                                    <a role="button"class="nav-link" href="contact-us">Contact Us</a>
                                </li>
                                
                                
                            </ul>
                        </nav>
                        <nav class="pxp-user-nav pxp-on-light d-none d-sm-flex">
                            

                            <?php
                            if(isset($_SESSION['rc_candidates'])){
                                // Candidate is logged in
                            ?>
                                <a class="btn rounded-pill pxp-nav-btn mx-2" href="candidate/dashboard" role="button">Candidate Dashboard</a> 
                                <a href="candidate/logout" class="btn rounded-pill pxp-nav-btn mx-2">Logout <span class="fa fa-sign-out"></span></a>
                            <?php
                            } elseif (isset($_SESSION['admin'])) {
                                // Admin is logged in
                            ?>
                                <a class="btn rounded-pill pxp-nav-btn mx-2" href="admin" role="button">Admin Dashboard</a>
                                <a href="admin/logout" class="btn rounded-pill pxp-nav-btn mx-2">Logout <span class="fa fa-sign-out"></span></a>
                            <?php
                            } else {
                                // No user is logged in
                            ?>
                                <a class="btn rounded-pill pxp-user-nav-trigger" data-bs-toggle="modal" href="#pxp-signin-modal" role="button">Login</a>
                                <a class="btn rounded-pill pxp-nav-btn mx-2" href="sign-up" role="button">Sign up</a>
                            <?php
                            }
                            ?>

                        </nav>
                    </div>
                </div>
            </div>
        </header>