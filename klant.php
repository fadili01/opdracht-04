<?php
include_once '../db.php';
class klant {
    private $dbh;
    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }
    public function insertKlant($naam, $email, $password) {
        return $this->dbh->execute("INSERT INTO klant (naam, email, password) VALUES (?,?,?)", [$naam, $email, $password]);
    }
    
    public function getAllKlanten() {
        $sql = "SELECT * FROM klant";
        return $this->dbh->execute($sql);
    }
}
?>
