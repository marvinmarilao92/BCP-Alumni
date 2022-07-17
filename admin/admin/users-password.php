<?php
include('session.php');

	//connection
	$conn = new mysqli('localhost', 'root', '', 'sis_db');

?>
<!DOCTYPE html>
<html lang="en">
<title>DATMS | Profile</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>

  <!-- ======= Header ======= -->
  <?php include ('core/header.php');//Design for  Header?>
  <?php $page = 'PRO'; include ('core/side-nav.php');//Design for sidebar?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../assets/img/BCPlogo.png" alt="Profile" >
              <h2><?php echo $verified_session_firstname . ", " . $verified_session_lastname ?></h2>
              <small><?php echo $verified_session_role?></small>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade profile-overview" id="profile-overview">
                  <h5 class="card-title">About</h5>
                  <p class="small fst-italic"><?php echo $verified_session_about?>.</p>

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_firstname . " " . $verified_session_lastname ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Company</div>
                    <div class="col-lg-9 col-md-8">Bestlink College of The Philippines</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Department</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_office?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Subsystem</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_department?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Position</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_role?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Address</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_address?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact Number</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_contact?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $verified_session_email?></div>
                  </div>

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                </div>

                <div class="tab-pane show active fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST" action="function/change_pass.php">

                    <!-- <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="currentPassword" type="password" class="form-control" id="currentPassword"  required>
                      </div>
                    </div> -->

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword" required>
                      </div>
                    </div>
                    <?php
                      if(isset($_GET['error'])){
                        ?>
                        <div class="alert alert-danger text-center" style="margin-top:20px;">
                          <?php echo $_GET['error']; ?>
                        </div>
                        <?php

                        unset($_GET['error']);
                      }
                      if(isset($_GET['success'])){
                        ?>
                        <div class="alert alert-success text-center" style="margin-top:20px;">
                          <?php echo $_GET['success']; ?>
                        </div>
                        <?php

                        unset($_GET['success']);
                      }
                    ?>
                    <div class="text-center">
                      <button type="submit" name="update" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
</body>

</html>