<?php
/*
Plugin Name: Attendance Plugin
Description: Plugin for displaying event wise guests
Author: Shubham Nautiyal
Version: 0.1
*/

add_action('admin_menu', 'attendance_setup_menu');
 
function attendance_setup_menu(){
        add_menu_page( 'Attendance Page', 'Attendance', 'manage_options', 'attendance', 'attendance' );
}

function attendance(){
	require_once("show_attendance.php");
}

function plugin_scripts() {
        wp_enqueue_script('cc-bootstrap4', get_template_directory_uri().'/dist/lib/js/bootstrap4.min.js', array('jquery'), '1.0.0', true);
        wp_enqueue_script('cc-bootstrap-tether','https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js');
        wp_enqueue_script('main', get_template_directory_uri().'/main.js', array('jquery', 'cc-bootstrap'), '1.0.0', true);
        wp_localize_script( 'main', 'PARAMS', array('ajaxurl' => admin_url('admin-ajax.php')) );
    }
add_action('admin_enqueue_scripts','plugin_scripts');

function plugin_styles() {  
        wp_enqueue_style('cc-bootstrap4', get_template_directory_uri().'/dist/lib/css/bootstrap4.min.css');
        wp_enqueue_style('cc-custom-font','https://fonts.googleapis.com/css?family=Luckiest+Guy|Marcellus+SC|Margarine|Oswald|Paprika|Roboto');
        }	
add_action('admin_enqueue_scripts','plugin_styles');

?>