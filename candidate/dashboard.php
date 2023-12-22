<?php  

require_once "session.php";
 include 'get-apply-job-count.php'; ?>
<!doctype html>
<html lang="en" class="pxp-root">
<head>
    <?php include '../includes/website-info.php'; ?>
    <?php include 'links.php'; ?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#dashboard").addClass("pxp-active");
});
</script>
        <title><?php echo $website_name; ?> - Candidate dashboard</title>
    </head>
    <body style="background-color: var(--pxpSecondaryColorLight);" id="dashboard">

            <?php include 'sidebar.php'; ?>

        <div class="pxp-dashboard-content">
            

            <div class="pxp-dashboard-content-details">

                <?php if (isset($_GET['status'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?=$_GET['status']?>
                        </div>
                         <?php } ?>
                <h1>Dashboard</h1>
                <p class="pxp-text-light">Welcome to <?php echo $website_name; ?>!</p>

                <div class="row mt-4 mt-lg-5 align-items-center">
                    <div class="col-sm-12 col-xxl-12 mt-2">
                        <div class="pxp-dashboard-stats-card bg-primary bg-opacity-10 mb-3 mb-xxl-0">
                            <div class="pxp-dashboard-stats-card-icon text-primary">
                                <span class="fa fa-file-text-o"></span>
                            </div>
                            <div class="pxp-dashboard-stats-card-info">
                                <div class="pxp-dashboard-stats-card-info-number"><?php echo "$row_count"; ?></div>
                                <div class="pxp-dashboard-stats-card-info-text pxp-text-light">Your Applications</div>
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

            <?php include 'footer.php' ?>
        </div>

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/nav.js"></script>
        <script src="../js/Chart.min.js"></script>
        <script src="../js/main.js"></script>
    </body>

<!-- Mirrored from pixelprime.co/themes/jobster/candidate-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 16:58:45 GMT -->
</html>