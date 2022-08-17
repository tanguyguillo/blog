<?php

namespace Application\Model\DetailModel;


/**
 * Undocumented class
 */
class Detail
{
    /**
     * Undocumented function
     */
    function __construct()
    {
    }

    /**
     *  put in an array one post // use of htmlspecialchars for id (XSS)
     * 
     * todo : $str = str_replace("\", "", $str);
     *
     * return an Array
     */
    public function getPost(string $identifier): Detail
    {
        $identifier = htmlspecialchars($identifier);
        $statement = $this->connection->getConnexion()->query(
            "SELECT id, postTitle, postChapo, postContent, DATE_FORMAT(postCreated, '%d/%m/%Y à %Hh%imin') AS french_created_date, postStatus, postName, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS french_modified_date, user_id  FROM blog_post where id = $identifier"
        );
        $statement->execute();
        $row = $statement->fetch();
        $post = new Detail();
        $post->idPost = $row['id'];
        $post->postTitle = $row['postTitle'];
        $post->postChapo = $row['postChapo'];
        $post->postContent = $row['postContent'];
        $post->postCreated = $row['french_created_date'];
        $post->postStatus = $row['postStatus'];
        $post->postName = $row['postName'];
        $post->postModified = $row['french_modified_date'];
        $post->user_id = $row['user_id'];
        $posts[] = $post;
        $posts = json_decode(json_encode($posts), true); // it's was an object
        $_SESSION['LOGGED_PAGE_WRITER_ID'] = $row['user_id'];

        return $post;
    }

    /**
     * Look if the post id exist and is open
     *
     * @return bool
     */
    public function getMaxAndOpen(int $identifier)
    {
        $identifier = htmlspecialchars($identifier);
        $statement = $this->connection->getConnexion()->query("SELECT * FROM blog_post where id = $identifier and postStatus = 'Open'");
        $statement->execute();
        $row = $statement->fetch();

        if (is_null($row["id"])) {
            return false;
        } else {
            return true;
        }
    }
}
