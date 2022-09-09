<?php

namespace Application\Controllers;

use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Repositories\UserRepository\UserRepository;

/**
 * class TestController
 */
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
                $test = 0;
                if ($test) {
                        $connection = new DatabaseConnexion();
                        $UsersRepository = new UserRepository();
                        $UsersRepository->connection = $connection;
                        // $users = $UsersRepository->usersDepot(); // test
                }
        }
}
