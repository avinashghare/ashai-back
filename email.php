<?php
try {
    require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
    $mandrill = new Mandrill('a7ISXK8O1JWJnBr2HEqT8A');
    $template_name = 'avinash';
    $template_content = array(
        array(
            'name' => 'Powerforone',
            'content' => 'Powerforone Content'
        )
    );
    $message = array(
        'html' => '<p>Example HTML content</p>',
        'text' => 'Example text content',
        'subject' => 'example subject',
        'from_email' => 'avinash@wohlig.com',
        'from_name' => 'Powerforone',
        'to' => array(
            array(
                'email' => 'avinashghare572@gmail.com',
                'name' => 'Avinash',
                'type' => 'to'
            )
        ),
        'headers' => array('Reply-To' => 'avinash@wohlig.com'),
        'important' => false,
        'track_opens' => null,
        'track_clicks' => null,
        'auto_text' => null,
        'auto_html' => null,
        'inline_css' => null,
        'url_strip_qs' => null,
        'preserve_recipients' => null,
        'view_content_link' => null,
        'bcc_address' => 'avinashghare572@gmail.com',
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
                'rcpt' => 'avinashghare572@gmail.com',
                'vars' => array(
                    array(
                        'name' => 'merge2',
                        'content' => 'merge2 content'
                    )
                )
            )
        ),
        'tags' => array('password-resets'),
        'subaccount' => 'customer-123',
        'google_analytics_domains' => array('wohlig.com'),
        'google_analytics_campaign' => 'avinash@wohlig.com',
        'metadata' => array('website' => 'www.wohlig.com'),
        'recipient_metadata' => array(
            array(
                'rcpt' => 'chintan@wohlig.com',
                'values' => array('user_id' => 123456)
            )
        ),
        'attachments' => array(
            array(
                'type' => 'text/plain',
                'name' => 'myfile.txt',
                'content' => 'ZXhhbXBsZSBmaWxl'
            )
        ),
        'images' => array(
            array(
                'type' => 'image/png',
                'name' => 'IMAGECID',
                'content' => 'ZXhhbXBsZSBmaWxl'
            )
        )
    );
    $async = false;
    $ip_pool = 'Main Pool';
    
    $send_at = '2015-04-04 10:00:00';
    $result = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
    print_r($result);
    /*
    Array
    (
        [0] => Array
            (
                [email] => recipient.email@example.com
                [status] => sent
                [reject_reason] => hard-bounce
                [_id] => abc123abc123abc123abc123abc123
            )
    
    )
    */
} catch(Mandrill_Error $e) {
    // Mandrill errors are thrown as exceptions
    echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
    // A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
    throw $e;
}
?>