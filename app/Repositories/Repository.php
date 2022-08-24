<?php

namespace Application\Repositories\Repository;

use Application\Core\Database\DatabaseConnexion\DatabaseConnexion;

/**
 *  class Repository
 */
class Repository extends DatabaseConnexion
{
    /**
     * function create // tranform objet to array an string to record in DB
     *
     * @param Object $object
     * @param [string] $table
     * @param [connexion] $statement
     * @return bool
     */
    public function create(Object $object, $table, $statement)
    {
        $dataArr = $object->makeArrayFromObjet();
        $champs = [];
        $valeurs = [];

        foreach ($dataArr  as $champ => $valeur) {
            $champs[] = $champ;
            $valeurs[] = "'" . $valeur . "'";
        }

        // remove the id
        $champs = array_slice($champs, 1);
        $valeurs = array_slice($valeurs, 1);
        // add ', '
        $liste_champs = implode(', ', $champs);
        $liste_Valeurs = implode(', ', $valeurs);

        try {
            $statement->query(
                "INSERT INTO " . $table . " ($liste_champs)" . " VALUES " . "($liste_Valeurs);"
            );
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
        return true;
    }
}
