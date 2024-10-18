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
   if(!isset($_COOKIE['sesija'])){
        echo "<script>
        alert('Morate biti korisnik kako bi mogli rezervisati termin!');
        window.location.href = 'login.php';
        </script>";
   }
   else{
        $idUsluga = $_GET['id'];
        $upit = "SELECT * from usluge where id_usluge=?";
        $obrada = $con->prepare($upit);
        $obrada -> bind_param("i",$idUsluga);
        $obrada -> execute();
        $rezultat = $obrada -> get_result();
       if(!$rezultat){
            echo "Doslo je do greske" . $con->errno;
       }
       if(!$sve=$rezultat->fetch_assoc()){
            echo "Nema proizvoda";
       }
       else{ 
   ?>
   
   <div class="container">
        <div class="row">
        <form enctype="multipart/form-data" method="POST" action="zakazi-termin.php" class="checkout__form kolicina">
        <br>
        <h5>Proveri dostupnost termina</h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Naziv usluge</p>
                    <input type="text" name="naziv" value="<?= $sve['naziv'];?>" readonly>
                    <input type="hidden" name="sifraUsluge" value="<?= $sve['id_usluge'];?>" >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Cena u RSD</p>
                    <input type="text" name="cena" value="<?=$sve['cena']?>" readonly>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Datum</p>
                    <input type="date" name="datum" value="" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                        <p>Ime radnika</p>
                        <select name="radnik" required>
                            <?php
                            $radnik = "SELECT * FROM radnik WHERE usluga = ?";
                            $obrada2 = $con->prepare($radnik);
                            $obrada2->bind_param("i",$sve['kategorija_usluge']);
                            $obrada2->execute();
                            $rezultatRadnik = $obrada2->get_result();
                            while($sviRadnici = $rezultatRadnik->fetch_assoc()){?>
                                <option value="<?=$sviRadnici['id_radnik']?>"><?=$sviRadnici['ime']?></option> 
                           <?php } ?>
                        </select><br>
                    </div>
                </div>
            <div class="col-lg-12 col-xl-12" id="update">
                <input class="site-btn" type="submit" value="Proveri" name="proveri">
            </div>
            </div>
            </form>
        </div>
    </div>
        <?php
         }
        }
        
        ?>

    </div>

    
  <?php include('php/footer.php');?>
<script>
  

</script>
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