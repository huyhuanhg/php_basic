<?php


class BookManager
{
    private $BMGID;
private  $readerID;
private $readerFullName;
private  $bookID;
private $bookName;
private  $workerID;
private $workerFullName;
private  $date;
private  $exp;
private  $so_luong;
private  $phi_coc;

    /**
     * BookManager constructor.
     * @param $readerID
     * @param $bookID
     * @param $workerID
     * @param $date
     * @param $exp
     * @param $so_luong
     * @param $phi_coc
     */
    public function __construct($BMGID, $readerID,$readerFullName, $bookID,$bookName, $workerID, $workerFullName, $date, $exp, $so_luong, $phi_coc)
    {
        $this->BMGID = $BMGID;
        $this->readerID = $readerID;
        $this->readerFullName = $readerFullName;
        $this->bookID = $bookID;
        $this->bookName = $bookName;
        $this->workerID = $workerID;
        $this->workerFullName = $workerFullName;
        $this->date = $date;
        $this->exp = $exp;
        $this->so_luong = $so_luong;
        $this->phi_coc = $phi_coc;
    }

    /**
     * @return mixed
     */
    public function getBMGID()
    {
        return $this->BMGID;
    }

    /**
     * @param mixed $BMGID
     */
    public function setBMGID($BMGID)
    {
        $this->BMGID = $BMGID;
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
    public function getWorkerID()
    {
        return $this->workerID;
    }

    /**
     * @param mixed $workerID
     */
    public function setWorkerID($workerID)
    {
        $this->workerID = $workerID;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getExp()
    {
        return $this->exp;
    }

    /**
     * @param mixed $exp
     */
    public function setExp($exp)
    {
        $this->exp = $exp;
    }

    /**
     * @return mixed
     */
    public function getSoLuong()
    {
        return $this->so_luong;
    }

    /**
     * @param mixed $so_luong
     */
    public function setSoLuong($so_luong)
    {
        $this->so_luong = $so_luong;
    }

    /**
     * @return mixed
     */
    public function getReaderFullName()
    {
        return $this->readerFullName;
    }

    /**
     * @param mixed $readerFullName
     */
    public function setReaderFullName($readerFullName)
    {
        $this->readerFullName = $readerFullName;
    }

    /**
     * @return mixed
     */
    public function getBookName()
    {
        return $this->bookName;
    }

    /**
     * @param mixed $bookName
     */
    public function setBookName($bookName)
    {
        $this->bookName = $bookName;
    }

    /**
     * @return mixed
     */
    public function getWorkerFullName()
    {
        return $this->workerFullName;
    }

    /**
     * @param mixed $workerFullName
     */
    public function setWorkerFullName($workerFullName)
    {
        $this->workerFullName = $workerFullName;
    }

    /**
     * @return mixed
     */
    public function getPhiCoc()
    {
        return $this->phi_coc;
    }

    /**
     * @param mixed $phi_coc
     */
    public function setPhiCoc($phi_coc)
    {
        $this->phi_coc = $phi_coc;
    }

}