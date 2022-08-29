<?php

namespace Application\Repositories\DetailRepository;

use Application\Models\Post\Post;

/**
 *  class DetailRepository
 */
class DetailRepository
{
    /**
     *  
     * hydratation post ( $post->setUserId($author);)
     *
     * return an objet
     */
    public function getPost($identifier)
    {
        $identifier = htmlspecialchars($identifier);
        $statement = $this->connection->getConnexion()->query(
            "SELECT id, postTitle, postChapo, postContent, DATE_FORMAT(postCreated, '%d/%m/%Y à %Hh%imin') AS postCreated, postStatus, DATE_FORMAT(postModified, '%d/%m/%Y à %Hh%imin') AS postModified, user_id FROM blog_post where id = $identifier"
        );
        $statement->execute();
        $row = $statement->fetch();
        $author = $row['user_id'];
        $post = new DetailRepository();

        $post = new post($row);
        $post->setUserId($author);
        return $post;
    }

    /**
     * Look if the post id exist and is open
     * 
     * to see here bug version on line
     *
     * @return bool
     */
    public function getMaxAndOpen($identifier)
    {
        $identifier = intval($identifier);
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
