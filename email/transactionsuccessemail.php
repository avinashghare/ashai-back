<?php
//require 'Mandrill.php';
require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
$mandrill = new Mandrill('JBaGvsZ2hASJrotu0sjhqg');
//print_r($_POST);
$table=$_POST["table"];
$email=$_POST["email"];
//echo $link;
$message = array(
    'subject' => 'Powerforone Successful Payment',
    'from_email' => 'avinashghare572@gmail.com',
    'to' => array(array('email' => $email, 'name' => 'Marc')),
    'merge_vars' => array(array(
        'rcpt' => $email,
        'vars' =>
        array(
            array(
                'name' => 'Avinash',
                'content' => 'Avinash'),
            array(
                'name' => 'G',
                'content' => 'g')
    ))));

$template_name = 'Forgot Password';

$template_content = array(
    array(
        'name' => 'table',
        'content' => $table)

);

$response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
$status=$response[0]['status'];
return $status;
//print_r($response);
?>