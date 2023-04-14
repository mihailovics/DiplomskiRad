<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Online kozmetika Beograd">
    <meta name="keywords" content="kozmetika, nega lica, nega tela, nega kose">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kozmetika</title>

    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <?php include ('php/mobileMenu.php');?>
    <?php include ('php/nav.php');?>
    
    
    <section class="checkout spad">
        <div class="container">
            <form action="#" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8 col-xl-8">
                        <h5>Detalji</h5>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Ime <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Prezime <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="checkout__form__input">
                                    <p>Drzava <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Adresa <span>*</span></p>
                                    <input type="text" placeholder="Ulica">
                                    <input type="text" placeholder="Broj">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Grad <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Drzava <span>*</span></p>
                                    <input type="text">
                                </div>
                                <div class="checkout__form__input">
                                    <p>Zip <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Broj telefona <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="checkout__form__input">
                                    <p>Email <span>*</span></p>
                                    <input type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-4">
                            <div class="checkout__order">
                                <h5>Vasa narudzbina</h5>
                                <div class="checkout__order__product">
                                    <ul>
                                        <li>
                                            <span class="top__text">Artikl</span>
                                            <span class="top__text__right">Cena</span>
                                        </li>
                                        <li>01. Krema za telo <span>RSD 3.000</span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__total">
                                    <ul>
                                        <li>Ukupno: <span></span></li>
                                    </ul>
                                </div>
                                <div class="checkout__order__widget">
                                    <label for="check-payment">
                                        Placanje pouzecem
                                        <input type="radio" id="check-payment">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label for="online">
                                        Online placanje
                                        <input type="radio" id="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Naruci</button>
                            </div>
                        </div>
                </form>
            </div>
        </section>
        

        <?php include('php/footer.php');?>
        <script src="js/jquery-3.3.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/jquery.countdown.min.js"></script>
        <script src="js/jquery.slicknav.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.nicescroll.min.js"></script>
        <script src="js/main.js"></script>
    </body>

    </html>