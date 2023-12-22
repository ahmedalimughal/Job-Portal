<!doctype html>
<html lang="en" class="pxp-root">
<head>
            <?php include 'includes/header-links.php'; ?>
        <title>Sign in | <?php echo $website_name; ?></title>
</head>
    <body>



        <section class="pxp-hero vh-100" style="background-color: var(--pxpMainColorLight);">
            <div class="row align-items-center pxp-sign-hero-container">
                <div class="col-xl-4 pxp-column">
                    <div class="pxp-sign-hero-fig text-center pb-100 pt-100">
                        <img src="images/signin-big-fig.png" alt="Sign In">
                        <h2 class="mt-4 mt-lg-5">Welcome back!</h2>
                        <div class="pxp-logo">
                        <a href="index" class="pxp-animate"><span style="color: var(--pxpMainColor)">Employment </span>Tank</a>
                    </div>

                    </div>
                </div>
                <div class="col-xl-8 pxp-column pxp-is-light">
                    <div class="pxp-sign-hero-form pb-100 pt-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-xl-7 col-xxl-5">
                                <?php if (isset($_GET['email'])) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
                                        <?=$_GET['email']?>
                                        </div>
                         <?php } ?>
                                <div class="pxp-sign-hero-form-content">
                                    <h5 class="text-center">Sign In</h5>
                                    <form class="mt-4" action="" method="post">
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="pxp-signin-page-email" placeholder="Email address" name="email">
                                            <label for="pxp-signin-page-email">Email address</label>
                                            <span class="fa fa-envelope-o"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" class="form-control" id="pxp-signin-page-password" placeholder="Password" name="password">
                                            <label for="pxp-signin-page-password">Password</label>
                                            <span class="fa fa-lock"></span>
                                        </div>
                                        
                                        <center><button type="submit" name="submit"class="btn rounded-pill pxp-modal-cta">Continue</button></center>
                                        <div class="mt-4 text-center pxp-sign-hero-form-small">
                                            New to <?php echo $website_name; ?>? <a href="sign-up">Create an account</a>
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
if(isset($_POST['submit'])){
   
    $email=$_POST['email'];
    $password=$_POST['password'];
    $Q="Select * from `candidates` where `email`='$email'";
    $re=mysqli_query($conn,$Q);

    if(mysqli_num_rows($re)>0){
        $row=mysqli_fetch_assoc($re);
        if($row['password']==$password){
            $_SESSION['rc_candidates'] = $row['id'];  
            $c_name = $row['first_name'] . ' ' . $row['last_name'];
            $_SESSION['name'] = $c_name;


           echo "<script>window.location='candidate/dashboard'</script>";
        }else{
            echo "<script>window.location='sign-in?email=wrong credentials'</script>";
        }
    }else{
    echo mysqli_error($conn);
         echo "<script>window.location='sign-in?email=wrong credentials'</script>";
    }
}


?>  
       