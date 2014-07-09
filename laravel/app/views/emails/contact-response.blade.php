<?php
$name = Input::get('name');
$email = Input::get ('email');
$subject = Input::get('subject');
$comments = Input::get ('comments');
$date_time = date("F j, Y, g:i a");
$userIpAddress = Request::getClientIp();
?>

<h1>Contact Form Submission From Yoursite.com </h1>

<p style="max-width:500px;">
    Name: {{$name}}<br>
    Email: {{$email}} <br>
    Subject: {{$subject}}<br>
    Comments: {{$comments}} <br>
    Date: {{$date_time}}<br>
    User IP address: {{$userIpAddress}}<br>
</p>