<?php

namespace Application\Repositories\Post;

use Application\Controllers\Controller;
use Application\Models\PosModel;
//use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;


/**
 * class just to keep in mind the attribut's names of the bdd
 */
class PostController extends Controller
{
    // private $id;
    // private  $posTitle;
    // public $postChapo;
    // public $postContent;
    // public $postCreated;
    // public $postStatus;
    // public $postModified;
}
class PostsRepository extends Controller
{
    /**
     *
     * return an Array
     */
    public function getPosts(): array
    {
        $statement = $this->connection->getConnexion()->query(
            "SELECT id, postTitle, postChapo, postStatus, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date FROM blog_post ORDER BY postModified DESC LIMIT 0, 100"
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
     * @param [type] $arrayPost
     * @return bool
     */
    public function updatePost(array $arrayPost)
    {
        // to look out data comming from outside even in admin aera
        foreach ($arrayPost as $key => $value) {
            $postData[$key]  = strip_tags(htmlspecialchars($value));
            $postData[$key] = str_replace("'", "&apos;", $value);
        }
        $arrayPost = $this->lookOutDataFromOustide($arrayPost); // From Controller
        $arrayPost = $postData;


        $id = ($arrayPost["id"]);
        $postTitle = ($arrayPost["postTitle"]);
        $postChapo = ($arrayPost["postChapo"]);
        $postContent = ($arrayPost["postContent"]);
        $postStatus = ($arrayPost["postStatus"]);
        $postModified = date("Y-m-d H:i:s");    // not in the POST
        $postStatus = ($arrayPost["postStatus"]);
        $user_id = ($arrayPost["user_id"]); // pop up admin Author

        $query = "UPDATE blog_post SET 
        postTitle = '$postTitle',
        postChapo = '$postChapo',
        postContent = '$postContent',
        postStatus = '$postStatus',
        postModified = '$postModified',
        user_id = '$user_id'
        WHERE id = '$id' ";

        try {
            // delete
            if (isset($arrayPost["checkbox"])) {
                $id = $arrayPost["id"];
                $query = "DELETE FROM blog_post WHERE blog_post.id = $id";
                $statement = $this->connection->getConnexion()->query($query);
                return true;
            }
            $statement = $this->connection->getConnexion()->query($query);
            return true;
        } catch (\Exception $e) {
            // $this->twig->display('error/error.html.twig', compact('message'));
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
    }

    /**
     * function to insert post
     *
     * @param array $arrayPost
     * @return bool
     */
    public function newPost(array $arrayPost)
    {
        $arrayPost = $this->lookOutDataFromOustide($arrayPost); // From Controller

        $postTitle = ($arrayPost["postTitle"]);
        $postChapo = ($arrayPost["postChapo"]);
        $postContent = ($arrayPost["postContent"]);
        $postStatus = ($arrayPost["postStatus"]);
        $postCreated = date("Y-m-d H:i:s");
        $postStatus = ($arrayPost["postStatus"]);
        $user_id = ($arrayPost["user_id"]); // pop up admin Author

        $postModified = $postCreated;

        $query = "INSERT INTO blog_post (postTitle , postChapo, postContent, postCreated, postStatus, postModified, user_id) 
        VALUES ('$postTitle', '$postChapo', '$postContent', '$postCreated', '$postStatus', '$postModified', '$user_id')";

        try {
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
