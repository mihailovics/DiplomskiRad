<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online kozmetika</title>

   
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="icon" type="image/x-icon" href="img/favicon-32x32.png">
</head>

<body>
  
   <?php include('php/mobileMenu.php');?>
   <?php include('php/nav.php');?>
   <?php include('php/connection.php');?>
   <?php 
        $kategorije = array();
        $id = $_GET['artiklID'];
         $upit = "SELECT * from artikl where sifra=?";
         $obrada = $con->prepare($upit);
         $obrada -> bind_param("i",$id);
         $obrada->execute();
         $rezultat = $obrada -> get_result();
        if(!$rezultat){
             echo "Doslo je do greske" . $con->errno;
        }
        if(!$sve=$rezultat->fetch_assoc()){
             echo "Nema proizvoda";
        }
        else{
            $upitKat = "SELECT * from kategorija";
            $obradaKat = $con->prepare($upitKat);
            $obradaKat -> execute();
            $rezultatKat = $obradaKat -> get_result();
            if(!$rezultatKat){
                echo "Doslo je do greske" . $con->errno;
            }
            if(!$sveKat = $rezultatKat->fetch_all(MYSQLI_ASSOC)){
                echo "Nema proizvoda";
            }
            else 
            {
   ?>
   <div class="container">
        <div class="row">
        <form enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="checkout__form">
        <br>
        <h5>Izmeni artikl</h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Naziv</p>
                    <input type="text" name="naziv" value="<?=$sve["naziv"]?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Kolicina</p>
                    <input type="text" name="kolicina" value="<?=$sve["kolicina"]?>" >
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="checkout__form__input">
                    <p>Kategorija</p>
                    <select name="kategorije">
                        <?php 
                                foreach($sveKat as $kat){
                                  ?><option value="<?=$kat["IDKategorije"]?>"><?=$kat["Naziv"]?></option><?php
                                }
                        ?>
                    </select>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Proizvodjac</p>
                    <input type="text" name="proizvodjac" value="<?=$sve["proizvodjac"]?>">
                </div>
                </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <div class="checkout__form__input">
                    <p>Cena</p>
                    <input type="text" name="cena" value="<?=$sve["cena"]?>">
                </div>
            </div>
            <div class="col-lg-10 col-md-10 col-sm-10">
                <div class="checkout__form__input">
                    <p>Opis</p>
                    <textarea class="opis" name="opis"><?=$sve["opis"]?></textarea>
                </div>
            </div>
            <div class="col-lg-12 col-xl-12" id="update">
                <input type="file" name="fupload">
                <input class="site-btn" type="submit" value="Izmeni artikl" name="izmeni">
            </div>
            </div>
        </div>
        </div>
</form>
        <?php
            }
    }
        if(isset($_POST["izmeni"])){
                $izvor = $_FILES['fupload']['tmp_name'];
                $danas = date("Y-m-d");
                $target = 'img/' . $_FILES['fupload']["name"];
                move_uploaded_file($izvor,$target);
                if(!$izvor){
                    $upit = "UPDATE artikl SET naziv = ?, kolicina=?, kategorija=?, proizvodjac=?, datum=?, cena=?, opis=?
                    WHERE sifra = ?";
                    $obrada = $con->prepare($upit);
                    $obrada -> bind_param("sssssssi",$_POST['naziv'],$_POST['kolicina'],$_POST['kategorije'],$_POST['proizvodjac'],$danas,$_POST['cena'],$_POST['opis'],$id);
                }
                else
                {
                    $upit = "UPDATE artikl SET naziv = ?, kolicina=?, kategorija=?, proizvodjac=?, slika=?, datum=?, cena=?, opis=?
                    WHERE sifra = ?";
                    $obrada = $con->prepare($upit);
                    $obrada -> bind_param("ssssssssi",$_POST['naziv'],$_POST['kolicina'],$_POST['kategorije'],$_POST['proizvodjac'],$target,$danas,$_POST['cena'],$_POST['opis'],$id);
                }
                $obrada -> execute();  
                echo "<script>alert('Uspesno ste izmenili artikl!')</script>";
                echo "<script>window.location.href = 'shop.php';</script>"; 
        }
        ?>

    </div>
  <?php include('php/footer.php');?>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>