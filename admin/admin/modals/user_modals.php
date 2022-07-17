<!-- Users Modals -->

      <!-- View Users modal -->
      <div class="modal fade" id="ViewModal<?php echo $userid;?>" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered modal-l">

            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">STUDENT INFORMATION</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <div class="card" style="margin: 10px;">
                    <div class="card-body">
                      <h5 class="card-title">Users Details</h5>
                        Users No: <h6 id="view_code" style="margin-left: 60px;"><?php echo $userno;?></h6>
                        Users Name: <h6 id="view_name" style="margin-left: 60px;"><?php echo $fname.' '.$mname.' '.$lname; ?></h6>
                        Department: <h6 id="view_loc" style="margin-left: 60px;"><?php echo $department;?></h6>
                        Date: <h6 id="view_date" style="margin-left: 60px;"><?php echo $as;?></h6>                
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

      <!-- Edit Users Modal -->
      <div class="modal fade" id="EditModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">EDIT OFFICE</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                          <div class="card" style="margin: 10px;">
                            <div class="card-body">
                              <h2 class="card-title">Change information</h2>
                                <!-- Fill out Form -->
                                <div class="row g-3" >
                                  <input type="hidden" class="form-control" id="off_idE" readonly>
                                  <div class="col-md-4">
                                      <input type="hidden" class="form-control" id="off_codeE" readonly>
                                  </div>
                                  <br>
                                  <div class="col-md-12">
                                      Name: <input type="text" class="form-control" id="off_nameE">
                                  </div>
                                  <br>
                                  <div class="col-12">
                                      Details: <textarea  style="height: 80px" class="form-control" id="off_locE"></textarea>
                                  </div>        
                                </div>
                              
                            </div>
                          </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button class="btn btn-primary" name="save" id="edit" >Save changes</button>
                            </div>
                        <!-- End Form -->
                    </div>
                </div>
        </div>
      <!-- End Edit Users Modal-->

      <!-- Delete Users Modal -->
      <div class="modal fade" id="DeleteModal<?php echo $userid;?>" tabindex="-1">
              <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">DELETE OFFICE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                        <div class="card" style="margin: 10px;">
                          <div class="card-body">                
                            <br>
                            <input type="hidden"  name="delete_id" id="delete_id" value="<?php echo $userid;?>" readonly>
                            <input type="hidden"  name="delete_no" id="delete_no" value="<?php echo $userno;?>" readonly>
                            <input type="hidden"  name="delete_fname" id="delete_fname" value="<?php echo $fname.' '.$mname.' '.$lname;;?>" readonly>
                            <center>
                              <h5>Are you sure you want to delete these Users?</h5>
                              <h5 class="text-danger">This action cannot be undone.</h5>   
                            </center>                
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                          <button type="submit" class="btn btn-primary userdel" name="deletedata" id="deletedata" >Delete Users</button>
                        </div>
                      <!-- End Form -->
                  </div>
              </div>
        </div>
      <!-- End delete Users Modal -->
  <!-- End of Users Modals -->
  