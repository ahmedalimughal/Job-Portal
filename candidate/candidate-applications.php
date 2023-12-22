<?php require_once "session.php"; ?>
<?php include 'get-apply-job-count.php'; ?>

<!doctype html>
<html lang="en" class="pxp-root">
<head>
    <?php include '../includes/website-info.php'; ?>
    <?php include 'links.php'; ?>
        

        <title>Jobster - Candidate dashboard - Applications</title>
    </head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#application").addClass("pxp-active");
});
    
    <?php 
    $id = $_SESSION['rc_candidates'];

    $projects = array();
    $result = mysqli_query($conn,"SELECT * FROM `apply_job` WHERE candidate_id = $id");
    ?>

</script>
    <body style="background-color: var(--pxpSecondaryColorLight);">
        <div class="pxp-preloader"><span>Loading...</span></div>

          <?php include 'sidebar.php'; ?>
        <div class="pxp-dashboard-content">

            <div class="pxp-dashboard-content-details">
                <h1>Applications</h1>
                <p class="pxp-text-light">Detailed list of your job applications.</p>

                <div class="mt-4 mt-lg-5">
                    <div class="row justify-content-between align-content-center">
                        <div class="col-auto order-1 order-sm-2">
                            <div class="pxp-candidate-dashboard-jobs-search mb-3">
                                
                                <div class="pxp-candidate-dashboard-jobs-search-search-form">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">

                        <?php  if ($result->num_rows > 0) { ?>
                            <div class="pxp-candidate-dashboard-jobs-search-results me-3"><?php echo "$row_count"; ?> job applications</div>
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 30%;">Job</th>
                                    <th style="width: 20%;">Salary</th>
                                    <th style="width: 15%;">Category</th>
                                    <th style="width: 10%;">Type</th>
                                    <th>Date</th>
                                    <th >Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                while($row = mysqli_fetch_array($result))
                               {    
                                    $dateString = $row['date'];
                                    $dateTime = new DateTime($dateString);
                                    $formattedDate = $dateTime->format("d-M-Y");                  
                                 ?>
                                <tr>
                                    <td>
                                        <span >
                                            <div class="pxp-candidate-dashboard-job-title"><?php echo $row['title'] ?></span></div>
                                            <div class="pxp-candidate-dashboard-job-location"><span class="fa fa-globe me-1"></span><?php echo $row['location'] ?></div>
                                        </span>
                                    </td>
                                    <td><span href="#" class="pxp-candidate-dashboard-job-company">
                                        <?php echo $row['salary'] ?></span></td>
                                    <td><div class="pxp-candidate-dashboard-job-category"><?php echo $row['category'] ?>
                                    </div></td>
                                    <td><div class="pxp-candidate-dashboard-job-type">Full-time</div></td>
                                    <td><div class="pxp-candidate-dashboard-job-date mt-1"><?php echo $formattedDate ?></div></td>
                                    <td>
                                        <div class="pxp-dashboard-table-options">
                                            <ul class="list-unstyled" style="float:left;">
                                                <?php
                                                if($row['status'] == 'Viewed'){
                                                ?>
                                                <li style="background-color:var(--pxpMainColorDark); border-radius: 3px;"><div  class="pxp-candidate-dashboard-job-type text-light p-1 px-2 rounded">Viewed <span class="fa fa-eye"></span></div></li>
                                                <?php
                                                }
                                                else{
                                                ?>
                                                <li style="background-color:var(--pxpMainColor); border-radius: 3px;"><div class="pxp-candidate-dashboard-job-type text-light p-1 px-2 rounded">Pending <span class="fa fa-clock-o"></span></div></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </td>

                                </tr>
                                 <?php
                            $i++;
                              }
                            ?> 
                            
                                
                                
                            </tbody>
                        </table>
                        <?php
                                 }
                                 else {
                                   ?>
                                   <hr>
                                    <h2 style="text-align:center;" class="pt-2">
                                        <a>There is no job you Applied </a><br>
                                        <a href="../all-jobs" target="_blank" class="btn rounded-pill pxp-subsection-cta mt-3" name="submit">
                                        Apply Now</a>

                                    </h2>
                                    <hr>
                                   <?php
                                 }
                                 
                                 ?>

                    </div>
                </div>
            </div>

            <footer>
                <div class="pxp-footer-copyright pxp-text-light">© 2021 Jobster. All Right Reserved.</div>
            </footer>
        </div>

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/nav.js"></script>
        <script src="../js/Chart.min.js"></script>
        <script src="../js/main.js"></script>
    </body>
</html>