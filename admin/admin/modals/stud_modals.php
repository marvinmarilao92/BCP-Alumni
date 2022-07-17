 
  <!-- Student Modals -->
      <!-- View Student modal -->
      <div class="modal fade" id="ViewModal<?php echo $studid;?>" tabindex="-1">
                  <div class="modal-dialog modal-dialog-centered modal-l">

                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">STUDENT INFORMATION</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                      <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h5 class="card-title">Student Details</h5>
                                Student No: <h6 id="view_code" style="margin-left: 60px;"><?php echo $studno;?></h6>
                                Student Name: <h6 id="view_name" style="margin-left: 60px;"><?php echo $fname.' '.$mname.' '.$lname; ?></h6>
                                Program: <h6 id="view_loc" style="margin-left: 60px;"><?php echo $course;?></h6>
                                Date: <h6 id="view_date" style="margin-left: 60px;"><?php echo $sd;?></h6>                
                            </div>
                          </div>   
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
        </div>
      <!-- End View department Modal-->

      <!-- Delete Student Modal -->
      <div class="modal fade" id="DeleteModal<?php echo $studid;?>" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DELETE OFFICE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">                
                            <br>
                            <input type="hidden"  name="delete_id" id="delete_id" value="<?php echo $studid;?>" readonly>
                            <center>
                              <h5>Are you sure you want to delete these Student?</h5>
                              <h5 class="text-danger">This action cannot be undone.</h5>   
                            </center>                
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary studdel" name="deletedata" id="deletedata" >Delete Student</button>
                        </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>
      <!-- End delete Student Modal -->
  <!-- End of Student Modals -->
  
