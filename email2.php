<?php
//require 'Mandrill.php';
require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
$mandrill = new Mandrill('a7ISXK8O1JWJnBr2HEqT8A');

$message = array(
    'subject' => 'My subject',
    'from_email' => 'avinashghare572@gmail.com',
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
        'name' => 'main',
        'content' => 'Hi *|FIRSTNAME|* *|LASTNAME|*, thanks for signing up.'),
    array(
        'name' => 'footer',
        'content' => 'Copyright 2013.')

);

$response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
print_r($response);
?>