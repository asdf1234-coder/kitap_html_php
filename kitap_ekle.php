<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "kitap_php";

$baglanti = mysqli_connect($host,$username,$password,$database);

if(isset($_POST["ekle"])) {
    $isim = $_POST["kitapismi"];
    $fiyat = $_POST["kitapfiyati"];
    $yayin = $_POST["yayinevi"];
    $tur = $_POST["tur"];
    $yazar = $_POST["yazar"];
    $gorsel = $_POST["gorsel"];

    $ekle = "INSERT INTO kitaplar (isim, resim, yayinevi, tur, yazar, ucret) VALUES ('$isim','$gorsel','$yayin','$tur','$yazar','$fiyat')";

    $result = mysqli_query($baglanti,$ekle);

    if ($result) {
        echo '<div class="basari">kitap başarıyla eklendi</div>';
    }
    else {
        echo '<div class="basarisiz">kitap eklenemedi</div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Ekle</title>
    <link rel="stylesheet" type="text/css" href="kitap_ekle.css" />
</head>
<body>
    <form action="kitap_ekle.php" method="post">
        <div class ="container_filtreleme_kontrol">
            <input type="text" name="kitapismi" placeholder="kitap ismini giriniz">
            <input type="text" name="kitapfiyati" placeholder="kitap fiyatını giriniz">
            <input type="text" name="yayinevi" placeholder="yayınevi giriniz">
            <input type="text" name="tur" placeholder="tür giriniz">
            <input type="text" name="yazar" placeholder="yazar giriniz">
            <input type="text" name="gorsel" placeholder="gorsel linki giriniz">
            <button type="submit" class="button" name="ekle">EKLE</button>
        </div>
    </form>
</body>
</html>
