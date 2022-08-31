<?php

namespace Application\Repositories\CommentRepository;

use Application\Models\Comment\Comment;
use Application\Repositories\Repository\Repository;


/**
 * class
 */
class CommentRepository
{
    /**
     * function to get all comments with all of this properties of a user
     *
     * @param string $identifier (of a post)
     * @return Array
     */
    public function getComments($identifier): array
    {
        $statement = $this->connection->getConnexion()->query(
            "SELECT * FROM comment where blog_post_id = $identifier" // blog_post_id is the id of the post
        );
        $postComment = [];
        while (($row = $statement->fetch())) {
            $postComment = new CommentRepository();
            $postComment = new Comment($row); //hydratation
            $postComments[] = $postComment;
        }
        // if no comment... "Désolé pas de commentaire pour ce post" is a kind of comment....
        if (!isset($postComments)) {
            $postComment = new Comment();
            $postComment->setCommentStatus('Open');
            $postComment->setCommentContent('Désolé pas de commentaire pour ce post');
            $postComments[] = $postComment;
        }
        return $postComments;
    }
    /**
     *  function to get data from comment, blog_post, user for admin
     *
     * @return object
     */
    public function getAllComments()
    {
        try {
            $statement = $this->connection->getConnexion()->query(
                "SELECT c.id, commentCreated, commentStatus, commentContent, c.user_id , blog_post_id , u.emailUser, u.roleUser, bp.postTitle, bp.postChapo
                FROM comment AS c
                JOIN user as u
                ON(c.user_id = u.id)
                JOIN blog_post as bp
                ON( bp.id = c.blog_post_id ) ORDER BY commentCreated DESC
            "
            );
            $datas = [];
            $statement->execute();
            while (($row = $statement->fetch())) {
                $data = new CommentRepository();
                $data->commentId = $row['id'];
                $data->commentCreated = $row['commentCreated'];
                $data->commentStatus = $row['commentStatus'];
                $data->commentContent = $row['commentContent'];
                $data->postTitle = $row['postTitle'];
                $data->postChapo = $row['postChapo'];
                $data->emailUser = $row['emailUser'];
                $data->roleUser = $row['roleUser'];
                $datas[] = $data;
            }

            return $datas;
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
    }

    /**
     * function to write a comment  with MVC and POO ... V2 used
     *
     * @param array
     * @return void
     */
    public function setComment(array $array)
    {
        if ($_SESSION['LOGGED_USER']) {
            $user_id = intval($array['idUser']);

            // sometimes it's happens ... issue with data refreshed page
            if ($user_id == 0) {
                $user_id = $_SESSION['LOGGED_USER_ID'];
                if ($user_id == 0) {
                    return false;
                }
            }

            $commentCreated = date('Y-m-d h:i:s');
            $commentStatus = "Waiting for validation";
            $commentContent = $array['commentPost'];
            $blog_post_id = intval($_SESSION['LOGGED_PAGE_ID']);
            $blog_post_user_id = intval($_SESSION['LOGGED_PAGE_WRITER_ID']); // the writter'id of the article

            // Hydratation of the object
            $comment =  new Comment(); // instanciation of the object
            $comt = $comment;
            $comt->setCommentCreated($commentCreated);
            $comt->setCommentStatus($commentStatus);
            $comt->setCommentContent($commentContent);
            $comt->setUserId($user_id);
            $comt->setBlogPostUserId($blog_post_user_id);
            $comt->setBlogPostId($blog_post_id);

            $table = "comment";
            $statement = $this->connection->getConnexion();

            $repository = new Repository;
            if ($repository->create($comt, $table, $statement, "create")) {
                return true;
            }
        } else {
            return false;
        }
    }

    /**
     * function to modify the visibility of a comment or delete it
     *
     * @param array $arrayComment
     * @return bool
     */
    public function updateComment(array $arrayComment)
    {
        try {
            $id = ($arrayComment["id"]);
            $commentStatus = ($arrayComment["commentStatus"]);
            $query = "UPDATE comment SET commentStatus = '$commentStatus'
            WHERE id = '$id' ";

            /**
             * delete
             */
            if (isset($arrayComment["checkbox"])) {
                $id = $arrayComment["id"];
                $query = "DELETE FROM comment WHERE id = '$id'";
                $statement = $this->connection->getConnexion()->query($query);
                return true;
            }

            $statement = $this->connection->getConnexion()->query($query);
            return true;
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
    }
}
