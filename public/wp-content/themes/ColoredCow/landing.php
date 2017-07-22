<?php
/**
 * Template Name: Landing
 */
    get_header();

    $currentdate=date('Y-m-d');
    $posts= get_posts(array(
        'post_type' => 'events',
        'meta_key'  => 'date',
        'order_by'  => 'meta_value',
        'order'     => 'ASC'
        ));
?>
<body>
    <div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="soiree-title">Soiree</div>
			  	<p class="soiree-content">ColoredCow celebrates every first Saturday of the month with family and friends. This custom has been started to take a little time off from work and enjoy some moments in life. we believe in sharing moments and learning with each other. Come and join us over music, food, drinks and some moments full of laughter and joy.</p>
				<hr>
				<div class="request-invite">
					<div>Want to join the party?</div>
					<button type="button" class="btn btn-outline-warning btn-lg" data-toggle="modal" data-target="#requestModal" data-whatever="@mdo">Request Invite</button>		
				</div>		
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12">
            <?php
                foreach ($posts as $post) {
                $id = $post->ID;
                $field=get_post_meta($id);
                $posttitle=$post->post_title;
                $theme=$field['theme'][0];
                $venue=$field['venue'][0];
                $date=$field['date'][0];    
            if($date>$currentdate)
            {
                ?>
				<div class="upcomingevent">
					<div class="posttitle"><?php echo $posttitle ?></div>
                    <div><i class="fa fa-grav icons" aria-hidden="true">&nbsp;</i><?php echo $theme ?></div><br>
                    <div><i class='fa fa-calendar icons' aria-hidden='true'></i>&nbsp;<?php echo date('l, jS F, Y', strtotime($date));?></div><br> 
                    <div><i class='fa fa-map-marker fa-lg icons' aria-hidden='true'></i>&nbsp;<?php echo $venue ?></div><br><br>
				</div>
                <?php
                break;
            }
            }?>
			</div>	
		</div>
    </div>
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
	<hr>
    <div class="container-fluid carouselcontainer">
    <div class="col-lg-8 col-md-12 col-sm-8 carouselcontainer">
        <div class="eventgallery"><i class="fa fa-camera-retro fa-1x"></i>&nbsp;Event Gallery</div>
            <div id="carouselIndicators" class="carousel slide"  data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselIndicators" data-slide-to="1"> </li>
                    <li data-target="#carouselIndicators" data-slide-to="2"> </li>
                    <li data-target="#carouselIndicators" data-slide-to="3"> </li>
                    <li data-target="#carouselIndicators" data-slide-to="4"> </li>
                    <li data-target="#carouselIndicators" data-slide-to="6"> </li>
                    <li data-target="#carouselIndicators" data-slide-to="7"> </li>
                    <li data-target="#carouselIndicators" data-slide-to="8"> </li>
                    <li data-target="#carouselIndicators" data-slide-to="9"> </li>
                    <li data-target="#carouselIndicators" data-slide-to="11"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree1.jpg");?>" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 1.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree2.jpg");?>" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 2.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree3.jpg");?>"="RSVP_IMAGES/soiree3.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 3.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree4.jpg");?>"="RSVP_IMAGES/soiree4.jpg" alt="fourth slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 4.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree5.jpg");?>"="RSVP_IMAGES/soiree5.jpg" alt="fifth slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 5.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree7.jpg");?>"="RSVP_IMAGES/soiree7.jpg" alt="seventh slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 7.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree8.jpg");?>"="RSVP_IMAGES/soiree8.jpg" alt="eighth slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 8.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree9.jpg");?>"="RSVP_IMAGES/soiree9.jpg" alt="ninth slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 9.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree11.jpg");?>"="RSVP_IMAGES/soiree11.jpg" alt="eleventh slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 11.</div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid images_carousel" src="<?php echo esc_url(get_template_directory_uri()."/dist/img/soiree12.jpg");?>"="RSVP_IMAGES/soiree12.jpg" alt="twelveth slide">
                        <div class="carousel-caption d-none d-md-block">#SOIREE 12.</div>
                    </div>
                    
                </div>
                <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        </div>
</body>

<?php 
    get_footer(); 
?>