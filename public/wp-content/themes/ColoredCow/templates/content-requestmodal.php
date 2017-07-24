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
                            <input type="text" class="form-control" name="requested_guest_name" id="requested_guest_name" maxlength="30" required="required">  
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Your Email:</label>   
                            <input type="email" class="form-control" placeholder="someone@example.com" name="requested_guest_email" id="requested_guest_email" maxlength="30" required="required"> 
                        </div>
                        <div class="form-group">
                            <label for="recipient-number" class="form-control-label">Mobile Number:</label>
                            <input type="number" class="form-control"  placeholder="10 digit mobile no." name="requested_guest_number" id="requested_guest_number" max="9999999999" required="required">   
                        </div>  
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Gender:</label>
                            <label class="custom-control custom-radio">
                                <input name="requested_guest_gender" value="Male" type="radio" class="custom-control-input" required="required">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Male</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input name="requested_guest_gender" value="Female" type="radio" class="custom-control-input" required="required">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">Female</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input name="requested_guest_gender" value="Others" type="radio" class="custom-control-input" required="required">
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