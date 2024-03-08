<?php
include_once '../db.php';
class tafel {
    private $dbh;
    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }
    public function insertTafel($tafelnummer, $stoelen) {
        return $this->dbh->execute("INSERT INTO tafel (tafelnummer, stoelen) VALUES (?, ?)", [$tafelnummer, $stoelen]);
    }
    public function getAllTafels() {
        $sql = "SELECT * FROM tafel";
        return $this->dbh->execute($sql);
    }
    
}