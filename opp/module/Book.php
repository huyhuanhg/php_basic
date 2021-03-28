<?php
require_once 'Document.php';

class Book extends Document
{
    private $bookID;
    private $bookType;
    private $bookNote;


    public function __construct($bookID, $documentName, $authorName, $namXuatBan, $soLuongNhap, $bookType, $bookNote)
    {
        parent::__construct($documentName, $authorName, $namXuatBan, $soLuongNhap);
        $this->bookID = $bookID;
        $this->bookType = $bookType;
        $this->bookNote = $bookNote;
    }

    /**
     * @return mixed
     */
    public function getBookID()
    {
        return $this->bookID;
    }

    /**
     * @param mixed $bookID
     */
    public function setBookID($bookID)
    {
        $this->bookID = $bookID;
    }

    /**
     * @return mixed
     */
    public function getBookType()
    {
        return $this->bookType;
    }

    /**
     * @param mixed $bookType
     */
    public function setBookType($bookType)
    {
        $this->bookType = $bookType;
    }

    /**
     * @return mixed
     */
    public function getBookNote()
    {
        return $this->bookNote;
    }

    /**
     * @param mixed $bookNote
     */
    public function setBookNote($bookNote)
    {
        $this->bookNote = $bookNote;
    }

}