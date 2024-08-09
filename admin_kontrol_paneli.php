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
<?php $get_yayin = $_GET["yayinevi"] ?>
<?php if (empty($get_yayin)) $get_yayin_kontrol = True ?>
<?php $get_tur = $_GET["tur"]?>
<?php if (empty($get_tur)) $get_tur_kontrol = True ?>
<?php $get_yazar = $_GET["yazar"] ?>
<?php if (empty($get_yazar)) $get_yazar_kontrol = True ?>
<?php $get_min = $_GET["min"]?>
<?php if (empty($get_min)) $get_min_kontrol = True ?>
<?php $get_max = $_GET["max"]?>
<?php if (empty($get_max)) $get_max_kontrol = True ?>
<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "kitap_php";

    $baglanti = mysqli_connect($host,$username,$password,$database);
    $quary = "SELECT * from admin";
    $result = mysqli_query($baglanti, $quary);
    $profiller = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $quary_kitap = "SELECT * from kitaplar";
    $result_kitap = mysqli_query($baglanti, $quary_kitap);
    $tum_kitaplar = mysqli_fetch_all($result_kitap, MYSQLI_ASSOC);
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
        <link rel="stylesheet" type="text/css" href="style9.css" />
    </head>
    <body>
        <div class="hheader">
            <div class="baslik bosluk">Kitap_HTML</div>
            <a href="index.php"><div class="anasayfa bosluk">Anasayfa</div></a>
            <div class="kitaplar bosluk">Tüm Kitaplar</div>
            <a href="admin_login.php"><button class="buton">ADMIN LOGIN</button></a>
        </div>
        <div class="butonlar">
            <a href="kitap_ekle.php"><button class="eklesil ekle">EKLE</button></a>
            <button class="eklesil sil" onclick="showElements()">SİL</button>
            <button class="eklesil butonlar_gizli" onclick="hiddenElements()">BUTONLARI GİZLE</button>
        </div>
        <div class="kitap_container">
            <div class="form">
                <form action="admin_kontrol_paneli.php" method="get">
                    <div class ="container_filtreleme_kontrol">
                        <input type="text" name="adminadi" placeholder="kullanıcı ismini giriniz">
                        <input type="password" name="adminparola" placeholder="parlolanızı giriniz">
                        <input type="text" name="yayinevi" placeholder="yayınevi giriniz">
                        <input type="text" name="tur" placeholder="tür giriniz">
                        <input type="text" name="yazar" placeholder="yazar giriniz">
                        <input type="number" id="price" name="min" min="0" step="0.01" placeholder="min değer giriniz">
                        <input type="number" id="price" name="max" min="0" step="0.01" placeholder="max değer giriniz">
                        <button type="submit" class="button">GÖNDER</button>
                    </div>
                </form>
            </div>
            <div class="tum_kitaplar">
                <?php foreach($tum_kitaplar as $kitap): ?>
                    <?php if (empty($get_yayin)) {
                        $get_yayin = $kitap["yayinevi"];
                    }?>
                    <?php if (empty($get_tur)) {
                        $get_tur = $kitap["tur"];
                    }?>
                    <?php if (empty($get_yazar)) {
                        $get_yazar = $kitap["yazar"];
                    }?>
                    <?php if (empty($get_min)) {
                        $get_min = 0;
                    }?>
                    <?php if (empty($get_max)) {
                        $get_max = 999999999999999;
                    }?>
                    <?php if (($get_tur == $kitap["tur"]) && ($get_yayin == $kitap["yayinevi"]) && ($get_yazar == $kitap["yazar"]) && ($get_min < $kitap["ucret"] && $get_max > $kitap["ucret"])): ?>
                        <a href = "kitap_detay.php?id=<?php echo $kitap["id"]?>">
                            <div class="kitap">
                                <div class="ust"><img src="<?php echo $kitap["resim"]?>" height="100%" width="100%"></div>
                                <div class="yazar_isim">
                                    <div class="alt fiyat"><?php echo $kitap["ucret"]?> TL</div>
                                    <div class="alt"><?php echo $kitap["isim"] ?></div>
                                    <div class="buton_kitap"><button class="button_div alt">SİL</button></div>
                                </div>
                            </div>
                        </a>
                    <?php endif; ?>
                    <?php if ($get_yayin_kontrol == True) $get_yayin = null ?>
                    <?php if ($get_tur_kontrol == True) $get_tur = null ?>
                    <?php if ($get_yazar_kontrol == True) $get_yazar = null ?>
                    <?php if ($get_min_kontrol == True) $get_min = null ?>
                    <?php if ($get_max_kontrol == True) $get_max = null ?>
                <?php endforeach; ?>
            </div>
        </div>
        <script src="script2.js"></script>
    </body>
    </html>
<?php endif; ?>
