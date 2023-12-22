<?php include 'total-apply-jobs.php'; ?>


<!doctype html>
<html lang="en" class="pxp-root">

<head>
    <?php include 'header-links.php'; ?>
        <title><?php echo $website_name; ?> - Dashboard</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#dashboard").addClass("pxp-active");
});
</script>
    <body style="background-color: var(--pxpMainColorLight);">

        <?php 

            $projects = array();
            $result = mysqli_query($conn,"SELECT * FROM `candidates` lIMIT 10");

            ?>



            <?php include 'sidebar.php'; ?>
        <div class="pxp-dashboard-content">


            <div class="pxp-dashboard-content-details">
                <h1>Dashboard</h1>
                <p class="pxp-text-light">Welcome to <?php echo $website_name; ?>!</p>

                <div class="row mt-4 mt-lg-5 align-items-center">
                    <div class="col-sm-6 col-xxl-3">
                        <div class="pxp-dashboard-stats-card bg-primary bg-opacity-10 mb-3 mb-xxl-0">
                            <div class="pxp-dashboard-stats-card-icon text-info">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="pxp-dashboard-stats-card-info">
                                <div class="pxp-dashboard-stats-card-info-number"><?php echo $candidatesRowCount; ?></div>
                                <div class="pxp-dashboard-stats-card-info-text pxp-text-light">Candidates</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xxl-6">
                        <div class="pxp-dashboard-stats-card bg-primary bg-opacity-10 mb-3 mb-xxl-0">
                            <div class="pxp-dashboard-stats-card-icon text-primary">
                                <span class="fa fa-file-text-o"></span>
                            </div>
                            <div class="pxp-dashboard-stats-card-info">
                                <div class="pxp-dashboard-stats-card-info-number"><?php echo $dataRowCount; ?></div>
                                <div class="pxp-dashboard-stats-card-info-text pxp-text-light">Jobs posted</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3">
                        <div class="pxp-dashboard-stats-card bg-primary bg-opacity-10 mb-3 mb-xxl-0">
                            <div class="pxp-dashboard-stats-card-icon text-success">
                                <span class="fa fa-sticky-note-o"></span>
                            </div>
                            <div class="pxp-dashboard-stats-card-info">
                                <div class="pxp-dashboard-stats-card-info-number"><?php echo $applyJobRowCount; ?></div>
                                <div class="pxp-dashboard-stats-card-info-text pxp-text-light">Applications</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-6 mt-3">
                        <div class="pxp-dashboard-stats-card bg-primary bg-opacity-10 mb-3 mb-xxl-0">
                            <div class="pxp-dashboard-stats-card-icon text-warning">
                                <span class="fa fa-users"></span>
                            </div>
                            <div class="pxp-dashboard-stats-card-info">
                                <div class="pxp-dashboard-stats-card-info-number"><?php echo $staffRequestRowCount; ?></div>
                                <div class="pxp-dashboard-stats-card-info-text pxp-text-light">Staff Request</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3 mt-3">
                        <div class="pxp-dashboard-stats-card bg-primary bg-opacity-10 mb-3 mb-xxl-0">
                            <div class="pxp-dashboard-stats-card-icon text-danger">
                                <span class="fa fa-newspaper-o"></span>
                            </div>
                            <div class="pxp-dashboard-stats-card-info">
                                <div class="pxp-dashboard-stats-card-info-number"><?php echo $subscribersRowCount; ?></div>
                                <div class="pxp-dashboard-stats-card-info-text pxp-text-light">Subscribers</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xxl-3 mt-3">
                        <div class="pxp-dashboard-stats-card bg-primary bg-opacity-10 mb-3 mb-xxl-0">
                            <div class="pxp-dashboard-stats-card-icon text-secondary">
                                <span class="fa fa-address-book"></span>
                            </div>
                            <div class="pxp-dashboard-stats-card-info">
                                <div class="pxp-dashboard-stats-card-info-number"><?php echo $contactRowCount; ?></div>
                                <div class="pxp-dashboard-stats-card-info-text pxp-text-light">Contact us</div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mt-4 mt-lg-5">
                    <h2>Recent Candidates</h2>
                    <div class="table-responsive">
                        <table class="table align-middle">
                             <?php
                                while($row = mysqli_fetch_array($result))
                               { 
                               $profiles = $row['profile'];
                                $profile_user = "../user-profiles/".$profiles;                      
                                 ?>

                            <tr>
                                <td style="width: 3%;">
                                    <div class="pxp-company-dashboard-candidate-avatar pxp-cover" style="background-image: url(<?php echo $profile_user; ?>);">
                                    </div>
                                </td>

                                <td style="width: 25%;">
                                    <div class="pxp-company-dashboard-candidate-name">
                                        <?php echo $row['first_name']; echo "\x20\x20\x20";  echo $row['last_name']; ?>
                                    </div>
                                </td>

                                <td style="width: 25%;">
                                    <div class="pxp-company-dashboard-candidate-title">
                                        <?php echo $row['title'];?>
                                    </div>
                                </td>

                                <td><div class="pxp-company-dashboard-candidate-location">
                                    <span class="fa fa-globe"></span><?php echo $row['location'];?></div>
                                </td>
                                <td><div class="pxp-company-dashboard-candidate-location">
                                    <span class="fa fa-envelope-o"></span><?php echo $row['email'];?></div>
                                </td>
                                <td>
                                    <div class="pxp-dashboard-table-options">
                                        <ul class="list-unstyled">
                                            <li>
                                                <button title="View profile">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                            </li>
                                            <li>
                                                <button title="Send message">
                                                    <span class="fa fa-envelope-o"></span>
                                                </button>
                                            </li>
                                            <li>
                                                <button title="Delete">
                                                    <span class="fa fa-trash-o"></span>
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            <?php
                            $i++;
                              }
                            ?> 

                        </table>
                    </div>
                </div>
            </div>

            
            <?php include 'footer.php'; ?>
    </body>
</html>