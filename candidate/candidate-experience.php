<?php  

require_once "session.php";

?>
<!doctype html>
<html lang="en" class="pxp-root">
<head>
    <?php include '../includes/website-info.php'; ?>
    <?php include 'links.php'; ?>
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("li#experience").addClass("pxp-active");
});

<?php 
$id = $_SESSION['rc_candidates'];

$projects = array();
$result = mysqli_query($conn,"SELECT * FROM `user_experience` WHERE user_id = $id");
?>

</script>
        <title><?php echo $website_name; ?> - Candidate Experience</title>
    </head>
    <body style="background-color: var(--pxpSecondaryColorLight);" id="dashboard">

            <?php include 'sidebar.php'; ?>

        <div class="pxp-dashboard-content">
            

            <div class="pxp-dashboard-content-details">
                <h1>Experience</h1>

                <?php if (isset($_GET['sucessfull'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong><?=$_GET['sucessfull']?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                         <?php } ?>

                         <?php if (isset($_GET['delete'])) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong><?=$_GET['delete']?></strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                         <?php } ?>

                <div class="mt-4 mt-lg-5">
                        <div class="table-responsive">
                            <?php  if ($result->num_rows > 0) { ?>
                            <table class="table align-middle">
                                <thead>
                                <tr>
                                    <th style="width: 10%;">Company Name</th>
                                    <th style="width: 20%;">Designation</th>
                                    <th style="width: 10%;">Start Date</th>
                                    <th style="width: 10%;">End Date</th>
                                    <th style="width: 10%;">Roles</th>
                                    <th style="width: 30%;">location</th>
                                </tr>
                            </thead>
                                <?php 
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {

                                        $$dateString = $row['passing_year'];
                                        $dateTime = new DateTime($dateString);
                                        $formattedDate = $dateTime->format("M-Y");   
                                         
                                         ?>

                                <tr>
                                    <td style="width: 25%;">
                                        <div class="pxp-candidate-dashboard-experience-title">
                                            <?php echo $row['company_name'] ?>
                                        </div>
                                    </td>
                                    <td style="width: 25%;">
                                        <div class="pxp-candidate-dashboard-experience-school">
                                            <?php echo $row['designation'] ?>
                                        </div>
                                    </td>
                                    <td style="width: 10%;">
                                        <div class="pxp-candidate-dashboard-experience-school">
                                            <?php echo $row['start_date'] ?>
                                        </div>
                                    </td>
                                    <td style="width: 15%;">
                                        <?php
                                            if($row['currently_working'] == 'yes'){
                                                ?>
                                                <div class="pxp-candidate-dashboard-experience-time bg-success rounded-pill text-light px-1 pt-1 pb-1 text-center">
                                            Currently Working
                                        </div>
                                        <?php
                                                }else{
                                                ?>

                                        <div class="pxp-candidate-dashboard-experience-time">
                                            <?php echo $row['end_date'] ?>
                                        </div>
                                        <?php
                                                }
                                                ?>
                                    </td>
                                    <td style="width: 15%;">
                                        <div class="pxp-candidate-dashboard-experience-time">
                                            <?php echo $row['your_roles']; ?>
                                        </div>
                                    </td>
                                    <td style="width: 15%;">
                                        <div class="pxp-candidate-dashboard-experience-time">
                                            <?php echo $row['location']; ?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="pxp-dashboard-table-options">
                                            <ul class="list-unstyled" style="float:left;">
                                                <li style="background-color:var(--pxpMainColorLight); border-radius: 3px; padding: 2px 5px;">
                                                    <a href="delete-experience?id=<?php echo $row['id']; ?>"><span class="fa fa-trash-o"></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                 }
                                 } else {
                                   ?>
                                   <hr>
                                    <h2 style="text-align:center;" class="pt-2"><a>No available experience record is found. Kindly Add</a></h2>
                                    <hr>
                                   <?php
                                 }
                                 
                                 ?>


                            </table>

                        </div>


                        <form action="add-experience-action.php" method="post">

                        <div class="row mt-3 mt-lg-4">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-title" class="form-label">Company Name</label>
                                    <input type="text" id="pxp-candidate-edu-title" class="form-control" 
                                    placeholder="E.g. Google" name="company_name" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-school" class="form-label">Designation</label>
                                    <input type="text" id="pxp-candidate-edu-school" class="form-control" 
                                    placeholder="E.g. Senior Cloud Engineer" name="designation" required>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="selectOption" class="form-label">I am currently working in this role</label>
                                      <select id="selectOption" class="form-control" onchange="toggleDateInput()" 
                                      name="currently_working">
                                        <option selected disabled> Select</option>
                                        <option value="yes">Yes</option>
                                        <option value="no">No</option>
                                      </select>
                                </div>
                            </div>
                            <div class="col-md-2" id="myDiv">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-time" class="form-label">Start Date</label>
                                    <input type="date" id="dateInput" class="form-control" 
                                    placeholder="E.g. 30-12-2023" name="start_date" required>
                                </div>
                            </div>
                            <div class="col-md-2" id="dateInputContainer">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-title" class="form-label">End Date</label>
                                    <input type="date" id="pxp-candidate-edu-timea" class="form-control" 
                                    placeholder="E.g. 30-12-2023" name="end_date" required>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-title" class="form-label">Your Roles</label>
                                    <textarea class="form-control" placeholder="E.g. Web Solutions Engineer I, Google Customer Solutions" name="your_roles" required id="pxp-candidate-edu-title" style="height: 132px;"></textarea>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="pxp-candidate-edu-title" class="form-label">Location</label>
                                    <input type="text" id="pxp-candidate-edu-title" class="form-control" 
                                    placeholder="E.g. Mountain View, California" name="location" required>
                                </div>
                            </div>
                            
                            
                            
                            <div class="col-md-12 mt-2">
                                <div class="mt-4">
                                    <button class="btn rounded-pill pxp-subsection-cta" name="submit">Add Experience</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                
            </div>

            <?php include 'footer.php' ?>
        </div>

        <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.bundle.min.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/nav.js"></script>
        <script src="../js/Chart.min.js"></script>
        <script src="../js/main.js"></script>
        <script>
            function toggleDateInput() {
              var selectElement = document.getElementById('selectOption');
              var dateInputContainer = document.getElementById('dateInputContainer');

              // Check if the selected value is 'yes'
              if (selectElement.value === 'yes') {
                dateInputContainer.style.display = 'none'; // Hide the date input
                start_date.style.display = 'none'; // Hide the date input
              } else {
                dateInputContainer.style.display = 'block'; // Show the date input
              }
            }
        </script>
        <script>
          $(document).ready(function() {
            $('#selectOption').change(function() {
              var optionValue = $(this).val();

              if (optionValue === 'yes') {
                // If the option value is 'yes', add the new class and remove the initial class
                $('#myDiv').removeClass('col-md-2').addClass('col-md-4');
                $('#pxp-candidate-edu-timea').removeAttr("required");
              } 
              else {
                // If the option value is not 'yes', remove the new class and add the initial class
                $('#myDiv').removeClass('col-md-4').addClass('col-md-2');
              }
            });
          });
        </script>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </body>

<!-- Mirrored from pixelprime.co/themes/jobster/candidate-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 22 Nov 2023 16:58:45 GMT -->
</html>