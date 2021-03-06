<!-- Login PHP Function -->
<?php
  require_once "config.php";
    session_start();
  $error = "";
  if($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // username and password sent from form 
    date_default_timezone_set("asia/manila");
		$date = date("M-d-Y h:i:s A",strtotime("+0 HOURS"));
    $myusername = mysqli_real_escape_string($link,$_POST['username']);
    $mypassword = mysqli_real_escape_string($link,$_POST['password']); 

      // $sql = "SELECT * FROM users WHERE id_number = '$myusername' and password = '$mypassword'";
      // $result = mysqli_query($link,$sql);
      // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $count = mysqli_num_rows($result);

      $sql=mysqli_query($link,"SELECT * FROM users WHERE id_number = '$myusername'")or die(mysqli_error($link));
		  $row=mysqli_fetch_array($sql);
      $count = mysqli_num_rows($sql);
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 0) {
        $error = "Your Username or Password is invalid";
      }else {
        //password checking
        if(password_verify($mypassword, $row["password"])){
          //Check department and role
         $sql1 = "SELECT * FROM user_information where id_number = '$myusername' ";
         if($result1 = mysqli_query($link, $sql1)){
           if(mysqli_num_rows($result1) > 0){
             while($row1 = mysqli_fetch_array($result1)){
               $id=$row1['id'];
               $admin=$row1['id_number'];
               $fname=$row1['firstname'].' '.$row1['middlename'].'.'.' '.$row1['lastname'];     
               switch($row1["department"]){
                 case "User Management":
                   //statement
                   switch($row1["role"]){
                     case "User Management Administrator":
                       //statement
                       $_SESSION['session_username'] = $myusername;
 
                       if (!empty($_SERVER["HTTP_CLIENT_IP"])){
                           $ip = $_SERVER["HTTP_CLIENT_IP"];
                         }elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
                           $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
                         }else{
                           $ip = $_SERVER["REMOTE_ADDR"];
                           $host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
                            $remarks="account has been logged in";  
                            mysqli_query($link,"INSERT INTO audit_trail(user_id,account_no,action,action_name,ip,host,login_time) VALUES('$id','$admin','$remarks','$fname','$ip','$host','$date')")or die(mysqli_error($link));
                           
                         }
                       
                       header("location: ../admin/index.php");
                       break;
                   }
                   break;
               }
             }
             // Free result set
             mysqli_free_result($result1);
           }
           else{
             // The user was not in the list of departments above, so it means the the user is a student
             // Validate if the user was actually a student
             $sql2 = "SELECT * FROM student_information where id_number = '$myusername'";
             if($result2 = mysqli_query($link, $sql2)){
               if(mysqli_num_rows($result2) > 0){
                 while($row2 = mysqli_fetch_array($result2)){
                   //Add data to session
                   $_SESSION['session_username'] = $myusername;
                   $_SESSION['session_department'] = "Student";
                   header("location: Student/index.php");
                 }
                 // Free result set
                 mysqli_free_result($result2);
               }
             }
           }
         }
        }//end of password checking
        else{
          $error = "Your Username or Password is invalid";
        }
      }//end else
    }
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include ('core/css-links.php');//css connection?>
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <img src="../assets/img/BCPlogo.png" alt="" style=" width: 120px;">
              <div class="d-flex justify-content-center py-4">

                <a href="dynamic-login.php" class="logo d-flex align-items-center w-auto">
                  <span class="d-none d-lg-block">SCHOOL INFORMATION SYSTEM</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Get access with your subsystem using username & password to login</p>
                  </div>
                 
                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <br>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <!-- <input type="password" name="password" autocomplete="current-password" required="" id="id_password">
                      <i class="far fa-eye" id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i> -->
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <!-- Error Message -->
                    <?php 
                      if(!$error==""){
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                        echo  $error;
                        echo "</div>";
                      }
                    ?>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>


                </div>
              </div>
              <div class="copyright">
                <center>
                  &copy;Copyright <a href="https://bcp.edu.ph/home" target="_blank " data-bs-toggle="tooltip" data-bs-placement="top" 
                  title="Access BCP Website">Bestlink College of the Philippines</a> All Rights Reserved
                </center>                 
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>
  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#id_password');
 
  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});  
  </script>
</body>

</html>