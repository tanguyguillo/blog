<?php

namespace Application\Controllers;

use Application\Entity\blogPost\blogPost;
use Application\EntityManager;
use Application\EntityManager\BlogPostManager;

class TestController extends BlogPostManager
{
    /**
     * function to test
     *
     * @return void
     */
    public function myTest()
    {
        echo "Bienvenue sur la zone de test";

        $test = $this->readAll();

        var_dump($test);

        // $this->page->render('blog', compact('articles'));
    }
}
