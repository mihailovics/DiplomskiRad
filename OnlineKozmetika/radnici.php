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
   <div class="container">
    <form enctype="multipart/form-data" method="POST" action="<?php $_SERVER['PHP_SELF']?>" class="checkout__form">
        <br>
        <h5>Dodaj radnika</h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Ime</p>
                    <input type="text" name="ime" value="" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Prezime</p>
                    <input type="text" name="prezime" value="" required >
                </div>
            </div>
            <div class="col-lg-6 ">
                <div class="checkout__form__input">
                    <p>JMBG</p>
                    <input type="text" name="JMBG" value="" required >
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Telefon</p>
                    <input type="text" name="telefon" value="" required>
                </div>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Email</p>
                    <input type="text" name="email" value="" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Kategorija</p>
                    <select name="usluga" required>
                        <?php
                             $upitKat = "SELECT * FROM kategorija_usluge";
                             $obradaKat = $con->prepare($upitKat);
                             $obradaKat->execute();
                             $kategorijeResult = $obradaKat->get_result();
                             while($kategorija = $kategorijeResult->fetch_assoc())
                             {

                                 ?><option value="<?=$kategorija['id_katUsluge']?>"><?=$kategorija['Naziv']?></option> <?php }
                              ?>
                        </select>  
                </div>
            </div>
            <div class="col-lg-12 col-xl-12" id="update">
                <input class="site-btn" type="submit" value="Dodaj radnika" name="dodaj">
            </div>
         </div>
     </form>
     <br>
    <hr>
     <div class="row">
     <div class="tabela">
        <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ime</th>
                <th>Prezime</th>
                <th>JMBG</th>
                <th>Telefon</th>
                <th>Usluga</th>
                <th>Email</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $upit = "SELECT * FROM radnik";
            $obradaUpit = $con->prepare($upit);
            $obradaUpit->execute();
            $radnikResult = $obradaUpit->get_result();
            while($radnik = $radnikResult->fetch_assoc()){
                $uslugaUpit = "SELECT * from kategorija_usluge WHERE id_katUsluge = ?";
                $obradaUsluga = $con->prepare($uslugaUpit);
                $obradaUsluga->bind_param("i",$radnik["usluga"]);
                $obradaUsluga->execute();
                $uslugaResult = $obradaUsluga->get_result();
                while($usluga = $uslugaResult->fetch_assoc())
                { 
                    
                    ?>
                 <tr>
                    
                    <td><?= $radnik['id_radnik']; ?></td>
                    <td><?= $radnik['ime']; ?></td>
                    <td><?= $radnik['prezime']; ?></td>
                    <td><?= $radnik['JMBG']; ?></td>
                    <td><?= $radnik['broj_telefona']; ?></td>
                    <td><?= $usluga['Naziv']; ?></td>
                    <td><?= $radnik['email'];?></td>
                    <td>
                        <a href="izmeni-radnika.php?id=<?= $radnik['id_radnik']; ?>">Izmeni</a>
                        <a href="#">Obrisi</a>
                    </td>
                </tr>
               <?php } } ?>
        </tbody>
         </table>
        </div>
    </div>
                </div>
  <?php include('php/footer.php');?>
  <?php
    if(isset($_POST['dodaj'])){
        $upit = "INSERT INTO radnik (ime, prezime, JMBG, broj_telefona, usluga, email) VALUES (?,?,?,?,?,?)";
        $obrada = $con->prepare($upit);
        $obrada -> bind_param("ssssss",$_POST['ime'],$_POST['prezime'],$_POST['JMBG'],$_POST['telefon'],$_POST['usluga'],$_POST['email']);
        $obrada->execute();
        if(!$obrada){
            echo "Doslo je do greske " . $con->errno; 
        }
        else{
            echo "<p>Uspesno ste dodali radnika</p>";
            echo "<script>window.location.href = 'radnici.php';</script>";
        }
    }
    else{
        
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