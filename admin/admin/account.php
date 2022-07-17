<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Alumni | Accounts</title>
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
      <h1>Account Management</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Settings</li>
          <li class="breadcrumb-item active">Account Management</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section faq">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="col-lg-12">
              <div class="form-group col-md-2 btn-lg"  style="float: left; padding:20px;">
                  <h4>List of Account</h4>
              </div>
              <div class="form-group col-md-1.5 btn-lg"   data-bs-toggle="modal" data-bs-target="#AddModal" style="float: right; padding:20px;">
                <a href="admin-create.php" class="btn btn-primary pull-right">Add New User</a>
              </div> 
            </div>
          <div class="card-body">
           <!-- Table for Student records -->
           <table class="row-border hover datatable nowrap" id="UserTable">
                <thead>
                    <tr>
                      <th WIDTH="5%">User No.</th>
                      <th scope="col">Name</th>                    
                      <th WIDTH="30%">Department</th>
                      <th >Role</th>
                      <th scope="col" WIDTH="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require_once("include/conn.php");
                        $sqluery="SELECT * FROM user_information WHERE department = 'User Management' AND `admin` NOT IN ('1') ORDER BY id_number asc ";
                        $result=mysqli_query($conn,$sqluery);
                        while($rs=mysqli_fetch_array($result)){
                          $userid =$rs['id'];
                          $userno = $rs['id_number'];
                          $fname = $rs['firstname'];        
                          $lname = $rs['lastname'];
                          $mname = $rs['middlename'];
                          $email =$rs['email'];
                          $contact = $rs['contact'];
                          $address = $rs['address'];        
                          $office = $rs['office'];
                          $department = $rs['department'];        
                          $role = $rs['role'];                      
                          $as = $rs['account_status'];        
                          $about = $rs['about'];
                      ?>
                    <tr>
                      <td WIDTH="5%"><?php echo $userno; ?></td>
                      <td ><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                      <td WIDTH="30%"><?php echo $department?></td>
                      <td ><?php echo $role?></td>
                    </td>
                      <td style="align-self: center;">  
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">                     
                          <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ViewModal<?php echo $userid;?>"><i class="bi bi-eye"></i></button>
                          <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $userid;?>"><i class="bi bi-trash" ></i></button>
                        </div>
                      </td>
                    </tr>
                    <?php 
                  include 'modals/user_modals.php';
                  } ?>
                  </tbody>
              </table>
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

  <!-- ======= Footer ======= -->
  <?php include ('core/footer.php');//css connection?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files/ Template main js file -->
  <?php include ('core/js.php');//css connection?>

     <!-- JS Scripts -->
    <script>
      // Buttons for datatable
        $(document).ready(function() {

          $('#UserTable').DataTable( {

                // ajax:'ajaxtables/department_tbl.php'
                "scrollX": true,
                paging: false,
                "bInfo" : false,
                searching: false,
                stateSave: true,
                dom: 'Bfrtip',
                buttons: [ 
                    {
                        extend: 'collection',
                        text:      'Export',
                        className: 'custom-html-collection',
                        autoClose: true,
                        buttons: [
                          '<center style="size:20px">Files</center>',
                              'csv',  {
                                extend: 'excelHtml5',
                                autoFilter: true,
                                title: 'Student Reports',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }, {
                                extend: 'pdfHtml5',
                                title: 'Student Reports',
                                footer: true,
                                exportOptions: {
                                    columns: ':visible'
                                }
                            }
                        ]
                    },  {
                    extend: 'colvis',
                    text:'View'
                    },{
                        extend:    'copyHtml5',
                        header: false,                       
                        text:      '<i class="bi bi-clipboard"></i>',
                        titleAttr: 'Copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },{
                        text:'<i class="bi bi-printer"></i>',
                        extend: 'print',
                        messageTop: 'Bestlink college of the philippines Student Report',
                        exportOptions: {
                            columns: ':visible'
                        }
                      }
                ]
            } );
          } );
      // modal JS and ajax function
        $(document).ready(function () {

            // Delete Student function
            $(".userdel").click(function(b){
              b.preventDefault();
              $.post("function/delete_user.php",{
                  userid:$('#delete_id').val(),
                  userno:$('#delete_no').val(),
                  userfname:$('#delete_fname').val()
                },function(response){
                  // alert ("deleted");
                  if(response.trim() == "UserDeleted"){
                    $('#DeleteModal').modal('hide');
                    Swal.fire ("Student Successfully Deleted","","success").then(function(){
                              document.location.reload(true)//refresh pages
                            });                      
                  }else{
                    $('#DeleteModal').modal('hide');
                    Swal.fire (response);
                  }
                })
              })
            // End Delete Student function
          });
    </script>
</body>

</html>