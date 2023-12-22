

<?php 

$projects = array();
$result = mysqli_query($conn,"SELECT * FROM `data` lIMIT 9");

?>


        <section class="mt-100">
            <div class="pxp-container">
                <h2 class="pxp-section-h2">Featured Job Offers </h2>
                <p class="pxp-text-light">Latest Job Posts You Can’t Afford to Miss Out</p>

                <div class="row mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top">
                    <?php
                        $i=0;
                        while($row = mysqli_fetch_array($result))
                       {                       
                         ?>
                    <div class="col-md-8 col-xl-6 col-xxl-4 pxp-jobs-card-1-container">
                        <div class="pxp-jobs-card-1 pxp-has-border">
                            <div class="pxp-jobs-card-1-top">
                                <span class="pxp-jobs-card-1-category">
                                    <div class="pxp-jobs-card-1-category-label"><?php echo $row['category']; ?></div>
                                </span>
                                <span  class="pxp-jobs-card-1-title"><?php echo $row['title']; ?></span>
                                <div class="pxp-jobs-card-1-details">
                                    <span class="pxp-jobs-card-1-location">
                                        <span class="fa fa-globe"></span><?php echo $row['location']; ?>
                                    </span>
                                    <div class="pxp-jobs-card-1-type">Full-time</div>
                                </div>
                                <p class="mt-3">
                                    <?php echo $row['description']; ?>
                                </p>
                                <div class="pxp-jobs-card-1-details">
                                    <span class="pxp-jobs-card-1-location">
                                        <span class="fa fa-money"></span><?php echo $row['salary']; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="pxp-jobs-card-1-bottom">
                                <div class="pxp-jobs-card-1-bottom-left">
                                    <div class="pxp-jobs-card-1-date pxp-text-light">Job Post on: <?php echo $row['date'] ?></div>
                                </div>

                                <?php
                                if(isset($_SESSION['rc_candidates'])){
                                    // Candidate is logged in
                                ?>
                                    <a class="btn rounded-pill pxp-nav-btn" href="Apply-for-job?id=<?php echo $row['id']; ?>" role="button">Apply Now</a>
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
                                <?php
                                }
                                ?>
                                
                            </div>
                        </div>
                    </div>  
                    <?php
                            $i++;
                              }
                            ?>
                </div>


                <div class="mt-4 mt-md-5 pxp-animate-in pxp-animate-in-top">
                    <a href="all-jobs" class="btn rounded-pill pxp-section-cta">All Job Offers<span class="fa fa-angle-right"></span></a>
                </div>
            </div>
        </section>