

<?php ob_start(); ?>

<h1>Page Not Found</h1>
 <p>Sorry, but the page you were trying to view does not exist.</p>

<p>Une erreur est survenue : <?= $errorMessage ?></p>
<?php $content = ob_get_clean(); ?>

<?php require('layout.php') ?>
