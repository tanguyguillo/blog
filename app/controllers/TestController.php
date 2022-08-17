<?php

namespace Application\Controllers;


use Application\Models\UserModel;
use Application\Repositories\User\UsersRepository;
use Application\Repositories\Repository\usersDepot;
use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;


// use Application\Entity\blogPost\blogPost;
// use Application\EntityManager;
// use Application\EntityManager\BlogPostManager;

class TestController extends Controller
{
/**
     * function to test : UsersRepository   getUsersDepo
     *
     * @return void
     */
public function myTest()
{
        //to test : http://blog-omega.local/index.php?owp=tosee&id=1


        echo "Bienvenue sur la zone de test";

        // list table user
        $connection = new DatabaseConnexion();
        $UsersRepository = new UsersRepository();
        $UsersRepository->connection = $connection;
        $users = $UsersRepository->usersDepot();

        var_dump($users);
 }