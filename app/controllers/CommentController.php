<?php

namespace Application\Controllers\CommentController;

use Application\Controllers\Controller;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Model\CommentModel\Comment;


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
    public function SetComment(array $arrayComment)
    {
        $arrayComment = json_decode(json_encode($arrayComment), true);

        // // if your not connected you can't send a comment
        if (($_SESSION['LOGGED_USER_NAME'] == "")) {
            $message = "Vous devez être connecté pour pouvoir rédiger un commentaire";
            $this->twig->display('info/info.html.twig', compact('message'));
            exit;
        }

        //$arrayComment = $arrayComment;
        $connection = new DatabaseConnection();
        $Comment = new Comment();
        $Comment->connection = $connection;

        if ($Comment->SetComments($arrayComment)) {
            $message = "Votre commentaire a été envoyé et est en attente de validation";
            $this->twig->display('info/info.html.twig', compact('message'));
        } else {
            $message = "Il y a eu un problème avec la transmission de votre commentaire, vueillez reéssayer plus tard";
            $this->twig->display('info/info.html.twig', compact('message'));
        }
    }
}
