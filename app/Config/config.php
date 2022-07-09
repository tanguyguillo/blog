<?php
//local
define('USER', "blog");
define('PASSWD', "blog");
define('SERVER', "localhost");
define('BASE', "blog");

define('BASE_URL', 'http://http://blog-omega.local');

// perhaps there is a problem beetwen php 8 of Mamp et Php 8 oo the mac ? .... to see... perhaps on line it 'll works without those requires?
require_once(ROOT . '/app/models/DetailModel.php');
require_once(ROOT . '/app/models/UserModel.php');
require_once(ROOT . '/app/models/CommentModel.php');
require_once(ROOT . '/app/core/database/database.php');  // used for $connection
require_once(ROOT . '/app/models/PostsModel.php'); // used for getPosts

require_once(ROOT . '/app/controllers/Controller.php');
require_once(ROOT . '/app/controllers/HomepageController.php');
require_once(ROOT . '/app/controllers/PostsController.php');
require_once(ROOT . '/app/controllers/DetailController.php');
require_once(ROOT . '/app/controllers/ErrorController.php');
require_once(ROOT . '/app/controllers/InscriptionController.php');
