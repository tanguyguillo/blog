<?php
namespace Application\Controllers\PostsController;

require_once(ROOT . '/app/lib/database.php');  // used for $connection
require_once(ROOT . '/app/models/postsModel.php'); // used for getPosts
require_once(ROOT . '/app/controllers/controller.php'); //

use Application\Controllers\Controller;
use Application\Lib\Database\DatabaseConnection; // we use it for the method : DatabaseConnection()
use Application\Models\PostsModel\PostsModel;
use Application\Models\PostsModel\PostsRepository; // we use it for new PostsRepository()

/**
 *
 * //url used for this controller : in local : http://blog-omega.local/index.php?posts=bloglist
 *
 */
class PostsController extends Controller
{
  public function execute()
  {
    // just one connection to BDD
    $connection = new DatabaseConnection(); // from models

    //then we will use this connexion to get what we want ; here posts
    $postsRepository = new PostsRepository();  // in french dépot....
    $postsRepository->connection = $connection;
    $posts = $postsRepository->getPosts(); // return an array

  $this->twig->display('posts/posts.html.twig', compact('posts'));

/** 
*$this->twig->display('posts/posts.html.twig', [
*   'posts' => $posts
* ]);
 */

  }
}
