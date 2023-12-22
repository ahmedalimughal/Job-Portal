<!doctype html>
<html lang="en" class="pxp-root">
<head>
        <?php include 'includes/header-links.php'; ?>

        <title><?php echo $website_name; ?> - Apply for a job</title>
    </head>
    <body>
        <div class="pxp-preloader"><span>Loading...</span></div>

      <!-- header file includes -->

        <?php include 'includes/header.php'; ?>

        <!-- header file includes -->
<?php 

include("includes/database.php"); 

$id = $_REQUEST['id'];

// Retrieve image names
$sql = "SELECT * FROM `data` WHERE id = $id";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc(); 
}


?>

        <section class="mt-4">
            <div class="pxp-container pt-3">
                <div class="pxp-single-job-cover pxp-cover" style="background-image: url(images/office-1.jpg);"></div>

                <div class="pxp-single-job-content mt-4 mt-lg-5">
                    <div class="row">
                        <div class="col-lg-12 col-xl-12 col-xxl-12">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-xl-6 col-xxl-12">
                                    <h1>APPLYING FOR <?php echo $row['title'] ?></h1>
                                </div> 
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-0">
            <div class="pxp-container pt-0">
                <div class="pxp-single-job-content mt-0 mt-lg-0">
                    <div class="row">
                        <div class="col-lg-7 col-xl-8 col-xxl-9">
                            <div class="pxp-dashboard-content-details">
                            <h2 class="heading-2">Fill Your Information</h2>
                            <form action="apply-job" method="POST" enctype='multipart/form-data'>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <input type="hidden" name="salary" value="<?php echo $row['salary'] ?>">
                            <input type="hidden" name="location" value="<?php echo $row['location'] ?>">
                            <input type="hidden" name="title" value="<?php echo $row['title'] ?>">
                            <input type="hidden" name="category" value="<?php echo $row['category'] ?>">
                            <input type="hidden" name="c_id" value="<?php echo $_SESSION['rc_candidates']; ?>">
                            


                        <div class="row pt-60 g-5"> 
                        <div class="col-lg-6">
                            <label class="form-label mb-10">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" aria-label="First name" name="f_name">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label mb-10">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter Last Name" aria-label="First name" name="l_name">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label mb-10">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Enter Phone Number" aria-label="First name" name="p_number">
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label mb-10">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" aria-label="First name" name="email">
                        </div>

                        <div class="col-lg-12">
                            <label class="form-label mb-10">Cover Letter</label>
                            <textarea class="form-control" placeholder="Cover Letter" id="exampleFormControlTextarea1" name="cover"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label mb-10">Upload your updated Resume </label>
                            <input type="file" class="form-control" placeholder="Enter Email" aria-label="First name" name="resume">
                        </div>
                            <div class="col-lg-12">
                            <button class="btn rounded-pill pxp-section-cta" type="submit" name="submit">Apply </button>
                        </div>
                    </div>
                        </form>
                        </div>
                            

                           

                            

                              
                            </div>
                             <div class="col-lg-5 col-xl-4 col-xxl-3">
                                <div class="pxp-single-job-side-panel mt-5 mt-lg-0">
                                    <div>
                                        <div class="pxp-single-job-side-info-label pxp-text-light">Job Category</div>
                                        <div class="pxp-single-job-side-info-data"><?php echo $row['category'] ?></div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="pxp-single-job-side-info-label pxp-text-light">Location</div>
                                        <div class="pxp-single-job-side-info-data"><?php echo $row['location'] ?></div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="pxp-single-job-side-info-label pxp-text-light">Job Post Date</div>
                                        <div class="pxp-single-job-side-info-data"><?php echo $row['date'] ?></div>
                                    </div>
                                    <div class="mt-4">
                                        <div class="pxp-single-job-side-info-label pxp-text-light">Salary</div>
                                        <div class="pxp-single-job-side-info-data"><?php echo $row['salary'] ?></div>
                                    </div>
                                </div>

                                <div class="pxp-single-job-side-panel mt-5 mt-lg-2">
                                    <div>
                                        <div class="pxp-single-job-side-info-label pxp-text-light">Description</div>
                                        <div class="pxp-single-job-side-info-data"><?php echo $row['description'] ?></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>



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