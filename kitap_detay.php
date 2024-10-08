
<?php $get_id = $_GET["id"]?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kitap detay</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="kitapDetay4.css"/>
    <style>
        .container_detay {
            border: 1px solid #000;
            display: flex;
        }
        .bilgi {
            display: flex;
            flex-direction: row;
        }
        .yazar_yayinevi {
            width: 100%;
        }
        .par {
            display: none;
        }
        @media (max-width: 576px) {
            .container_detay {
                flex-direction: column;
            }
            .img_container {
                border: 0;
                margin-left: auto;
                margin-right: auto;
            }
            .resim {
                border: 0;
                margin-left: auto;
                margin-right: auto;
            }
            .text_container {
                border: 0;
            }
            .cizgi {
                display: none;
            }
            .yazar_yayinevi {
                flex-direction: column;
                justify-content: center;
                width: 100%;
            }
            .bilgi {
                margin-right: auto;
                margin-left: auto;
            }
            .tur {
                display: flex;
                justify-content: center;
                width: 100%;
            }
            .par {
                display: block;
            }
        }
    </style>
</head>
<body>
    <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "kitap_php";
    
        $baglanti = mysqli_connect($host,$username,$password,$database);
        $quary = "SELECT * from kitaplar";
        $result = mysqli_query($baglanti, $quary);
        $tum_kitaplar = mysqli_fetch_all($result, MYSQLI_ASSOC);
        foreach($tum_kitaplar as $kitap1){
            if ($kitap1["id"] == $get_id){
                $duzenleme = $kitap1["populerlik"];
            }
        }
        $duzenleme = $duzenleme+1;
        $sorgu = "UPDATE `kitaplar` SET `populerlik` = '$duzenleme' WHERE `kitaplar`.`id` = $get_id;";
        $uygulama = mysqli_query($baglanti, $sorgu);
        mysqli_close($baglanti);
    ?>
    <?php foreach($tum_kitaplar as $kitap): ?>
        <?php if ($kitap["id"] == $get_id): ?>
            <div class="container_detay p-2 m-1">
                <div class="img_container">
                    <div class="resim"><img src="img/<?php echo $kitap["resim"]?>" width="100%"></div>
                </div>
                <div class="text_container">
                    <div class="baslik">
                        <div><?php echo $kitap["isim"]?></div>
                    </div>
                    <div class="yazar_yayinevi">
                        <div class="yazar2 bilgi"><?php echo $kitap["yazar"]?><pre> </pre></div>
                        <div class="cizgi bilgi"> | </div>
                        <p class="par"> </p>
                        <div class="yayinevi_bilgi2 bilgi"><pre> </pre><?php echo $kitap["yayinevi"]?><pre> </pre></div>
                        <div class="cizgi bilgi"> | </div>
                        <p class="par"> </p>
                        <div class="tur"><?php echo $kitap["tur"]?></div>
                        <div class="bilgi">Tıklanma: <?php echo $kitap["populerlik"]?></div>
                    </div>
                    <div class="aciklama">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut consequuntur dicta dignissimos quam a unde natus? Doloremque accusantium quae magni libero minus officiis corporis porro temporibus iusto culpa reprehenderit suscipit facilis sunt dolorem placeat quibusdam quasi nisi quis, est vel! Obcaecati, rerum voluptate amet hic odio repellat commodi excepturi consectetur corporis mollitia natus quam maxime eum eveniet sapiente fuga dicta animi autem. At quibusdam perferendis aliquid deleniti ut harum inventore similique</div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
