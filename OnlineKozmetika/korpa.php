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
   <?php
        include('php/connection.php');
         $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
         $cart = json_decode($cart);
   
   ?>
   <form method="POST" action="add-to-cart.php">
    <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Proizvod</th>
                                    <th>Cena</th>
                                    <th>Kolicina</th>
                                    <th>Ukupno</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php $brojArtikala = 0;
                                        foreach($cart as $c){
                                        $upit = "SELECT * from artikl where sifra=?";
                                        $obrada = $con->prepare($upit);
                                        $obrada -> bind_param("i",$c->artiklID);
                                        $obrada->execute();
                                        $rezultat = $obrada -> get_result();
                                        if(!$rezultat){
                                            echo "Doslo je do greske" . $con->errno;
                                        }
                                        if(!$sve=$rezultat->fetch_assoc()){
                                            echo "Nema proizvoda";
                                        }
                                        else{
                                            $brojArtikala++;
                                    
                                ?>
                                <tr>
                                    <td class="cart__product__item">
                                        <input type="hidden" name="artiklID<?=$brojArtikala?>" value="<?= $c->artiklID ?>"></input>
                                        <img src="<?=$sve["slika"]?>" alt="">
                                        <div class="cart__product__item__title">
                                            <h6><a href="product-details.php?id=<?= $sve["sifra"]?>"><?=$sve["naziv"]?></a></h6>
                                        </div>
                                    </td>
                                    <td class="cart__price"> <?=$sve["cena"]?> RSD</td>
                                    <td class="cart__quantity">
                                        <div class="pro-qty">
                                            <input type="text" name="kolicina<?=$brojArtikala?>" value="<?=$c->kolicina?>">
                                        </div>
                                    </td>
                                    <td class="cart__total"><?php echo ($sve["cena"] * $c->kolicina) ?> RSD </td>
                                    <td class="cart__close"><a href="add-to-cart.php?id=<?= $sve["sifra"] ?>"><span class="icon_close"></span></a></td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="index.php">Nastavi sa kupovinom</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <input type="hidden" name="brArtikl" value=<?= $brojArtikala ?>></input>
                        <button type="submit" name="updateCart"> Azuriraj korpu</button>
                    </div>
                </div>
                
            
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="checkout.php" class="primary-btn">Poruci</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

    

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