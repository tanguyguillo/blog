<?php

namespace Application\Controllers\PostsController;

// to use requite here have to fbe fix.... still a issue
require_once(ROOT . '/app/core/database/database.php');  // used for $connection
require_once(ROOT . '/app/models/postsModel.php'); // used for getPosts
require_once(ROOT . '/app/controllers/controller.php'); //

use Application\Controllers\Controller;
//use Application\Lib\Database\DatabaseConnection; // we use it for the method : DatabaseConnection()
use Application\Models\PostsModel\PostsModel;
use Application\Models\PostsModel\PostsRepository; // we use it for new PostsRepository()
//use Application\Lib\Database;
use Application\Core\Database\Database\DatabaseConnection;


/**
 * 
 *
 */
class PostsController extends Controller
{

  /**
   * Only showing postewith all post with date ans teaser
   *
   * @return void
   */

  public function executePosts()
  {
    $connection = new DatabaseConnection(); // from models

    //then we will use this connexion to get what we want ; here posts
    $postsRepository = new PostsRepository();  // in french Repository : "dépot"...."
    $postsRepository->connection = $connection;
    $posts = $postsRepository->getPosts(); // return an array

    $this->twig->display('posts/posts.html.twig', compact('posts'));

    /**  another synthaxe
     *$ this->twig->display('posts/posts.html.twig', [
     *   'posts' => $posts
     *  ]);
     */
  }

  /**
   * showing Post with everything
   *
   * $id is a integer
   * @return void
   */
  public function executePost($id)
  {
    $connection = new DatabaseConnection(); // from models

    //then we will use this connexion to get what we want ; here posts
    $postsRepository = new PostsRepository();  // in french Repository : "dépot"...."
    $postsRepository->connection = $connection;
    $posts = $postsRepository->getPosts(); // return an array

    $this->twig->display('posts/posts.html.twig', compact('posts'));

    /**  another synthaxe
     *$ this->twig->display('posts/posts.html.twig', [
     *   'posts' => $posts
     *  ]);
     */
  }
}
