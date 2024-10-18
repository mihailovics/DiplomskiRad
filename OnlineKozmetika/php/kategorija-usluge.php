<?php 
    include('php/connection.php');
    $upit = "select * from usluge where kategorija_usluge = '" . $_GET['id'] . "'";
    $rezultat = $con->query($upit);
    if(!$rezultat){
        echo "Doslo je do greske" . $con->errno;
    }
    if(!$sve = $rezultat->fetch_assoc()){
        echo "<h2 class='text-center mt-2 pt-2 tabela'>Nema usluga za datu kategoriju<h2>";
    }
    else{
?>

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Zakažite svoj termin</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
        <?php  
            mysqli_data_seek($rezultat,0);
           
            while($sve = $rezultat -> fetch_assoc()){
        ?>
            <div class="col-lg-4 col-sm-6">
                <div class="product__item ">
                     <a href="proveri.php?id=<?=$sve['id_usluge'] ?>">
                        <div class="product__item__pic set-bg usluga__slika" data-setbg="<?php echo $sve['img']; ?>">  
                        </div>
                    </a>
                    <div class="product__item__text">
                        <h4 class="usluge"><a href="zakazi-termin.php?id=<?=$sve['id_usluge'] ?>"><?php echo $sve['naziv'];?></a></h4>
                        <h5><?= $sve['cena'] ?> RSD / 60min</h5>
                    </div>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
</section>