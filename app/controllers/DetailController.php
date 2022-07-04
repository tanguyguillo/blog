<?php

namespace Application\Controllers\DetailController;

use Application\Core\Database\Database\DatabaseConnection;
use Application\Controllers\Controller;
use Application\Models\DetailModel\Detail;

require_once(ROOT . '/app/models/detailModel.php');

class DetailController extends Controller
{
    /**
     * Function to show one blog post
     *
     * @param string $identifier
     * @return void
     */
    public function Detail($identifier)
    {
        $connection = new DatabaseConnection();

        $postDetail = new  Detail();
        $postDetail->connection = $connection;
        $detail =   $postDetail->getPost($identifier); // return an array

        $this->twig->display('detail/detail.html.twig', compact('detail'));
    }
}
