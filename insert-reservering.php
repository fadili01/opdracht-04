<?php
include_once "reservering.php";
include_once '../header.php';
include_once "../klant/klant.php";
include_once "../tafel/tafel.php";

$Reservering = new reservering();
$Klant = new Klant();
$tafel = new tafel();

$klanten = $Klant->getAllKlanten();
$tafels = $tafel->getAllTafels();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $klantID = $_POST["klantID"];
        $tafelID = $_POST["tafelID"];
        $datum = $_POST["datum"];


        $Reservering->insertReservering($klantID, $tafelID, $datum);
        echo "<p>Reservering toegevoegd!</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$reserveringen = $Reservering->getAllReserveringen();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voeg een nieuwe reservering toe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Reserveringen</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Reservering ID</th>
                    <th scope="col">Klant ID</th>
                    <th scope="col">Tafel ID</th>
                    <th scope="col">Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reserveringen as $reservering) : ?>
                    <tr>
                        <td><?php echo $reservering['reserveerID']; ?></td>
                        <td><?php echo $reservering['klantID']; ?></td>
                        <td><?php echo $reservering['tafelID']; ?></td>
                        <td><?php echo $reservering['datum']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <form method="POST">
            <h2>Voeg een reservering toe</h2>
            <div class="mb-3">
                <label class="form-label">voeg een klant:</label>
                <select class="form-select" name="klantID">
                    <?php foreach ($klanten as $klant) : ?>
                        <option value="<?php echo $klant['klantID']; ?>"><?php echo $klant['naam']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">voeg een tafel:</label>
                <select class="form-select" name="tafelID">
                    <?php foreach ($tafels as $tafel) : ?>
                        <option value="<?php echo $tafel['tafelID']; ?>"><?php echo $tafel['tafelnummer']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">datum:</label>
                <input type="date" class="form-control" name="datum">
            </div>

            <button type="submit" class="btn btn-primary">Voeg toe</button>
        </form>


    </div>
</body>

</html>