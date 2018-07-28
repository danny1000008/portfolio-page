<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );

    $inject = join('|', $injections);
    $inject = "/$inject/i";
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}
if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

if(!isset($_POST['submit']))
{
    // checks if form was submitted
    echo 'Error: you must submit the form from the web page.';
}
$vis_name = $_POST['visName'];
$vis_email = $_POST['visEmail'];
$vis_phone = $_POST['visPhone'];
$vis_msg = $_POST['visMsg'];

// email creation
$email_to = 'danny1000008@yahoo.com';
$email_subjact = 'test form on dannywagstaff.com';
$email_body = 'Message from ' . $vis_name . '; email = ' . $vis_email . '; phone # = '.
    $vis_phone . '; Message: ' . $vis_msg;
$headers = 'From: ' . $vis_email . '\r\n';

// send email
mail($email_to, $email_subject, $email_body, $headers);
echo 'Thanks for contacting me. I will get back to you as soon as possible.';
?>
