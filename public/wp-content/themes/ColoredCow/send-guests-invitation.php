<?php
require_once 'vendor/mandrill/mandrill/src/Mandrill.php';


    $mandrill = new Mandrill('yLdpaxPSdLCJ1a1-j_nD2A');
    $message = array(
        'html' => '<p>Invitation for the event</p>',
        'text' => 'Hello',
        'subject' => 'RSVP',
        'from_email' => 'shubham.nautiyal@coloredcow.com',
        'from_name' => 'Shubham Nautiyal',
        'to' => $recipients,
        'headers' => array('Reply-To' => 'message.reply@example.com'),
        'preserve_recipients' => null,
        'view_content_link' => null,
        'bcc_address' => 'message.bcc_address@example.com',
        'tracking_domain' => null,
        'signing_domain' => null,
        'return_path_domain' => null,
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
        ),
    );
    $async = false;
    $ip_pool = 'Main Pool';
    $result = $mandrill->messages->send($message, $async, $ip_pool);
    print_r($result);
    
?>