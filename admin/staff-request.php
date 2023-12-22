<?php include 'total-apply-jobs.php'; ?>


<!doctype html>
<html lang="en" class="pxp-root">

<head>
    <?php include 'header-links.php'; ?>
        <title><?php echo $website_name; ?> - Staff Request</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#staff").addClass("pxp-active");
});
</script>
    <body style="background-color: var(--pxpMainColorLight);">

        <?php 

            $projects = array();
            $result = mysqli_query($conn,"SELECT * FROM `staff_request`");

            ?>



            <?php include 'sidebar.php'; ?>
        <div class="pxp-dashboard-content">


            <div class="pxp-dashboard-content-details">
                <h1>Staff Request</h1>
                <p class="pxp-text-light">Welcome to <?php echo $website_name; ?>!</p>
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
                                    <th style="width: 15%;">Name</th>
                                    <th style="width: 20%;">Company</th>
                                    <th style="width: 10%;">Position</th>
                                    <th style="width: 10%;">Location</th>
                                    <th style="width: 10%;">Salary</th>
                                    <th>Date</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                             <?php
                                while($row = mysqli_fetch_array($result))
                               { 
                               	$profiles = $row['profile'];
                                $profile_user = "../user-profiles/".$profiles; 
                                $$dateString = $row['date'];
                                $dateTime = new DateTime($dateString);
                                $formattedDate = $dateTime->format("d-M-Y");

                                 ?>

                            <tr>
                                <td style="width: 15%;">
                                    <div class="pxp-company-dashboard-candidate-name">
                                        <?php echo $row['name'];?>
                                    </div>
                                </td>

                                <td style="width: 20%;">
                                    <div class="pxp-company-dashboard-candidate-title">
                                        <?php echo $row['c_name'];?>
                                    </div>
                                </td>
                                <td style="width: 20%;">
                                	<div class="pxp-company-dashboard-candidate-location">
                                    <?php echo $row['position'];?></div>
                                </td>
                                <td style="width: 5%;">
                                	<div class="pxp-company-dashboard-candidate-location">
                                    <span class="fa fa-globe">
                                    </span><?php echo $row['location'];?>
                                </div>
                                </td>
                                <td style="width: 10%;">
                                	<div class="pxp-company-dashboard-candidate-location">
                                    <?php echo $row['salary'];?>
                                </div>
                                </td>
                                <td style="width: 10%;">
                                	<div class="pxp-company-dashboard-candidate-location">
                                    <?php echo $formattedDate;?>
                                </div>
                                </td>
                                <td>
                                    <div class="pxp-dashboard-table-options">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="view-staff-request?id=<?php echo $row['id']; ?>">
                                                	<button title="View profile">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="delete-staff-request?id=<?php echo $row['id']; ?>">
                                                <button title="Delete">
                                                    <span class="fa fa-trash-o"></span>
                                                </button>
                                                </a>
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
                            <h2 style="text-align:center;" class="pt-2"><a>No available Request record is found.</a></h2>
                            <hr>
                                   <?php
                                 }
                                 
                                 ?>

                        </table>
                    </div>
                </div>
            </div>

            
            <?php include 'footer.php'; ?>
    </body>
</html>