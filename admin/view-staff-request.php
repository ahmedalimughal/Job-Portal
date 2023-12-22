<?php include 'total-apply-jobs.php'; ?>


<!doctype html>
<html lang="en" class="pxp-root">

<head>
    <?php include 'header-links.php'; ?>
        <title><?php echo $website_name; ?> - View Request</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#staff").addClass("pxp-active");
});
</script>
<style type="text/css">
    .pxp-single-company-hero {
    background-color: var(--pxpMainColorLight);
    height: 270px;
    position: relative;
}
</style>
<?php 

    $id = $_GET['id'];

    // Retrieve image names
    $sql = "SELECT * FROM `staff_request` WHERE id = $id;";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc(); 
    }

    ?>
    <body style="background-color: var(--pxpMainColorLight);">




            <?php include 'sidebar.php'; ?>
        <div class="pxp-dashboard-content">


            <div class="pxp-dashboard-content-details">
                <h1>View Request</h1>
                <p class="pxp-text-light">Welcome to <?php echo $website_name; ?>!</p>
                <div class="mt-1 mt-lg-1">
            <div class="pxp-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="pxp-single-company-hero pxp-cover pxp-boxed" style="background-image: url(../images/company-hero-2.jpg);">
                                <div class="pxp-hero-opacity"></div>
                                <div class="pxp-single-company-hero-caption">
                                    <div class="pxp-single-company-hero-content d-block text-center">
                                        <div class="pxp-single-company-hero-logo d-inline-block" style="background-image: url(images/company-logo-3.png);"></div>
                                        <div class="pxp-single-company-hero-title ms-0 mt-3">
                                            <h1><?php echo $row['c_name']; ?></h1>
                                            <div class="pxp-single-company-hero-location"><span class="fa fa-globe"></span><?php echo $row['location']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 mt-lg-5">
                                <div class="col-lg-7 col-xxl-8">
                                    <div class="pxp-single-company-content">
                                        <h2><?php echo $row['position']; ?></h2>
                                        <p>
                                            <?php echo $row['message']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-xxl-4">
                                    <div class="pxp-single-company-side-panel mt-5 mt-lg-0">
                                        
                                       <h2>Contact Information</h2>
                                        <div class="mt-4">
                                            <div class="pxp-single-company-side-info-label pxp-text-light">Phone</div>
                                            <div class="pxp-single-company-side-info-data"><a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="pxp-single-company-side-info-label pxp-text-light">Email</div>
                                            <div class="pxp-single-company-side-info-data"><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="pxp-single-company-side-info-label pxp-text-light">Location</div>
                                            <div class="pxp-single-company-side-info-data"><?php echo $row['location']; ?></div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="pxp-single-company-side-info-label pxp-text-light">Position</div>
                                            <div class="pxp-single-company-side-info-data"><?php echo $row['position']; ?></div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="pxp-single-company-side-info-label pxp-text-light">Salary</div>
                                            <div class="pxp-single-company-side-info-data"><?php echo $row['salary']; ?></div>
                                        </div>
                                    
    
                                    </div>
            
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </div>
            </div>

            
            <?php include 'footer.php'; ?>
    </body>
</html>