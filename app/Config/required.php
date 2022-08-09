<?php
require_once(ROOT . '/app/core/database/databaseConnexion.php');  // used for $connection

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
require_once(ROOT . '/app/controllers/CommentController.php');
