<?php
include_once '../db.php';
class rekening {
    private $dbh;
    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }
    public function insertrekening($reserveringID, $productID, $omschrijving) {
        return $this->dbh->execute("INSERT INTO bon (reserveringID, productID, omschrijving)
        VALUES (?,?,?)", [$reserveringID, $productID, $omschrijving]);
    }
    public function getAllRekeningen() {
        $sql = "SELECT * FROM bon";
        return $this->dbh->execute($sql);
    }
    
}
?>