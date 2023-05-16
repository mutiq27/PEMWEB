<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form CD Music</title>
</head>
<body>
    <h1>Form Input Data CD Music</h1>
<form method="post" action="Main1.php">
    <label for="nama">Nama:</label>
    <input type="text" name="input_nama" id="nama">
    <br>
    <label for="harga_awal">Harga:</label>
    <input type="number" name="input_harga" id="harga_awal" placeholder="masukkan angka">
    <br>
    <label for="discount">Diskon:</label>
    <input type="number" name="input_diskon" id="discount" placeholder="dalam persen (%)">
    <br>
    <label for="artist">Artist:</label>
    <input type="text" name="input_artist" id="artist">
    <br>
    <label for="genre">Genre:</label>
    <input type="text" name="input_genre" id="genre">
    <br>
    <input type="submit" value="Submit">
</form>
</body>
</html>


<?php

require_once ('CDMusic.php');

$music = new CDMusic();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_nama = $_POST["input_nama"];
    $input_harga = $_POST["input_harga"];
    $input_diskon = $_POST["input_diskon"];
    $input_artist = $_POST["input_artist"];
    $input_genre = $_POST["input_genre"];

    // validasi input
    if (empty($input_nama)) {
        echo "Isi form dengan lengkap";
        exit;
    }

    $music->setName($input_nama);
    $music->setPrice($input_harga);
    $music->setDiscount($input_diskon);

    $music->setArtist($input_artist);
    $music->setGenre($input_genre);

    $harga = $music->priceMusic();
    $discount = $music->discountMusic();
    $total = $music->totalPriceMusic();

    ?>
    <br>
    <h2>Output Final:</h2>
    <br>
    <?php
    echo "Nama: {$music->getName()} <br>Price: {$music->getPrice()} <br>Discount Awal: {$music->getDiscount()} %";
    echo "<br>Genre: {$music->getGenre()} <br>Artist: {$music->getArtist()}";
    echo "<br> Harga CD: $harga <br>Total discount: $discount % <br>Total Harga: $total";
}
?>


