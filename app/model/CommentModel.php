<?php

namespace Application\Model\CommentModel;

// use Application\Core\Database\Database\DatabaseConnection;  //still in main controller

/**
 * Undocumented class
 */
class CommentNamingBase
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
class Comment
{
    /**
     * function to get all comments with all of this properties of a user
     *
     * @param string $identifier (of a post)
     * @return Array
     */
    public function getComments(string $identifier): array
    {
        $statement = $this->connection->getConnection()->query(
            // id	CommentCreated	commentStatus	commentContent	user_id	blog_post_id	blog_post_user_id
            //"SELECT id; EmailUser; passWordUser; nameUser; surNameUser; titleUser; telGsmUser; roleUser; pictureOrLogo;  FROM user where  blog_post_id = $identifier"
            "SELECT * FROM comment where blog_post_id = $identifier" // blog_post_id is the id of the post
        );
        $postComment = [];
        while (($row = $statement->fetch())) {
            $postComment = new comment();
            $postComment->commentStatus = $row['commentStatus'];
            $postComment->commentContent = $row['commentContent'];
            $postComment->blog_post_id = $row['blog_post_id'];
            $postComment->user_id = $row['user_id'];
            $postComment->id = $row['id'];
            $postComments[] = $postComment;
        }

        // to convert the objet in array (warning if property private ?)
        // perhaps an function will be better....
        //$postComments = json_decode(json_encode($postComments), true);

        // if no comment... "Désolé pas de commentaire pour ce post" is a kind of comment....
        if (!isset($postComments)) {
            $postComment = [
                'commentStatus' => 'Open',
                'commentContent' => 'Désolé pas de commentaire pour ce post',
            ];
            $postComments[] = $postComment;
        }
        return $postComments;
    }
}
