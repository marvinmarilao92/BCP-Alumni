<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<title>Alumni | User Reports</title>
<head>
<?php include ('core/css-links.php');//css connection?>
</head>
<body>

<?php include ('core/header.php');//Design for  Header?>
<?php $page = 'UR' ; $col = 'reports'; include ('core/side-nav.php');//Design for sidebar?>

<main id="main" class="main">

<div class="pagetitle">
  <h1>List of Students</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Module</li>
      <li class="breadcrumb-item">Student Infomration</li>
      <li class="breadcrumb-item active">List of Students</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

  <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="col-lg-12">
                <div class="form-group col-md-2 btn-lg"  style="float: left; padding:20px;">
                    <h4>Students</h4>
                </div>
                
              </div>
            <div class="card-body">
               <!-- Table for Student records -->
               <table class="row-border hover datatable nowrap" id="StudentTable">
                <thead>
                    <tr>
                      <th  WIDTH="5%">Student No.</th>
                      <th scope="col">Name</th>                    
                      <th WIDTH="30%">Program</th>
                      <th >Date Created</th>
                      <th scope="col" WIDTH="10%">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        require_once("include/conn.php");
                        $sqluery="SELECT * FROM student_application ORDER BY stud_date DESC ";
                        $result=mysqli_query($conn,$sqluery);
                        while($rs=mysqli_fetch_array($result)){
                          $studid =$rs['id'];
                          $studno = $rs['id_number'];
                          $fname = $rs['firstname'];        
                          $lname = $rs['lastname'];
                          $mname = $rs['middlename'];
                          $email =$rs['email'];
                          $contact = $rs['contact'];
                          $address = $rs['address'];        
                          $course = $rs['course'];
                          $gender = $rs['gender'];        
                          $bday = $rs['birthday'];
                          $nationality = $rs['nationality'];
                          $religion =$rs['religion'];
                          $cs = $rs['civil_status'];
                          $as = $rs['account_status'];        
                          $sd = $rs['stud_date'];
                      ?>
                    <tr>
                      <td  WIDTH="5%"><?php echo $studno; ?></td>
                      <td ><?php echo $fname.' '.$mname.' '.$lname; ?></td>
                      <td WIDTH="30%"><?php echo $course?></td>
                      <td ><?php echo $sd?></td>
                    </td>
                      <td style="align-self: center;">  
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">                     
                          <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#ViewModal<?php echo $studid;?>"><i class="bi bi-eye"></i></button>
                          <button class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $studid;?>"><i class="bi bi-trash" ></i></button>
                        </div>
                      </td>
                    </tr>
                    <?php 
                  include 'modals/stud_modals.php';
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

          $('#StudentTable').DataTable( {

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
            $(".studdel").click(function(b){
              b.preventDefault();
              $.post("function/delete_stud.php",{
                  studid:$('#delete_id').val()
                },function(response){
                  // alert ("deleted");
                  if(response.trim() == "StudentDeleted"){
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
              
            // Save Student function
            $('#save').click(function(a){ 
                a.preventDefault();
                  if($('#offtitle').val()!="" && $('#offloc').val()!=""){
                    $.post("function/add_office.php", {
                      offname:$('#offtitle').val(),
                      offloc:$('#offloc').val()
                      },function(data){
                      if (data.trim() == "failed"){
                        $('#AddModal').modal('hide');
                        Swal.fire("Student is already in server","","error");//response message
                        // Empty test field
                        $('#offtitle').val("")
                        $('#offloc').val("")
                      }else if(data.trim() == "success"){
                        $('#AddModal').modal('hide');
                              //success message
                              const Toast = Swal.mixin({
                              toast: true,
                              position: 'top-end',
                              showConfirmButton: false,
                              timer: 1100,
                              timerProsressBar: true,
                              didOpen: (toast) => {
                              toast.addEventListener('mouseenter', Swal.stopTimer)
                              toast.addEventListener('mouseleave', Swal.resumeTimer)
                              
                              }
                              })
                            Toast.fire({
                            icon: 'success',
                            title:'Student successfully Saved'
                            }).then(function(){
                              document.location.reload(true)//refresh pages
                            });
                              $('#offtitle').val("")
                              $('#offloc').val("")
                        }else{
                          Swal.fire(data);
                      }
                    })
                  }else{
                    Swal.fire("You must fill out every field","","warning");
                  }
                })
            // End Save Student function

            // Edit Student modal calling
            $('.editbtn').on('click', function () {

                  $('#EditModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);        
                      $('#off_idE').val(data[0]);
                      $('#off_codeE').val(data[1]);
                      document.getElementById("off_nameE").placeholder = data[2];
                      document.getElementById("off_locE").placeholder = data[3];  
                });
            // End of edit modal calling 
            $.extend( $.fn.dataTable.defaults, {
                searching: false,
                ordering:  false
            } );
            // Edit Student function
            $('#edit').click(function(d){ 
                  d.preventDefault();
                    if($('#off_idE').val()!="" && $('#off_codeE').val()!="" && $('#off_nameE').val()!="" && $('#off_locE').val()!=""){
                      $.post("function/update_office.php", {
                        offid:$('#off_idE').val(),
                        offcode:$('#off_codeE').val(),
                        offname:$('#off_nameE').val(),
                        offloc:$('#off_locE').val()
                        },function(data){
                          if (data.trim() == "failed"){
                          Swal.fire("Student Title is currently in use","","error");//response message
                          // Empty test field
                          $('#off_nameE').val("")
                        }else if(data.trim() == "success"){
                          $('#EditModal').modal('hide');
                                //success message
                                  const Toast = Swal.mixin({
                                  toast: true,
                                  position: 'top-end',
                                  showConfirmButton: false,
                                  timer: 1100,
                                  timerProsressBar: true,
                                  didOpen: (toast) => {
                                  toast.addEventListener('mouseenter', Swal.stopTimer)
                                  toast.addEventListener('mouseleave', Swal.resumeTimer)                        
                                }
                                })
                                  Toast.fire({
                                  icon: 'Success',
                                  title:'Changes Successfully Saved'
                              }).then(function(){
                                document.location.reload(true)//refresh pages
                              });
                                  $('#off_codeE').val("")
                                  $('#off_nameE').val("")
                                  $('#off_locE').val("")
                          }else{
                            Swal.fire("There is somthing wrong","","error");
                        }
                      })
                    }else{
                      Swal.fire("You must fill out every field","","warning");
                    }
                })
            // End Edit Student function

            // View Student Function
            $('.viewbtn').on('click', function () {

                  $('#ViewModal').modal('show');

                  $tr = $(this).closest('tr');

                  var data = $tr.children("td").map(function () {
                      return $(this).text();
                  }).get();

                  console.log(data);        
                  $('#view_code').text(data[1]);
                  $('#view_name').text(data[2]);
                  $('#view_loc').text(data[3]);
                  $('#view_date').text(data[4]);
                });
            // End of View function 

          });
    </script>

</body>

</html>