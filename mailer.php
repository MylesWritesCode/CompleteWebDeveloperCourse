<?php
  // Basic mailer for PHP
  $emailTo = "";
  $subject = "Subject";
  $body = "Body of the email."
  $headers = "From: anyemail@example.com";

  if (mail($emailTo, $subject, $body, $headers)) {
    echo "The email was sent successfully.";
  } else {
    echo "The email could not be sent.";
  }
?>
