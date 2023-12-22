        <section class="pxp-hero pxp-hero-boxed">
            <div class="pxp-container">
                <div class="pxp-hero-boxed-content" style="background-color: var(--pxpMainColorLight);">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-xl-6 col-xxl-5">
                            <h1>What Better Place then <br><span style="color: var(--pxpMainColor);">Canada </span>to Start Fresh!</h1>
                            <div class="pxp-hero-subtitle mt-3 mt-lg-4">Explore the enticing opportunities and start a new life in Canada. <strong>You can contact us if</strong> you didn’t find what you are looking for.</div>
                            <div class="mt-3">
                            <?php
                                                    
                                if(isset($_SESSION['rc_candidates'])){
                                    // Candidate is logged in
                                ?>
                                    <a class="btn rounded-pill pxp-nav-btn" href="all-jobs" role="button">Apply Now</a>
                                    <a class="btn rounded-pill pxp-nav-btn"  href="contact-us" role="button">Contact US</a>
                                <?php
                                } elseif (isset($_SESSION['admin'])) {
                                    // Admin is logged in
                                ?>
                                    <!-- Add admin-specific content or buttons if needed -->
                                     <a class="btn rounded-pill pxp-nav-btn" href="admin/manage-jobs" role="button">Manage Jobs</a>
                                <?php
                                } else {
                                    // No user is logged in
                                ?>
                                    <a class="btn rounded-pill pxp-nav-btn" data-bs-toggle="modal" href="#pxp-signin-modal" role="button">Register to Apply</a>
                                    <a class="btn rounded-pill pxp-nav-btn"  href="contact-us" role="button">Contact US</a>
                                <?php
                                }
                                ?>
                                </div>

                        </div>
                        <div class="d-none d-xl-block col-xl-4 col-xxl-5 position-relative">
                            <div class="pxp-hero-boxed-circulars pxp-animate-circles-bounce">
                                <div class="pxp-hero-boxed-circular-outer">
                                    <div class="pxp-hero-boxed-circular-outer-1"></div>
                                    <div class="pxp-hero-boxed-circular-outer-2"></div>
                                    <div class="pxp-hero-boxed-circular-outer-3"></div>
                                </div>
                                <div class="pxp-hero-boxed-circular-middle">
                                    <div class="pxp-hero-boxed-circular-middle-1"></div>
                                    <div class="pxp-hero-boxed-circular-middle-2"></div>
                                    <div class="pxp-hero-boxed-circular-middle-3"></div>
                                </div>
                                <div class="pxp-hero-boxed-circular-center"></div>
                            </div>

                            <div class="pxp-hero-boxed-icon-circles">
                                <div class="pxp-hero-boxed-icon-circle-1 pxp-animate-icon-circle-bounce">
                                    <img src="images/paper-icon.png" alt="Paper icon">
                                </div>
                                <div class="pxp-hero-boxed-icon-circle-2 pxp-animate-icon-circle-bounce">
                                    <img src="images/folder-icon.png" alt="Folder icon">
                                </div>
                            </div>

                            <div class="pxp-hero-boxed-info-cards">
                                <div class="pxp-hero-boxed-info-card-big pxp-animate-info-card">
                                    <div class="pxp-hero-boxed-info-card-big-content">
                                        <div class="pxp-hero-boxed-info-card-big-icon">
                                            <img src="images/service-2-icon.png" alt="Job Fit Scoring">
                                        </div>
                                        <div class="pxp-hero-boxed-info-card-big-title">Job Fit Scoring</div>
                                        <div class="pxp-hero-boxed-info-card-big-text pxp-text-light">Search your career opportunity through 12,800 jobs</div>
                                    </div>
                                </div>
                                <div class="pxp-hero-boxed-info-card-small pxp-animate-info-card">
                                    <div class="pxp-hero-boxed-info-card-small-content">
                                        <div class="pxp-hero-boxed-info-card-small-icon">
                                            <img src="images/service-1-icon.png" alt="Full-service recruiting">
                                        </div>
                                        <div class="pxp-hero-boxed-info-card-small-title">Full-service recruiting</div>
                                    </div>
                                </div>
                                <div class="pxp-hero-boxed-info-list-container pxp-animate-info-card">
                                    <div class="pxp-hero-boxed-info-list">
                                        <div class="pxp-hero-boxed-info-list-item">
                                            <div class="pxp-hero-boxed-info-list-item-number">286<span>job offers</span></div>
                                            <div class="pxp-hero-boxed-info-list-item-description">in Business Development</div>
                                        </div>
                                        <div class="pxp-hero-boxed-info-list-item">
                                            <div class="pxp-hero-boxed-info-list-item-number">154<span>job offers</span></div>
                                            <div class="pxp-hero-boxed-info-list-item-description">in Marketing & Communication</div>
                                        </div>
                                        <div class="pxp-hero-boxed-info-list-item">
                                            <div class="pxp-hero-boxed-info-list-item-number">319<span>job offers</span></div>
                                            <div class="pxp-hero-boxed-info-list-item-description">in Human Resources</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>