<?php

namespace Application\Controllers\PostsController;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Model\PostModel\PostsRepository;
use Application\Controllers\AdminController;
use Application\Controllers\AdminController\AdminController as AdminControllerAdminController;

/**
 * Class of the blog listing
 */
class PostsController extends AdminControllerAdminController
{
  /**
   * Only showing post with all posts with new date and teaser
   *
   * @return void
   */
  public function executePosts()
  {
    $connection = new DatabaseConnexion();
    //then we will use this connexion to get what we want ; here posts
    $postsRepository = new PostsRepository();
    $postsRepository->connection = $connection;
    $posts = $postsRepository->getPosts(); // return an array
    $this->twig->display('posts/posts.html.twig', compact('posts'));
  }

  /**
   * function to update from admin (blocPostAdmin)
   *
   * @param array $arrayPost 
   * @return void
   */
  public function update(array $arrayPost)
  {
    $connection = new DatabaseConnexion();
    $arrayPost = json_decode(json_encode($arrayPost), true);
    $postsRepository = new PostsRepository();
    $postsRepository->connection = $connection;  // connection ???
    if ($postsRepository->updatePost($arrayPost)) {
      // now have to redirect with message
      $message = "Enregistrement effectué";

      // we use the parent's function from AdminController
      $this->BlocPostadmin($message);
    } else {
      // not OK
    }
  }
}
