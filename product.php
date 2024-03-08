<?php
include_once '../db.php';

class product {
    private $dbh;
    public function __construct() {
        global $mydb;
        $this->dbh = $mydb;
    }

    public function insertProduct($product, $omschrijving, $prijs)
    {
        return $this->dbh->execute("INSERT INTO product (product, omschrijving, prijs) VALUES (?, ?, ?)", [$product, $omschrijving, $prijs]);
    }
    public function getAllproducten() {
        $sql = "SELECT * FROM product";
        return $this->dbh->execute($sql);
    }
}
?>
