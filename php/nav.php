<?php
    session_start();

?>
<header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-8">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Pocetna</a></li>
                            <li><a href="./shop.php">Proizvodi</a></li>
                            <li><a href="./contact.php">Kontakt</a></li>
                        </ul>
                    </div>
                    <div class="col-xl-3 col-lg-2">
                        <nav class="header__menu">
                        <form name="trazi" method="post" action="shop.php">
                            <div class="input-group rounded">
                            
                                <input type="text" name="pr" id="trazi" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <span class="input-group-text border-0">
                                  <input type="submit" value="Trazi">
                                </span>
                               
                            </div>
                            </form>
                        </nav>
                        
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <?php 
                        
                        if(isset($_SESSION["loggedIn"])){
                           
                            if($_SESSION["Zaposlen"]!=0){

                            
                         ?>
                        <div class="header__right__auth">
                            <a href="panel.php">Admin Panel</a>
                            <a href="dodaj-artikl.php">Dodaj artikl</a>
                        </div>
                            <?php }?>  
                        <div class="header__right__auth">
                            <a href="korisnik.php" class="acc"><i class="fa fa-user fa-2x"></i></a>
                            
                            <a href="logout.php">Logout</a>
                        </div>
                        
                        <?php } else { ?>
                        <div class="header__right__auth">
                            <a href="login.php">Login / Register</a>
                        </div>
                        <?php } ?>
                        <ul class="header__right__widget">
                            <li><a href="./korpa.php"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
   