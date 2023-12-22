<?php include 'total-apply-jobs.php'; ?>
<!doctype html>
<html lang="en" class="pxp-root">
   <head>
      <?php include 'header-links.php'; ?>
      <title><?php echo $website_name; ?> - Applications</title>
   </head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
   <script>
      $(document).ready(function(){
          $("li#applications").addClass("pxp-active");
      });
   </script>
   <?php

// Define the number of records per page
$records_per_page = 10;

// Get the current page number from the URL
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting record for the current page
$start = ($current_page - 1) * $records_per_page;

// Fetch data from the database
$sql = "SELECT *
        FROM `apply_job`
        LIMIT $start, $records_per_page";
$result = $conn->query($sql);

// Fetch data from the database for pagination links
$sql_total = "SELECT COUNT(*) as total FROM `apply_job`";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_recorde = $row_total['total'];
$total_pages = ceil($total_recorde / $records_per_page);

?>
   <body style="background-color: var(--pxpMainColorLight);">
      <?php include 'sidebar.php'; ?>

             <div class="pxp-dashboard-content">


            <div class="pxp-dashboard-content-details">
                <h1>All Candidates</h1>
                <p class="pxp-text-light">Welcome to <?php echo $website_name; ?>!</p>
                <?php if (isset($_GET['delete'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?=$_GET['delete']?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                         <?php } ?>

                         <?php if (isset($_GET['status'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?=$_GET['status']?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                         <?php } ?>


                <div class="mt-2 mt-lg-1">
                    <?php  if ($result->num_rows > 0) { ?>
              
                    <div class="table-responsive">
                        
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 40%;">Job Title</th>
                                    <th style="width: 15%;">Candidates</th>
                                    <th style="width: 15%;">Location</th>
                                    <th style="width: 30%;">Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <?php while ($row = $result->fetch_assoc()): 
                                $profiles = $row['profile'];
                                $profile_user = "../user-profiles/".$profiles; 
                                

                                ?>
                            

                                <tr>
                                <td style="width: 40%;">
                                    <div class="pxp-company-dashboard-candidate-name">
                                       
                                        <?php echo $row['title'];?>
                                    </div>
                                </td>

                                <td style="width: 20%;">
                                    <div class="pxp-company-dashboard-candidate-title">
                                         <?php echo $row['first_name']; echo "\x20\x20\x20";  echo $row['last_name']; ?>
                                    </div>
                                </td>

                                <td style="width: 10%;"><div class="pxp-company-dashboard-candidate-location">
                                    <span class="fa fa-globe"></span><?php echo $row['location'];?></div>
                                </td>
                                <td style="width: 30%;"><div class="pxp-dashboard-table-options">
                                            <ul class="list-unstyled" style="float:left;">
                                                <?php
                                                if($row['status'] == 'Viewed'){
                                                ?>
                                                <li style="background-color:var(--pxpMainColorDark); border-radius: 3px;"><div  class="pxp-candidate-dashboard-job-type text-light p-1 px-2 rounded">Viewed <span class="fa fa-eye"></span></div></li>
                                                <?php
                                                }
                                                else{
                                                ?>
                                                <li style="background-color:var(--pxpMainColor); border-radius: 3px;"><div class="pxp-candidate-dashboard-job-type text-light p-1 px-2 rounded">New <span class="fa fa-clock-o"></span></div></li>
                                                <?php
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                </td>
                                <td>
                                    <div class="pxp-dashboard-table-options">
                                        <ul class="list-unstyled">
                                            
                                            <li>

                                                <a href="../<?php echo $row['ex1'];?>" target="_blank">
                                                <button title="View Resume">
                                                    <span class="fa fa-file-pdf-o"></span>
                                                </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="view-application?id=<?php echo $row['id'];?>"target="_blank">
                                                <button title="View profile">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="delete-application?id=<?php echo $row['id'];?>">
                                                <button title="Delete">
                                                    <span class="fa fa-trash-o"></span>
                                                </button>
                                            </a>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php endwhile; ?>

                        </table>

                         <div class="col-auto">
                        <nav class="mt-3 mt-sm-0" aria-label="Jobs list pagination">
                            <ul class="pagination pxp-pagination">
                                <?php if ($current_page > 1): ?>
                                    <li class="page-item active">
                                        <a class="page-link" href="?page=<?= $current_page - 1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo; Previous</span>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if ($current_page < $total_pages && $total_recorde > $records_per_page): ?>
                                    <li class="page-item active  mx-1">
                                        <a class="page-link" href="?page=<?= $current_page + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    </div>
                    <?php
                                 }
                                 else {
                                   ?>
                                   <hr>
                            <h2 style="text-align:center;" class="pt-2"><a>There are no available candidates.
</a></h2>
                            <hr>
                                   <?php
                                 }
                                 
                                 ?>

                </div>
            </div>




      <?php include 'footer.php'; ?>
   </body>
</html>


        