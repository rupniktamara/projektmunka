<?php
function sendMail($to, $subject, $msg)
{
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <baloo.alapitvany@gmail.com>' . "\r\n";

// Debug rész, koommentezd vissza, ha akarod látni a küldendő e-mail tartalmát.

    header('Content-Disposition: attachment; filename="sample.txt"');
    header('Content-Type: text/plain');
    header('Content-Length: ' . strlen($msg));
    header('Connection: close');

    echo $msg;

    mail($to, $subject, $msg, $headers);
}
