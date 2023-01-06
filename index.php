<?php
include './include/header.php'
?>
<?php include "./include/functions.php"?>

<body id="page-top">
    <!-- Navigation-->
    <?php include './include/nav.php'?>

    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading"></div>
            <div class="masthead-heading text-uppercase"></div>
        </div>
    </header>




    <!-- PRODUCTS -->

    <?php

include './include/products.php'
?>



    <!-- Clients-->
    <div class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg"
                            alt="..." aria-label="Microsoft Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg"
                            alt="..." aria-label="Google Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg"
                            alt="..." aria-label="Facebook Logo" /></a>
                </div>
                <div class="col-md-3 col-sm-6 my-3">
                    <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg"
                            alt="..." aria-label="IBM Logo" /></a>
                </div>
            </div>
        </div>
    </div>



    <!-- Contact-->
    <?php include './include/contact.php'?>




    <?php include './include/footer.php'?>