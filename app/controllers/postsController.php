<?php

namespace Application\Controllers\PostsController;

use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Controllers\AdminController\AdminController as AdminControllerAdminController;
use Application\Repositories\PostsRepository\PostsRepository as PostsRepository;

/**
 * Class of the blog listing
 * 
 * may return an array if we don't want to render it onthe blog for admin comment
 */
class PostsController extends AdminControllerAdminController
{
    /**
     * Only showing post with all posts with new date and teaser
     *
     * @return mixed
     */
    public function executePosts(string $render)
    {
        $connection = new DatabaseConnexion();
        //then we will use this connexion to get what we want ; here posts
        $postsRepository = new PostsRepository();
        $postsRepository->connection = $connection;
        $posts = $postsRepository->getPost(); // return objet

        // main come from refresh
        if ($render == "render") {
            $this->twig->display('posts/posts.html.twig', compact('posts'));
        } else {
            return $posts;
        }
    }

    /**
     * function to update from admin (blocPostAdmin)
     *
     * @param  array $arrayPost 
     * @return void
     */
    public function update(array $arrayPost)
    {
        $connection = new DatabaseConnexion();
        $arrayPost = json_decode(json_encode($arrayPost), true);
        $postsRepository = new PostsRepository();
        $postsRepository->connection = $connection;

        // to correct in connexion
        if ($postsRepository->updatePost($arrayPost)) {
            // now have to redirect with message
            $message = "Enregistrement effectué";

            // we use the parent's function from AdminController
            $this->blocPostadmin($arrayPost, $message);
        } else {
            // not OK
        }
    }

    /**
     * function adding Post
     *
     * @param  array $arrayPost
     * @return void
     */
    public function newPost(array $arrayPost)
    {
        $connection = new DatabaseConnexion();
        $postsRepository = new PostsRepository();
        $postsRepository->connection = $connection;

        if ($postsRepository->newPost($arrayPost)) {
            // now have to redirect with message
            $message = "Enregistrement effectué";

            // we use the parent's function from AdminController
            $this->blocPostadmin($arrayPost, $message);
        } else {
            // not OK
        }
    }
}
