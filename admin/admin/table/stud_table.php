 <!-- Table for Student records -->
 <table class="row-border hover datatable nowrap" id="StudentTable">
                <thead>
                    <tr>
                      <th >Student No.</th>
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
                      <td ><?php echo $studno; ?></td>
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