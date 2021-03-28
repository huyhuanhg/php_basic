<?php

class Document
{
    private $documentName;
private $authorName;
private $namXuatBan;
private $soLuongNhap;
public function __construct($documentName, $authorName, $namXuatBan, $soLuongNhap)
{
    $this->documentName = $documentName;
    $this->authorName = $authorName;
    $this->namXuatBan = $namXuatBan;
    $this->soLuongNhap = $soLuongNhap;
}

    /**
     * @return mixed
     */
    public function getDocumentName()
    {
        return $this->documentName;
    }

    /**
     * @param mixed $documentName
     */
    public function setDocumentName($documentName)
    {
        $this->documentName = $documentName;
    }

    /**
     * @return mixed
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @param mixed $authorName
     */
    public function setAuthorName($authorName)
    {
        $this->authorName = $authorName;
    }

    /**
     * @return mixed
     */
    public function getNamXuatBan()
    {
        return $this->namXuatBan;
    }

    /**
     * @param mixed $namXuatBan
     */
    public function setNamXuatBan($namXuatBan)
    {
        $this->namXuatBan = $namXuatBan;
    }

    /**
     * @return mixed
     */
    public function getSoLuongNhap()
    {
        return $this->soLuongNhap;
    }

    /**
     * @param mixed $soLuongNhap
     */
    public function setSoLuongNhap($soLuongNhap)
    {
        $this->soLuongNhap = $soLuongNhap;
    }

}