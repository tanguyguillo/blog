<?php

require_once('../app/controllers/homepage.php');

use Application\Controllers\Homepage\Homepage;

// <a href="test_get.php?subject=PHP&web=W3schools.com">Test $GET</a>
// echo "Study " . $_GET['subject'] . " at " . $_GET['web'];
//http://blog-omega.local/index.php?posts=list
//echo "test " . $_GET['posts'] ;
//exit();


try {
// router  ex : http://blog.local/index.php?action=posts


  if ($_GET['action'] === 'posts') {

    var_dump('test');

    exit();

  } else {

    (new Homepage())->execute();
  }
} catch (Exception $e) {
  $errorMessage = $e->getMessage();
  require('../app/views/error.php');
}






/*try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new Post())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddComment())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        (new Homepage())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('templates/error.php');
}*/
