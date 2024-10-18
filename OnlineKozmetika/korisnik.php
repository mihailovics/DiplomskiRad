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
        $sesija = isset($_COOKIE["sesija"]) ? $_COOKIE["sesija"] : "[]";
        $sesija = json_decode($sesija);  
    ?>

    <div class="container">
        <form method="post" action="korisnik.php" class="checkout__form">
        <br>
        <h5>Moj nalog</h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Ime</p>
                    <input type="text" value="<?php echo $sesija[0]->korisnik->Ime ?>" name="ime">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Prezime</p>
                    <input type="text" value="<?php echo $sesija[0]->korisnik->Prezime ?>" name="prezime" >
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="checkout__form__input">
                    <p>Lozinka</p>
                    <input type="password" name="lozinka" required>
                </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Adresa</p>
                    <input type="text" value="<?php echo $sesija[0]->korisnik->Adresa  ?>" name="adresa" >
                </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Broj telefona</p>
                    <input type="text" value="<?php echo $sesija[0]->korisnik->Telefon ?>" name="telefon">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="checkout__form__input">
                    <p>Email</p>
                    <input type="text" value="<?php echo $sesija[0]->korisnik->Email ?>" name="email">
                </div>
            </div>
            <div class="col-lg-12 col-xl-12" id="update">
                <input class="site-btn" type="submit" value="izmeni" name="update">
            </div>
            <?php
                    if(isset($_POST["update"])){
                    $upit = "update korisnik set Ime = ?, Prezime = ?, Email = ?, Lozinka = ?, Adresa = ?, Telefon = ?
                    where ID = ?";
                    $kreni = $con->prepare($upit);
                    $lozinka = $_POST["lozinka"];
                    $hashed = password_hash($lozinka,PASSWORD_DEFAULT);
                    $kreni->bind_param("ssssssi",$_POST['ime'],$_POST['prezime'],$_POST['email'],$hashed,$_POST['adresa'],$_POST['telefon'],$sesija[0]->korisnik->ID);
                    $kreni->execute();
                    
                    if(!$kreni){
                        echo "Doslo je do greske" . $con->connect_error;
                    }
                    else{
                        echo "<script>alert('uspesno ste izmenili podatke. Ulogujte se ponovo!');</script>";
                        echo "<script>window.location.href = 'logout.php';</script>";
                    }
                    }
                
            
            ?>
        </div>
        </form>
        <hr>
        <h3 class="text-center mt-3 pt-3">Zakazani termini</h3>   
        <div class="row">
        <div class="tabela-korisnik">
        <table>
        <thead class="text-center">
            <tr>
                
                <th>Usluga</th>
                <th>Radnik</th>
                <th>Cena</th>
                <th>Datum</th>
                <th>Vreme</th>
                <th>Kreirano</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $danas = date('Y-m-d H:i:s');
            $upit = "SELECT * FROM rezervacije WHERE CONCAT(datum,' ',vreme) > ? AND id_korisnik = ?";
            $obradaUpit = $con->prepare($upit);
            $obradaUpit->bind_param("si",$danas,$sesija[0]->korisnik->ID);
            $obradaUpit->execute();
            $rezervacijaResult = $obradaUpit->get_result();
            while($rezervacija = $rezervacijaResult->fetch_assoc()){
                $uslugaUpit = "SELECT * from usluge WHERE id_usluge = ?";
                $obradaUsluga = $con->prepare($uslugaUpit);
                $obradaUsluga->bind_param("i",$rezervacija["id_usluge"]);
                $obradaUsluga->execute();
                $uslugaResult = $obradaUsluga->get_result();
                while($usluga = $uslugaResult->fetch_assoc())
                {
                    $radnikUpit = "SELECT * from radnik WHERE id_radnik = ?";
                    $obradaRadnik = $con->prepare($radnikUpit);
                    $obradaRadnik->bind_param("i",$rezervacija["id_radnika"]);
                    $obradaRadnik->execute();
                    $radnikResult = $obradaRadnik->get_result();
                    while($radnik = $radnikResult->fetch_assoc())
                    {

                ?>
                
                <tr>
                    
                    <td><?= $usluga['naziv']; ?></td>
                    <td><?= $radnik['ime']; ?></td>
                    <td><?= $rezervacija['cena']; ?> RSD</td>
                    <td><?= $rezervacija['datum']; ?></td>
                    <td><?= $rezervacija['vreme']; ?></td>
                    <td><?= $rezervacija['created']; ?></td>
                    <td>
                        <a href="otkazi-rezervaciju.php?id=<?=$rezervacija['id_rezervacije']?>">Otkazi uslugu</a>
                    </td>
                </tr>
               <?php } } } ?>
            </tbody>
        </table>
        </div> 
        </div>
        <hr>
        <h3 class="text-center mt-3 pt-3">Moje kupovine</h3>  
        <div class="row">
        <div class="tabela-korisnik">
        <table>
        <thead>
            <tr>
              
                <th>Vreme</th>
                <th>Ukupna cena</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
        <?php 
           
            $upitNarudzbenica = "SELECT * FROM narudzbenica where korisnik_id = ?";
            $obradaNarudzbenica = $con->prepare($upitNarudzbenica);
            $obradaNarudzbenica->bind_param("i",$sesija[0]->korisnik->ID);
            $obradaNarudzbenica->execute();
            $narudzbenicaResult = $obradaNarudzbenica->get_result();
            while($narudzbenica = $narudzbenicaResult->fetch_assoc()){
              ?>
                <tr>
                  
                    <td><?php echo $narudzbenica['vreme']; ?></td>
                    <td><?php echo $narudzbenica['ukupna_cena']; ?> RSD</td>
                    <td>
                        <a href="narudzbenica.php?narudzbinaID=<?=$narudzbenica['id_narudzbenica']?>" >Pogledaj artikle</a>
                    </td>
                </tr>
           <?php }  ?>
        </tbody>
    </table>
        </div>
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