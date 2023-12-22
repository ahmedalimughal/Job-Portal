<?php  

require_once "session.php";

?>
<!doctype html>
<html lang="en" class="pxp-root">
<head>
    <?php include '../includes/website-info.php'; ?>
    <?php include 'links.php'; ?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#education").addClass("pxp-active");
});

<?php 
$id = $_SESSION['rc_candidates'];

$projects = array();
$result = mysqli_query($conn,"SELECT * FROM `user_education` WHERE user_id = $id");
?>

</script>
        <title><?php echo $website_name; ?> - Candidate Education</title>
    </head>
    <body style="background-color: var(--pxpSecondaryColorLight);" id="dashboard">

            <?php include 'sidebar.php'; ?>

        <div class="pxp-dashboard-content">
            

            <div class="pxp-dashboard-content-details">
                <h1>Education</h1>

                <?php if (isset($_GET['sucessfull'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?=$_GET['sucessfull']?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                         <?php } ?>

                         <?php if (isset($_GET['delete'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?=$_GET['delete']?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                         <?php } ?>

                <div class="mt-4 mt-lg-5">
                        <div class="table-responsive">
                            <?php  if ($result->num_rows > 0) { ?>
                            <table class="table align-middle">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">Title</th>
                                    <th style="width: 20%;">Degree</th>
                                    <th style="width: 10%;">School / Universtity</th>
                                    <th style="width: 10%;">Passing Year</th>
                                    <th style="width: 10%;">Marks</th>
                                    <th style="width: 30%;">location</th>
                                </tr>
                            </thead>
                                <?php 
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        $$dateString = $row['passing_year'];
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format("M-Y");   
                                         
                                         ?>

                                <tr>
                                    <td style="width: 20%;">
                                        <div class="pxp-candidate-dashboard-experience-title"><?php echo $row['title'] ?></div>
                                    </td>
                                    <td style="width: 15%;">
                                        <div class="pxp-candidate-dashboard-experience-school"><?php echo $row['last_degree'] ?></div>
                                    </td>
                                    <td style="width: 20%;">
                                        <div class="pxp-candidate-dashboard-experience-school"><?php echo $row['school-universtity'] ?></div>
                                    </td>
                                    <td style="width: 15%;">
                                        <div class="pxp-candidate-dashboard-experience-time"><?php echo $formattedDate ?></div>
                                    </td>
                                    <td style="width: 10%;">
                                        <div class="pxp-candidate-dashboard-experience-time">
                                            <?php echo $row['marks']; ?>
                                        </div>
                                    </td>
                                    <td style="width: 30%;">
                                        <div class="pxp-candidate-dashboard-experience-time">
                                            <?php echo $row['location']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pxp-dashboard-table-options">
                                            <ul class="list-unstyled" style="float:left;">
                                                <li style="background-color:var(--pxpMainColorLight); border-radius: 3px; padding: 2px 5px;">
                                                    <a href="delete-education?id=<?php echo $row['id']; ?>"><span class="fa fa-trash-o"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                 }
                                 } else {
                                   ?>
                                   <hr>
                            <h2 style="text-align:center;" class="pt-2"><a>No available education record is found. Kindly Add
</a></h2>
                            <hr>
                                   <?php
                                 }
                                 
                                 ?>


                            </table>

                        </div>


                        <form action="add-education-action.php" method="post">

                        <div class="row mt-3 mt-lg-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-title" class="form-label">Title</label>
                                    <input type="text" id="pxp-candidate-edu-title" class="form-control" placeholder="E.g. Architecure" name="title" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-school" class="form-label">School / Universtity   </label>
                                    <input type="text" id="pxp-candidate-edu-school" class="form-control" placeholder="School name" name="school" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-time" class="form-label">Passing Year</label>
                                    <input type="date" id="pxp-candidate-edu-time" class="form-control" placeholder="E.g. 2005 - 2013" name="year" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-title" class="form-label">Marks</label>
                                    <input type="text" id="pxp-candidate-edu-title" class="form-control" placeholder="E.g. 85.5%" name="marks" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-title" class="form-label">Location</label>
                                    <input type="text" id="pxp-candidate-edu-title" class="form-control" placeholder="E.g. United States of America" name="location" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-title" class="form-label">Degree</label>
                                    <input type="text" id="pxp-candidate-edu-title" class="form-control" placeholder="E.g. Bachelor of Science (B.Sc)" name="degree" required>
                                </div>
                            </div>
                            <div class="col-md-4 mt-2">
                                <div class="mt-4">
                                    <button class="btn rounded-pill pxp-subsection-cta" name="submit">Add Education</button>
                                </div>
                            </div>
                        </div>
                        </form>
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