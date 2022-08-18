<?php

namespace Application\Controllers\AdminCommentController;

use Application\Controllers\Controller;

use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;

use Application\Repositories\Comment\CommentsRepository;

class AdminCommentController extends Controller
{

    /**
     * function to display admin comment aera
     *
     * @return void
     */
    public function blocCommentAdmin($message = "false")
    {
        if ($this->isAdmin()) {
            // get what we need
            $arrayComments = $this->getAdminCommentData();
            $arrayMessage =  $this->setMessageForTwig($message);

            $this->twig->display('Admin/blocCommentAdmin.html.twig', compact('arrayComments', 'arrayMessage'));
        } else {
            $this->redirectionNotAdmin();
        }
    }

    /**
     * function to Comments + blog_post + user for admin comment
     *
     * @return array 
     */
    public function getAdminCommentData()
    {
        if ($this->isAdmin()) {
            //  Comments + blog_post + user ;  getAllComments
            $connection = new DatabaseConnexion();
            $commentsRepository = new CommentsRepository();
            $commentsRepository->connection = $connection;
            $comments = $commentsRepository->getAllComments();
            $arrayComments = json_decode(json_encode($comments), true);

            if (is_array($arrayComments)) {
                return $arrayComments;
            } else {
                $message = "Il y a eu un problème avec la transmission des données, vueillez reéssayer plus tard";
                $this->twig->display('info/info.html.twig', compact('message'));
            }
        } else {
            $this->redirectionNotAdmin();
        }
    }
}
