<?php

class User
{

    private $userID;//account
    private $cmt;
    private $fullName;
    private $adress;
    private $sex;
    private $birthDay;
    private $position;
    private $phone;
    private $email;

    /**
     * User constructor.
     * @param $userID
     * @param $cmt
     * @param $fullName
     * @param $adress
     * @param $sex
     * @param $birthDay
     * @param $position
     * @param $phone
     * @param $email
     */
    public function __construct($userID, $fullName, $sex, $birthDay, $position, $phone, $email, $adress, $cmt)
    {
        $this->userID = $userID;
        $this->cmt = $cmt;
        $this->fullName = $fullName;
        $this->adress = $adress;
        $this->sex = $sex;
        $this->birthDay = $birthDay;
        $this->position = $position;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @param mixed $userID
     */
    public function setUserID($userID)
    {
        $this->userID = $userID;
    }

    /**
     * @return mixed
     */
    public function getCmt()
    {
        return $this->cmt;
    }

    /**
     * @param mixed $cmt
     */
    public function setCmt($cmt)
    {
        $this->cmt = $cmt;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param mixed $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return mixed
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param mixed $adress
     */
    public function setAdress($adress)
    {
        $this->adress = $adress;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getBirthDay()
    {
        return $this->birthDay;
    }

    /**
     * @param mixed $birthDay
     */
    public function setBirthDay($birthDay)
    {
        $this->birthDay = $birthDay;
    }

    /**
     * @return mixed
     */
    public function getposition()
    {
        return $this->position;
    }

    /**
     * @param mixed $position
     */
    public function setposition($position)
    {
        $this->position = $position;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}