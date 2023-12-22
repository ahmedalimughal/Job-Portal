<section class="pxp-hero" style="background-color: var(--pxpMainColorLight);">
            <div class="row align-items-center pxp-sign-hero-container">
                <div class="col-xl-4 pxp-column">
                    <div class="pxp-sign-hero-fig text-center pb-50 pt-5">
                        <img src="images/signup-big-fig.png" alt="Sign up">
                        <h2 class="mt-4 mt-lg-5">Submit your Job Request</h2>
                        <div class="pxp-logo">
                        <a href="./" class="pxp-animate"><span style="color: var(--pxpMainColor)">Employment </span>Tank</a>
                    </div>
                    </div>
                </div>
                <div class="col-xl-8 pxp-column pxp-is-light">
                    <div class="pxp-sign-hero-form pb-100 pt-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-xl-7 col-xxl-10">
                                <div class="pxp-sign-hero-form-content">
                                     <?php if (isset($_GET['success'])) { ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?=$_GET['success']?>
                                        </div>
                                    <?php } ?>
                                    <form class=""  action="" method="post" enctype="multipart/form-data" >
                                        

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pxp-signup-page-full" placeholder="Phone Number" name="f_name" required="">
                                            <label for="pxp-signup-page-full">Full Name</label>
                                            <span class="fa fa-user"></span>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="pxp-signup-page-phone" placeholder="Phone Number" name="p_number" required="">
                                            <label for="pxp-signup-page-phone">Phone Number</label>
                                            <span class="fa fa-phone"></span>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control" id="pxp-signup-page-email" placeholder="Email address" name="email" required="">
                                            <label for="pxp-signup-page-email">Email address</label>
                                            <span class="fa fa-envelope-o"></span>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pxp-signup-page-f_name" placeholder="First Name" name="c_name" required="">
                                                    <label for="pxp-signup-page-f_name">Company Name</label>
                                                    <span class="fa fa-building-o"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="pxp-signup-page-Lname" placeholder="Last Name" name="position" required="">
                                                    <label for="pxp-signup-page-Lname">Position</label>
                                                    <span class="fa fa-level-up"></span>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-floating mb-3">
                                            <select class="form-control" id="countries" name="location" >
                                                <option selected disabled> Select your Country</option>
                                            </select>
                                            <label for="countries">Location</label>
                                            <span class="fa fa-map-marker"></span>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="pxp-signup-page-email" placeholder="Salary (USD)" name="salary" required="">
                                            <label for="pxp-signup-page-email">Salary in USD</label>
                                            <span class="fa fa-money"></span>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <textarea class="form-control " id="contact-us-message" placeholder="Email address" name="message" required="" style="height:200px;"></textarea>
                                            <label for="contact-us-message">    </label>
                                            <span class="fa fa-comment"></span>
                                        </div>

                                        <center><button type="submit" name="save" class="btn rounded-pill pxp-section-cta">Submit Your Request</button></center>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php 

include 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
    
    // Retrieve form data and sanitize inputs
    $f_name = isset($_POST['f_name']) ? htmlspecialchars($_POST['f_name']) : '';
    $p_number = isset($_POST['p_number']) ? htmlspecialchars($_POST['p_number']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $c_name = isset($_POST['c_name']) ? htmlspecialchars($_POST['c_name']) : '';
    $position = isset($_POST['position']) ? htmlspecialchars($_POST['position']) : '';
    $location = isset($_POST['location']) ? htmlspecialchars($_POST['location']) : '';
    $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
    $salary = isset($_POST['salary']) ? htmlspecialchars($_POST['salary']) : '';

    // File Upload
    //$file_name = $_FILES['resume']['name'];
    //$file_tmp = $_FILES['resume']['tmp_name'];
    //$upload_directory = 'resumes/'; // Specify your upload directory
    //$file_path = $upload_directory . $file_name;

    // Move the uploaded file to the specified directory
    //move_uploaded_file($file_tmp, $file_path);

    // SQL query to insert form data into the database
    $sql = "INSERT INTO staff_request 
    (`location`, `name`, `c_name`, `email`, `phone`, `position`, `message`, `salary`) VALUES 
    ('$location','$f_name','$c_name','$email','$p_number','$position','$message' , '$salary' )";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
        echo "<script>window.location='employer?success=Request Submitted Successfully! 🎉 Will Contact you Soon'</script>";
        //header("location: all-jobs?sucessfull= You hava Sucessfully Applied on Job");
    } else {
        // If there's an error in the SQL query
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>


        <style type="text/css">
            .pxp-hero {
                position: relative;
                overflow: hidden;
                min-height: auto;
            }
        </style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
      const countriesSelect = document.getElementById('countries');

      // Fetch countries from REST Countries API
      fetch('https://restcountries.com/v2/all')
        .then(response => response.json())
        .then(data => {
          // Populate the select element with countries
          data.forEach(country => {
            const option = document.createElement('option');
            option.value = country.alpha2Code;
            option.text = country.name;
            countriesSelect.appendChild(option);
          });
        })
        .catch(error => console.error('Error fetching countries:', error));
    });
  </script>


