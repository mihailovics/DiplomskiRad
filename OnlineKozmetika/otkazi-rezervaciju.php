<head>
    <meta charset="UTF-8">
    <meta name="description" content="Online kozmetika Beograd">
    <meta name="keywords" content="kozmetika, nega lica, nega tela, nega kose">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kozmetika</title>

   
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
    <div class="container tabela">
            <h2 class="text-center"> Da li ste sigurni da zelite da obrisete rezervaciju?</h2>
            <form method="POST" action="<?php $_SERVER['PHP_SELF']?>">
                <div class="mt-3" id="update">
                    <input class="site-btn" type="submit" value="Obrisi" name="obrisi">    
                    <a href="korisnik.php" class="site-btn">Nazad</a>    
                </div>
            </form>
    </div>
    <?php include('php/footer.php');?>
    <?php 
        if(isset($_POST["obrisi"])){
            $upit = "DELETE from rezervacije where id_rezervacije = ?";
            $obrada = $con->prepare($upit);
            $obrada->bind_param("i",$_GET['id']);
            $obrada->execute();
            if(!$obrada){
                echo "Doslo je do greske " . $con->errno;
            }
            else{
                echo "<script>alert('Uspesno ste obrisali termin');</script>";
                echo "<script>window.location.href = 'korisnik.php';</script>"; 
            }
        }
    
    ?>



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