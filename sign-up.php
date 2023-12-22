<?php 
// Initialize the session
require_once "includes/database.php";
 
// Check if the user is logged in, otherwise redirect to login page
if (!isset($_SESSION['rc_candidates']) && !isset($_SESSION['name'])) {

}
else{
      header("Location: candidate/dashboard");
      exit;
}
?>

<!doctype html>
<html lang="en" class="pxp-root">
<head>        
        <?php include 'includes/header-links.php'; ?>
        <title>Sign up | <?php echo $website_name; ?></title>
</head>
    <body>


        <section class="pxp-hero vh-100" style="background-color: var(--pxpMainColorLight);">
            <div class="row align-items-center pxp-sign-hero-container">
                <div class="col-xl-4 pxp-column">
                    <div class="pxp-sign-hero-fig text-center pb-100 pt-100">
                        <img src="images/signup-big-fig.png" alt="Sign up">
                        <h2 class="mt-4 mt-lg-5">Create an account</h2>
                        <div class="pxp-logo">
                        <a href="index" class="pxp-animate"><span style="color: var(--pxpMainColor)">Employment </span>Tank</a>
                    </div>
                    </div>
                </div>
                <div class="col-xl-8 pxp-column pxp-is-light">
                    <div class="pxp-sign-hero-form pb-100 pt-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-xl-7 col-xxl-7">
                                <div class="pxp-sign-hero-form-content">
                                    <h5 class="text-center pb-5">Sign Up</h5>
                                    <?php
                                        
                                        if(isset($_GET['cv']) && $_GET['cv']=='false'){
                                            ?>
                                            <div class='alert alert-danger text-danger'>Please Select Only .PDF File</div>
                                            <?php
                                        }
                                        if(isset($_GET['email']) && $_GET['email']=='false'){
                                            ?>
                                            <div class='alert alert-danger text-danger'>The email is already registered please login</div>
                                            <?php
                                        }
                                        
                                        ?>


                                    <form class="signup-form"  action='' method='post' enctype="multipart/form-data" >
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pxp-signup-page-f_name" placeholder="First Name" name="fname" required="">
                                                    <label for="pxp-signup-page-f_name">First Name</label>
                                                    <span class="fa fa-user"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pxp-signup-page-Lname" placeholder="Last Name" name="lname" required="">
                                                    <label for="pxp-signup-page-Lname">Last Name</label>
                                                    <span class="fa fa-user"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="pxp-signup-page-phone" placeholder="Phone Number" name="phone" required="">
                                            <label for="pxp-signup-page-phone">Phone Number</label>
                                            <span class="fa fa-phone"></span>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="pxp-signup-page-email" placeholder="Email address" name="email" required="">
                                            <label for="pxp-signup-page-email">Email address</label>
                                            <span class="fa fa-envelope-o"></span>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="pxp-signup-page-password" placeholder="Create password" name="password" required="">
                                            <label for="pxp-signup-page-password">Create password</label>
                                            <span class="fa fa-lock"></span>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="file" class="form-control"  id="pxp-signup-page-password" placeholder="Upload Your Resume (PDF Only)"  accept="application/pdf" name="file">
                                            <label for="pxp-signup-page-password">Upload Your Resume (PDF Only)</label>
                                            <span class="fa fa-file"></span>
                                        </div>

                                        <center><button type="submit" name="save" class="btn rounded-pill pxp-sign-hero-form-cta">Continue</button></center>


                                        <!-- <a href="#" class="btn rounded-pill pxp-sign-hero-form-cta">Continue</a> -->
                                        <div class="mt-4 text-center pxp-sign-hero-form-small">
                                            Already have an account? <a href="sign-in">Sign in</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <?php 
    if(isset($_POST['save'])){
        print_r($_POST);
        //print_r($_FILES);
        // die();
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $number=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['password'];

         $tnpbane=$_FILES["file"]["tmp_name"];
         $CV=$_FILES["file"]['name'];
         $CV = preg_replace('/\\.[^.\\s]{3,4}$/', '', $CV);
         $ext = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
         $CV = rand(0000,9999) . time() . "." . $ext;
         $move = "resumes/".$CV;
         $necv=explode('.',$CV);
         //print_r($necv);
      
         if($necv[1]=='PDF' || $necv[1]=='pdf'){
             $q="select * from candidates where email='$email'";
             $re=mysqli_query($conn,$q);
             if(mysqli_num_rows($re)>0){
                  echo "<script>window.location='sign-up?email=false'</script>";
             }
             else{

        $Q="INSERT INTO `candidates`(`CV`, `first_name`, `last_name`, `phone`, `email`, `password`) 
         VALUES ('$CV','$fname','$lname','$number','$email','$password')";
            if(mysqli_query($conn,$Q)){
             
             $sql="Select * from candidates where email='$email'";
             $rew=mysqli_query($conn,$sql);
             $rews=mysqli_fetch_assoc($rew);
             $c_id=$rews['id'];
             $c_name = $rews['first_name'] . ' ' . $rews['last_name'];
                move_uploaded_file($tnpbane,$move);
             session_start();
             $_SESSION['rc_candidates'] = $c_id;
             $_SESSION['name'] = $c_name;

             $sessionName =  $_SESSION['name'];
            echo "<script>window.location='candidate/dashboard?status=Welcome $sessionName ! Thank you for successfully registering. Please update your profile.'</script>";
                         
                       

                         }
            //          if(mysqli_query($conn,$Q)){
            //          move_uploaded_file($tnpbane,$move);
            //          echo "<script>window.location='login.php'</script>";
            //  }
             

         } 
             
         }else{
             echo "<script>window.location='sign-up?cv=false'</script>";
         }
  
        


        
    }

?>


