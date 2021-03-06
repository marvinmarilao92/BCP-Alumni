<?php
    include('session.php');

    // Define variables and initialize with empty values
    $employee_id = "";
    $first_name = "";
    $last_name = "";
    $middle_name = "";
    $address = "";
    $email = "";
    $contact = "";
    $office = "";
    $department = "";
    $role = "";
    $about = "";

    $current_year = date("y");
    
    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      
      //agun implementation for student number
      $sqll = "SELECT id FROM user_information ORDER BY id DESC Limit 1";
      if($resultt = mysqli_query($link, $sqll)){
        if(mysqli_num_rows($resultt) == 0){
          $employee_id = "" . $current_year . "000001";
        }
        else if(mysqli_num_rows($resultt) > 0){
          while($roww = mysqli_fetch_array($resultt)){
            if($roww['id'] < 9){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "00000" . $new_id;
            }
            else if ($roww['id'] == 9){
              $employee_id = "" . $current_year . "000010";
            }
            else if ($roww['id'] < 99){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "0000" . $new_id;
            }
            else if ($roww['id'] == 99){
              $employee_id = "" . $current_year . "000100";
            }
            else if ($roww['id'] < 999){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "000" . $new_id;
            }
            else if ($roww['id'] == 999){
              $employee_id = "" . $current_year . "001000";
            }
            else if ($roww['id'] < 9999){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "00" . $new_id;
            }
            else if ($roww['id'] == 9999){
              $employee_id = "" . $current_year . "010000";
            }
            else if ($roww['id'] < 99999){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "0" . $new_id;
            }
            else if ($roww['id'] == 99999){
              $employee_id = "" . $current_year . "100000";
            }
            else if ($roww['id'] < 999999){
              $new_id = $roww['id'] + 1;
              $employee_id = "" . $current_year . "" . $new_id;
            }
          }
        }
      }
      
      // $employee_id = mysqli_real_escape_string($link,trim($_POST["employee_id"]));

      $first_name = mysqli_real_escape_string($link,trim($_POST["first_name"]));
      $last_name = mysqli_real_escape_string($link,trim($_POST["last_name"]));
      $middle_name = mysqli_real_escape_string($link,trim($_POST["middle_name"]));
      $address = mysqli_real_escape_string($link,trim($_POST["address"]));
      $email = mysqli_real_escape_string($link,trim($_POST["email"]));
      $contact = mysqli_real_escape_string($link,trim($_POST["contact"]));
      $office = mysqli_real_escape_string($link,trim($_POST["office"]));
      $role = mysqli_real_escape_string($link,trim($_POST["role"]));
      $about = mysqli_real_escape_string($link,trim($_POST["about"]));
      $account_status = "Active";
      $password = password_hash("#ChangeMe01!", PASSWORD_BCRYPT, array('cost' => 12));  //PASSWORD_ARGON2I//PASSWORD_ARGON2ID
      //Get department name
      $department = mysqli_real_escape_string($link,trim($_POST["department"]));
      // Attempt select query execution
      $sql3 = "SELECT department FROM department where id = " . mysqli_real_escape_string($link,trim($_POST["department"])) . " ";
      if($result3 = mysqli_query($link, $sql3)){
        if(mysqli_num_rows($result3) > 0){
          while($row3 = mysqli_fetch_array($result3)){
            $department1 = mysqli_real_escape_string($link,trim($row3["department"]));
          }
          // Free result set
          mysqli_free_result($result3);
        }
      }

      //Check if the user number is not existing in the database
      $sql1 = "SELECT id FROM user_information WHERE id_number = '$employee_id'";
      $result = mysqli_query($link,$sql1);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      //Check if the user number is not existing in the database
      $sql2 = "SELECT id FROM users WHERE id_number = '$employee_id'";
      $result2 = mysqli_query($link,$sql2);
      $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
      $count2 = mysqli_num_rows($result2);
      
      // If the user number is not existing in the database, count must be 0
      if($count == 0 && $count2 == 0) {
        // Prepare an insert statement
        $sql = "INSERT INTO user_information (id_number, firstname, lastname, middlename, email, contact, address, office, department, role, account_status, about) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
          // Bind variables to the prepared statement as parameters
          mysqli_stmt_bind_param($stmt, "issssissssss", $employee_id, $first_name, $last_name, $middle_name, $email, $contact, $address, $office, $department1, $role, $account_status, $about);

          // Attempt to execute the prepared statement
          if(mysqli_stmt_execute($stmt)){
            //Create user account
            $sql = "INSERT INTO users (id_number, password) VALUES (?, ?)";

            if($stmt1 = mysqli_prepare($link, $sql)){
              // Bind variables to the prepared statement as parameters
              mysqli_stmt_bind_param($stmt1, "ss", $employee_id, $password);

              // Attempt to execute the prepared statement
              if(mysqli_stmt_execute($stmt1)){
                  // Records created successfully. Redirect to landing page
                  header("location: account.php");
                  exit();
              } else{
                  echo "Oops! Something went wrong. Please try again later.";
              }
            }
          } else{
              echo "Oops! Something went wrong. Please try again later.";
          }
        }

        // Close statement
        mysqli_stmt_close($stmt);

        // Close connection
        mysqli_close($link);

      }else {
        $employee_id_err = "Employee ID is already existing";
      }
    }
