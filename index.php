<?php $get_yayin = $_GET["yayinevi"]?>
<?php $get_tur = $_GET["tur"]?>
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
    <link rel="stylesheet" type="text/css" href="style5.css" />
</head>
<body>
    <div class="header">
        <div class="baslik bosluk">Kitap_HTML</div>
        <a href="index.php"><div class="anasayfa bosluk">Anasayfa</div></a>
        <div class="kitaplar bosluk">Tüm Kitaplar</div>
        <button class="buton" onclick="replaceContent()">filtre</button>
    </div>
    <div class="tum_kitaplar">
        <?php if (empty($get_yayin) && empty($get_tur)): ?>
            <?php foreach($tum_kitaplar as $kitap): ?>
                <a href = "kitap_detay.php?id=<?php echo $kitap["id"]?>">
                    <div class="kitap">
                        <div class="ust"><img src="img/<?php echo $kitap["resim"]?>" height="100%" width="100%"></div>
                        <div class="yazar_isim">
                            <div class="alt yazar">yazar</div>
                            <div class="alt"><?php echo $kitap["isim"] ?></div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if (!empty($get_yayin) && !empty($get_tur)):?>
            <?php foreach($tum_kitaplar as $kitap): ?>
                <?php if ((!empty($get_yayin) && $kitap["yayinevi"] == $get_yayin) && (!empty($get_tur) && $kitap["tur"] == $get_tur)): ?>
                    <a href = "kitap_detay.php?id=<?php echo $kitap["id"]?>">
                        <div class="kitap">
                            <div class="ust"><img src="img/<?php echo $kitap["resim"]?>" height="100%" width="100%"></div>
                            <div class="yazar_isim">
                                <div class="alt yazar">yazar</div>
                                <div class="alt"><?php echo $kitap["isim"] ?></div>
                            </div>
                        </div>
                    </a>
                <?php endif;?>
            <?php endforeach; ?>
        <?php endif; ?>
        <?php if ((!empty($get_yayin) && empty($get_tur)) || (empty($get_yayin) && !empty($get_tur))): ?>
            <?php foreach($tum_kitaplar as $kitap): ?>
                <?php if ((!empty($get_yayin) && $kitap["yayinevi"] == $get_yayin) || (!empty($get_tur) && $kitap["tur"] == $get_tur)): ?>
                    <a href = "kitap_detay.php?id=<?php echo $kitap["id"]?>">
                        <div class="kitap">
                            <div class="ust"><img src="img/<?php echo $kitap["resim"]?>" height="100%" width="100%"></div>
                            <div class="yazar_isim">
                                <div class="alt yazar">yazar</div>
                                <div class="alt"><?php echo $kitap["isim"] ?></div>
                            </div>
                        </div>
                    </a>
                <?php endif;?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <script src="script.js"></script>
</body>
</html>
