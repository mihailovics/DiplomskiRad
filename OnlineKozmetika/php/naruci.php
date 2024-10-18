<?php 

include('connection.php'); 


if(isset($_POST['naruci'])){
    $korisnikTEMP = $_POST['korisnik_id'];
    if($korisnikTEMP == 0){
        $korisnikID = null;
    }
    else{
        $korisnikID = $_POST['korisnik_id'];
    }
    $vreme = new DateTime('now');
    $vreme_string = date_format($vreme,'Y-m-d H:i:s');
    $upit = "INSERT into narudzbenica (vreme, korisnik_id, ukupna_cena, adresa) values (?,?,?,?)";
    $obrada = $con->prepare($upit);
    $obrada -> bind_param("sids",$vreme_string, $korisnikID,$_POST['ukupna_cena'], $_POST['ulica']);
    $obrada -> execute();
    if(!$obrada){
        echo "Doslo je do greske" . $con->errno;
    }
    else{
           $upit2 = "SELECT id_narudzbenica FROM narudzbenica ORDER BY id_narudzbenica DESC LIMIT 1";
           $obrada2 = $con->prepare($upit2);
           $obrada2->execute();
           $result = $obrada2->get_result();
           $narudzbenica = $result->fetch_assoc();
           $narudzbenica_id = $narudzbenica['id_narudzbenica'];
           $cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
           $cart = json_decode($cart);
            foreach($cart as $item){
                $upit = "SELECT * from artikl where sifra=?";
                $obrada = $con->prepare($upit);
                $obrada -> bind_param("i",$item->artiklID);
                $obrada->execute();
                $rezultat = $obrada -> get_result();
                if(!$rezultat){
                    echo "Doslo je do greske" . $con->errno;
                }
                if(!$sve=$rezultat->fetch_assoc()){
                    echo "Nema proizvoda";
                }
                else{   
                    $cena = $sve["cena"] * $item->kolicina;
                    $stavka = "INSERT into stavka_narudzbenice (artikl_id, kolicina, narudzbenica_id, cena) values (?,?,?,?)";
                    $obrada3 = $con->prepare($stavka);
                    $obrada3 -> bind_param("iiid", $item->artiklID, $item->kolicina, $narudzbenica_id,$cena);
                    $obrada3 -> execute();
                    if(!$obrada3){
                        echo "Doslo je do greske" . $con->errno;
                    }
                    else{
                        setcookie("cart", "", time() - 3600, "/");
                        echo "<script> alert('Uspesno ste narucili artikl!');
                            window.location.href = '../index.php';
                        </script>";
                    }
                }
    }
}
}   
?>