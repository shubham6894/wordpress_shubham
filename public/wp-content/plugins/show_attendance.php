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
	<div class="row">
		<div class="col-lg-4 col-md-12 col-sm-12">
			<div class="dropdown">
				<button type="button" class="btn btn-primary dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Events</button>
				<div class="dropdown-menu">
					<?php
					if($posts_events-> have_posts()){
					while ($posts_events-> have_posts()) {
					$posts_events-> the_post();
					//$id = $post -> ID;
					$event_name=get_the_title();
					?>
					<a class="dropdown-item" href="#"><?php echo $event_name ?></a>
					<div class="dropdown-divider"></div>
					<?php
				}
			}
			?>
				</div>
			</div>
		</div>
	</div>
</div>
<body class="guesttable">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<table class="table table-hover table-striped table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone No</th>
						<th>Gender</th>
						<th>Status</th>
						<th>Category</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$x=1;
					if($posts_approved-> have_posts()){
					while ($posts_approved-> have_posts()) {
					$posts_approved-> the_post();
				?>    
					<tr class="table-danger">
						<th scope="row"><?php echo $x++; ?></th>
						<td width="21%"><?php echo $posttitle=get_the_title(); ?></td>
						<td width="23%"><?php echo $email=get_field("guest_email"); ?></td>
						<td width="15%"><?php echo $mobile=get_field("mobile_number"); ?></td>
						<td width="13%"><?php echo $gender=get_field("gender"); ?></td>
						<td width="13%"><?php echo $status=get_field("status"); ?></td>
						<td width="15%"><?php echo get_the_category()[0]->name; ?></td>
					</tr>
					<?php
						}
					}
					?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
	<hr>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<table class="table table-hover table-striped table-bordered table-responsive">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Email</th>
						<th>Phone No</th>
						<th>Gender</th>
						<th>Status</th>
						<th>Category</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$x=1;
					if($posts_waiting-> have_posts()){
					while ($posts_waiting-> have_posts()) {
					$posts_waiting-> the_post();
				?>    
					<tr class="table-danger">
						<th scope="row"><?php echo $x++; ?></th>
						<td width="21%"><?php echo $posttitle=get_the_title(); ?></td>
						<td width="23%"><?php echo $email=get_field("guest_email"); ?></td>
						<td width="15%"><?php echo $mobile=get_field("mobile_number"); ?></td>
						<td width="13%"><?php echo $gender=get_field("gender"); ?></td>
						<td width="13%"><?php echo $status=get_field("status"); ?></td>
						<td width="15%"><?php echo get_the_category()[0]->name; ?></td>
					</tr>
					<?php
					}
					}
					?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</body>