<?php
/**
 * Template Name: Landing
 */
    get_header();
?>

<body style="padding-top: 100px;">
		<div class="container">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                          <div class="modal-header">
                            <h6 class="modal-title" id="exampleModalLabel" style="font-family: 'Oswald'; font-size: 30px;">New Request</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
                          </div>
                         <form class id="request_form">
                              <div class="modal-body" style="background-color: whitesmoke;">
                                    <div class="form-group">
                                    <label for="admin-name" class="form-control-label">
                                        <h5>Admin Name:</h5>
                                    </label>
                                        <input type="text" class="form-control" placeholder="" name="admin_name" id="admin_name" maxlength="30" required>
                                 </div>
                                 <div class="form-group">
                                    <label for="admin-pass" class="form-control-label">
                                        <h5>Password:</h5>
                                    </label>
                                        <input type="password" class="form-control" placeholder="" name="password" id="password" maxlength="30" required>
                                 </div>	
                              </div>
                              <div class="modal-footer pull-left">
                                   &nbsp;&nbsp;<button type="button" class="btn btn-success btn-lg"  id="login">Login</button>
                              </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>	
</body>


<?php 
    get_footer(); 
?>