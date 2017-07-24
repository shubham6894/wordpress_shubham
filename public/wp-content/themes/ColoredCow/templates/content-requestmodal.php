<div class="container">
    <div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-labelledby="requestModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title" id="requestModalLabel">New Request</div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close"><span aria-hidden="true">&times;</span></button>
                </div>
                <form id="request_form">
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="request_id" id="request_id">
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Your Name:</label>
                            <input type="text" class="form-control" name="request_name" id="request_name" maxlength="30" required="required">  
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Your Email:</label>   
                            <input type="email" class="form-control" placeholder="someone@example.com" name="request_emailid" id="request_emailid" maxlength="30" required="required"> 
                        </div>
                        <div class="form-group">
                            <label for="recipient-number" class="form-control-label">Mobile Number:</label>
                            <input type="number" class="form-control"  placeholder="10 digit mobile no." name="phonenumber" id="phonenumber" max="9999999999" required="required">    
                        </div>  
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Gender:</label>
                            <label class="custom-control custom-radio">
                                <input name="request_gender" value="Male" type="radio" class="custom-control-input" required="required">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Male</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input name="request_gender" value="Female" type="radio" class="custom-control-input" required="required">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Female</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input name="request_gender" value="Others" type="radio" class="custom-control-input" required="required">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Others</span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer pull-left">
                    <button type="button" class="btn btn-success" id="Submit_request">Request</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>