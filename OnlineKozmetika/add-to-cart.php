<?php 

include('php/connection.php'); 

if(isset($_POST['dodaj'])){
    $artiklID = $_POST['artiklID'];
    $kolicina = $_POST['kolicina'];
    
    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);

    $upit = mysqli_query($con,"SELECT * from artikl where sifra = '" . $artiklID . "'");
    $proizvod = mysqli_fetch_object($upit);
    
    array_push($cart,array(
        "artiklID" => $artiklID,
        "kolicina" => $kolicina
        
    ));
    setcookie("cart",json_encode($cart),0,'/');
    header("Location: korpa.php");
}

if(isset($_POST['obrisi']) || isset($_GET['id'])){
    $artiklID = $_POST['artiklID'];
    if($artiklID == null){
        $artiklID = $_GET['id'];
    }
    $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
    $cart = json_decode($cart);
 
    $new_cart = array();
    foreach ($cart as $c)
    {
        if ($c->artiklID != $artiklID)
        {
            array_push($new_cart, $c);
        }
    }
    
    setcookie("cart",json_encode($new_cart),0,'/');
    header("Location:korpa.php");
}

if(isset($_POST['updateCart'])){
    $brArtikl = $_POST['brArtikl'];
    $cart = $_COOKIE["cart"];
    $cart = json_decode($cart);

    foreach ($cart as $c)
    {
        for($i=1; $i<=$brArtikl;$i++){
            $artiklID = $_POST['artiklID' . $i];
            $kolicina = $_POST['kolicina' . $i];
            echo "<script>console.log($artiklID)</script>";
            if ($c->artiklID == $artiklID)
            {
                $c->kolicina = $kolicina;
            }
        }
    }
    setcookie("cart",json_encode($cart),0,'/');
    header("Location:korpa.php");
}
   


?>

