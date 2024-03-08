<?php
include_once("klant.php");
include_once '../header.php';

$klantHandler = new Klant($mydb);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $klantHandler->insertKlant($_POST['naam'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT));
        echo "Klant is toegevoegd";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$klanten = $klantHandler->getAllKlanten();
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
    <h2>Voeg een nieuwe klant toe</h2>
    <form method="post">
        <div class="mb-3">
            <input type="text" class="form-control" name="naam" placeholder="Naam">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Wachtwoord">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Toevoegen</button>
    </form>

    <?php
    toonKlantOverzicht($klanten);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-Ly5gPdOayL8jLbfOZtSTcZd+u5RqZVNw9UJlCCkcd5PbRiFLZ9D5zR5XDIHRqV1H" crossorigin="anonymous"></script>
</body>

</html>

<?php
function toonKlantOverzicht($klanten)
{
    echo "<h1>Klant Overzicht</h1>";

    if (!empty($klanten)) {
        echo "<table class='table'>";
        echo "<thead><tr><th>ID</th><th>Naam</th><th>Email</th></tr></thead>";
        echo "<tbody>";

        foreach ($klanten as $klant) {
            echo "<tr>";


            $id = isset($klant['id']) ? $klant['id'] : '';
            echo "<td>{$id}</td>";

            echo "<td>{$klant['naam']}</td>";
            echo "<td>{$klant['email']}</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "Geen klanten gevonden.";
    }
}
?>