?>
<!DOCTYPE html>
<html lang="en">
<title>Alumni | Add Account</title>
<head>
  <?php include ('core/css-links.php');//css connection?>
</head>

<body>
<!-- Header -->
<?php include ('core/header.php');//Design for  Header?>
<!-- end of header -->

<!-- Side navbar -->
<?php $page = 'FAQ'; include ('core/side-nav.php');//Design for sidebar?>
<!-- end of side navbar -->

<!-- Main -->
  <main id="main" class="main">
  <div class="pagetitle">
      <h1>Add New Account</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Add New Account</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section faq">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="col-lg-12">
              <div class="form-group col-md-2 btn-lg" >
                  <h4 class="card-title">Fill Out the Following</h4>
              </div>
            </div>
          <div class="card-body">
   <!-- No Labels Form -->
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="row g-3">
          
            <div class="col-md-5">
              <div class="form-floating">
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" style="text-transform:capitalize;" onkeypress="return isTextKey(event)" required>
                <label for="floatingName">First Name</label>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-floating">
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" style="text-transform:capitalize;" onkeypress="return isTextKey(event)" required>
                <label for="floatingName">Last Name</label>
              </div>
            </div>   
            <div class="col-md-2">
              <div class="form-floating">
                <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Initial (Optional)" maxlength="1" style="text-transform:uppercase" onkeypress="return isTextKey(event)" required>
                <label for="floatingName">Middle Initial (Optional)</label>
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-floating">
                <input type="text" class="form-control" name="address" id="address" placeholder="address" style="text-transform:capitalize;" required>
                <label for="floatingName">Address</label>
              </div>
            </div>  
            <div class="col-md-3">
              <div class="form-floating">
                <input type="email" class="form-control" name="email" id="email" placeholder="email" required>
                <label for="floatingName">Email</label>
              </div>
            </div>  
            <div class="col-md-3">
              <div class="form-floating">
                <input type="text" class="form-control" name="contact" id="contact" placeholder="contact" onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" required>
                <label for="floatingName">Contact</label>
              </div>
            </div>  

            <div class="col-md-4">
              <div class="form-floating mb-3">
                <select id="department" name="department" class="form-select" onChange="fetchRole(this.value);">
                  <option value="" selected="selected" disabled="disabled">Select Subsystem</option>
                  <?php
                    // Include config file
                    require_once "include/config.php";
                    // Attempt select query execution
                    $sql2 = "SELECT * FROM department ORDER BY department";
                    if($result2 = mysqli_query($link, $sql2)){
                      if(mysqli_num_rows($result2) > 0){
                        while($row2 = mysqli_fetch_array($result2)){
                          echo '<option value = "' . $row2["id"] . '">' . $row2["department"] . '</option>';
                        }
                        // Free result set
                        mysqli_free_result($result2);
                      }
                    }
                  ?>
                </select>
                <label for="floatingSelect">Subsystem</label>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-floating mb-3">
                <select id="role" name="role" class="form-select" Required>
                  <option value="" selected="selected" disabled="disabled">Select Role</option>
                </select>
                <label for="floatingSelect">System Role</label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-floating mb-3">
                <select id="office" name="office" class="form-select" Required>
                  <option value="" selected="selected" disabled="disabled">Select Department</option>
                  <?php
                    require_once("include/conn.php");
                    $query="SELECT * FROM datms_office ORDER BY off_date DESC ";
                    $result=mysqli_query($conn,$query);
                    while($rs=mysqli_fetch_array($result)){
                    $offid =$rs['off_id'];                                    
                    $offName = $rs['off_name'];       
                    ?>
                  <option><?php echo $offName;?></option>
                  <?php }?>
                </select>
                <label for="floatingSelect">Department</label>
              </div>
            </div>
            <div class="col-12">
              <div class="form-floating">
                <textarea class="form-control" placeholder="Address" id="about" name="about" style="height: 100px;"></textarea>
                <label for="floatingTextarea">About yourself</label>
              </div>
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
      </form><!-- End No Labels Form -->
          </div>
          <div class="container-fluid">
            <div class="row mb-4">
              <div class="col-md-10">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </section>
  </main><!-- End #main -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script type="text/javascript">
      // input numbers only
        function isNumberKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return false;
          return true;
        }
      // input text only
      function isTextKey(evt){
          var charCode = (evt.which) ? evt.which : evt.keyCode
          if (charCode > 31 && (charCode < 48 || charCode > 57))
              return true;
          return false;
        }

        function fetchRole(id){
          $('#role').html('');
          $.ajax({
            type:'post',
            url:'ajaxdata.php',
            data : 'department_id='+id,
            success: function(data){
              $('#role').html(data);
            }
          })
        }
  </script>
  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

</body>

</html>