<!doctype html>
<html lang="en" class="pxp-root">

<head>
    <?php include 'header-links.php'; ?>
        <title><?php echo $website_name; ?> - View Application</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#all-candidates").addClass("pxp-active");
});
</script>
<style type="text/css">
    .pxp-single-candidate-hero {
    background-color: var(--pxpMainColorLight);
    height: 270px;
    position: relative;
}
.pxp-single-candidate-timeline-time span {
    width: auto;
    text-align: center;
}
</style>
    <?php 

    $id = $_GET['id'];


    // Retrieve image names
    $sql = "SELECT * FROM candidates WHERE id = $id ";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc(); 
    }

    ?>
    <?php 

    $userid = $row['id'];


    $projects = array();
    $result = mysqli_query($conn,"SELECT * FROM `user_experience` WHERE user_id = $userid");

 ?>  

     <?php 

    $ids = $row['id'];


    $project = array();
    $res = mysqli_query($conn,"SELECT * FROM `user_education` WHERE user_id = $ids");

 ?> 
    <body style="background-color: var(--pxpMainColorLight);">






            <?php include 'sidebar.php'; ?>
        <div class="pxp-dashboard-content">


            <div class="pxp-dashboard-content-details">
                <h1>View Application</h1>
                <p class="pxp-text-light">Welcome to <?php echo $website_name; ?>!</p>
                <section>
            <div class="pxp-container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="pxp-single-candidate-hero pxp-cover pxp-boxed" style="background-image: url(../images/candidate-cover-1.jpg);">
                                <div class="pxp-hero-opacity"></div>
                                <div class="pxp-single-candidate-hero-caption">
                                    <div class="pxp-single-candidate-hero-content d-block text-center">
                                        <?php
                                            if($row['profile'] == null){
                                                ?>
                                    <div class="pxp-single-candidate-hero-avatar d-inline-block bg-light" style="background-image: url(../images/customer-5.png); ">
                                        </div>
                                        <?php
                                            }else{
                                        ?>
                                        

                                        <div class="pxp-single-candidate-hero-avatar d-inline-block" style="background-image: url(../user-profiles/<?php echo $row['profile'];?>);">
                                    </div>


                                        <?php
                                        }
                                        ?>
                                        <div class="pxp-single-candidate-hero-name ms-0 mt-3">
                                            <h1><?php echo $row['first_name'];echo "\x20\x20\x20"; echo $row['last_name'];?></h1>
                                            <div class="pxp-single-candidate-hero-title"><?php echo $row['title']; ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4 mt-lg-5">
                                <div class="col-lg-7 col-xxl-8">
                                    <div class="pxp-single-candidate-content">
                                        <h2>About <?php echo $row['first_name'];echo "\x20\x20\x20"; echo $row['last_name'];?></h2>
                                        <p><?php echo $row['about_you']; ?>
                                        </p>
                                    </div>
                                    <div class="mt-4 mt-lg-5">
                                            <h2>Work Experience</h2>
                                            <div class="pxp-single-candidate-timeline">
                                                <?php  if ($result->num_rows > 0) { 
                                                    // output data of each row
                                                    while($rows = $result->fetch_assoc()) {

                                                        $starting_date = $rows['start_date'];
                                                        $ending_date = $rows['end_date'];

                                                        $dateTime = new DateTime($starting_date);
                                                        $date  = new DateTime($ending_date);
                                                        $s_date = $dateTime->format("Y");
                                                        $e_date = $date->format("Y");

                                                        ?>

                                                <div class="pxp-single-candidate-timeline-item">

                                                    <div class="pxp-single-candidate-timeline-dot"></div>
                                                    <div class="pxp-single-candidate-timeline-info ms-3">

                                                         <?php
                                                            if($rows['currently_working'] == 'yes'){
                                                                ?>
                                                        <div class="pxp-single-candidate-timeline-time ">
                                                            <span class="me-3 bg-success text-light">
                                                                <?php echo $s_date; ?> - Present</span>
                                                        </div>

                                                        <?php
                                                            }else{
                                                        ?>
                                                        <div class="pxp-single-candidate-timeline-time">
                                                            <span class="me-3 bg-secondary text-light">
                                                                <?php echo $s_date ?> - <?php echo $e_date; ?> </span>
                                                        </div>

                                                        <?php
                                                        }
                                                        ?>





                                                        <div class="pxp-single-candidate-timeline-company pxp-text-light">
                                                            
                                                        </div>

                                                        <div class="pxp-single-candidate-timeline-position mt-2">
                                                            <?php echo $rows['designation']; ?></div>
                                                        <div class="pxp-single-candidate-timeline-company pxp-text-light">
                                                            <?php echo $rows['company_name']; ?>

                                                        </div>
                                                        <div class="pxp-single-candidate-timeline-company pxp-text-light">
                                                            <span class="fa fa-map-marker"></span> <?php echo $rows['location']; ?>

                                                        </div>

                                                        <div class="pxp-single-candidate-timeline-about mt-2 pb-4">
                                                            <?php echo $rows['your_roles']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                 }
                                                 } else {
                                                   ?>
                                                   <hr>
                                                    <h3 style="text-align:center;" class="pt-2"><a>No available Work Experience record is found.</a></h3>
                                                    <hr>
                                                   <?php
                                                 }
                                                 
                                                 ?>

                                            </div>
                                        </div>

                <div class="mt-4 mt-lg-5">
                    <h2>Education</h2>
                    <div class="pxp-single-candidate-timeline">
                        <?php  if ($res->num_rows > 0) { 
                            // output data of each row
                            while($rr = $res->fetch_assoc()) {
                                ?>

                        <div class="pxp-single-candidate-timeline-item">

                            <div class="pxp-single-candidate-timeline-dot"></div>
                            <div class="pxp-single-candidate-timeline-info ms-3">
                                <div class="pxp-single-candidate-timeline-company pxp-text-light">
                                    <div class="pxp-single-candidate-timeline-time ">
                                        <span class="me-3">
                                            Passing Year: <?php echo $rr['passing_year']; ?></span>
                                    </div>
                                </div>

                                <div class="pxp-single-candidate-timeline-position mt-2">
                                    <?php echo $rr['title'];?></div>

                                <div class="pxp-single-candidate-timeline-company pxp-text-light">

                                    <span class="fa fa-graduation-cap"></span>
                                    <?php echo $rr['last_degree']; ?>

                                </div>
                                <div class="pxp-single-candidate-timeline-company pxp-text-light">
                                    <span class="fa fa-map-marker"></span> 
                                    <?php echo $rr['location']; ?>

                                </div>
                                <div class="pxp-single-candidate-timeline-company pxp-text-light">
                                    <span class="fa fa-building"></span> 
                                    
                                    <?php echo $rr['school-universtity']; ?>

                                </div>

                                <div class="pxp-single-candidate-timeline-about mt-2 pb-4">
                                    <?php echo $rr['your_roles']; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                         }
                         } else {
                           ?>
                           <hr>
                            <h3 style="text-align:center;" class="pt-2"><a>No available Education record is found.</a></h3>
                            <hr>
                           <?php
                         }
                         
                         ?>

                    </div>
                </div>
                                </div>
                                <div class="col-lg-5 col-xxl-4">
                                    <div class="pxp-single-candidate-side-panel mt-5 mt-lg-0">
                                        <h2>Contact Information</h2>
                                        <hr>
                                        <div>
                                            <div class="pxp-single-candidate-side-info-label pxp-text-light">Email</div>
                                            <div class="pxp-single-candidate-side-info-data"><a href="mailto:<?php echo $row['email']; ?>"><?php echo $row['email']; ?></a></div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="pxp-single-candidate-side-info-label pxp-text-light">Location</div>
                                            <div class="pxp-single-candidate-side-info-data"><?php echo $row['location']; ?></div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="pxp-single-candidate-side-info-label pxp-text-light">Phone</div>
                                            <div class="pxp-single-candidate-side-info-data">
                                                <a href="tel:<?php echo $row['phone']; ?>"><?php echo $row['phone']; ?></a></div>
                                        </div>
                                        <div class="mt-4">
                                            <div class="pxp-single-candidate-side-info-label pxp-text-light">Salary</div>
                                            <div class="pxp-single-candidate-side-info-data">
                                                <?php echo $row['salary']; ?></div>
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
