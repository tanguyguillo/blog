<?php

namespace Application\Model\CommentModel;

/**
 * class of blog's comments
 */
class Comment
{
    /**
     * Undocumented function
     */
    function __construct()
    {
    }

    /**
     * function to get all comments with all of this properties of a user
     *
     * @param string $identifier (of a post)
     * @return Array
     */
    public function getComments($identifier): array
    {
        $statement = $this->connection->getConnection()->query(
            // id	commentCreated	commentStatus	commentContent	user_id	blog_post_id	blog_post_user_id
            //"SELECT id; EmailUser; passWordUser; firstnNameUser; surNameUser; titleUser; telGsmUser; roleUser; pictureOrLogo;  FROM user where  blog_post_id = $identifier"
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

    /**
     * function to write a comment
     *
     * @param array
     * @return void
     */
    public function SetComments(array $Array)
    {
        if ($_SESSION['LOGGED_USER']) {
            $user_id = intval($Array['idUser']);
            $CommentCreated = date('Y-m-d h:i:s');
            $commentStatus = "Waiting for validation";
            $commentContent = $Array['commentPost'];
            $blog_post_id = intval($_SESSION['LOGGED_PAGE_ID']);

            $blog_post_user_id = $_SESSION['LOGGED_PAGE_WRITER_ID']; // the writter'id of the article
            var_dump($blog_post_user_id);
            try {
                $statement = $this->connection->getConnection()->query(
                    "INSERT INTO comment (commentCreated, commentStatus, commentContent, user_id, blog_post_id, blog_post_user_id)  VALUES ('$CommentCreated ', '$commentStatus', '$commentContent', '$user_id ', '$blog_post_id', '$blog_post_user_id');"
                );
                return true;
            } catch (Exception $e) {
                $errorMessage = $e->getMessage();
                require(ROOT . '/app/templatesError/error.php');
                return false;
            }
        } else {
            return true;
        }
    }
}
