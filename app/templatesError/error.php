<?php $title = "erreur"; ?>

<?php ob_start(); ?>
<h1>oooops !</h1>
<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php
// $message = $conten;
// $this->twig->display('error/error.html.twig', compact('message'));
?>

<?php require('layout.php') ?>