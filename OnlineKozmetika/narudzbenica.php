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
</head>

<body>
  
   <?php include('php/mobileMenu.php');?>
   <?php include('php/nav.php');?>
   <div class="container">
   <div class="row">
    <div class="tabela">
        <table>
        <thead>
            <tr>
                <th>Redni broj</th>
                <th>Naziv artikla</th>
                <th>Cena po artiklu</th>
                <th>Kolicina</th>
                <th>Ukupna cena</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            include ('php/connection.php');
            $rb = 0;
            $upit = "SELECT * FROM stavka_narudzbenice WHERE narudzbenica_id = ?";
            $obradaUpit = $con->prepare($upit);
            $obradaUpit->bind_param("i",$_GET['narudzbinaID']);
            $obradaUpit->execute();
            $narduzbinaResult = $obradaUpit->get_result();
            while($narudzbina = $narduzbinaResult->fetch_assoc()){
                $artiklUpit = "SELECT * from artikl WHERE sifra = ?";
                $obradaArtikl = $con->prepare($artiklUpit);
                $obradaArtikl->bind_param("i",$narudzbina["artikl_id"]);
                $obradaArtikl->execute();
                $artiklResult = $obradaArtikl->get_result();
                while($artikl = $artiklResult->fetch_assoc())
                { 
                    $rb++;
                    ?>

                <tr>
                    <td><?= $rb; ?></td>
                    <td><a href="product-details.php?id=<?= $artikl['sifra'] ?>"><?= $artikl['naziv']; ?></a></td>
                    <td><?= $artikl['cena']; ?> RSD</td>
                    <td><?= $narudzbina['kolicina']; ?></td>
                    <td><?= $narudzbina['cena']; ?> RSD</td>
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