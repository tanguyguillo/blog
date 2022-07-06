<?php

namespace Application\Controllers\PostsController;

use Application\Controllers\Controller;
use Application\Models\PostsModel\PostsRepository;
use Application\Core\Database\Database\DatabaseConnection;

// to use requite here have to fbe fix.... still a issue
require_once(ROOT . '/app/core/database/database.php');  // used for $connection
require_once(ROOT . '/app/models/PostsModel.php'); // used for getPosts

/**
 * Class of the blog listing
 */
class PostsController extends Controller
{
  /**
   * Only showing post with all posts with new date and teaser
   *
   * @return void
   */
  public function executePosts()
  {
    $connection = new DatabaseConnection(); // from models

    //then we will use this connexion to get what we want ; here posts
    $postsRepository = new PostsRepository();
    $postsRepository->connection = $connection;
    $posts = $postsRepository->getPosts(); // return an array

    $this->twig->display('posts/posts.html.twig', compact('posts'));

    /**  another synthaxe
     * $this->twig->display('posts/posts.html.twig', [
     *   'posts' => $posts
     *  ]);
     */
  }
}
