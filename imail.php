<?php
/*development*/
error_reporting(E_ALL);
ini_set('display_errors', 'On');

/*production*/
//error_reporting(0);
//ini_set('display_errors', 'Off');

if(empty($_POST) && ($_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest')) exit;

$from     = 'example@example.com';
$email    = 'example@example.com';
$subject  = 'New message';
$message  = '';

$headers = "From: ".$from."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=utf-8\r\n";

$fields = array
(
    'user_name'     => 'Name: ',
    'user_phone'    => 'Phone: ',
    'user_email'    => 'E-mail: ',
);

foreach($_POST as $field => $value)
{
    if(!empty($fields[$field]))
        $message .= $fields[$field] . $value . '<br/>';
}

if(mail($email, $subject, $message, $headers))
    echo json_encode(array('error' => false));
else
    echo json_encode(array('error' => true));