<?php 
// Initialize the session
require_once "../includes/database.php";
 
// Check if the user is logged in, otherwise redirect to login page
session_start();
      if (!isset($_SESSION['username']) && !isset($_SESSION['name'])) {

}
else{
      header("Location: dashboard");
      exit;
}
?>
<style type="text/css">
    img.logo {
    width: 100% !important; 
}
.pxp-hero {
    overflow-y: scroll !important;
}
.pxp-hero {
    min-height: 0 !important;
}
</style>

<!doctype html>
<html lang="en" class="pxp-root">
<head>
            <?php include 'header-links.php'; ?>
        <title>Administration | <?php echo $website_name; ?></title>
</head>
    <body>



        <section class="pxp-hero" style="background-color: var(--pxpMainColorLight);">
            <div class="row align-items-center pxp-sign-hero-container">
                <div class="col-xl-4 pxp-column">
                    <div class="pxp-sign-hero-fig text-center pb-100 pt-100">
                        <img src="../images/signin-big-fig.png" alt="Sign In">
                        <h2 class="mt-4 mt-lg-5">Administration</h2>
                        <div class="pxp-logo">
                         <a href="./" class="pxp-animate">
                              <img src="../images/logo.png" class="logo">
                          </a>
                       </div>

                    </div>
                </div>
                <div class="col-xl-8 pxp-column pxp-is-light">
                    <div class="pxp-sign-hero-form pb-100 pt-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-xl-7 col-xxl-5">
                                <?php if (isset($_GET['email'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <?=$_GET['email']?>
                                        </div>
                         <?php } ?>
                                <div class="pxp-sign-hero-form-content">

                                    <h5 class="text-center">Sign In</h5>

                                    <form class="mt-4" action="" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pxp-signin-page-email" placeholder="Email address" name="username">
                                            <label for="pxp-signin-page-email">Email address</label>
                                            <span class="fa fa-envelope-o"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="pxp-signin-page-password" placeholder="Password" name="password">
                                            <label for="pxp-signin-page-password">Password</label>
                                            <span class="fa fa-lock"></span>
                                        </div>
                                        
                                        <center><button type="submit" name="submit"class="btn rounded-pill pxp-modal-cta">Continue</button>
                                            <div class="mt-4">
                                                <a href="../" target="_blank"><span class="fa fa-long-arrow-left"></span>
                                                Visite Website <span class="fa fa-globe"></span></a>
                                            </div></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php 
if(isset($_POST['submit'])){
   
    $username=$_POST['username'];
    $password=$_POST['password'];
    $Q="Select * from `users` where `username`='$username'";
    $re=mysqli_query($conn,$Q);

    if(mysqli_num_rows($re)>0){
        $row=mysqli_fetch_assoc($re);
        if($row['password']==$password){
            $_SESSION['admin'] = $row['id'];  
            $_SESSION['name'] = $row['username'];
           echo "<script>window.location='dashboard'</script>";
        }else{
            echo "<script>window.location='index?email=wrong credentials'</script>";
        }
    }else{
    echo mysqli_error($conn);
         echo "<script>window.location='index?email=wrong credentials'</script>";
    }
}


?>  
       