<?php
$posts= get_posts(array(
	'post_type' => 'guests',
	'posts_per_page' => '50'
	));
?>
<div class="container">
	<div class="row">
		<div class="col-lg-4 col-md-12 col-sm-12">
			<div class="dropdown">
				<button type="button" class="btn btn-primary dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Events</button>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">Event 1</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Event 2</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Event 3</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Event 4</a>
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
					</tr>
				</thead>
				<tbody>
				<?php
					$x=1;
					foreach ($posts as $post) {
					$id = $post->ID;
					$field=get_post_meta($id);
				?>    
					<tr class="table-danger">
						<th scope="row"><?php echo $x++; ?></th>
						<td width="23%"><?php echo $posttitle=$post->post_title; ?></td>
						<td width="20%"><?php echo $email=$field['guest_email'][0]; ?></td>
						<td width="20%"><?php echo $mobile=$field['mobile_number'][0]; ?></td>
						<td width="17%"><?php echo $gender=$field['gender'][0]; ?></td>
						<td width="20%"><?php echo $status=$field['status'][0]; ?></td>
					</tr>
					<?php
						}
					?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</body>