<?php
namespace Application\Controllers\Posts; // just the name space name of this class

///Users/Tanguy/Documents/sites/blog-omega/app/lib/database.php
//require_once('lib/database.php');  // used for $connection

require_once('///Users/Tanguy/Documents/sites/blog-omega/app/lib/database.php');  // used for $connection
require_once('///Users/Tanguy/Documents/sites/blog-omega/app/models/posts.php'); // used for getPosts

use Application\Lib\Database\DatabaseConnection; // we use it for the method : DatabaseConnection()
use Application\Models\Posts\PostsRepository; // we use it for new PostsRepository()

/**
 * 
 * //url used for this controller : in local : http://blog-omega.local/index.php?posts=bloglist
 * 
 */
class Posts
{
  public function execute()
  {
    // just one connection to BDD
    $connection = new DatabaseConnection(); // from models  ... not founf ? why

    //then we will use this connexion to get what we want ; here posts
    $postsRepository = new PostsRepository();  // in french dépot.... 
    $postsRepository->connection = $connection;
    $posts = $postsRepository->getPosts(); // a array
  }
}//ending of class Post



/* exemple

<?php

namespace Application\Controllers\Post;

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
