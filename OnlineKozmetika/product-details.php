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
         $sesija = isset($_COOKIE["sesija"]) ? $_COOKIE["sesija"] : "[]";
         $sesija = json_decode($sesija);

         $id = $_GET['id'];
         $dodato=false;
         foreach($cart as $c){
            if($c->artiklID == $id){
                $dodato = true;
            }
        }    
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
    
   <section class="product-details spad">
   <form method="POST" action="add-to-cart.php">
        <div class="container">
            <div class="row">
                <div class="row">
                <div class="col-lg-6 col-xl-6">
                    <div class="product__details__pic">
                        <div class="product__details__slider__content">
                            <div class="product__details">
                                <img class="product__big__img" src="<?php echo $sve['slika'];?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-6">
                    <input type="hidden" name="artiklID" value="<?php echo $sve['sifra'];?>">
                    <div class="product__details__text">
                        <h3><?php echo $sve['naziv'];?><span>Brand: <?php echo $sve['proizvodjac'];?> </span></h3>
                        <div class="product__details__price">RSD <?php echo $sve['cena'];?></div>
                        <div class="product__details__button">
                            <?php if(!$dodato){?>
                            <div class="quantity">
                                <span>Kolicina:</span>
                                <div class="pro-qty">
                                    <input name="kolicina" type="number" value="1" max="<?=$sve['kolicina']?>" inputmode="numeric">
                                </div>
                            </div>
                            <?php } ?>
                            <?php if($dodato==true){ ?><button name="obrisi" type="submit" class="site-btn">Obrisi iz korpe</button>
                            <?php } if($dodato==false) {
                                        if($sve['kolicina']==0) {?> <button type="button" class="empty">Nema na lageru</button>
                                         <?php }else { ?><button name="dodaj" type="submit" class="site-btn">Dodaj u korpu</button><?php } }?>
                           
                        </div>
                        <div class="product__details__widget">
                            <ul>
                                <li>
                                    <span>Zalihe:</span>
                                    <div class="stock__checkbox">
                                        <label for="stockin">
                                            <?php if($sve['kolicina']>0){ ?>
                                            U zalihama 
                                            <?php } else{
                                                ?> Nema na lageru <?php
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </li>
                                <?php if(isset($_COOKIE["sesija"])){ 
                                    if($sesija[0]->korisnik->Rola == 3){
                                ?><a href="" name="obrisi" type="submit" class="mr-1 a-btn">Obrisi artikl</a> 
                                  <a href="izmeni-artikl.php?artiklID=<?= $sve["sifra"] ?>" name="izmeni" type="submit" class="ml-1 a-btn">Izmeni artikl</a>  
                                <?php
                            } }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Opis proizvoda</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <p><?php echo $sve['opis'];?></p>
                            </div>
                        </div>
                    </div>
                </div>
             </div>
             <?php } ?>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="related__title">
                        <h5>Proizvodi istog brenda</h5>
                    </div>
                </div>
            <?php
       
                $upit2 = "select * from artikl where proizvodjac = ? and sifra != ?";
                $obrada2 = $con->prepare($upit2);
                $obrada2 -> bind_param("si",$sve['proizvodjac'],$id);
                $obrada2->execute();
                $rezultat2 = $obrada2 -> get_result();
                if(!$rezultat2){
                    echo "Doslo je do greske" . $con->errno;
                }
                if(!$sve2=$rezultat2->fetch_assoc()){
                    echo "<p class='text-center'> Nema proizvoda </p>";
                }
            else{
            ?>
           
                <?php  
                          mysqli_data_seek($rezultat2,0);
                          $brProizvoda = 0;
                          while($sve2 = $rezultat2 -> fetch_assoc()){
                    ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                    <a href="product-details.php?id=<?php echo $sve2['sifra'];?>">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $sve2['slika'];?>">
                        </div>
                          </a>
                        <div class="product__item__text">
                            <h6><a href="product-details.php?id=<?php echo $sve2['sifra'];?>"><?php echo $sve2['naziv'];?></a></h6>
                            <div class="product__price">RSD <?php echo $sve2['cena'];?></div>
                        </div>
                    </div>
                </div>
                <?php
                    $brProizvoda++;
                    if($brProizvoda == 4){
                        break;
                    }
            } ?>
            </div>
            <?php } ?>
        </div>
        </form>
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