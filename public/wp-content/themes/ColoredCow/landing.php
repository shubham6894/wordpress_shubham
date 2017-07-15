<?php
/**
 * Template Name: Landing
 */
    get_header();
?>

<body>
	<div class="container">
		<div class="row">
			<div class="col col-sm-12 col-md- col-lg-6">
				<h2 class="about">Soiree</h2>
				<br>
			  	<p class="lead">ColoredCow celebrates every first Saturday of the month with family and friends. This custom has been started to take a little time off from work and enjoy some moments in life. we believe in sharing moments and learning with each other. Come and join us over music, food, drinks and some moments full of laughter and joy.</p>
				<hr>
				<center>
			  		<div class="col-md-8 col-xs-12">
						<h5 class="request">Wanna join the party?</h5>
						<br>
						<button type="button" class="btn btn-outline-warning btn-lg btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Request Invite</button>		
					</div>
				</center>		
			</div>	
		</div>
		<div class="container">
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                          <div class="modal-header">
                            <h3 class="modal-title" id="exampleModalLabel">New Request</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
                          </div>
                         <form id="request_form">
                              <div class="modal-body">
                                  <p id="msg2"></p>
                                <input type="hidden" class="form-control" name="request_id" id="request_id">
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">
                                        <h6>Your Name:</h6>
                                    </label>
                                    
                                        <input type="text" class="form-control" placeholder="" name="request_name" id="request_name" maxlength="30" required>
                                    
                                 </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">
                                        <h6>Your Email:</h6>
                                    </label>
                                    
                                        <input type="email" class="form-control" placeholder="someone@example.com" name="request_emailid" id="request_emailid" maxlength="30" required>
                                    
                                </div>
                                <div class="form-group">
                                    <label for="recipient-number" class="form-control-label">
                                        <h6>Mobile Number:</h6>
                                    </label>
                                    
                                        <input type="number" class="form-control"  placeholder="10 digit mobile no." name="phonenumber" id="phonenumber" max="9999999999" required>
                                    
                                </div>  
                                <div class="form-group">
                                    <label for="recipient-name" class="form-control-label">
                                        <h6>Gender:</h6>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input name="request_gender" value="Male" type="radio" class="custom-control-input" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Male</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input name="request_gender" value="Female" type="radio" class="custom-control-input" required>
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">Female</span>
                                    </label>
                                </div>
                              </div>
                              <div class="modal-footer pull-left">
                              <button type="button" class="btn btn-success btn-lg"  id="Submit_request">Request</button>
                              </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
        <br>

	</div>
</body>
<?php 
    get_footer(); 
?>