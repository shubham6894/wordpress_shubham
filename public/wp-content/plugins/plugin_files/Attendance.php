<?php
/*
Plugin Name: Attendance Plugin
Description: Plugin for displaying event wise guests
Author: Shubham Nautiyal
Version: 0.1
*/

add_action('admin_menu', 'attendance_setup_menu');
add_action('admin_enqueue_scripts', 'show_guests_per_event');
add_action('admin_enqueue_scripts', 'show_approved_guests_per_event');



function attendance_setup_menu(){
	add_menu_page( 'Attendance Page', 'Attendance', 'manage_options', 'attendance', 'attendance' );
}

function attendance(){
	require_once("show_attendance.php");
}

function plugin_scripts() {
	wp_enqueue_script('cc-bootstrap4', get_template_directory_uri().'/dist/lib/js/bootstrap4.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('cc-bootstrap-tether','https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js');
	wp_enqueue_script('main', get_template_directory_uri().'/main.js', array('jquery'), '1.0.0', true);
	wp_localize_script( 'main', 'PARAMS', array('ajaxurl' => admin_url('admin-ajax.php')) );
}
add_action('admin_enqueue_scripts','plugin_scripts');

function plugin_styles() {  
	wp_enqueue_style('cc-bootstrap4', get_template_directory_uri().'/dist/lib/css/bootstrap4.min.css');
	wp_enqueue_style('cc-custom-font','https://fonts.googleapis.com/css?family=Luckiest+Guy|Marcellus+SC|Margarine|Oswald|Paprika|Roboto');
	wp_enqueue_style('style', get_template_directory_uri().'/style.css');
}	
add_action('admin_enqueue_scripts','plugin_styles');

function send_invite_per_event(){
	if(isset($_POST['fetch_event_id'])):
		$fetch_event_id=$_POST['fetch_event_id'];
		var_dump($fetch_event_id);
		$posts_events= new WP_Query(array(
		'post_type' => 'events',
		'posts_per_page' => -1,
		'p' => $fetch_event_id
	));
		$posts_approved= new WP_Query(array(
		'post_type' => 'guests',
		'posts_per_page' => -1,
		'category_name'=> 'Approved'
	));
	if($posts_events-> have_posts()):
		if($posts_approved-> have_posts()):
			while ($posts_events-> have_posts()):
			$posts_events-> the_post();
			while ($posts_approved-> have_posts()): 
				$posts_approved-> the_post();
				$recipients[]=array(
						'name' => get_the_title(),
						'email' => get_field("guest_email"),
						'type' => 'to'
						);
			endwhile;
			endwhile;
		endif;
	endif;

	 require_once 'vendor/mandrill/mandrill/src/Mandrill.php';

    try{
    	$mandrill = new Mandrill('yLdpaxPSdLCJ1a1-j_nD2A');
    	$template_name= 'RSVP_Invitation';
    	$template_content = array(
		        array(
		            'name' => 'example name',
		            'content' => 'Hi *|FNAME|* *|LNAME|*, Thanks for taking out some precious time and respond to us.'
		        )
		    );
    	$message = array(
        'html' => '<p>Invitation for the event</p>',
        'subject' => 'RSVP',
        'from_email' => 'shubham.nautiyal@coloredcow.com',
        'from_name' => 'Shubham Nautiyal',
        'to' => $recipients,

        'merge' => true,
        'merge_language' => 'mailchimp',
        'global_merge_vars' => array(
            array(
                'name' => 'merge1',
                'content' => 'merge1 content'
            )
        ),
        'merge_vars' => array(
            array(
                'rcpt' => 'recipient.email@example.com',
                'vars' => array(
                    array(
                        'name' => 'merge2',
                        'content' => 'merge2 content'
                    )
                )
            )
        )
    );
    var_dump($message);
    $async = false;
    $ip_pool = 'Main Pool';
    $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);
    var_dump($result);
     print_r($result);
 }
 catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
    endif;
    wp_die();

}
add_action('wp_ajax_send_invite_per_event','send_invite_per_event');
add_action('wp_ajax_nopriv_send_invite_per_event', 'send_invite_per_event');

