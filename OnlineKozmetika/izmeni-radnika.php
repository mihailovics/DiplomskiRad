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
        $upit = "SELECT * FROM radnik WHERE id_radnik = ?";
        $obradaUpit = $con->prepare($upit);
        $obradaUpit->bind_param("i",$_GET["id"]);
        $obradaUpit->execute();
        $radnikResult = $obradaUpit->get_result();
            while($radnik = $radnikResult->fetch_assoc()){
   ?>
   <div class="container">
        <div class="row">
        <form enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="checkout__form">
        <br>
        <h5>Izmeni informacije o radniku</h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Ime</p>
                    <input type="text" name="ime" value="<?=$radnik["ime"]?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Prezime</p>
                    <input type="text" name="prezime" value="<?=$radnik["prezime"]?>" >
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="checkout__form__input">
                    <p>JMBG</p>
                    <input type="text" name="JMBG" value="<?=$radnik["JMBG"]?>" >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Telefon</p>
                    <input type="text" name="telefon" value="<?=$radnik["broj_telefona"]?>">
                </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Email</p>
                    <input type="text" name="email" value="<?=$radnik["email"]?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Kategorija</p>
                    <select name="usluga" required>
                        <?php
                             $upitKat = "SELECT * FROM kategorija_usluge";
                             $obradaKat = $con->prepare($upitKat);
                             $obradaKat->execute();
                             $kategorijeResult = $obradaKat->get_result();
                             while($kategorija = $kategorijeResult->fetch_assoc())
                             {

                                 ?><option value="<?=$kategorija['id_katUsluge']?>"><?=$kategorija['Naziv']?></option> <?php }
                              ?>
                        </select>  
                </div>
            </div>
            <div class="col-lg-12 col-xl-12" id="update">
                <input class="site-btn" type="submit" value="Izmeni radnika" name="izmeni">
            </div>
         </div>
     </form>
</div>

        <?php
        } 
        if(isset($_POST["izmeni"])){               
                $upit = "UPDATE radnik SET ime = ?, prezime = ?, JMBG = ?, broj_telefona = ?, Email = ? WHERE id_radnik = ?";
                $obrada = $con->prepare($upit);
                $obrada -> bind_param("sssssi",$_POST['ime'],$_POST['prezime'],$_POST['JMBG'],$_POST['telefon'],$_POST['email'],$_GET['id']);
                $obrada -> execute();  
                echo "<script>alert('Uspesno ste izmenili radnika!')</script>";
                echo "<script>window.location.href = 'index.php';</script>"; 
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