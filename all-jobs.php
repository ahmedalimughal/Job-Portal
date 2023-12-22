<!doctype html>
<html lang="en" class="pxp-root">
<?php include 'includes/total-jobs.php'; ?>
<head>
        <?php include 'includes/header-links.php'; ?>

        <title>All Jobs| <?php echo $website_name; ?></title>
    </head>
    <body id="all-jobs">
        <style type="text/css">
    body#all-jobs .pxp-header {
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
        <!-- header file includes -->

        <?php include 'includes/header.php'; ?>

        <!-- header file includes -->
<?php

// Define the number of records per page
$records_per_page = 12;

// Get the current page number from the URL
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting record for the current page
$start = ($current_page - 1) * $records_per_page;

// Fetch data from the database
$sql = "SELECT *
        FROM `data`
        LIMIT $start, $records_per_page";
$result = $conn->query($sql);

// Fetch data from the database for pagination links
$sql_total = "SELECT COUNT(*) as total FROM `data`";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_recorde = $row_total['total'];
$total_pages = ceil($total_recorde / $records_per_page);

?>


                 <section class="pxp-page-image-hero pxp-cover" 
                 style="background-image: url(images/find-jobs.jpeg);">
                    <div class="pxp-hero-opacity"></div>
                    <div class="pxp-page-image-hero-caption">
                        <div class="pxp-container">
                            <div class="row justify-content-center">
                                <div class="col-9 col-md-8 col-xl-7 col-xxl-6">
                                    <h1 class="text-center">Find Jobs</h1>
                                    <div class="pxp-hero-subtitle text-light text-center">Search your career opportunity through <strong><?php echo "$row_count"; ?></strong> jobs</div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

        <section class="mt-4 mt-lg-2 pt-2 pb-100" style="background-color: var(--pxpSecondaryColorLight);">
            <div class="pxp-container">
                <?php if (isset($_GET['sucessfull'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?=$_GET['sucessfull']?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                         <?php } ?>
                <div class="row">

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

               <div class="row mt-4 mt-lg-5 justify-content-between align-items-center">
                    <div class="col-auto">
                        <nav class="mt-3 mt-sm-0" aria-label="Jobs list pagination">
                            <ul class="pagination pxp-pagination">
                            <?php if ($current_page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $current_page - 1 ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo; Previous</span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php
                            $start = max(1, $current_page - 4);
                            $end = min($total_pages, $start + 9);

                            for ($i = $start; $i <= $end; $i++):
                            ?>
                                <?php if ($i == $current_page): ?>
                                    <li class="page-item active">
                                        <span class="page-link"><?= $i ?><span class="sr-only">(current)</span></span>
                                    </li>
                                <?php else: ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endfor; ?>

                            <?php if ($current_page < $total_pages && $total_recorde > $records_per_page): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?= $current_page + 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">Next &raquo;</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            </ul>
                        </nav>
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