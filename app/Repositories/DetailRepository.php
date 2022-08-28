<?php

namespace Application\Repositories\DetailRepository;

use Application\Models\Post\Post;

/**
 * Undocumented class
 */
class DetailRepository
{
    /**
     *  put in an array one post // use of htmlspecialchars for id (XSS)
     *
     *
     * return an objet
     */
    public function getPost(string $identifier)
    {
        $identifier = htmlspecialchars($identifier);
        $statement = $this->connection->getConnexion()->query(
            "SELECT id, postTitle, postChapo, postContent, DATE_FORMAT(postCreated, '%d/%m/%Y à %Hh%imin') AS postCreated, postStatus, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS postModified, user_id FROM blog_post where id = $identifier"
        );
        $statement->execute();
        $row = $statement->fetch();
        $author = $row['user_id']; // get that here because it's don't pass in the object ?
        $post = new DetailRepository();
        //hydratation
        $post = new post($row);
        $post->setUserId($author); // set that here because it's don't pass in the object (otherwise = NULL)?
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
