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
     * @param [connexion] $comm
     * @return bool
     */
    public function create(Object $object, $table, Object $comm)
    {
        $dataArr = $object->makeArrayFromObjet();
        $fields = [];
        $theValues = [];

        foreach ($dataArr  as $field => $theValue) {
            $fields[] = $field;
            $theValues[] = "'" . $theValue . "'";
        }

        /**
         * remove the id
         */
        $fields = array_slice($fields, 1);
        $theValues = array_slice($theValues, 1);

        /**
         * add ', '
         */
        $list_fields = implode(', ', $fields);
        $list_theValues = implode(', ', $theValues);

        try {
            $comm->query(
                "INSERT INTO " . $table . " ($list_fields)" . " VALUES " . "($list_theValues);"
            );
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            require(ROOT . '/app/templatesError/error.php');
            return false;
        }
        return true;
    }
}
