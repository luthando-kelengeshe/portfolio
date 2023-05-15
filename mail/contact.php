<?php

if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$m_subject = trim($_POST['subject']);
$message = trim($_POST['message']);

$to = "dde995377a7fb6e66620950e59821eb9"; 
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

mail($to, $subject, $body, $header);

if(!mail($to, $subject, $body, $header))
  http_response_code(500);

?> 

