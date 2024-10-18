<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Online kozmetika Beograd">
    <meta name="keywords" content="kozmetika, nega lica, nega tela, nega kose">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kozmetika</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
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
        $poruka;
        if(isset($_GET['pretraga'])){
            $var =  $_GET['pretraga'];
            $upit = "select * from artikl where naziv like '%$var%'";
        }
        else if(isset($_GET['kategorijaID'])){
            $kat = $_GET['kategorijaID'];
            $upit = "select * from artikl where kategorija like '%$kat%'";
        }
        else if(isset($_GET['minCena']) || isset($_GET['maxCena'])){
            $minCena = $_GET['minCena'];
            $maxCena = $_GET['maxCena'];
            $upit = "select * from artikl where cena >= '" . $minCena . "' and cena <= '" . $maxCena ."'";
           
        }
        else{
            
            $upit = "select * from artikl";
        }

        $rezultat = $con->query($upit);
        
        if(!$rezultat){
            echo "Doslo je do greske" . $con->errno;
        }
        if(!$sve = $rezultat->fetch_assoc()){
            echo "<br><br><br>";
            echo "<div class='container text-center' style='height:400px; '><h3>Nema proizvoda za datu pretragu</h3></div>";
        }
        else{
            $kategorijeUpit = "select * from kategorija";
            $rezultatKategorije = $con->query($kategorijeUpit);
            if(!$rezultatKategorije){
                echo "Doslo je do greske" . $con->errno;
            }
    ?>

    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <h4>Kategorije</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                            <div class="card-body">
                                                <ul>
                                                    <?php 
                                                       mysqli_data_seek($rezultatKategorije,0);
                                                       while($sveKategorije = $rezultatKategorije->fetch_assoc()){
                                                    ?>
                                                    <li><a href="shop.php?kategorijaID=<?php echo $sveKategorije['IDKategorije']; ?>"><?php echo $sveKategorije['Naziv']; ?></a></li>
                                                        <?php }?>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__filter">
                            <div class="section-title">
                                <h4>Filtriraj po ceni</h4>
                            </div>
                           <?php 
                             $svi = array();
                             mysqli_data_seek($rezultat,0);
                             while($filter = $rezultat -> fetch_assoc()){
                               array_push($svi,$filter['cena']);
                             }
                              $max = max($svi); $min = min($svi);
                           ?>
                            <div class="filter-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="<?=$min?>" data-max="<?=$max?>"></div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <p>Cena:</p>
                                        <input type="text" name="min" id="minamount">
                                        <input type="text" name="max" id="maxamount">
                                    </div>
                                </div>
                            </div>
                            <?php if(isset($_GET['minCena']) || isset($_GET['maxCena'])){?>
                                <a href="shop.php">Reset</a>    
                            <?php } else {?>
                                <a href="" onclick="this.href='shop.php?minCena='+document.getElementById('minamount').value+'&maxCena='+document.getElementById('maxamount').value">Filter</a>
                                <?php } ?>
                            </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <div class="row">
                    <?php  
                        
                            mysqli_data_seek($rezultat,0);
                            while($sve = $rezultat -> fetch_assoc()){
                           
                    ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="product__item">
                            <a href="product-details.php?id=<?php echo $sve['sifra'];?>">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo $sve['slika'];?>">
                                </div>
                          </a>
                                <div class="product__item__text">
                                    <h6><a href="product-details.php?id=<?php echo $sve['sifra'];?>"><?php echo $sve['naziv'];?></a></h6>
                                    <div class="product__price"><?php echo $sve['cena'];?> RSD</div>
                                </div>
                            </div>
                        </div>
                        <?php }  ?>
                        
                    </div>
                    
                <?php }  ?>
                </div>
            </div>
        </div>
    </section>

    <?php include ('php/footer.php');?>

    
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