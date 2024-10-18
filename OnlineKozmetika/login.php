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
           <?php 
               if(isset($_COOKIE["sesija"])){
                    $sesija = $_COOKIE["sesija"] ? $_COOKIE["sesija"] : "[]";
                    $sesija = json_decode($sesija);
               

                
           ?>
           <p>Ulogovani ste <?php echo $sesija[0]->korisnik->Email;?></p>
           <?php } else{ ?>
            <div class="col-lg-12 text-center">
            <form method="post" action="session.php" class="forma" id="forma__login">
                    <h2>Uloguj se</h2><br>
                    <label for="username">Email</label><br>
                    <input class="log__columns" type="text" name="username" id="username"><br>
                    <label for="password">Sifra</label><br>
                    <input class="log__columns"  type="password" name="lozinka" id="sifra"><br><br>
                    <input class="site-btn" type="submit" name="login" value="Logovanje">
                    <p class="reglink"><a href="register.php">Nemate nalog? Registruj se</a></p>
                </form>    
           </div>
                
                <?php } ?>
                
            
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