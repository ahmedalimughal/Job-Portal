<!doctype html>
<html lang="en" class="pxp-root">
<head>
    <?php include 'header-links.php'; ?>
        <title><?php echo $website_name; ?> - Subscribers</title>
    </head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#subscribers").addClass("pxp-active");
});
</script>
    <body style="background-color: var(--pxpMainColorLight);">

<?php include 'sidebar.php'; ?>
   <?php

// Define the number of records per page
$records_per_page = 10;

// Get the current page number from the URL
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? intval($_GET['page']) : 1;

// Calculate the starting record for the current page
$start = ($current_page - 1) * $records_per_page;

// Fetch data from the database
$sql = "SELECT *
        FROM `subscribers`
        LIMIT $start, $records_per_page";
$result = $conn->query($sql);

// Fetch data from the database for pagination links
$sql_total = "SELECT COUNT(*) as total FROM `subscribers`";
$result_total = $conn->query($sql_total);
$row_total = $result_total->fetch_assoc();
$total_recorde = $row_total['total'];
$total_pages = ceil($total_recorde / $records_per_page);

?>
        <div class="pxp-dashboard-content">


            <div class="pxp-dashboard-content-details">
                <h1>Subscribers</h1>
                <p class="pxp-text-light">History of all your Subscribers.</p>
                <?php if (isset($_GET['delete'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?=$_GET['delete']?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                         <?php } ?>

                <div class="mt-4 mt-lg-5">
                    <?php  if ($result->num_rows > 0) { ?>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 25%;">Email</th>
                                    <th style="width: 25%;">Country</th>
                                    <th style="width: 25%;">ipAddress</th>
                                    <th style="width: 25%;">Date</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()):?>
                                <tr>
                                    <td>
                                        <div class="pxp-company-dashboard-subscriptions-plan"><?php echo $row['email'] ?></div>
                                    </td>
                                    
                                    <td>
                                        <div class="pxp-company-dashboard-subscriptions-status">
                                            <span class="badge rounded-pill bg-success"><?php echo $row['country'] ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pxp-company-dashboard-job-date"><?php echo $row['ipAddress'] ?></div>
                                    </td>
                                    
                                    <td>
                                        <div class="pxp-company-dashboard-job-date"><?php echo $row['date'] ?></div>
                                    </td>
                                    
                                    <td>
                                        <div class="pxp-dashboard-table-options">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="delete-subcriber?id=<?php echo $row['id'] ?>">
                                                    <button title="Delete Subscribers">
                                                        <span class="fa fa-trash-o"></span>
                                                    </button>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                                
                                
                                
                            </tbody>
                        </table>
                    </div>
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
                                    <li class="page-item active">
                                        <a class="page-link" href="?page=<?= $current_page + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">Next &raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                                         <?php
                                 }
                                 else {
                                   ?>
                                   <hr>
                            <h2 style="text-align:center;" class="pt-2"><a>Oops, there are no available subscribers.</a></h2>
                            <hr>
                                   <?php
                                 }
                                 
                                 ?>
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

<!-- Mirrored from pixelprime.co/themes/jobster/company-dashboard-subscriptions.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 16:58:50 GMT -->
</html>