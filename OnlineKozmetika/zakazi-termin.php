<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Online kozmetika</title>

   
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
   <?php 
        if(!isset($_COOKIE['sesija'])){
            echo "<script>
            alert('Morate biti korisnik kako bi mogli rezervisati termin!');
            window.location.href = 'login.php';
            </script>";
       }
       else{
        $sesija = isset($_COOKIE["sesija"]) ? $_COOKIE["sesija"] : "[]";
        $sesija = json_decode($sesija);  
        $datum = $_POST['datum'];
        $uslugaID = $_POST['sifraUsluge'];
        $radnikID = $_POST['radnik'];
        $nazivUsluge = $_POST['naziv'];

        function getTimeSlots($day) {
            $timeSlots = array();
            $startHour = 9;
            $endHour = 17;
            $interval = 60; // trajanje jedne rezervacije u minutima
        
            for ($hour = $startHour; $hour < $endHour; $hour++) {
                for ($minute = 0; $minute < 60; $minute += $interval) {
                    $time = sprintf("%02d:%02d:00", $hour, $minute);
                    $timeSlots[] = $time;
                }
            }
        
            return $timeSlots;
        }
        function isSlotAvailable($radnikID, $uslugaID, $day, $time) {
            include('php/connection.php');
            $availabilityQuery = "SELECT * FROM rezervacije WHERE id_radnika = '$radnikID' AND id_usluge = '$uslugaID' AND datum = '$day' AND vreme = '$time'";
            $availabilityResult = $con->query($availabilityQuery);
        
            return $availabilityResult->num_rows === 0;
        }
        function getAvailableTimeSlots($radnikID, $uslugaID, $day) {
            $availableTimeSlots = array();
            $allTimeSlots = getTimeSlots($day);
        
            foreach ($allTimeSlots as $time) {
                if (isSlotAvailable($radnikID, $uslugaID, $day, $time)) {
                    $availableTimeSlots[] = $time;
                }
            }
        
            return $availableTimeSlots;
        }
    }
     
   ?>
   
   <div class="container">
        <div class="row">
        <form enctype="multipart/form-data" method="POST" action="php/zakazi.php" class="checkout__form kolicina">
        <br>
        <h5>Zakazi termin za datum <?=$datum?></h5>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Naziv usluge</p>
                    <input type="text" name="naziv" value="<?=$nazivUsluge?>" readonly>
                    <input type="hidden" name="uslugaID" value="<?=$uslugaID?>" readonly>
                    <input type="hidden" name="radnikID" value="<?=$radnikID?>" readonly>
                    <input type="hidden" name="korisnikID" value="<?= $sesija[0]->korisnik->ID;  ?>" readonly>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Cena u RSD</p>
                    <input type="text" name="cena" value="<?=$_POST['cena'] ?>" readonly>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                    <p>Datum</p>
                    <input type="date" name="datum" value="<?=$datum?>" readonly>
                   
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="checkout__form__input">
                        <p>Dostupni termini</p>
                        <select name="termin" required>
                           <?php 
                             $availableTimeSlots = getAvailableTimeSlots($radnikID, $uslugaID, $datum);
                            
                             foreach ($availableTimeSlots as $time) {
                                 echo "<option value='$time'>$time</option>";
                             }
                           ?>
                        </select><br>
                    </div>
                </div>
            <div class="col-lg-12 col-xl-12" id="update">
                <input class="site-btn" type="submit" value="Zakazi" name="zakazi">
            </div>
            </div>
            </form>
        </div>
    </div>
        <?php
         
        ?>

    </div>

    
  <?php include('php/footer.php');?>
<script>
  

</script>
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