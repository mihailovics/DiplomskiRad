 <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">         
            <li><a href="korpa.php"><span class="icon_bag_alt"></span>
               <!-- <div class="tip">2</div> -->
            </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/aaaz.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
        <?php if(isset($_COOKIE["sesija"])){
                             ?>
                             <a href="korisnik.php" class="acc"><i class="fa fa-user fa-2x"></i></a>
                             
                             <a href="logout.php">Logout</a><?php  } else {?> 
                            
                           
                            
            <a href="login.php">Login/Register</a><?php } ?>
        </div>
    </div>
   