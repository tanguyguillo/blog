<?php

namespace Application\Models;

use Application\Controllers\Controller;
use Application\Core\Auth\Auth;

class UserModel extends Auth
{

    private $id;
    private $emailUser;
    private $passWordUser;
    private $firstNameUser;
    private $surNameUser;
    private $roleUser;

    /**
     * @param $id
     * @param $emailUser
     * @param $passWordUser
     * @param $firstNameUser
     * @param $surNameUser
     * @param $roleUser
     */
    // public function __construct($id, $emailUser, $passWordUser, $firstNameUser, $surNameUser, $roleUser)
    // {
    //     $this->id = $id;
    //     $this->emailUser = $emailUser;
    //     $this->passWordUser = $passWordUser;
    //     $this->firstNameUser = $firstNameUser;
    //     $this->surNameUser = $surNameUser;
    //     $this->roleUser = $roleUser;
    // }

    public function __construct($datas = [])
    {
        if (!empty($datas)) {
            // var_dump("passage");
            $this->myHydrate($datas);
        }
    }

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
