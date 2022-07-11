<?php
// Check for empty fields
if (
   empty($_POST['name'])        ||
   empty($_POST['email'])       ||
   empty($_POST['phone'])       ||
   empty($_POST['message'])   ||
   !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
) {
   echo "Aucun argument fourni !";
   return false;
}

// original version but issues with éè etc...
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'blog-posts@omegawebprod.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contact blog.omegawebprod.com:  $name";
$email_body = "Une nouvelle demande d'info.\n\n" . "les details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@blog.omegawebprod.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to, $email_subject, $email_body, $headers);


//// testing but not ok
// $name = strip_tags(htmlspecialchars($_POST['name'] . "?="));
// $email_address = strip_tags(htmlspecialchars($_POST['email']));
// $phone = strip_tags(htmlspecialchars($_POST['phone']));
// $message = strip_tags(htmlspecialchars($_POST['message']));

// $name  = "=?UTF-8?B?" . base64_encode($name) . "?=";
// $email_address = "=?UTF-8?B?" . base64_encode($email_address) . "?=";
// $phone= = "=?UTF-8?B?" . base64_encode($phone) . "?=";
// $message = "=?UTF-8?B?" . base64_encode($message) . "?=";

// // Create the email and send the message
// $to = 'blog-posts@omegawebprod.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form OmegaWebProd:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";

// $headers  = 'MIME-Version: 1.0' . "\r\n";
// $headers = "From: noreply@omegawebprod.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";
// $headers  .= 'Content-Type: text/plain; charset=UTF-8;' . "\r\n";
// mail($to, $email_subject, $email_body, $headers);

return true;
