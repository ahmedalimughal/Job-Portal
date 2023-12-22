<!doctype html>
<html lang="en" class="pxp-root">

<head>
    <?php include 'header-links.php'; ?>
        <title><?php echo $website_name; ?> - View Application</title>
    </head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#applications").addClass("pxp-active");
});
</script>
<style type="text/css">
    .pxp-single-candidate-hero {
    background-color: var(--pxpMainColorLight);
    height: 270px;
    position: relative;
}
</style>
<?php 

    $id = $_GET['id'];


    // Retrieve image names
    $sql = "SELECT * FROM apply_job WHERE id = $id ";
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc(); 
    }

    ?>
    <body style="background-color: var(--pxpMainColorLight);">

    <?php 

    $ids = $row['candidate_id'];


    // Retrieve image names
    $sql = "SELECT * FROM candidates WHERE id = $ids ";
    $results = $conn->query($sql);

    if ($results) {
        $res = $results->fetch_assoc(); 
    }

 ?>    




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
                                            if($res['profile'] == null){
                                                ?>
                                    <div class="pxp-single-candidate-hero-avatar d-inline-block bg-light" style="background-image: url(../images/customer-5.png); ">
                                        </div>
                                        <?php
                                            }else{
                                        ?>
                                        

                                        <div class="pxp-single-candidate-hero-avatar d-inline-block" style="background-image: url(../user-profiles/<?php echo $res['profile'];?>);">
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
                                        <h2>Cover Letter</h2>
                                        <p><?php echo $row['cover_des']; ?>
                                        </p>
                                    </div>
                                    <embed src= "../<?php echo $row['ex1']; ?>" width= "100%" height= "800">
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
                                        <div class="mt-4">
                                            <div class="pxp-single-candidate-side-info-label pxp-text-light">Staus</div>
                                            <div class="pxp-single-candidate-side-info-data">
                                                <?php echo $row['status']; ?></div>
                                        </div>
                                    </div>
            
                                    
                    
                                    <div class="pxp-single-candidate-side-panel mt-5 mt-lg-2">
                                        
                                        <div class="mt-4">
                                            <div class="pxp-single-candidate-side-info-data">
                                                <a class="btn rounded-pill pxp-nav-btn mx-2" data-bs-toggle="modal" href="#status" role="button">Change Status</a>
                                            </div>
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

<div class="modal fade pxp-user-modal" id="status" aria-hidden="true" aria-labelledby="status" tabindex="-1">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="pxp-user-modal-fig text-center">
            </div>
            <h5 class="modal-title text-center mt-4" id="status">Change Status</h5>
            <form class="mt-4" action="update-status" method="post">
                <div class="form-floating mb-3">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <select class="form-control" id="pxp-signin-email" name="status">
                        <option name="status" value="Viewed">Viewed</option>
                        <option name="status" value="Pending">Pending</option>
                    </select>
                    <label for="pxp-signin-email">Application Status</label>
                    <span class="fa fa-edit"></span>
                </div>
                 <center><button type="submit" name="submit"class="btn rounded-pill pxp-modal-cta">Save</button></center>
            </form>
        </div>
    </div>
</div>
</div>

