<?php

namespace Application\Models\Model;

use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;
use Application\Models\Comment\Comment;
use Application\Controllers\Controller;
use Application\Core\Auth\Auth;

/**
 *  class Model
 */
class Model extends Auth
{



    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            $this->myHydrate($datas);
        }
    }
    /**
     * function to hydrate the objet
     *
     * @param [type] $datas
     * @return void
     */
    public function myHydrate($datas): void
    {
        foreach ($datas as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (is_callable([$this, $method])) {
                $this->$method($value);
            }
        }
    }

    /**
     * Come from repository, must work for every new
     * @param Model $model Objet to create
     * @return bool
     */
    public function create(Model $model, $space, $table)
    {
        $connection = new DatabaseConnexion();

        $champs = [];
        $inter = [];
        $valeurs = [];

        $model = (array)$model;
        $model = json_decode(json_encode($model), true);

        foreach ($model as $champ => $valeur) {
            if ($valeur !== null && $champ != '*table') {
                $newChamp = str_replace($space, '', $champ);
                $champs[] = $newChamp;
                $inter[] = "?";
                $valeurs[] = $valeur;
            }
        }

        //table champs to string
        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);
        $liste_Valeurs = implode(', ', $valeurs);


        echo ($connection->getConnexion()->query("INSERT INTO  $table ($liste_champs ) VALUES ($liste_Valeurs)"));

        exit();

        // echo $liste_champs; // commentCreated, commentStatus, commentContent, user_id, blog_post_user_id
        // echo 'br';
        // echo $liste_Valeurs; // 2022-08-23 05:12:14, Waiting for validation, Sqds, 2, 67
        // exit;

        // var_dump('INSERT INTO ' . $table . ' (' . $liste_champs . ')VALUES(' . $liste_inter . ')', $liste_Valeurs);

        // "INSERT INTO ' . $table . ' (commentCreated, commentStatus, commentContent, user_id, blog_post_id, blog_post_user_id)  VALUES ('$commentCreated ', '$commentStatus', '$commentContent', '$user_id ', '$blog_post_id', '$blog_post_user_id'); »


        //////// $statement = $connection->getConnexion()->query("INSERT INTO  $table ($liste_champs ) VALUES ($liste_Valeurs)");

        //$statement = $connection->getConnexion()->query('INSERT INTO ' . $table . ' (' . $liste_champs . ') VALUES (' . $liste_Valeurs ' . ')


        //$statement = $this->connection->getConnexion()->query('INSERT INTO ' . $this->table . ' (' . $liste_champs . ')VALUES(' . $liste_inter . ')', $valeurs);
    }
}
