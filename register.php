<?php
include './include/functions.php'
?>

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
                <h2 class="section-heading text-uppercase">Đăng ký tài khoản</h2>
                <h3 class="section-subheading text-muted">
                    Khách hàng là thượng đế
                </h3>
            </div>



            <?php register()?>


            <form action="#" method="POST" id="contactForm">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="name" class="form-control " id="name" type="text" placeholder="Họ và tên *"
                                data-sb-validations="required" />

                            <h4 class='err_user'><?php echo isset($errUser['fullName']) ? $errUser['fullName'] : ''; ?>
                            </h4>

                        </div>


                        <div class="form-group">
                            <input name="email" class="form-control " id="email" type="email" placeholder="Email *"
                                data-sb-validations="required,email" />
                            <h4 class='err_user'><?php echo isset($errUser['email']) ? $errUser['email'] : ''; ?></h4>


                        </div>

                        <div class="form-group mb-md-0">
                            <input name="phone" class="form-control " id="phone" type="text"
                                $placeholder="Số điện thoại *" data-sb-validations="required" />
                            <h4 class='err_user'><?php echo isset($errUser['phone']) ? $errUser['phone'] : ''; ?></h4>
                            <h4 class='err_user'>
                                <?php echo isset($errUser['phonetext']) ? $errUser['phonetext'] : ''; ?></h4>

                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input name="userName" class="form-control " id="name" type="text"
                                placeholder="Tên tài khoản *" data-sb-validations="required" />
                            <h4 class='err_user'><?php echo isset($errUser['userName']) ? $errUser['userName'] : ''; ?>
                            </h4>


                        </div>


                        <div class="form-group">
                            <input name="password" class="form-control " id="email" type="password"
                                placeholder="Mật khẩu *" data-sb-validations="required,email" />
                            <h4 class='err_user'><?php echo isset($errUser['password']) ? $errUser['password'] : ''; ?>
                            </h4>

                        </div>

                        <div class="form-group mb-md-0">
                            <input name="password2" class="form-control " id="phone" type="password"
                                placeholder="Xác nhận lại mật khẩu *" data-sb-validations="required" />
                            <h4 class='err_user'>
                                <?php echo isset($errUser['password2']) ? $errUser['password2'] : ''; ?></h4>
                            <h4 class='err_user'>
                                <?php echo isset($errUser['errpass']) ? $errUser['errpass'] : ''; ?></h4>
                        </div>


                    </div>

                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-xl text-uppercase " name="register" id="submitButton"
                        type="submit">
                        Đăng ký
                    </button>
                </div>
            </form>
        </div>
    </section>




    <?php include './include/footer.php'?>