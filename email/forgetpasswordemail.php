<?php
//require 'Mandrill.php';
require_once 'mandrill-api-php/src/Mandrill.php'; //Not required with Composer
$mandrill = new Mandrill('JBaGvsZ2hASJrotu0sjhqg');
//print_r($_POST);
$userid=$_POST["userid"];
$email=$_POST["email"];
$link=$_POST["link"];
$hashvalue=$_POST["hashvalue"];
//echo $link;
$message = array(
    'subject' => 'Powerforone Change Password',
    'from_email' => 'powerforone@live.com',
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
        'name' => 'link',
        'content' => $link)

);

$response = $mandrill->messages->sendTemplate($template_name, $template_content, $message);
$status=$response[0]['status'];
//print_r($response);
return $status;
?>