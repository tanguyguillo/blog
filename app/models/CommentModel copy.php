<?php

namespace Application\Models\CommentModel;

// use Application\Core\Database\Database\DatabaseConnection;  //still in main controller

class UserModel
{
    public $id;
    public $CommentCreated;
    public $commentStatus;
    public $commentContent;
    public $user_id;
    public $blog_post_id;
    public $blog_post_user_id;
}

/**
 * class of blog's comments
 */
class comment
{
    /**
     * function to get all comments with all of this properties of a user
     *
     * @param string $identifier
     * @return Array
     */
    public function getComments(string $identifier): array
    {
        $statement = $this->connection->getConnection()->query(
            // id	CommentCreated	commentStatus	commentContent	user_id	blog_post_id	blog_post_user_id
            //"SELECT id; EmailUser; passWordUser; nameUser; surNameUser; titleUser; telGsmUser; roleUser; pictureOrLogo;  FROM user where id = $identifier"
            "SELECT * FROM comment where id = $identifier"
        );

        $postComment = [];
        while (($row = $statement->fetch())) {
            $postComment = new comment();
            $postComment->commentStatus = $row['commentStatus'];
            $postComment->commentConten = $row['commentContent'];
            $postComment->blog_post_id = $row['blog_post_id'];
            $postComment->user_id = $row['user_id'];
            $postComment->id = $row['id'];
            $postComments[] = $postComment;
        }

        // to convert the objet in array (warning if property private ?)
        // perhaps an function will be better....
        //$postComments = json_decode(json_encode($postComments), true);

        return $postComment;
    }
}
