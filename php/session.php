<?php
    
    session_start();
    
    include('connection.php');

    if(isset($_POST['login'])){
        $user=$_POST['username'];
        $pass=$_POST['lozinka'];
        $upit = "SELECT * from korisnik1 where email = ?";
        $kreni = $con->prepare($upit);
        $kreni->bind_param("s",$user);
        $kreni->execute();
        $hash = $kreni->get_result();
        if(!$konacno = $hash->fetch_assoc()){
            header("Location:../login.php");
        }
        else{
            $hash2 = $konacno['Lozinka'];
            if(password_verify($pass,$hash2)==true){
                    $_SESSION["loggedIn"] = true;
                    $_SESSION["ID"] = $konacno['ID'];
                    $_SESSION["Email"] = $konacno['Email'];
                    $_SESSION["Password"] = $konacno['Lozinka'];
                    $_SESSION["Ime"] = $konacno['Ime'];
                    $_SESSION["Prezime"] = $konacno['Prezime'];
                    $_SESSION["Adresa"] = $konacno['Adresa'];
                    $_SESSION["Telefon"] = $konacno['Telefon'];
                    $_SESSION["Zaposlen"] = $konacno['Zaposlen'];
                
                if(isset($_SESSION["Email"])){
                    echo "<script>alert('Uspesno logovanje');</script>";
                    echo "<script>window.location.href = '../index.php';</script>";
                }
                
                else{
                header("Location:../login.php");
                }
            } 
            else{
                echo "<script>alert('Lozinka nije dobra');</script>";
                echo "<script>window.location.href = '../login.php';</script>";
            }   
        }  
    }

   
    



?>