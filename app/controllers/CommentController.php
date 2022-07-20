<?php

namespace Application\Controllers\CommentController;

use Application\Controllers\Controller;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Model\CommentModel\Comment;


/**
 *  class manadging comments
 */
class CommentController extends Controller
{
    /**
     * function to set a new comment on an article
     *
     * @param sarray $arrayComment 
     * ex : array(3) { ["commentPost"]=> string(7) "qSsqsqs" ["postId"]=> string(1) "3" ["idUser"]=> string(1) "2" }
     * 
     * @return void
     */
    public function SetComment(array $arrayComment)
    {
        $arrayComment = json_decode(json_encode($arrayComment), true);

        $arrayComment = $arrayComment;
        $connection = new DatabaseConnection();
        $Comment = new Comment();
        $Comment->connection = $connection;
        $newcComment = $Comment->SetComments($arrayComment);
    }
}