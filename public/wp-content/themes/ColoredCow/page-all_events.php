<?php
/**
 * Template Name: All Events
 */
get_header('rsvp_confirmation');

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
                <div class="col-lg-8 col-md-12 col-sm-12">
				<div class="upcomingevent">
					<div class="posttitle"><?php echo $posttitle ?></div>
                    <div><i class="fa fa-grav icons" aria-hidden="true">&nbsp;</i><?php echo $theme ?></div><br>
                    <div><i class='fa fa-calendar icons' aria-hidden='true'></i>&nbsp;<?php echo date('l, jS F, Y', strtotime($date));?></div><br> 
                    <div><i class='fa fa-map-marker fa-lg icons' aria-hidden='true'></i>&nbsp;<?php echo $venue ?></div><br>
                    <hr>
				</div>
				</div>
            <div class="col-lg-4 col-md-12 col-sm-12">
            	<div class="request">
	              <button type="button" class="btn btn-outline-warning btn-lg btn-block" data-toggle="modal" data-target="#requestModal" data-whatever="@mdo" data-id="<?php echo $id ?>">Request Invite</button>
				</div>
			</div>
			<div class="container">
        		<?php get_template_part( 'templates/content', 'requestmodal' ); ?>
    		</div>
            <?php
        	}
            }
            ?>
		</div>
		   	
</div>
</body>

<?php
get_footer();
?>