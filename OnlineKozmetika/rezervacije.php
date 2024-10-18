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
   <h2 class="text-center mt-2">Sve rezervacije </h2>
   <div class="row">
    
    <div class="tabela">
        <table>
        <thead class="text-center">
            <tr>
                <th>ID rezervacije</th>
                <th>Usluga</th>
                <th>Radnik</th>
                <th>Korisnik</th>
                <th>Datum</th>
                <th>Vreme</th>
                <th>Kreirano</th>
                
            </tr>
        </thead>
        <tbody >
        <?php 
            include ('php/connection.php');
            $upit = "SELECT * FROM rezervacije";
            $rez = $con->query($upit);
            while($konacno = $rez->fetch_assoc()){
                $uslugaUpit = "SELECT * from usluge WHERE id_usluge = ?";
                $obradaUsluga = $con->prepare($uslugaUpit);
                $obradaUsluga->bind_param("i",$konacno["id_usluge"]);
                $obradaUsluga->execute();
                $uslugaResult = $obradaUsluga->get_result();
                while($usluga = $uslugaResult->fetch_assoc())
                {
                    $radnikUpit = "SELECT * from radnik WHERE id_radnik = ?";
                    $obradaRadnik = $con->prepare($radnikUpit);
                    $obradaRadnik->bind_param("i",$konacno["id_radnika"]);
                    $obradaRadnik->execute();
                    $radnikResult = $obradaRadnik->get_result();
                    while($radnik = $radnikResult->fetch_assoc())
                    {
                        $korisnikUpit = "SELECT * from korisnik WHERE ID = ?";
                        $obradaKorisnik = $con->prepare($korisnikUpit);
                        $obradaKorisnik->bind_param("i",$konacno["id_korisnik"]);
                        $obradaKorisnik->execute();
                        $korisnikResult = $obradaKorisnik->get_result();
                        while($korisnik = $korisnikResult->fetch_assoc())
                        {

                ?>
                
                <tr>
                    <td><?= $konacno['id_rezervacije']; ?></td>
                    <td><?= $usluga['naziv']; ?></td>
                    <td><?= $radnik['ime']; ?></td>
                    <td><?= $korisnik['Email']; ?></td>
                    <td><?= $konacno['datum']; ?></td>
                    <td><?= $konacno['vreme']; ?></td>
                    <td><?= $konacno['created']; ?></td>
                    
                </tr>
           <?php } } } }?>
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