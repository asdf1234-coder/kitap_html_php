<?php $get_isim = $_GET["adminadi"]?>
<?php if (empty($get_isim)) {
    echo "kullanıcı adı boş bırakılamaz tekrar deneyiniz";
    exit;
}?>
<?php $get_parola = $_GET["adminparola"]?>
<?php if (empty($get_parola)) {
    echo "parola boş bırakılamaz tekrar deneyiniz";
    exit;
}?>
<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "kitap_php";

    $baglanti = mysqli_connect($host,$username,$password,$database);
    $quary = "SELECT * from admin";
    $result = mysqli_query($baglanti, $quary);
    $profiller = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($baglanti);
?>
<?php foreach($profiller as $profil) {
    if ($profil["admin_adi"] == $get_isim) {
        $isim = true;
        $giris = false;
    }
    if ($profil["admin_sifre"] == $get_parola) {
        $parola = true;
        $giris = false;
    }
    if (($parola == true) && ($isim == true)) {
        echo "giriş başarılı";
        $giris = true;
    }
}?>
<?php if ($giris == false) {
    echo "parola yada şifre yanlış lütfen tekrar deneyiniz";
}?>
<?php if ($giris == true): ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kontrol Paneli</title>
    </head>
    <body>
        <div>burası kontrol paneli</div>
    </body>
    </html>
<?php endif; ?>