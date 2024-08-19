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
<?php $get_arama = $_GET["q"]?>
<?php if (empty($get_arama)) $get_arama_kontrol = True?>
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
        .dropdown-menu {
            width: 25rem;
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
                            <li class="dropdown-item disabled">Formu Doldurunuz</li>
                            <li><hr class="dropdown-divider"></li>
                            <li class="p-2 pt-0"><form action="admin_kontrol_paneli.php" method="post">
                                <div class="form-floating my-0 pt-0 pb-0 mb-2">
                                    <input type="text" name="adminadi" placeholder="kullanıcı ismini giriniz" class="form-control" id="floatingInput">
                                    <label for="floatingInput" class="">Kullanıcı Adı</label>
                                </div>
                                <div class="form-floating mb-2">
                                    <input type="password" name="adminparola" placeholder="parlolanızı giriniz" class="form-control" id="floatingPassword">
                                    <label for="floatingPassword" class="">Parola</label>
                                </div>
                                <button type="submit" class="btn btn-outline-dark">Giriş Yap</button>
                            </form></li>

                            <!--<li><a class="dropdown-item" href="#">Something else here</a></li>-->
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
    <!-- silinecek nav -->
    <!--<div class="header">
        <div class="baslik bosluk">Kitap_HTML</div>
        <a href="index.php"><div class="anasayfa bosluk">Anasayfa</div></a>
        <div class="kitaplar bosluk">Tüm Kitaplar</div>
        <form class="arama_form" action="index.php" method="get">
            <input type="text" class="arama_input" placeholder="arama yapınız" name="q">
            <button type="submit" class="arama_buton">Ara</button>
        </form>
        <a href="admin_login.php"><button class="buton">ADMIN LOGIN</button></a>
    </div>-->
    <div class="kitap_container col-12">
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
                <!-- silinecek form -->
                <!--<div class ="container_filtreleme">
                    <input type="text" name="yayinevi" placeholder="yayınevi giriniz">
                    <input type="text" name="tur" placeholder="tür giriniz">
                    <input type="text" name="yazar" placeholder="yazar giriniz">
                    <input type="number" id="price" name="min" min="0" step="0.01" placeholder="min değer giriniz">
                    <input type="number" id="price" name="max" min="0" step="0.01" placeholder="max değer giriniz">
                    <button type="submit" class="button">GÖNDER</button>
                </div>-->
        <div class="tum_kitaplar border mx-1">
            <?php foreach($tum_kitaplar as $kitap): ?>
                <?php $dizi = explode(' ', $kitap["isim"]) ?>
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
                <?php if ($get_arama_kontrol == True): ?>
                    <?php if (($get_tur == $kitap["tur"]) && ($get_yayin == $kitap["yayinevi"]) && ($get_yazar == $kitap["yazar"]) && ($get_min < $kitap["ucret"] && $get_max > $kitap["ucret"])): ?>
                        <!--<a href = "kitap_detay.php?id=<?php echo $kitap["id"]?>">
                            <div class="kitap">
                                <div class="ust"><img src="img/<?php echo $kitap["resim"]?>" height="100%" width="100%"></div>
                                <div class="yazar_isim">
                                    <div class="alt fiyat"><?php echo $kitap["ucret"]?> TL</div>
                                    <div class="alt"><?php echo $kitap["isim"] ?></div>
                                </div>
                            </div>
                        </a>-->
                        <div class="card my-1 mx-1 p-0" style="width: 10rem;">
                            <a href="kitap_detay.php?id=<?php echo $kitap["id"]?>"><img src="img/<?php echo $kitap["resim"]?>" class="card-img-top mb-0 img-thumbnail" alt="..."></a>
                            <div class="card-body mt-0 p-0">
                                <p class="card-text text-center mb-0 px-1 card-tutar"><?php echo $kitap["ucret"]?> TL</p>
                                <p class="card-text text-center mb-0 px-1"><?php echo $kitap["isim"]?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
                <?php if ($get_arama_kontrol != True): ?>
                    <?php $arama_dizi = explode(' ', $get_arama)?>
                    <?php foreach($dizi as $kitap_isim): ?>
                        <?php foreach($arama_dizi as $aranan): ?>
                            <?php if ($aranan == $kitap_isim): ?>
                                <div class="card my-1 mx-1 p-0" style="width: 10rem;">
                                    <a href="kitap_detay.php?id=<?php echo $kitap["id"]?>"><img src="img/<?php echo $kitap["resim"]?>" class="card-img-top mb-0 img-thumbnail" alt="..."></a>
                                    <div class="card-body mt-0 p-0">
                                        <p class="card-text text-center mb-0 px-1 card-tutar"><?php echo $kitap["ucret"]?> TL</p>
                                        <p class="card-text text-center mb-0 px-1"><?php echo $kitap["isim"]?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
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
