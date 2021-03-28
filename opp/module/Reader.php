<?php


class Reader
{
    private $readerID;
    private $cmt;
    private $fullName;
    private $adress;
    private $sex;
    private $birthDay;
    private $readerType;
    private $phone;
    private $email;

    public function __construct($readerID, $fullName, $adress, $sex, $phone, $birthDay, $readerType, $cmt, $email)
    {
        $this->readerID = $readerID;
        $this->cmt = $cmt;
        $this->fullName = $fullName;
        $this->adress = $adress;
        $this->sex = $sex;
        $this->birthDay = $birthDay;
        $this->readerType = $readerType;
        $this->phone = $phone;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getReaderID()
    {
        return $this->readerID;
    }

    /**
     * @param mixed $readerID
     */
    public function setReaderID($readerID)
    {
        $this->readerID = $readerID;
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
    public function getReaderType()
    {
        return $this->readerType;
    }

    /**
     * @param mixed $readerType
     */
    public function setReaderType($readerType)
    {
        $this->readerType = $readerType;
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