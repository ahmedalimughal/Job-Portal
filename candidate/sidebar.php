<?php  

require_once "session.php";



 $id = $_SESSION['rc_candidates'];

 // Retrieve image names
 $sql = "SELECT * FROM `candidates` WHERE id = $id;";
 $prof = $conn->query($sql);

 if ($prof) {
     $res = $prof->fetch_assoc();
     
     $profiles = $res['profile'];
     $profile_user = "../user-profiles/".$profiles; 

 }
?>


<div class="pxp-preloader"><span>Loading...</span></div>
<div class="pxp-dashboard-side-panel d-none d-lg-block">
   <div class="pxp-logo">
      <a href="index" class="pxp-animate">
         <a href="./" class="pxp-animate">
          <img src="../images/logo.png">
      </a>
      </a>
   </div>
   <nav class="mt-3 mt-lg-4 d-flex justify-content-between flex-column pb-100">
      <div class="pxp-dashboard-side-label">Candidate Tools</div>
      <ul class="list-unstyled">

         <li id="dashboard" class=""><a href="dashboard"><span class="fa fa-home"></span>Dashboard</a></li>
         <li id="profile" class=""><a href="candidate-profile"><span class="fa fa-pencil"></span>Edit Profile</a></li>
         <li id="application" class=""><a href="candidate-applications"><span class="fa fa-file-text-o"></span>Apllications</a></li>
         <li id="education" class=""><a href="candidate-education"><span class="fa fa-graduation-cap "></span>Education</a></li>
         <li id="experience" class=""><a href="candidate-experience"><span class="fa fa-history"></span>Experience</a></li>
         <hr>
         <li class="">
            <a href="../"><span class="fa fa-globe"></span>Go to Website</a></li>
      </ul>
   </nav>
</div>
<div class="pxp-dashboard-content-header pxp-is-candidate">
   <div class="pxp-nav-trigger navbar pxp-is-dashboard d-lg-none">
      <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
         <div class="pxp-line-1"></div>
         <div class="pxp-line-2"></div>
         <div class="pxp-line-3"></div>
      </a>
      <div class="offcanvas offcanvas-start pxp-nav-mobile-container pxp-is-dashboard pxp-is-candidate" tabindex="-1" id="pxpMobileNav">
         <div class="offcanvas-header">
            <div class="pxp-logo">
               <a href="index" class="pxp-animate"><span style="color: var(--pxpMainColor)">j</span>obster

            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
            <nav class="pxp-nav-mobile">
               <ul class="navbar-nav justify-content-end flex-grow-1">
                 <li id="dashboard" class=""><a href="dashboard"><span class="fa fa-home"></span>Dashboard</a></li>
         <li id="profile" class=""><a href="candidate-profile"><span class="fa fa-pencil"></span>Edit Profile</a></li>
         <li id="application" class=""><a href="candidate-applications"><span class="fa fa-file-text-o"></span>Apllications</a></li>
         <li id="education" class=""><a href="candidate-education"><span class="fa fa-graduation-cap "></span>Education</a></li>
         <li id="experience" class=""><a href="candidate-experience"><span class="fa fa-history"></span>Experience</a></li>
         <li class="">
            <a href="../"><span class="fa fa-globe"></span>Go to Website</a></li>
               </ul>
            </nav>
         </div>
      </div>
   </div>
   <nav class="pxp-user-nav pxp-on-light">
      <div class="dropdown pxp-user-nav-dropdown">
         <a role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
            <div class="pxp-user-nav-avatar pxp-cover" 
               style="background-image: url(<?php echo $profile_user ?>);">
            </div>
            <div class="pxp-user-nav-name d-none d-md-block"><?php echo $_SESSION['name']; ?></div>
         </a>
         <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="logout">Logout</a></li>
         </ul>
      </div>
   </nav>
</div>