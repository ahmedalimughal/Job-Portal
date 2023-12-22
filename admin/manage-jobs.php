<?php include 'total-apply-jobs.php'; ?>


<!doctype html>
<html lang="en" class="pxp-root">

<head>
    <?php include 'header-links.php'; ?>
        <title><?php echo $website_name; ?> - Manage Jobs</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#manage-jobs").addClass("pxp-active");
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

    <body style="background-color: var(--pxpMainColorLight);">



            <?php include 'sidebar.php'; ?>
        <div class="pxp-dashboard-content">


            <div class="pxp-dashboard-content-details">
                <h1>Manage Jobs</h1>
                <p class="pxp-text-light">Welcome to <?php echo $website_name; ?>!</p>
                <div class="mt-4 mt-lg-5">
            <div class="pxp-container">
           
                <div class="row">
				<?php while ($row = $result->fetch_assoc()): ?>
                    
                 <div class="col-md-8 col-xl-12 col-xxl-12 pxp-jobs-card-1-container">
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
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>

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
                </div>
            </div>

            
            <?php include 'footer.php'; ?>
    </body>
</html>
