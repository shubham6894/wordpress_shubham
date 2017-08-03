<?php
	$posts_approved= new WP_Query(array(
		'post_type' => 'guests',
		'posts_per_page' => '50',
		'category_name'=> 'Approved'
	));
	$posts_waiting= new WP_Query(array(
		'post_type' => 'guests',
		'posts_per_page' => '50',
		'category_name'=> 'Waiting For Approval'
	));
	$posts_events= new WP_Query(array(
		'post_type' => 'events',
		'posts_per_page' => '50'
	));
?>
<div class="container">
<h1 class="header">Guests Attendance Management</h1>
	<div class="row">
		<div class="col-lg-4 col-md-12 col-sm-12">
			<div class="dropdown">
				<button type="button" class="btn btn-primary dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Show Event Wise All Guests</button>
				<div class="dropdown-menu">
					<?php
						if($posts_events-> have_posts()):
							while ($posts_events-> have_posts()):
							$posts_events-> the_post();
							$id = get_the_ID();
							$event_name= get_the_title();
							?>
							<button class="dropdown-item dropdown-events" id="dropdown_select_event" data-id="<?php echo $id ?>"><?php echo $event_name ?></button>
							<div class="dropdown-divider"></div>
							<?php
							endwhile;
						endif;
					?>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-12 col-sm-12">
			<button type="button" class="btn btn-primary btn-block" id="show_approved_guests" data-id="<?php echo $id ?>">Show All Guests</button>
		</div>		
	</div>
</div>
<body class="guesttable">
	<hr>
	<div id="approved_guests" class="hidden">
		<?php require ('views/approved_guests_header.php'); ?>
		<?php require ('views/all_tables_footer.php'); ?>
	</div>
	<div id="requested_guests" class="hidden">
		<?php require ('views/requested_guests_header.php'); ?>
		<?php require ('views/all_tables_footer.php'); ?>
	</div>
	<div id="all_approved_guest" class="hidden">
	<center>
		<div class="card card-outline-primary mb-3 card-message">
			<div class="card-block">
				<h3 class="card-title">Select The Event Below</h3>
				<p class="card-text">With suitable event, send invitation to all the guests in the list.</p>
			</div>
			<div class="row">
			<div class="col-lg-6 col-md-12 col-sm-12">
				<div class="dropdown">
					<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Select Event</button>
					<div class="dropdown-menu">
						<?php
							if($posts_events-> have_posts()):
								while ($posts_events-> have_posts()):
								$posts_events-> the_post();
								$id = get_the_ID();
								$event_name=get_the_title();
								?>
								<button class="dropdown-item dropdown-event-invite" id="dropdown_select_event" data-id="<?php echo $id ?>"><?php echo $event_name ?></button>
								<div class="dropdown-divider"></div>
								<?php
								endwhile;
							endif;	
						?>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-12 col-sm-12">
			<button type="button" class="btn btn-primary event-invite" id="event_invite" data-id="<?php echo $id ?>">Send Invite</button>
			</div>
		</div>
		</div>
	</center>
		<?php require ('views/all_approved_guests_header.php'); ?>
		<?php require ('views/all_tables_footer.php'); ?>
	</div>
</body>