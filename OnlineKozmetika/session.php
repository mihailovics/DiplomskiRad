<?php
    
    
    
    include('php/connection.php');
    $sesija = isset($_COOKIE["sesija"]) ? $_COOKIE["sesija"] : "[]";
    $sesija = json_decode($sesija);

    if(isset($_POST['login'])){
        $user=$_POST['username'];
        $pass=$_POST['lozinka'];
        $upit = "SELECT * from korisnik where Email = ?";
        $kreni = $con->prepare($upit);
        $kreni->bind_param("s",$user);
        $kreni->execute();
        $hash = $kreni->get_result();
        if(!$konacno = $hash->fetch_assoc()){
            echo "<script>alert('Ne postoji korisnik sa datim emailom!');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
        else{
                $hash2 = $konacno['Lozinka'];
                if(password_verify($pass, $hash2)==true){
                    array_push($sesija, array(
                        "korisnik" => $konacno
                    ));
                    setcookie("sesija",json_encode($sesija),0,'/',"",true,true);
                    header("Location:index.php");
                 }
                 else{
                        echo "<script>alert('Lozinka nije dobra');</script>";
                        echo "<script>window.location.href = 'login.php';</script>";
                     }   
            }
        }  

    

   
    



?>