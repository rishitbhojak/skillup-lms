<?php

// get email from the config file
$config = require_once __DIR__ . '/config.php';
$recipient_email = $config['mail']['to_email'];

// contact information
$contact_name = $inputs['name'];
$contact_email = $inputs['email'];
$message = $inputs['message'];
$subject = $inputs['subject'];

// Email header
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=utf-8';
$headers[] = "From: Your name <rishit2810.cse@gmail.com>' . \r\n";
$header = implode('\r\n', $headers);

mail($subject, $message, $header);
