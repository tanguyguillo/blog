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
     *        if ($action == "delete") {$action = "INSERT INTO ";}
     *
     * @param  Object      $object
     * @param  [string]    $table
     * @param  [connexion] $comm
     * @return bool
     */
    public function create(Object $object, $table, Object $comm, $action)
    {
        $dataArr = $object->makeArrayFromObjet();
        $fields = [];
        $theValues = [];

        foreach ($dataArr  as $field => $theValue) {
            $fields[] = $field;
            $theValues[] = "'" . $theValue . "'";
        }

        if ($action == "create") {
            /**
             * remove the id
             */
            $fields = array_slice($fields, 1);
            $theValues = array_slice($theValues, 1);
            $action = "INSERT INTO ";
        }

        /**
         * add ', '
         */
        $list_fields = implode(', ', $fields);
        $list_theValues = implode(', ', $theValues);

        try {
            $comm->query(
                $action . $table . " ($list_fields)" . " VALUES " . "($list_theValues);"
            );
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            include ROOT . '/app/templatesError/error.php';
            return false;
        }
        return true;
    }


    /**
     * function // to look out data comming from outside even in admin aera
     *
     * @param  [array] $arrayPost
     * @return void
     */
    public function lookOutDataFromOustide(array $arrayPost)
    {
        foreach ($arrayPost as $key => $value) {
            $postData[$key]  = strip_tags(htmlspecialchars($value));
        }
        return  $postData;
    }
}
