<?php

namespace Application\Models;

use Application\Models\Model\Model;

/**
 * Class User
 * the hydratation is mafe by the class Model
 */
class User extends Model
{
    private $id;
    private $emailUser;
    private $passWordUser;
    private $firstNameUser;
    private $surNameUser;
    private $roleUser;

    private  $user_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getEmailUser()
    {
        return $this->emailUser;
    }

    /**
     * @param mixed $emailUser
     */
    public function setEmailUser($emailUser)
    {
        $this->emailUser = $emailUser;
    }

    /**
     * @return mixed
     */
    public function getPassWordUser()
    {
        return $this->passWordUser;
    }

    /**
     * @param mixed $passWordUser
     */
    public function setPassWordUser($passWordUser)
    {
        $this->passWordUser = $passWordUser;
    }

    /**
     * @return mixed
     */
    public function getFirstNameUser()
    {
        return $this->firstNameUser;
    }

    /**
     * @param mixed $firstNameUser
     */
    public function setFirstNameUser($firstNameUser)
    {
        $this->firstNameUser = $firstNameUser;
    }

    /**
     * @return mixed
     */
    public function getSurNameUser()
    {
        return $this->surNameUser;
    }

    /**
     * @param mixed $surNameUser
     */
    public function setSurNameUser($surNameUser)
    {
        $this->surNameUser = $surNameUser;
    }

    /**
     * @return mixed
     */
    public function getRoleUser()
    {
        return $this->roleUser;
    }

    /**
     * @param mixed $roleUser
     */
    public function setRoleUser($roleUser)
    {
        $this->roleUser = $roleUser;
    }

    /**
     * specific data getUser_id here is the id of the writer of the post
     * @return mixed
     */
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $roleUser
     */
    public function setUser_id2($User_id)
    {
        $this->User_id = $User_id;
    }

    /**
     * function to get back the object in Array
     *
     * @return void
     */
    public function makeArrayFromObjet()
    {
        return (get_object_vars($this));
    }
}
