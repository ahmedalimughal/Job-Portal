<?php require_once "session.php"; ?>


<div class="pxp-preloader"><span>Loading...</span></div>
<div class="pxp-dashboard-side-panel d-none d-lg-block">
   <div class="pxp-logo">
     <a href="./" class="pxp-animate">
          <img src="../images/logo.png">
      </a>
   </div>
   <nav class="mt-3 mt-lg-4 d-flex justify-content-between flex-column pb-100">
      <div class="pxp-dashboard-side-label">Admin tools</div>
      <ul class="list-unstyled">
         <li id="dashboard">
            <a href="dashboard">
               <span class="fa fa-home"></span>Dashboard
            </a>
         </li>
         <li id="staff">
            <a href="staff-request">
               <span class="fa fa-file-text-o"></span>Staff Request
            </a>
         </li>
         <li id="manage-jobs">
            <a href="manage-jobs">
               <span class="fa fa-briefcase"></span>Manage Jobs
            </a>
         </li>
         <li id="all-candidates">
            <a href="all-candidates">
               <span class="fa fa-user-circle-o"></span>Candidates
            </a>
         </li>
         <li id="subscribers">
            <a href="subscribers">
               <span class="fa fa-newspaper-o"></span>Subscribers
            </a>
         </li>
         <li id="applications">
            <a href="applications">
               <span class="fa fa-sticky-note-o"></span>Applications
            </a>
         </li>
         <li id="contact-us">
            <a href="contact-us">
               <span class="fa fa-address-book"></span>Contact Forms
            </a>
         </li>
         <hr>
         <li class="">
            <a href="../" target="_blank">
               <span class="fa fa-globe"></span>Go to Website &#8599;</a></li>
      </ul>
   </nav>
   <nav class="pxp-dashboard-side-user-nav-container">
      <div class="pxp-dashboard-side-user-nav">
         <div class="dropdown pxp-dashboard-side-user-nav-dropdown dropup">
            <a role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
               <div class="pxp-dashboard-side-user-nav-avatar pxp-cover" 
               style="background-image: url(../images/favicon.png);"></div>
               <div class="pxp-dashboard-side-user-nav-name"><?php echo $_SESSION['name']; ?></div>
            </a>
            <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="dashboard">Dashboard</a></li>
               <li><a class="dropdown-item" href="logout">Logout</a></li>
            </ul>
         </div>
      </div>
   </nav>
</div>
<div class="pxp-dashboard-content-header">
   <div class="pxp-nav-trigger navbar pxp-is-dashboard d-lg-none">
      <a role="button" data-bs-toggle="offcanvas" data-bs-target="#pxpMobileNav" aria-controls="pxpMobileNav">
         <div class="pxp-line-1"></div>
         <div class="pxp-line-2"></div>
         <div class="pxp-line-3"></div>
      </a>
      <div class="offcanvas offcanvas-start pxp-nav-mobile-container pxp-is-dashboard" tabindex="-1" id="pxpMobileNav">
         <div class="offcanvas-header">
            <div class="pxp-logo">
               <a href="./" class="pxp-animate">
          <img src="../images/logo.png">
      </a>
            </div>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
            <nav class="pxp-nav-mobile">
               <ul class="navbar-nav justify-content-end flex-grow-1">
                  <li class="pxp-dropdown-header">Admin tools</li>
                  <li id="dashboard">
            <a href="dashboard">
               <span class="fa fa-home"></span>Dashboard
            </a>
         </li>
         <li id="staff">
            <a href="staff-request">
               <span class="fa fa-file-text-o"></span>Staff Request
            </a>
         </li>
         <li id="manage-jobs">
            <a href="manage-jobs">
               <span class="fa fa-briefcase"></span>Manage Jobs
            </a>
         </li>
         <li id="all-candidates">
            <a href="all-candidates">
               <span class="fa fa-user-circle-o"></span>Candidates
            </a>
         </li>
         <li id="subscribers">
            <a href="subscribers">
               <span class="fa fa-newspaper-o"></span>Subscribers
            </a>
         </li>
         <li id="applications">
            <a href="applications">
               <span class="fa fa-sticky-note-o"></span>Applications
            </a>
         </li>
         <li id="contact-us">
            <a href="contact-us">
               <span class="fa fa-address-book"></span>Contact Forms
            </a>
         </li>
         <hr>
         <li class="">
            <a href="../"><span class="fa fa-globe"></span>Go to Website</a></li>
               </ul>
            </nav>
         </div>
      </div>
   </div>
   <nav class="pxp-user-nav pxp-on-light">
      <!-- <a href="company-dashboard-new-job.html" class="btn rounded-pill pxp-nav-btn">Post a Job</a> -->
      <div class="dropdown pxp-user-nav-dropdown">
         <a role="button" class="dropdown-toggle" data-bs-toggle="dropdown">
            <div class="pxp-user-nav-avatar pxp-cover" style="background-image: url(../images/favicon.png);"></div>
            <div class="pxp-user-nav-name d-none d-md-block"><?php echo $_SESSION['name']; ?></div>
         </a>
         <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="dashboard">Dashboard</a></li>
            <li><a class="dropdown-item" href="logout">Logout</a></li>
         </ul>
      </div>
   </nav>
</div>