function show_guests_per_event() {
	if(isset($_POST['fetch_event_id'])):
		$fetch_event_id=$_POST['fetch_event_id'];
		$id_event=$fetch_event_id;	
		$output_requested_guests='';
		$posts_waiting= new WP_Query(array(
		'post_type' => 'guests',
		'posts_per_page' => -1,
		'category_name'=> 'Waiting For Approval',
		'meta_key'=>'id',
		'meta_value'=> $fetch_event_id
		));

		$x=1;
		if($posts_waiting-> have_posts()):
			while ($posts_waiting-> have_posts()):
				$posts_waiting-> the_post();
				$id = get_the_ID();
				$output_requested_guests .='<tr class="table-danger">
				<th scope="row">'.$x++;
				$output_requested_guests .='</th>
				<td width="20%">'. $posttitle=get_the_title();
				$output_requested_guests .='</td>
				<td width="20%">'. $email=get_field("guest_email");
				$output_requested_guests .='</td>
				<td width="20%">'. $mobile=get_field("mobile_number");
				$output_requested_guests .='</td>
				<td width="19%" class="category">'. get_the_category()[0]->name;
				$output_requested_guests .='</td>';
				$output_requested_guests .='<td width="21%"><button type="button" name="add" id="'.$id.'" class="btn btn-success btn-sm 
				approve" value="'.$id_event.'">Approve</button> &nbsp; 
				<button type="button" name="reject" id="'.$id.'" class="btn btn-danger btn-sm reject" value="'.$id_event.'">
				Reject</button></td>';
				$output_requested_guests .='</td>
				</tr>';
			endwhile;
		else:
				$output_requested_guests .='
				<tr class="table-info">
				<td colspan="6"> No Requests Yet !!!!!!!
				</td>
				</tr>';
		endif;
		echo $output_requested_guests;
		wp_die();
	endif;
}
add_action('wp_ajax_show_guests_per_event','show_guests_per_event');
add_action('wp_ajax_nopriv_show_guests_per_event', 'show_guests_per_event');

function update_requested_guests(){
	if (isset($_POST['id'])):
		$id=$_POST['id'];	
	endif;
	wp_set_post_categories($id, array(2));
	update_post_meta($id,'status','Confirmed');
}
add_action('wp_ajax_update_requested_guests','update_requested_guests');
add_action('wp_ajax_nopriv_update_requested_guests', 'update_requested_guests');

function reject_requested_guests(){
	if (isset($_POST['id'])):
		$id=$_POST['id'];	
	endif;
	wp_set_post_categories($id, array(3));
	update_post_meta($id,'status','');
}
add_action('wp_ajax_reject_requested_guests','reject_requested_guests');
add_action('wp_ajax_nopriv_reject_requested_guests', 'reject_requested_guests');


function show_approved_guests_per_event($fetch_event_id) {
	if(isset($_POST['fetch_event_id'])):
		$fetch_event_id=$_POST['fetch_event_id'];	
		$output_approved_guests='';
		$posts_approved= new WP_Query(array(
		'post_type' => 'guests',
		'posts_per_page' => -1,
		'category_name'=> 'Approved',
		'meta_key'=> 'id',
		'meta_value'=> $fetch_event_id
		));

		$x=1;
		if($posts_approved-> have_posts()):
			while ($posts_approved-> have_posts()):
				$posts_approved-> the_post();
				$output_approved_guests .='<tr class="table-danger">
				<th scope="row">'.$x++;
				$output_approved_guests .='</th>
				<td width="20%"> '.$posttitle=get_the_title(); 
				$output_approved_guests .='</td>
				<td width="20%">'. $email=get_field("guest_email"); 
				$output_approved_guests .='</td>
				<td width="20%"> '.$mobile=get_field("mobile_number"); 
				$output_approved_guests .='</td>
				<td width="20%" class="status"> '.$status=get_field("status"); 
				$output_approved_guests .='</td>
				<td width="20%" class="category"> '.get_the_category()[0]->name; 
				$output_approved_guests .='</td>
				</tr>';
			endwhile;
		else:
				$output_requested_guests .='
				<tr class="table-info">
				<td colspan="6"> No Guests Yet !!!!!!!
				</td>
				</tr>';
		endif;
		echo $output_approved_guests;
		wp_die();
	endif;
}
add_action('wp_ajax_show_approved_guests_per_event','show_approved_guests_per_event');
add_action('wp_ajax_nopriv_show_approved_guests_per_event', 'show_approved_guests_per_event');

function show_all_approved_guests() {	
	$output_all_approved_guests='';
	$posts_approved= new WP_Query(array(
	'post_type' => 'guests',
	'posts_per_page' => '50',
	'category_name'=> 'Approved'
	));				
	$x=1;
	if($posts_approved-> have_posts()):
		while ($posts_approved-> have_posts()): 
			$posts_approved-> the_post();
			$output_all_approved_guests .='<tr class="table-danger">
			<th scope="row">'.$x++;
			$output_all_approved_guests .='</th>
			<td width="21%"> '.$posttitle=get_the_title(); 
			$output_all_approved_guests .='</td>
			<td width="23%">'. $email=get_field("guest_email"); 
			$output_all_approved_guests .='</td>
			<td width="15%"> '.$mobile=get_field("mobile_number"); 
			$output_all_approved_guests .='</td>
			<td width="13%"> '.$gender=get_field("gender"); 
			$output_all_approved_guests .='</td>
			<td width="15%" class="category"> '.get_the_category()[0]->name; 
			$output_all_approved_guests .='</td>
			</tr>';
		endwhile;
	else:
				$output_requested_guests .='
				<tr class="table-info">
				<td colspan="6"> No Guests Yet !!!!!!!
				</td>
				</tr>';
	endif;
	echo $output_all_approved_guests;
	wp_die();
}
add_action('wp_ajax_show_all_approved_guests','show_all_approved_guests');
add_action('wp_ajax_nopriv_show_all_approved_guests', 'show_all_approved_guests');
?>