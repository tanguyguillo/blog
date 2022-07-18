<?php

namespace Application\Controllers\CommentController;

use Application\Controllers\Controller;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Model\UserModel\UsersRepository;
use Application\Model\DetailModel\Detail;
use Application\Model\UserModel\User;
use Application\Model\CommentModel\Comment;
use Application\Controllers\ErrorController\ErrorController;
use Application\Controllers\connexion\ConnexionController;

/**
 *  class manadging comments
 */
class CommentController extends Controller
{
    /**
     * function to set a new comment on an article
     *
     * @param sarray $arrayCommen
     * @return void
     */
    public function SetComment(array $arrayComment)
    {

        var_dump($arrayComment);
    }
}
