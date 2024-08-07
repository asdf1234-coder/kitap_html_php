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
    $quary = "SELECT * from kitaplar";
    $result = mysqli_query($baglanti, $quary);
    $tum_kitaplar = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_close($baglanti);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kitap html</title>
    <link rel="stylesheet" type="text/css" href="style6.css" />
</head>
<body>
    <div class="header">
        <div class="baslik bosluk">Kitap_HTML</div>
        <a href="index.php"><div class="anasayfa bosluk">Anasayfa</div></a>
        <div class="kitaplar bosluk">Tüm Kitaplar</div>
        <button class="buton" onclick="replaceContent()">filtre</button>
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
                        <div class="ust"><img src="img/<?php echo $kitap["resim"]?>" height="100%" width="100%"></div>
                        <div class="yazar_isim">
                            <div class="alt fiyat"><?php echo $kitap["ucret"]?> TL</div>
                            <div class="alt"><?php echo $kitap["isim"] ?></div>
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
    <script src="script.js"></script>
</body>
</html>
