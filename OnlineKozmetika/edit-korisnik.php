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
    <?php include('php/connection.php');?>

    <?php
       
        $editId = $_GET["editid"];
        if(!$editId){
            echo "<script>window.location.href = 'panel.php';</script>";
        }   
        $upit = "SELECT * from korisnik where Email=?";
        $obrada = $con->prepare($upit);
        $obrada -> bind_param("s",$editId);
        $obrada->execute();
        $rezultat = $obrada -> get_result();
        if(!$rezultat){
            echo "Doslo je do greske" . $con->errno;
        }
        if(!$sve=$rezultat->fetch_assoc()){
            echo "Pogresan eid!";
        }
        else{
                 
    ?>
    <div class="container">
        <form method="post" action="edit-korisnik.php" class="checkout__form">
        <br>
        <h5>Korisnicki nalog</h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Ime</p>
                    <input type="text" value="<?php echo $sve['Ime']?>" name="ime">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Prezime</p>
                    <input type="text" value="<?php echo $sve['Prezime'];?>" name="prezime" >
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="checkout__form__input">
                    <p>Lozinka</p>
                    <input type="password" name="lozinka">
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Adresa</p>
                    <input type="text" value="<?php echo $sve['Adresa']?>" name="adresa" >
                </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Broj telefona</p>
                    <input type="text" value="<?php echo $sve['Telefon']?>" name="telefon">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Email</p>
                    <input type="text" value="<?php echo $sve['Email']?>" name="email">
                </div>
            </div>
            <div class="col-lg-12 col-xl-12" id="update">
                <input class="site-btn" type="submit" value="izmeni" name="update">
            </div>
        </div>
             <?php } ?>
                <?php
                    if(isset($_POST["update"])){
                    $upit = "update korisnik set Ime = ?, Prezime = ?, Adresa = ?, Telefon = ?
                    where Email = ?";
                    $kreni = $con->prepare($upit);
                    $kreni->bind_param("sssss",$_POST['ime'],$_POST['prezime'],$_POST['adresa'],$_POST['telefon'],$_POST['email']);
                    $kreni->execute();
                    
                    if(!$kreni){
                        echo "Doslo je do greske" . $con->connect_error;
                    }
                    else{
                        echo "<script>alert('uspesno ste izmenili podatke. Ulogujte se ponovo!');</script>";
                        
                    }
                }
            ?>   
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