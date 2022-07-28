<?php

namespace Application\Controllers\PostsController;

use Application\Controllers\Controller;
use Application\Model\PostModel\PostsRepository;
//use Application\Core\Database\Database\DatabaseConnection;
use Application\Core\Database\Database\DatabaseConnection;

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
  }
}
