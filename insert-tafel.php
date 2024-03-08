<?php
include_once("tafel.php");
include_once '../header.php';

$tafel = new Tafel($mydb);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        
        if (!empty($_POST['tafelnummer']) && !empty($_POST['stoelen'])) {
            $tafel->insertTafel($_POST['tafelnummer'], $_POST['stoelen']);
            echo "Tafel is toegevoegd";
        } else {
            echo "Vul alle vereiste velden in.";
        }
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
    <title>Insert</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<h2>Voeg een nieuwe tafel toe</h2>
    <form method="post">
        <div class="mb-3">
            <input type="number" class="form-control" name="tafelnummer" placeholder="tafelnummer">
        </div>
        <div class="mb-3">
            <input type="number" class="form-control" name="stoelen" placeholder="stoelen">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Toevoegen</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ly5gPdOayL8jLbfOZtSTcZd+u5RqZVNw9UJlCCkcd5PbRiFLZ9D5zR5XDIHRqV1H" crossorigin="anonymous"></script>
</body>
</html>
