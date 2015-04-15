<?php
//require 'Mandrill.php';
require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
$mandrill = new Mandrill('JBaGvsZ2hASJrotu0sjhqg');

$message = array(
    'subject' => 'Powerforone Change Password',
    'from_email' => 'powerforone123@gmail.com',
    'to' => array(array('email' => 'avinash@wohlig.com', 'name' => 'Marc')),
    'merge_vars' => array(array(
        'rcpt' => 'avinash@wohlig.com',
        'vars' =>
        array(
            array(
                'name' => 'Avinash',
                'content' => 'Avinash'),
            array(
                'name' => 'G',
                'content' => 'g')
    ))));

$template_name = 'avinash';

$template_content = array(
    array(
        'name' => 'name',
        'content' => 'Chintan'),
    array(
        'name' => 'footer',
        'content' => 'Copyright 2015.')

);

$response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
print_r($response);
?>