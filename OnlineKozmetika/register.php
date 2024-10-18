<!DOCTYPE html>
<html lang="zxx">

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
   
   <div class="container">
        <div class="row">
            
                <form method="post" action="php/registracija.php" class="forma">
                    <div class="col-lg-12">
                    <h2>Registruj se</h2><br>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="ime">Ime</label><br>
                            <input class="reg__columns"  type="text" name="ime" id="ime"><br>
                        </div>
                        <div class="col-lg-6">
                            <label for="prezime">Prezime</label><br>
                            <input class="reg__columns"  type="text" name="prezime" id="ime"><br>
                        </div>
                        <div class="col-lg-6">
                            <label for="adresa">Adresa</label><br>
                            <input class="reg__columns"  type="text" name="adresa" id="adresa"><br>
                        </div>
                        <div class="col-lg-6">
                            <label for="sifra">Lozinka</label><br>
                            <input class="reg__columns"  type="password" name="lozinka" id="lozinka"><br>
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Email</label><br>
                            <input class="reg__columns"  type="text" name="email" id="email"><br>
                        </div>
                        <div class="col-lg-6">
                            <label for="telefon">Telefon</label><br>
                            <input class="reg__columns"  type="tel" name="telefon" id="telefon"><br><br>
                        </div>
                        <div class="col-lg-12">
                            <input type="submit" class="site-btn" name="registracija" value="Registruj se">
                            <p class="reglink"><a href="login.php">Imate nalog? Ulogujte se</a></p>
                        </div>
                    </div>
                    </form>  
            
        </div>
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