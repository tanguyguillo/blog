<?php

namespace Application\Repositories\Repository;

/**
 *  class Repository 
 */
class Repository //extends DatabaseConnexion
{
    /**
     * function create // tranform objet to array and string to record in DB
     *
     * @param Object $object
     * @param [string] $table
     * @param [connexion] $statement
     * @return bool
     */
    public function create(Object $object, $table, $statement)
    {
        // todo change the names of the variables
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
        $list_champs = implode(', ', $champs);
        $list_Valeurs = implode(', ', $valeurs);

        try {
            $statement->query(
                "INSERT INTO " . $table . " ($list_champs)" . " VALUES " . "($list_Valeurs);"
            );
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
        return true;
    }
}
