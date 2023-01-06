<?php

include './include/header.php'
?>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand  text-white" href="index.php"><i class="fa-solid fa-shop"></i> SHOP X </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">

                    <li class="nav-item">
                        <a class="nav-link" href="#">Đăng ký</a>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/login.php">Đăng Nhập</a>


                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <!-- REGISTER -->

    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contact Us</h2>
                <h3 class="section-subheading text-muted">
                    Lorem ipsum dolor sit amet consectetur.
                </h3>
            </div>

            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Your Name *"
                                data-sb-validations="required" />

                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control" id="email" type="email" placeholder="Your Email *"
                                data-sb-validations="required,email" />


                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control" id="phone" type="tel" placeholder="Your Phone *"
                                data-sb-validations="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Your Message *"
                                data-sb-validations="required"></textarea>

                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-xl text-uppercase " id="submitButton" type="submit">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>




    <?php include './include/footer.php'?>