<?php

namespace Application\Repositories\Comment;

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
        $statement = $this->connection->getConnexion()->query(
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
    public function setComments(array $array)
    {
        if ($_SESSION['LOGGED_USER']) {
            $user_id = intval($array['idUser']);

            // sometimes it's happens ... isuue with data refreshed page
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

            try {
                $statement = $this->connection->getConnexion()->query(
                    "INSERT INTO comment (commentCreated, commentStatus, commentContent, user_id, blog_post_id, blog_post_user_id)  VALUES ('$commentCreated ', '$commentStatus', '$commentContent', '$user_id ', '$blog_post_id', '$blog_post_user_id');"
                );
                return true;
            } catch (\Exception $e) {
                $errorMessage = $e->getMessage();
                require(ROOT . '/app/templatesError/error.php');
                return false;
            }
        } else {
            return true;
        }
    }
}
/**
 * class
 */
class CommentsRepository
{
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
                $data = new CommentsRepository();
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

            // delete
            if (isset($arrayComment["checkbox"])) {
                $id = $arrayComment["id"];
                $query = "DELETE FROM comment WHERE id = '$id'";
                $statement = $this->connection->getConnexion()->query($query);
                return true;
            }

            // just valif "open" or not
            $statement = $this->connection->getConnexion()->query($query);
            return true;
        } catch (\Exception $e) {
            // $this->twig->display('error/error.html.twig', compact('message'));
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
    }
}
