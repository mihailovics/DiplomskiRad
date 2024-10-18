<?php
    include('connection.php');
    if(isset($_POST['zakazi'])){
        $upit = "INSERT INTO rezervacije (id_usluge, id_radnika, id_korisnik, datum, vreme, cena) VALUES (?,?,?,?,?,?)";
        $obrada = $con->prepare($upit);
        $obrada -> bind_param("iiissd",$_POST['uslugaID'],$_POST['radnikID'],$_POST['korisnikID'],$_POST['datum'],$_POST['termin'],$_POST['cena']);
        $obrada->execute();
        if(!$obrada){
            echo "Doslo je do greske " . $con->errno; 
        }
        else{
            echo "<p>Uspesno ste rezervisali termin</p>";
            echo "<script>window.location.href = '../index.php';</script>";
        }
    }
    else{
        
    }


?>