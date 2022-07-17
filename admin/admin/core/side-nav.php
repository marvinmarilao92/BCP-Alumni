 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-heading">Module</li>

  <li class="nav-item">
    <a href="index.php" class="<?php if($page=='dashboard'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-bar-chart-line"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-layout-text-window-reverse"></i><span>Student Information</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="<?php if($col=='reports'){echo 'nav-content collapse show';}else{echo 'nav-content collapse';}?> " data-bs-parent="#sidebar-nav">
          <li>
          <a href="students.php" class="<?php if($page=='UR'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Student Logbook</span>
            </a>
          </li>
          <li>
          <a href="add-students.php" class="<?php if($page=='DR'){echo 'active';}?>">
            <i class="bi bi-circle"></i><span>Add Student</span>
            </a>
          </li>
        </ul>
      </li><!-- End Reports Nav -->

  <li class="nav-heading">Settings</li>

  <li class="nav-item">
    <a href="account.php" class="<?php if($page=='FAQ'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-person-plus"></i>
      <span>Account Management</span>
    </a>
  </li><!-- End Contact Page Nav -->

  <li class="nav-item">
  <a href="create_office.php" class="<?php if($page=='department'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-book"></i>
      <span>Office</span>
    </a>
  </li><!-- End Add office Page Nav -->

  <li class="nav-item">
  <a href="users-profile.php" class="<?php if($page=='PRO'){echo 'nav-link';}else{echo 'nav-link collapsed';}?>" >
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

 

</ul>

</aside><!-- End Sidebar-->