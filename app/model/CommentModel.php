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
            // id	CommentCreated	commentStatus	commentContent	user_id	blog_post_id	blog_post_user_id
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
     * @param array $Array // Ex:  //array(3) { ["commentPost"]=> string(4) "test" ["postId"]=> string(1) "3" ["idUser"]=> string(1) "2" }
     * @return void
     */
    public function SetComments(array $Array)
    {
        $postId = $Array['postId'];
        var_dump($postId);

        $CommentCreated = date('Y-m-d h:i:s');
        var_dump($CommentCreated);

        $commentStatus = "waiting for validation";
        var_dump($commentStatus);

        $commentContent = $Array['commentPost'];
        var_dump($commentContent);

        $user_id = $Array['idUser'];
        var_dump($user_id);

        $blog_post_id = $_SESSION['LOGGED_PAGE_ID'];
        var_dump($_SESSION['LOGGED_PAGE_ID']);

        $blog_post_user_id = $postId;  // see the blog designer if question on DB
        var_dump($blog_post_user_id);

        string(1) "3" string(19) "2022-07-18 05:19:58" string(22) "waiting for validation" string(9) "xcsqcccsq" string(1) "2" string(1) "3" string(1) "3"
        exit;

        // var_dump($blog_post_user_id, $CommentCreated, $commentStatus, $user_id, $commentContent, $blog_post_id);
        // string(1) "3" string(19) "2022-07-18 04:55:21" string(22) "waiting for validation" string(1) "2" string(50) "test de commentaire sur titre du 3 18 juillet 2022" string(1) "3"
        // exit;

        // try {

        // $statement = $this->connection->getConnection()->query(
        //     "INSERT INTO comment VALUES ($blog_post_user_id, $CommentCreated, $commentStatus, $user_id, $commentContent, $blog_post_id"
        // );

        //waiting for validation, 2, test de commentaire sur titre du 3 18 juil' at line 1

        // catch (Exception $e) {
        //     //echo 'Exception reçue : ',  $e->getMessage(), "\n";
        //     // for instance
        //     $errorMessage = $e->getMessage();
        //     require(ROOT . '/app/templatesError/error.php');
        // }

    }


    /**
     * Undocumented function
     *
     * @param [type] $numberToTest
     * @return boolean
     */
    public function isInteger($numberToTest)
    {
        if (is_integer($numberToTest)) {
            return true; //// 0-9
        } else {
            echo "Wrong number";
            return false;
        }
    }
}
