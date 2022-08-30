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
     * @param [array] $get
     * @param [array] $post
     * @return void
     */
    public function myRouter(array $get, array $post)
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

        try {
            if (isset($get['owp']) && $get['owp'] !== '') {
                // from page connexion : redirection to comment
                if ($get['owp'] === 'detailconnexion') {
                    (new DetailController())->detailconnexion($postData);
                }
                //signout
                elseif ($get['owp'] === 'se-deconnectez') {
                    (new ConnexionController())->signOut();
                }
                //inscription : (not create an account just sign in)
                elseif ($get['owp'] === 'inscription') {
                    (new InscriptionController())->inscription();
                } elseif ($get['owp'] === 'connexion') {



                    // connexion
                    (new ConnexionController())->connexion('', ($post));
                }
                // setcomment from page detail
                elseif ($get['owp'] === 'faire-un-commentaire') {
                    (new CommentController())->setComment($postData);
                }
                // Create an user account
                elseif ($get['owp'] === 'creation-d-un-compte') {
                    (new InscriptionController())->createAccount($postData);
                }
                // Admin aera
                elseif ($get['owp'] === 'administration-only-for-people-which-have-the-role-Admin') {
                    (new AdminController())->connectAdmin();
                }
                // enter in admin aera
                elseif ($get['owp'] === 'authentity') {
                    $message = "false";
                    (new AdminController())->auth($postData, $message);
                } elseif ($get['owp'] === 'blocPostAdmin') {
                    $message = "false";
                    (new AdminController())->blocPostadmin($postData, $message);
                } elseif ($get['owp'] === 'blocCommentAdmin') {
                    $message = "";
                    (new AdminCommentController())->blocCommentAdmin();
                } elseif ($get['owp'] === 'blocUserAdmin') {
                    $message = "";
                    (new AdminUserController())->blocUserAdmin();
                }
                // Admin aera post blog// 
                elseif ($get['owp'] === 'record') {
                    if (isset($get['id']) && $get['id'] > 0) {
                        //Here we get the POST data (and not $_GE)
                        (new PostsController())->update($postData);
                    }
                }
                // Admin aera comments
                elseif ($get['owp'] === 'modify-comment') {
                    if (isset($get['id']) && $get['id'] > 0) {
                        //Here we get the POST data (and not $_GE)
                        (new CommentController())->modifyComment($postData);
                    }
                }
                // Admin aera // 
                elseif ($get['owp'] === 'newpostecord') {
                    //Here we get the POST data (and not $_GE)
                    (new PostsController())->newPost($postData);
                }
                // Admin aera // 
                elseif ($get['owp'] === 'modifymyuser') {
                    //Here we get the POST data (and not $_GE)
                    (new AdminUserController())->modifyUser($postData);
                }
            }

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
                    }
                } else {
                    throw new Exception(" ");
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
