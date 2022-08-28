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

$to = 'blog-posts@omegawebprod.com';
$email_subject = "Contact blog.omegawebprod.com:  $name";

$headers = "From: noreply@blog.omegawebprod.com\n";

$email_body = "Une nouvelle demande d'information utilisateur\n\n" . "les détails:\n\nNom: $name\n\nEmail: $email_address\n\n Message:\n$message";
$headers .= "Reply-To: $email_address";

mail($to, utf8_decode($email_subject), utf8_decode($email_body), $headers);

return true;
