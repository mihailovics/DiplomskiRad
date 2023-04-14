<?php 

    include('connection.php');
    $select = "select * from korisnik1 where Email=?";
    $email = $_POST['email'];
    $var = $con->prepare($select);
    $var->bind_param("s",$email);
    $var->execute();
    $result = $var-> get_result();
    $konacno = $result -> fetch_assoc();
    if($konacno!=null){
        echo "<script>alert('Postoji korisnik sa mejlom u bazi');</script>";
        echo "<script>window.location.href = '../login.php';</script>";
    }
    else{
        $upit = "INSERT into korisnik1 (Ime, Prezime, Email, Lozinka, Adresa, Telefon, Zaposlen) values (?,?,?,?,?,?,?)";
        $password = $_POST['lozinka'];
        $hashed = password_hash($password,PASSWORD_DEFAULT);
        $obrada = $con->prepare($upit);
        $zap = 0;
        $obrada -> bind_param("ssssssi",$_POST['ime'],$_POST['prezime'],$_POST['email'],$hashed,$_POST['adresa'],$_POST['telefon'],$zap);
        $obrada-> execute();
        
        if(!$obrada){
                echo "Doslo je do greske" . $con->errno;
        }
        else{
                echo "<script>alert('uspesno ste se registrovali')</script>";
                header("Location:../login.php");
        }
    }
?>