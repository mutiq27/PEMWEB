<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
    <h1>Form Input Data CD Cabinet</h1>
<form method="post" action="Main2.php">
    <label for="nama">Nama:</label>
    <input type="text" name="input_nama" id="nama">
    <br>
    <label for="harga_awal">Harga:</label>
    <input type="number" name="input_harga" id="harga_awal" placeholder="masukkan angka">
    <br>
    <label for="discount">Diskon:</label>
    <input type="number" name="input_diskon" id="discount" placeholder="dalam persen (%)">
    <br>
    <label for="Capacity">Capacity:</label>
    <input type="text" name="input_Capacity" id="Capacity" >
    <br>
    <label for="Model">Model:</label>
    <input type="text" name="input_Model" id="Model">
    <br>
    <input type="submit" value="Submit">
</form>
</body>
</html>


<?php

require_once ('CDCabinet.php');

$Cabinet = new CDCabinet();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_nama = $_POST["input_nama"];
    $input_harga = $_POST["input_harga"];
    $input_diskon = $_POST["input_diskon"];
    $input_Capacity = $_POST["input_Capacity"];
    $input_Model = $_POST["input_Model"];

    // validasi input
    if (empty($input_nama)) {
        echo "Isi form dengan lengkap";
        exit;
    }

    $Cabinet->setName($input_nama);
    $Cabinet->setPrice($input_harga);
    $Cabinet->setDiscount($input_diskon);

    $Cabinet->setCapacity($input_Capacity);
    $Cabinet->setModel($input_Model);

    $harga = $Cabinet->priceCabinet();
    $discount = $Cabinet->discountCabinet();
    $total = $Cabinet->totalPriceCabinet();

    ?>
    <br>
    <h2>Output Final:</h2>
    <br>
    <?php
    echo "Nama: {$Cabinet->getName()} <br>Price: {$Cabinet->getPrice()} <br>Discount Awal: {$Cabinet->getDiscount()} %";
    echo "<br>Model: {$Cabinet->getModel()} <br>Capacity: {$Cabinet->getCapacity()}";
    echo "<br> Harga CD: $harga <br>Total discount: $discount % <br>Total Harga: $total";
}
?>





