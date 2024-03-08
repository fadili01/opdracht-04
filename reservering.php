<?php
include_once '../db.php';
class Reservering {
    private $dbh;
    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }
    public function insertreservering($klantID, $tafelID, $datum) {
        return $this->dbh->execute("INSERT INTO reservering (klantID, tafelID, datum)
        VALUES (?,?,?)", [$klantID, $tafelID, $datum]);
    }
    public function getAllReserveringen() {
        $sql = "SELECT * FROM reservering";
        return $this->dbh->execute($sql);
    }
}
?>