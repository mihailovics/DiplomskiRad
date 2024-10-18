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
   <div class="container tabela">
    <h2 class="text-center">Upravljajte korisnicima</h2>
   <div class="row">
    <div class="tabela">
        <table>
        <thead>
            <tr>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Email</th>
                <th>Adresa</th>
                <th>Telefon</th>
                <th>Rola</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            include ('php/connection.php');
            $upit = "SELECT * FROM korisnik";
            $rez = $con->query($upit);
            while($konacno = $rez->fetch_assoc()){
                $rolaUpit = "SELECT * FROM rola WHERE IDRola = ?";
                $obradaRola = $con->prepare($rolaUpit);
                $obradaRola->bind_param("i",$konacno['Rola']);
                $obradaRola->execute();
                $rolaResult = $obradaRola->get_result();
                while($rola = $rolaResult->fetch_assoc()){
                
                ?>

                <tr>
                    <td><?php echo $konacno['Ime']; ?></td>
                    <td><?php echo $konacno['Prezime']; ?></td>
                    <td><?php echo $konacno['Email']; ?></td>
                    <td><?php echo $konacno['Adresa']; ?></td>
                    <td><?php echo $konacno['Telefon']; ?></td>
                    <td><?php echo $rola['Naziv']; ?></td>
                    <td>
                        <a href="edit-korisnik.php?editid=<?php echo ($konacno['Email']);?>" >Izmeni</a>
                        <a href="delete.php?delid=<?php echo ($konacno['Email']);?>" >Obrisi</a>
                    </td>
                </tr>
           <?php } } ?>
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