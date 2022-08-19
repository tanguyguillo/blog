<?php

namespace Application\Models;

use Application\Controllers\Controller;
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
}
