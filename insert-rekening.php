<?php
include_once "rekening.php";
include_once '../header.php';
include_once "../reservering/reservering.php";
include_once "../product/product.php";

$rekening = new rekening();
$Reservering = new Reservering();
$product = new Product();

$reserveringen = $Reservering->getAllReserveringen();
$producten = $product->getAllproducten();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $reserveringID = $_POST["reserveringID"];
        $productID = $_POST["productID"];
        $omschrijving = $_POST["omschrijving"];


        $rekening->insertrekening($reserveringID, $productID, $omschrijving);
        echo "<p>Rekening toegevoegd!</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$rekeningen = $rekening->getAllRekeningen();
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

        <h2>Rekeningen</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">rekeningID</th>
                    <th scope="col">reserveringID</th>
                    <th scope="col">productID</th>
                    <th scope="col">omschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rekeningen as $rekening) : ?>
                    <tr>
                        <td><?php echo $rekening['bonID']; ?></td>
                        <td><?php echo $rekening['reserveringID']; ?></td>
                        <td><?php echo $rekening['productID']; ?></td>
                        <td><?php echo $rekening['omschrijving']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Voeg een nieuwe rekening toe</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Voeg een reservering toe:</label>
                <select class="form-select" name="reserveringID">
                    <?php foreach ($reserveringen as $reservering) : ?>
                        <option value="<?php echo $reservering['reserveerID']; ?>"><?php echo $reservering['reserveerID']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Voeg een product toe:</label>
                <select class="form-select" name="productID">
                    <?php foreach ($producten as $product) : ?>
                        <option value="<?php echo $product['productID']; ?>"><?php echo $product['product']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Omschrijving:</label>
                <input type="text" class="form-control" name="omschrijving">
            </div>
            <button type="submit" class="btn btn-primary">Voeg toe</button>
        </form>


    </div>
</body>

</html>