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

$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));

// Create the email and send the message
$to = 'blog-posts@omegawebprod.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Contact blog.omegawebprod.com:  $name";

// removed Tel but i keep the code - Tanguy
////$email_body = "Une nouvelle demande d'information utilisateur\n\n" . "les détails:\n\nNom: $name\n\nEmail: $email_address\n\nTéléphone: $phone\n\nMessage:\n$message";

$headers = "From: noreply@blog.omegawebprod.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.

$email_body = "Une nouvelle demande d'information utilisateur\n\n" . "les détails:\n\nNom: $name\n\nEmail: $email_address\n\n Message:\n$message";
$headers .= "Reply-To: $email_address";
// <meta charset="utf-8">
mail($to, utf8_decode($email_subject), utf8_decode($email_body), $headers);  // // original version ok but issues with éè etc... so  utf8_decode - tanguy

return true;
