<?php

namespace Application\Model\PostModel;

use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;


/**
 * class just to keep in mind the attribut's names of the bdd
 */
class PostController extends Controller
{
    // public $id;
    // public $posTitle;
    // public $postChapo;
    // public $postContent;
    // public $postCreated;
    // public $postStatus;
    // public $postName;
    // public $postModified;


}
class PostsRepository
{
    /**
     *
     * return an Array
     */
    public function getPosts(): array
    {
        $statement = $this->connection->getConnexion()->query(
            "SELECT id, postTitle, postChapo, postStatus, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date FROM blog_post ORDER BY postModified DESC LIMIT 0, 5"
        );
        $posts = [];
        while (($row = $statement->fetch())) {
            $post = new PostsRepository();
            $post->postStatus = $row['postStatus'];
            $post->postTitle = $row['postTitle'];
            $post->frenchModifiedDate = $row['french_modified_date'];
            $post->postChapo = $row['postChapo'];
            $post->id = $row['id'];
            $posts[] = $post;
        }
        return $posts;
    }

    /**
     * function to update a post from admin
     * 
     *
     * @param [type] $arrayPost
     * @return void
     */
    public function updatePost(array $arrayPost)
    {
        // to look out data comming from outside even in admin aera
        foreach ($arrayPost as $key => $value) {
            $postData[$key]  = strip_tags(htmlspecialchars($value));
        }

        $id = ($arrayPost["id"]);
        $postTitle = ($arrayPost["postTitle"]);
        $postChapo = ($arrayPost["postChapo"]);
        $postContent = ($arrayPost["postContent"]);
        $postStatus = ($arrayPost["postStatus"]);
        $postModified = date("Y-m-d H:i:s");    // not in the post
        $postStatus = ($arrayPost["postStatus"]);
        $user_id = ($arrayPost["user_id"]); // pop up admin Author

        try {
            $statement = $this->connection->getConnexion()->query("
            UPDATE blog_post
            SET
            postTitle = $postTitle;
            postChapo =  $postChapo;
            postContent = $postContent;
            postStatus = $postStatus;
            postModified =  $postModified;
            user_id = $user_id;
            WHERE id = $id;
        ");
            // have update also blo_post_user_id of 
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
    }
}
