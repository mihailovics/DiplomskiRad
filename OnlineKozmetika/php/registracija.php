<?php 

    include('connection.php');
    $select = "select * from korisnik where Email=?";
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
        $upit = "INSERT into korisnik (Ime, Prezime, Email, Lozinka, Adresa, Telefon, Rola) values (?,?,?,?,?,?,?)";
        $password = $_POST['lozinka'];
        $hashed = password_hash($password,PASSWORD_DEFAULT);
        $obrada = $con->prepare($upit);
        $rola = 1;
        $obrada -> bind_param("ssssssi",$_POST['ime'],$_POST['prezime'],$_POST['email'],$hashed,$_POST['adresa'],$_POST['telefon'],$rola);
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