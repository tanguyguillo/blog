<?php

namespace Application\Controllers\DetailController;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Controllers\Controller;
use Application\Models\DetailModel\Detail;
use Application\Models\UseModel\PostsModel;
use Application\Models\UserModel\User;
use Application\Models\CommentModel\Comment;

require_once(ROOT . '/app/models/DetailModel.php');
require_once(ROOT . '/app/models/UserModel.php');
require_once(ROOT . '/app/models/CommentModel.php');

class DetailController extends Controller
{
    /**
     * Function to show one blog post
     *
     * @param string $identifier
     * @return void
     */
    public function Detail($identifier)
    {
        $connection = new DatabaseConnection();
        // 1 - Detail
        $postDetail = new Detail();
        $postDetail->connection = $connection;
        $detail =   $postDetail->getPost($identifier); // return an array
        // turn in Array
        $detail = json_decode(json_encode($detail), true);
        $idPost = $detail['idPost']; // for comment

        // 2 - user
        $connection = new DatabaseConnection();
        $user = new User();
        $user->connection = $connection;
        $user  = $user->getUser($identifier); // return an array

        // 3 - Comment
        $connection = new DatabaseConnection();
        $postComments = new Comment();
        $postComments->connection = $connection;
        $postComments  = $postComments->getComments($idPost); // return an array
        $postComments = json_decode(json_encode($postComments), true);

        ////*  use deletePostsIfNotValid($array) from Controller to delete post not valid for instance it use twig

        $this->twig->display('detail/detail.html.twig', compact('detail', 'user', 'postComments'));
    }
}
