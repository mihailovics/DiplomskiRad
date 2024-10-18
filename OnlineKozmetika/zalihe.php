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
   <div class="container">
   <div class="row">
    <div class="tabela">
        <table>
        <thead class="text-center">
            <tr>
                <th>Sifra</th>
                <th>Naziv</th>
                <th>Kolicina</th>
                <th>Proizvodjac</th>
                <th>Datum</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            include ('php/connection.php');
            $upit = "SELECT * FROM artikl";
            $rez = $con->query($upit);
            while($konacno = $rez->fetch_assoc()){
                ?>

                <tr>
                    <td><?php echo $konacno['sifra']; ?></td>
                    <td><?php echo $konacno['naziv']; ?></td>
                    <td><?php echo $konacno['kolicina']; ?></td>
                    <td><?php echo $konacno['proizvodjac']; ?></td>
                    <td><?php echo $konacno['datum']; ?></td>
                    <td>
                        <a href="izmeni-kolicinu.php?id=<?=$konacno['sifra'];?>">Izmeni kolicinu</a>
                    </td>
                </tr>
           <?php } ?>
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