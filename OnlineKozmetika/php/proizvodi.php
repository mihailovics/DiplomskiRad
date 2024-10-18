<?php 
    include('php/connection.php');
    $upit = "select * from artikl order by datum DESC";
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
                    <h4>Najnoviji Proizvodi</h4>
                </div>
            </div>
        </div>
        <div class="row property__gallery">
        <?php  
            mysqli_data_seek($rezultat,0);
            $brojArtikala = 0;
            while($sve = $rezultat -> fetch_assoc()){
        ?>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="product__item">
                     <a href="product-details.php?id=<?php echo $sve['sifra'];?>">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $sve['slika']; ?>">  
                        </div>
                    </a>
                    <div class="product__item__text">
                        <h6><a href="product-details.php?id=<?php echo $sve['sifra'];?>"><?php echo $sve['naziv'];?></a></h6>
                        <div class="product__price"> <?php echo $sve['cena'];?> RSD</div>
                    </div>
                </div>
            </div>
        <?php
            $brojArtikala++;
            if($brojArtikala == 4){
                break;
            }
    
    } ?>
        </div>
    </div>
</section>
<?php } ?>