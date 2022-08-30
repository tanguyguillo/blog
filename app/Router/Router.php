<?php


namespace Application\Router;

use Application\Controllers\AdminCommentController\AdminCommentController;
use Application\Controllers\CommentController\CommentController;
use Application\Controllers\HomepageController\HomepageController;
use Application\Controllers\PostsController\PostsController;
use Application\Controllers\DetailController\DetailController;
use Application\Controllers\InscriptionController\InscriptionController;
use Application\Controllers\ErrorController\ErrorController;
use Application\Controllers\AdminController\AdminController;
use Application\Controllers\ConnexionController\ConnexionController;
use Application\Controllers\AdminUserController\AdminUserController;
use Application\Controllers\TestController as ControllersTestController;
use Exception;

class Router
{
    /**
     *  function
     *
     * @param [type] $get
     * @param [type] $post
     * @return void
     */
    public function myRouter($get, $post)
    {

        if (isset($post)) {
            $postData = $post;
            foreach ($postData as $key => $value) {
                $postData[$key]  = strip_tags(htmlspecialchars($value));
            }
        }

        if (isset($get)) {
            $getData = $get;
            foreach ($getData as $key => $value) {
                $getData[$key]  = strip_tags(htmlspecialchars($value));
            }
        }

        // first router
        try {
            if (isset($get['owp']) && $get['owp'] !== '') {
                // from page connexion : redirection to comment
                if ($get['owp'] === 'detailconnexion') {
                    (new DetailController())->detailconnexion($postData);
                    exit;
                }
                //signout
                if ($get['owp'] === 'se-deconnectez') {
                    (new ConnexionController())->signOut();
                    exit;
                }
                //inscription : (not create an account just sign in)
                if ($get['owp'] === 'inscription') {
                    (new InscriptionController())->inscription();
                    exit;
                }

                if ($get['owp'] === 'connexion') {
                    (new ConnexionController())->connexion();
                    exit;
                }
                // setcomment from page detail
                if ($get['owp'] === 'faire-un-commentaire') {
                    (new CommentController())->setComment($postData);
                    exit;
                }
                // Create an user account
                if ($get['owp'] === 'creation-d-un-compte') {
                    (new InscriptionController())->createAccount($postData);
                    exit;
                }
                // Admin aera
                if ($get['owp'] === 'administration-only-for-people-which-have-the-role-Admin') {
                    (new AdminController())->connectAdmin();
                    exit;
                }

                // enter in admin aera
                if ($get['owp'] === 'authentity') {
                    $message = "false";
                    (new AdminController())->auth($postData, $message);
                    exit;
                }

                if ($get['owp'] === 'blocPostAdmin') {
                    $message = "false";
                    (new AdminController())->blocPostadmin($postData, $message);
                    exit;
                }

                if ($get['owp'] === 'blocCommentAdmin') {
                    $message = "";
                    (new AdminCommentController())->blocCommentAdmin();
                    exit;
                }

                if ($get['owp'] === 'blocUserAdmin') {
                    $message = "";
                    (new AdminUserController())->blocUserAdmin();
                    exit;
                }

                // Admin aera post blog// 
                if ($get['owp'] === 'record') {
                    if (isset($get['id']) && $get['id'] > 0) {
                        //Here we get the POST data (and not $_GE)
                        (new PostsController())->update($postData);
                        exit;
                    }
                }

                // Admin aera comments
                if ($get['owp'] === 'modify-comment') {
                    if (isset($get['id']) && $get['id'] > 0) {
                        //Here we get the POST data (and not $_GE)
                        (new CommentController())->modifyComment($postData);
                        exit;
                    }
                }

                // Admin aera // 
                if ($get['owp'] === 'newpostecord') {
                    //Here we get the POST data (and not $_GE)
                    (new PostsController())->newPost($postData);
                    exit;
                }

                // Admin aera // 
                if ($get['owp'] === 'modifymyuser') {
                    //Here we get the POST data (and not $_GE)
                    (new AdminUserController())->modifyUser($postData);
                    exit;
                }
            }

            // Last router
            if (isset($get['owp']) && $get['owp'] !== '') {
                if ($get['owp'] === 'bloglist') {
                    if (isset($get['id']) && $get['id'] > 0) {
                        $identifier = $get['id'];
                        $identifier = strip_tags(htmlspecialchars($identifier));
                        (new DetailController())->Detail($identifier);
                    } else {
                        // here we want to render the posts in the blog
                        (new PostsController())->executePosts("render");
                    }
                } elseif ($get['owp'] === 'tosee') {
                    if (isset($get['id']) && $get['id'] > 0) {
                        //// for testing.... : http://blog-omega.local/index.php?owp=tosee&id=1
                        // $identifier = $get['id']; is useless
                        (new ControllersTestController())->myTest();
                        exit;
                    } else {
                    }
                } else {
                    throw new Exception("La page que vous recherchez n'existe pas.");
                }
            } else {
                (new HomepageController())->execute();
            }
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            (new ErrorController())->execute($errorMessage);
        }
    }
}
