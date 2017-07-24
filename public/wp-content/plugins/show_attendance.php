<?php
$posts= get_posts(array(
	'post_type' => 'guests'
	));
?>
<body class="guesttable">
<div class="container">
<div class="row">
<div class="col-lg-2 col-md-12 col-sm-12">
<div class="btn-group">
  <button type="button" class="btn btn-primary dropdown-toggle btn-lg btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    All Events
  </button>
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
<div class="col-lg-10 col-md-12 col-sm-12">
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
        $posttitle=$post->post_title;
        $email=$field['guest_email'][0];
        $mobile=$field['mobile_number'][0];
        $gender=$field['gender'][0];
        $status=$field['status'][0];
    ?>    
		<tr class="table-danger">
			<th scope="row"></th>
			<td width="23%"><?php echo $posttitle?></td>
			<td width="20%"><?php echo $email?></td>
			<td width="20%"><?php echo $mobile?></td>
			<td width="17%"><?php echo $gender?></td>
			<td width="20%"><?php echo $status?></td>
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