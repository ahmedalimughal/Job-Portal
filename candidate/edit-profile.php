<?php  

require_once "session.php";

?>

<!doctype html>
<html lang="en" class="pxp-root">
<head>
    <?php include '../includes/website-info.php'; ?>
    <?php include 'links.php'; ?>

    <?php 

    $id = $_GET['id'];

    // Retrieve image names
    $sql = "SELECT * FROM `candidates` WHERE id = $id;";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc(); 
    }

    ?>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
<script>
$(document).ready(function(){
    $("li#profile").addClass("pxp-active");
});
</script> 

        <title><?php echo $website_name; ?> - Candidate dashboard</title>
    </head>
    <body style="background-color: var(--pxpSecondaryColorLight);">

            <?php include 'sidebar.php'; ?>

        <div class="pxp-dashboard-content">
        <div class="pxp-dashboard-content-details">
                <h1>Edit Profile</h1>
                <p class="pxp-text-light">Edit your candidate profile page info.</p>

                <form action="edit-profile-action.php" method="post" enctype='multipart/form-data'>
                    <div class="row mt-4 mt-lg-5">
                        <div class="col-xxl-8">
                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="pxp-candidate-title" class="form-label">First Name</label>
                                        <input type="text" id="First Name" class="form-control" placeholder="E.g. Mark"
                                        value="<?php echo $row['first_name'] ?>" name="f_name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="pxp-candidate-location" class="form-label">Last Name</label>
                                        <input type="tel" id="pxp-candidate-location" class="form-control" placeholder="E.g. Joseph" value="<?php echo $row['last_name'] ?>" name="l_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="pxp-candidate-title" class="form-label">Title</label>
                                        <input type="text" id="pxp-candidate-title" class="form-control" placeholder="E.g. Web Designer" value="<?php echo $row['title'] ?>" name="title">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="pxp-candidate-location" class="form-label">Location</label>
                                        <input type="tel" id="pxp-candidate-location" class="form-control" placeholder="E.g. San Francisco, CA" value="<?php echo $row['location'] ?>" name="location">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="pxp-candidate-email" class="form-label">Email</label>
                                        <input type="email" id="pxp-candidate-email" class="form-control" placeholder="candidate@email.com" value="<?php echo $row['email'] ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="mb-3">
                                        <label for="pxp-candidate-phone" class="form-label">Phone</label>
                                        <input type="tel" id="pxp-candidate-phone" class="form-control" placeholder="(+12) 345 6789" value="<?php echo $row['phone'] ?>" name="phone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4">
                            <div class="form-label">&nbsp;</div>
                            <div class="pxp-candidate-cover mb-3">
                                <input type="file" id="pxp-candidate-cover-choose-file" accept="image/*" name="profile">
                                <label for="pxp-candidate-cover-choose-file" class="pxp-cover"><span>Upload Profile Image</span></label>
                            </div>
                        </div>

                    </div>

                    <div class="mb-3">
                        <label for="pxp-candidate-about" class="form-label">About you</label>
                        <textarea class="form-control" id="pxp-candidate-about" placeholder="Type your info here..." name="about_you"><?php echo $row['about_you'] ?></textarea>
                    </div> 
                    <div class="mb-3">
                        <label for="pxp-candidate-about" class="form-label">Uplode Your Resume</label>
                            <input type="file" id="pxp-candidate-resume" accept="pdf/*" name="resume" class="form-control">
                    </div>                    

                    <div class="mt-4 mt-lg-5">
                        <button class="btn rounded-pill pxp-section-cta" name="submit">Save Profile</button>
                    </div>
                </form>
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
</html>