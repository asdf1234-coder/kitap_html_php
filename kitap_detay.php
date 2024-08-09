
<?php $get_id = $_GET["id"]?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kitap detay</title>
    <link rel="stylesheet" type="text/css" href="kitap_Detay.css"/>
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
        mysqli_close($baglanti);
    ?>
    <?php foreach($tum_kitaplar as $kitap): ?>
        <?php if ($kitap["id"] == $get_id): ?>
            <div class="container">
                <div class="img_container">
                    <div class="resim"><img src="<?php echo $kitap["resim"]?>" width="100%"></div>
                </div>
                <div class="text_container">
                    <div class="baslik">
                        <div><?php echo $kitap["isim"]?></div>
                    </div>
                    <div class="yazar_yayinevi">
                        <div class="yazar"><?php echo $kitap["yazar"]?> | </div>
                        <div class="yayinevi_bilgi"><?php echo $kitap["yayinevi"]?>  | </div>
                        <div class="tur"><?php echo $kitap["tur"]?></div>
                    </div>
                    <div class="aciklama">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut consequuntur dicta dignissimos quam a unde natus? Doloremque accusantium quae magni libero minus officiis corporis porro temporibus iusto culpa reprehenderit suscipit facilis sunt dolorem placeat quibusdam quasi nisi quis, est vel! Obcaecati, rerum voluptate amet hic odio repellat commodi excepturi consectetur corporis mollitia natus quam maxime eum eveniet sapiente fuga dicta animi autem. At quibusdam perferendis aliquid deleniti ut harum inventore similique facere reprehenderit magni ducimus maxime odit totam, accusamus natus dolores velit iure veritatis? Unde cumque quis provident deserunt velit.</div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>
