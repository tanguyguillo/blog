<?php
namespace Application\Controllers\Posts;


use Application\Lib\Database\DatabaseConnection;

class Posts
{

  public function execute()
  {
    $connection = new DatabaseConnection();

    var_dump('passing connect');
    exit();

    //require('../app/views/homepage.php');
  }
}


/*namespace Application\Controllers\Post;

require_once('src/lib/database.php');
require_once('src/model/comment.php');
require_once('src/model/post.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Comment\CommentRepository;
use Application\Model\Post\PostRepository;

class Post
{
  public function execute(string $identifier)
  {
    $connection = new DatabaseConnection();

    $postRepository = new PostRepository();
    $postRepository->connection = $connection;
    $post = $postRepository->getPost($identifier);

    $commentRepository = new CommentRepository();
    $commentRepository->connection = $connection;
    $comments = $commentRepository->getComments($identifier);

    require('templates/post.php');
  }
}*/
