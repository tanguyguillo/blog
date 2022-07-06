<?php

namespace Application\Controllers\DetailController;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Controllers\Controller;
use Application\Models\DetailModel\Detail;
use Application\Models\UseModel\PostsModel;
use Application\Models\UserModel\User;

require_once(ROOT . '/app/models/DetailModel.php');
require_once(ROOT . '/app/models/UserModel.php');

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

        // 2 - user
        $connection = new DatabaseConnection();
        $user = new User();
        $user->connection = $connection;
        $user  = $user->getUser($identifier); // return an array

        // use deletePostsIfNotValid($array) from Controller to delete post not valid

        $this->twig->display('detail/detail.html.twig', compact('detail', 'user'));
    }
}
