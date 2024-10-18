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
        $id = $_GET['id'];
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
          
   ?>
   <div class="container">
        <div class="row">
        <form enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="checkout__form kolicina">
        <br>
        <h5>Azuriraj kolicinu</h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Stara kolicina</p>
                    <input type="text" name="stara_kolicina" value="<?=$sve["kolicina"]?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Nova kolicina</p>
                    <input type="text" name="kolicina" value="" required>
                </div>
            </div>
            <div class="col-lg-12 col-xl-12" id="update">
                <input class="site-btn" type="submit" value="Izmeni artikl" name="izmeni">
            </div>
            </div>
            </form>
        </div>
        </div>
       

        <?php
        }
    
        if(isset($_POST["izmeni"])){
                $upit = "UPDATE artikl SET kolicina=? WHERE sifra = ?";
                $obrada = $con->prepare($upit);
                $obrada -> bind_param("ii",$_POST['kolicina'],$id);            
                if($obrada -> execute()){  
                    echo "<script>alert('Uspesno ste izmenili kolicinu!');</script>";
                    echo "<script>window.location.href = zalihe.php';</script>";     
                }
                else{
                    echo "Doslo je do greske!";
                }
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