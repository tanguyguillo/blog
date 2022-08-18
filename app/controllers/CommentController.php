<?php

namespace Application\Controllers\CommentController;

use Application\Controllers\AdminCommentController\AdminCommentController;
use Application\Controllers\Controller;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Repositories\Comment\Comment as commentRepo;
use Application\Repositories\Comment\CommentsRepository as commentRepo2;



// use Application\Redepositories\setComment;
// use application\Repositories\modifyComment;

/**
 *  class manadging comments
 */
class CommentController extends Controller
{
    /**
     * function to set a new comment on an article
     *
     * @param sarray $arrayComment 
     * ex : array(3) { ["commentPost"]=> string(7) "qSsqsqs" ["postId"]=> string(1) "3" ["idUser"]=> string(1) "2" }
     * or : array(3) { ["commentPost"]=> string(12) "SDsqdsqdqsdq" ["postId"]=> string(0) "" ["idUser"]=> string(0) "" }
     * 
     * @return void
     */
    public function setComment(array $arrayComment)
    {
        $arrayComment = json_decode(json_encode($arrayComment), true);

        // // if your not connected you can't send a comment
        $this->verifyComment("Vous devez être connecté pour pouvoir rédiger un commentaire");

        $connection = new DatabaseConnexion();

        $comment = new commentRepo2();
        $comment->connection = $connection;

        if ($comment->setComment($arrayComment)) {
            $message = "Votre commentaire a été envoyé et est en attente de validation";
            $this->twig->display('info/info.html.twig', compact('message'));
        } else {
            $message = "Il y a eu un problème avec la transmission de votre commentaire, vueillez reéssayer plus tard";
            $this->twig->display('info/info.html.twig', compact('message'));
        }
    }

    /**
     * function
     *
     * @return void
     */
    public function modifyComment(array $arrayComment)
    {
        if ($this->isAdmin()) {
            $connection = new DatabaseConnexion();
            $arrayComment = json_decode(json_encode($arrayComment), true);
            $commentsRepository = new commentRepo2();
            $commentsRepository->connection = $connection;

            // to correct in connexion
            if ($commentsRepository->updateComment($arrayComment)) {
                // now have to redirect with message
                $message = "Enregistrement effectué";
                // redirection
                (new AdminCommentController())->blocCommentAdmin($message);
            } else {
                $message = " Ily a eu un problème avec la base de données, reessayer plus tard";
                $this->twig->display('info/info.html.twig', compact('message'));
            }
        } else {
            $this->redirectionNotAdmin();
        }
    }
}
