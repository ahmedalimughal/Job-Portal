        <div class="modal fade pxp-user-modal" id="pxp-signin-modal" aria-hidden="true" aria-labelledby="signinModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="pxp-user-modal-fig text-center">
                            <img src="images/signin-fig.png" alt="Sign in">
                        </div>
                        <h5 class="modal-title text-center mt-4" id="signinModal">Welcome back!</h5>
                        <form class="mt-4" action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control" id="pxp-signin-email" placeholder="Email address" name="email">
                                <label for="pxp-signin-email">Email address</label>
                                <span class="fa fa-envelope-o"></span>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="pxp-signin-password" placeholder="Password" name="password">
                                <label for="pxp-signin-password">Password</label>
                                <span class="fa fa-lock"></span>
                            </div>
                   
                             <center><button type="submit" name="submit"class="btn rounded-pill pxp-modal-cta">Sign In</button></center>
                            <div class="mt-4 text-center pxp-modal-small">
                                New to <?php echo $website_name ?>? <a role="button" class=""href="sign-up" >Create an account</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php 
if(isset($_POST['submit'])){
   
    $email=$_POST['email'];
    $password=$_POST['password'];
    $Q="Select * from `candidates` where `email`='$email'";
    $re=mysqli_query($conn,$Q);

    if(mysqli_num_rows($re)>0){
        $row=mysqli_fetch_assoc($re);
        if($row['password']==$password){
            $_SESSION['rc_candidates']=$row['id'];  
            $c_name = $row['first_name'] . ' ' . $row['last_name'];
            $_SESSION['name'] = $c_name;
           echo "<script>window.location='candidate/dashboard'</script>";
        }else{
            echo "<script>window.location='sign-in.php?email=Your credentials are incorrect.'</script>";
        }
    }else{
    echo mysqli_error($conn);
         echo "<script>window.location='sign-in.php?email=false'</script>";
    }
}


?>  