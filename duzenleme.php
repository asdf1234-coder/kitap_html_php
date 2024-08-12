<?php $get_id = $_GET["duzenlenecek"]?>
<?php session_start();?>
<?php if (!empty($get_id)) {
    $_SESSION['id'] = $get_id;
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kitap düzenle</title>
    <link rel="stylesheet" type="text/css" href="kitapDetay4.css"/>
</head>
<body>
    <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "kitap_php";
    
        $baglanti = mysqli_connect($host,$username,$password,$database);
        if(isset($_POST["duzenle"])) {
            $get_id = $_SESSION['id'];
            $takefile =  $_FILES["file"];
            $filename =  $takefile["name"];
            if (!empty($filename)) {
                $filetpmname = $takefile["tmp_name"];
                $mypath="img/".$filename;
        
                move_uploaded_file($filetpmname, $mypath);

                $duzenle = "UPDATE `kitaplar` SET `resim` = '$filename' WHERE `kitaplar`.`id` = $get_id; ";

                $result = mysqli_query($baglanti,$duzenle);                
            }
            $isim = $_POST["kitapismi"];
            if (!empty($isim)) {
                $duzenle = "UPDATE `kitaplar` SET `isim` = '$isim' WHERE `kitaplar`.`id` = $get_id; ";

                $result = mysqli_query($baglanti,$duzenle);
            }
            $yayin = $_POST["yayinevi"];
            if (!empty($yayin)) {
                $duzenle = "UPDATE `kitaplar` SET `yayinevi` = '$yayin' WHERE `kitaplar`.`id` = $get_id; ";

                $result = mysqli_query($baglanti,$duzenle);
            }
            $tur = $_POST["tur"];
            if (!empty($tur)) {
                $duzenle = "UPDATE `kitaplar` SET `tur` = '$tur' WHERE `kitaplar`.`id` = $get_id; ";

                $result = mysqli_query($baglanti,$duzenle);
            }
            $yazar = $_POST["yazar"];
            if (!empty($yazar)) {
                $duzenle = "UPDATE `kitaplar` SET `yazar` = '$yazar' WHERE `kitaplar`.`id` = $get_id; ";

                $result = mysqli_query($baglanti,$duzenle);
            }

        }
        $quary = "SELECT * from kitaplar";
        $result = mysqli_query($baglanti, $quary);
        $tum_kitaplar = mysqli_fetch_all($result, MYSQLI_ASSOC);
        mysqli_close($baglanti);
    ?>
    <?php foreach($tum_kitaplar as $kitap): ?>
        <?php if ($kitap["id"] == $get_id): ?>
            <form action="duzenleme.php" method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="img_container">
                        <div class="resim"><img src="img/<?php echo $kitap["resim"]?>" width="100%"></div>
                        <input type="file" name="file" placeholder="yeni görsel seç">
                    </div>
                    <div class="text_container">
                        <div class="baslik">
                            <input type="text" name="kitapismi" value="<?php echo $kitap["isim"]?>">
                        </div>
                        <div class="yazar_yayinevi">
                            <input class="yazar" type ="text" name="yazar" value="<?php echo $kitap["yazar"]?>">
                            <?php echo " | "?>
                            <input type="text" class="yayinevi_bilgi" name="yayinevi" value="<?php echo $kitap["yayinevi"]?>">
                            <?php echo " | "?>
                            <input type="text" class="tur" name="tur" value="<?php echo $kitap["tur"]?>">
                        </div>
                        <div class="aciklama">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut consequuntur dicta dignissimos quam a unde natus? Doloremque accusantium quae magni libero minus officiis corporis porro temporibus iusto culpa reprehenderit suscipit facilis sunt dolorem placeat quibusdam quasi nisi quis, est vel! Obcaecati, rerum voluptate amet hic odio repellat commodi excepturi consectetur corporis mollitia natus quam maxime eum eveniet sapiente fuga dicta animi autem. At quibusdam perferendis aliquid deleniti ut harum inventore similique facere reprehenderit magni ducimus maxime odit totam, accusamus natus dolores velit iure veritatis? Unde cumque quis provident deserunt velit.</div>
                    </div>
                </div>
                <button type="submit" name="duzenle" class="duzenle">DÜZENLE</button>
            </form>
        <?php endif; ?>
    <?php endforeach; ?>
</body>
</html>
