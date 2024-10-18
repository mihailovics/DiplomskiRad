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
    <?php include ('php/mobileMenu.php');?>
    <?php include ('php/nav.php');?>
    <?php include ('php/connection.php');?>
    <?php
          $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
          $cart = json_decode($cart);
        
          $ime = "";
          $prezime = "";
          $telefon = "";
          $email = "";
          $adresa = "";
          $korisnik_id = 0;
        if(isset($_COOKIE["sesija"])){
          $sesija = $_COOKIE["sesija"] ? $_COOKIE["sesija"] : "[]";
          $sesija = json_decode($sesija);
          $korisnik_id = $sesija[0]->korisnik->ID;
          $ime = $sesija[0]->korisnik->Ime;
          $prezime = $sesija[0]->korisnik->Prezime;
          $telefon = $sesija[0]->korisnik->Telefon;
          $email = $sesija[0]->korisnik->Email;
          $adresa = $sesija[0]->korisnik->Adresa;
        }

    ?>
    
    <section class="checkout spad">
        <div class="container">
            <form action="php/naruci.php" method="POST" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8 col-xl-8">
                        <h5>Detalji</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Ime <span>*</span></p>
                                    <input type="text" value="<?= $ime ?>" name="ime" required>
                                    <input type="hidden" value="<?= $korisnik_id ?>" name="korisnik_id">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Prezime <span>*</span></p>
                                    <input type="text" value="<?= $prezime ?>" name="prezime" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Adresa <span>*</span></p>
                                    <input type="text" value="<?= $adresa ?>" placeholder="Grad, Ulica i broj" name="ulica" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Broj telefona <span>*</span></p>
                                    <input type="text" value="<?= $telefon ?>" name="tel" required>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text" value="<?= $email ?>" name="email" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                            <div class="checkout__order">
                                <h5>Vasa narudzbina</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Artikl</span>
                                            <span class="top__text__right">Cena</span>
                                        </li>
                                        <?php
                                        $ukupno = 0;
                                            foreach($cart as $item){
                                                $upit = "SELECT * from artikl where sifra=?";
                                                $obrada = $con->prepare($upit);
                                                $obrada -> bind_param("i",$item->artiklID);
                                                $obrada->execute();
                                                $rezultat = $obrada -> get_result();
                                                if(!$rezultat){
                                                    echo "Doslo je do greske" . $con->errno;
                                                }
                                                if(!$sve=$rezultat->fetch_assoc()){
                                                    echo "Nema proizvoda";
                                                }
                                                else{    

                                                $ukupno += $sve["cena"] * $item->kolicina;
                                            
                                        ?>
                                        <li><?= $sve["naziv"] ?><span>RSD <?php echo ($sve["cena"] * $item->kolicina) ?></span></li>
                                                <?php } } ?>
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Ukupno: <?= $ukupno ?>  RSD <span></span></li>
                                        <input type="hidden" value="<?= $ukupno ?>" name="ukupna_cena">
                                    </ul>
                                </div>
                                <div class="s">
                                    <label for="pouzece"> Placanje pouzecem </label>
                                    <input type="radio" name="check" id="pouzece" required>
                                </div>
                                <button name="naruci" type="submit" class="site-btn">Naruci</button>
                            </div>
                        </div>
                </form>
            </div>
        </section>
        

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