<?php

namespace Application\Controllers\DetailController;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Controllers\Controller;
use Application\Models\DetailModel\Detail;
use Application\Models\UserModel\User;
use Application\Models\CommentModel\Comment;

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

        //$blog_post_id = $detail['blog_post_id']; // here the id of the post : blog_post_id

        // 2 - user
        $connection = new DatabaseConnection();
        $user = new User();
        $user->connection = $connection;
        $user  = $user->getUser($identifier); // return an array

        // 3 - Comment
        $connection = new DatabaseConnection();
        $postComments = new Comment();
        $postComments->connection = $connection;
        $postComments  = $postComments->getComments($identifier); // return an array
        $postComments = json_decode(json_encode($postComments), true);

        //array(1) { [0]=> array(5) { ["commentStatus"]=> string(4) "Open" ["commentContent"]=> string(11) "bla bla bla" ["blog_post_id"]=> string(1) "1" ["user_id"]=> string(1) "1" ["id"]=> string(1) "1" } }

        ////*  use deletePostsIfNotValid($array) from Controller to delete post not valid for instance it use twig

        $this->twig->display('detail/detail.html.twig', compact('detail', 'user', 'postComments'));
    }
}
