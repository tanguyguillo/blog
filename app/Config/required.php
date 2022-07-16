<?php
// perhaps there is a problem beetwen php 8 of Mamp et Php 8 oo the mac ? .... to see... perhaps on line it 'll works without those requires?
// the order hace a importance ?
require_once(ROOT . '/app/core/database/database.php');  // used for $connection

require_once(ROOT . '/app/model/DetailModel.php');
require_once(ROOT . '/app/model/UserModel.php');
require_once(ROOT . '/app/model/CommentModel.php');
require_once(ROOT . '/app/model/PostModel.php'); // used for getPosts

require_once(ROOT . '/app/controllers/Controller.php');
require_once(ROOT . '/app/controllers/HomepageController.php');
require_once(ROOT . '/app/controllers/PostsController.php');
require_once(ROOT . '/app/controllers/DetailController.php');
require_once(ROOT . '/app/controllers/InscriptionController.php');
require_once(ROOT . '/app/controllers/ConnexionController.php');
require_once(ROOT . '/app/controllers/ErrorController.php');
require_once(ROOT . '/app/controllers/InfoController.php');
