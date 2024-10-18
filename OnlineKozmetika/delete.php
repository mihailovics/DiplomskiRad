<?php 
    include('php/connection.php');
    $delid = $_GET['delid'];
    $sql = "DELETE from korisnik where Email=?";
    $upit = $con -> prepare($sql);
    $upit -> bind_param("s",$delid);
    $upit -> execute();
    if(!$upit){
        echo "Ne moze se izvrsiti upit";
    }
    else{
        echo "<script>alert('Uspesno ste izbrisali korisnika')</script>";
        echo "<script>window.location.href = 'index.php';</script>";

    }

?>