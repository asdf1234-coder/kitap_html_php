<?php $get_isim = $_POST["adminadi"]?>
<?php $get_parola = $_POST["adminparola"] ?>
<?php $get_silinecek = $_GET["silinecek"]?>
<?php
if(!empty($get_silinecek)) {
    $silme = true;
}
?>

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
    if($silme == true) {
        $silme_islemi = "DELETE FROM kitaplar WHERE `kitaplar`.`id` = $get_silinecek";
        $isleme = mysqli_query($baglanti,$silme_islemi);
    }
    $quary_kitap = "SELECT * from kitaplar";
    $result_kitap = mysqli_query($baglanti, $quary_kitap);
    $tum_kitaplar = mysqli_fetch_all($result_kitap, MYSQLI_ASSOC);
    mysqli_close($baglanti);
?>
<?php session_start();?>
<?php
foreach($profiller as $profil) {
    if ($profil["admin_adi"] == $get_isim && $profil["admin_sifre"] == $get_parola) {
        $_SESSION['loggedin'] = true;
        $_SESSION['kullanici'] = $get_isim;
        $_SESSION['parola'] = $get_parola;
    }
}
if($_SESSION['loggedin'] == true) {
    $giris = true;
}
?>
<?php if (!isset($_SESSION['loggedin'])) {
    echo "giris basarısız";
    exit;
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
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="style14.css" />
        <style>
            .navbar {
                border-bottom: 1px solid #000;
                opacity: 0.96;
            }
            .tum_kitaplar {
                border: 0;
                margin: 0;
            }
            .card-tutar {
                font-weight: 500;
            }
            .kitap_container {
                display: flex;
                flex-direction: row;
            }
            @media (max-width: 576px) {
                .kitap_container {
                    flex-direction: column;
                }
            }
            @media (max-width: 576px) {
                .filtre {
                    width: 98%;
                    margin-bottom: 10px;
                    margin-left: 1px;
                }
            }
            @media (max-width: 576px) {
                .tum_kitaplar {
                    width: 100%;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top mb-2">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Kitap_PHP</a>
                <button class="navbar-toggler h-75" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Anasayfa</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Giriş Yap
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="index.php" method="get">
                        <input class="form-control me-2 h-75" type="search" placeholder="Ara" aria-label="Search" name="q">
                        <button class="btn btn-outline-dark col-3 h-75" type="submit">Ara</button>
                    </form>
                </div>
            </div>
        </nav>
        <!--<div class="hheader">
            <div class="baslik bosluk">Kitap_HTML</div>
            <a href="index.php"><div class="anasayfa bosluk">Anasayfa</div></a>
            <div class="kitaplar bosluk">Tüm Kitaplar</div>
            <a href="admin_login.php"><button class="buton">ADMIN LOGIN</button></a>
        </div>-->
        <div class="butonlar">
            <a href="kitap_ekle.php"><button class="eklesil ekle">EKLE</button></a>
        </div>
        <div class="kitap_container">
            <form class="mx-1 p-1 col-2 border filtre">
                <div class="mb-1">
                    <label for="yayinevi" class="form-label mb-1">Yayınevi</label>
                    <input type="text" class="form-control" id="yayinevi" name="yayinevi">
                </div>
                <div class="mb-1">
                    <label for="tur" class="form-label mb-1">Tür</label>
                    <input type=text class="form-control" id="tur" name="tur">
                </div>
                <div class="mb-1">
                    <label for="yazar" class="form-label mb-1">Yazar</label>
                    <input type=text class="form-control" id="yazar" name="yazar">
                </div>
                <div class="mb-1">
                    <label for="min" class="form-label mb-1">Minimum Fiyat</label>
                    <input type=number class="form-control" id="min" name="min" min="0" step="0.01">
                </div>
                <div class="mb-2">
                    <label for="max" class="form-label mb-1">Maximum Fiyat</label>
                    <input type=number class="form-control" id="max" min="0" name="max" step="0.01">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <!--<div class="form_kontrol">
                <form action="admin_kontrol_paneli.php" method="get">
                    <div class ="container_filtreleme_kontrol">
                        <input type="text" name="yayinevi" placeholder="yayınevi giriniz">
                        <input type="text" name="tur" placeholder="tür giriniz">
                        <input type="text" name="yazar" placeholder="yazar giriniz">
                        <input type="number" id="price" name="min" min="0" step="0.01" placeholder="min değer giriniz">
                        <input type="number" id="price" name="max" min="0" step="0.01" placeholder="max değer giriniz">
                        <button type="submit" class="button">GÖNDER</button>
                    </div>
                </form>
            </div>-->
            <div class="tum_kitaplar border mx-1">
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
                        <div class="card my-1 mx-1 p-0" style="width: 10rem;">
                            <a href="kitap_detay.php?id=<?php echo $kitap["id"]?>"><img src="img/<?php echo $kitap["resim"]?>" class="card-img-top mb-0 img-thumbnail" alt="..."></a>
                            <div class="card-body mt-0 p-0">
                                <p class="card-text text-center mb-0 px-1 card-tutar"><?php echo $kitap["ucret"]?> TL</p>
                                <p class="card-text text-center mb-0 px-1"><?php echo $kitap["isim"]?></p>
                                <div class="flex card-text text-center mb-0 px-1  mt-1 mx-auto">
                                    <a href="admin_kontrol_paneli.php?silinecek=<?php echo $kitap["id"]?>"><div class="card-text text-center mb-0 px-1"><button class="card-text text-center mb-0 px-1" name="silme">SİL</button></div></a>
                                    <a href="duzenleme.php?duzenlenecek=<?php echo $kitap["id"]?>"><div class="card-text text-center mb-0 px-1"><button class="card-text text-center mb-0 px-1" name="silme">DÜZENLE</button></div></a>
                                </div>
                            </div>
                        </div>
                        <!--<a href = "kitap_detay.php?id=<?php echo $kitap["id"]?>">
                            <div class="kitap">
                                <div class="ust"><img src="img/<?php echo $kitap["resim"]?>" height="100%" width="100%"></div>
                                <div class="yazar_isim">
                                    <div class="alt fiyat"><?php echo $kitap["ucret"]?> TL</div>
                                    <div class="alt"><?php echo $kitap["isim"] ?></div>
                                    <div class="flex">
                                        <a href="admin_kontrol_paneli.php?silinecek=<?php echo $kitap["id"]?>"><div class="buton_kitap"><button class="button_div alt" name="silme">SİL</button></div></a>
                                        <a href="duzenleme.php?duzenlenecek=<?php echo $kitap["id"]?>"><div class="buton_kitap"><button class="button_duzenle alt" name="silme">DÜZENLE</button></div></a>
                                    </div>
                                </div>
                            </div>
                        </a>-->
                    <?php endif; ?>
                    <?php if ($get_yayin_kontrol == True) $get_yayin = null ?>
                    <?php if ($get_tur_kontrol == True) $get_tur = null ?>
                    <?php if ($get_yazar_kontrol == True) $get_yazar = null ?>
                    <?php if ($get_min_kontrol == True) $get_min = null ?>
                    <?php if ($get_max_kontrol == True) $get_max = null ?>
                <?php endforeach; ?>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
    </html>
<?php endif; ?>
