<?php
include_once "product.php";
include_once '../header.php';


$product = new Product($mydb);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $product->insertProduct($_POST['product'], $_POST['omschrijving'], $_POST['prijs']);
        echo "product is toegevoegd";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h2>Voeg een nieuwe product toe</h2>
    <form method="post">
        <div class="mb-3">
            <input type="text" class="form-control" name="product" placeholder="Product">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="omschrijving" placeholder="Omschrijving">
        </div>
        <div class="mb-3">
            <input type="text" class="form-control" name="prijs" placeholder="Prijs">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Toevoegen</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ly5gPdOayL8jLbfOZtSTcZd+u5RqZVNw9UJlCCkcd5PbRiFLZ9D5zR5XDIHRqV1H" crossorigin="anonymous"></script>
</body>
</html>
