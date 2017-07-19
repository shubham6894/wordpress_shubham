<?php
/**
 * Template Name: RSVP
 */
    get_header('rsvp_confirmation');
?>	
<body>
	<div class="container">
		<div class="card-title rsvphead">Thank you! for confirming your presence. Looking forward to see you at the event.</div>
		<hr>
		<div class="card-block rsvpdetails">
			<div><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;Guest Name</div>
			<div><i class="fa fa-envelope-open-o" aria-hidden="true"></i>&nbsp;shubham@coloredcow.in</div>
			<div><i class="fa fa-mobile aria-hidden="true"></i>&nbsp;Guest Phone</div>
			<div class="rsvpbutton"><input type="button" class="btn btn-success btn-lg" id="confirm_rsvp" value="RSVP"></div>
		</div>
	</div>
</body>	
<hr>
<?php 
    get_footer(); 
?>