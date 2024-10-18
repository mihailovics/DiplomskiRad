<?php 
    include('php/connection.php');
    $upit = "select * from kategorija_usluge";
    $rezultat = $con->query($upit);
    if(!$rezultat){
        echo "Doslo je do greske" . $con->errno;
    }
    if(!$sve = $rezultat->fetch_assoc()){
        echo "Nema proizvoda";
    }
    else{
?>

<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="section-title">
                    <h4>Usluge koje vršimo</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
        <?php  
            mysqli_data_seek($rezultat,0);
            $brojArtikala = 0;
            while($sve = $rezultat -> fetch_assoc()){
        ?>
            <div class="col-lg-4 col-sm-6">
                <div class="product__item ">
                     <a href="usluga.php?id=<?php echo $sve['id_katUsluge'];?>">
                        <div class="product__item__pic set-bg usluga__slika" data-setbg="<?php echo $sve['slika']; ?>">  
                        </div>
                    </a>
                    <div class="product__item__text">
                        <h4 class="usluge"><a href=""><?php echo $sve['Naziv'];?></a></h4>
                        
                    </div>
                </div>
            </div>
        <?php
            } }?>
        </div>
    </div>
</section>