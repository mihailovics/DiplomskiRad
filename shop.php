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
</head>

<body>
    
    <?php include('php/mobileMenu.php');?>
    <?php include('php/nav.php');?>

    <?php
        include('php/connection.php');
        if(isset($_POST['pr'])){
            $var =  $_POST['pr'];
            $upit = "select * from artikl2 where naziv like '%$var%'";
        }
        else{
            
            $upit = "select * from artikl2";
        }

        $rezultat = $con->query($upit);
        
        if(!$rezultat){
            echo "Doslo je do greske" . $con->errno;
        }
        if(!$sve = $rezultat->fetch_assoc()){
            echo "Nema proizvoda";
        }
        else{
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
                                        <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    <li><a href="#">Nega lica</a></li>
                                                    <li><a href="#">Nega tela</a></li>
                                                    <li><a href="#">Nega kose</a></li>
                                                    <li><a href="#">Alati</a></li>
                                                    <li><a href="#">Farbe</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                <div class="product__item__pic set-bg" data-setbg="<?php echo $sve['slika'];?>">
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="product-details.php?id=<?php echo $sve['sifra'];?>"><?php echo $sve['naziv'];?></a></h6>
                                    <div class="product__price">RSD <?php echo $sve['cena'];?></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        
                    </div>
                    
                <?php } ?>
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