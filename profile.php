<?php
include './include/header.php'
?>
<?php include "./include/functions.php"?>




<body id="page-top">
    <!-- Navigation-->
    <!-- <nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-black" id="mainNav">
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

                        <?php if (isset($_SESSION['user_name'])) {?>
                        <div class="dropdown">

                            <span class=" nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img class="id_user" width="20" src="/assets//img/portfolio//avatardefault_92824.webp"
                                    alt="">
                                <?php echo $_SESSION['user_name'] ?>
                            </span>
                            <ul class="dropdown-menu">
                                <?php echo $_SESSION['user_role'] == 1 ? " <li><a class='dropdown-item' href='/admin.php'> Admin</a></li>" : ''; ?>

                                <li><a class="dropdown-item" href="profile.php">Profile</a></li>

                                <?php echo $_SESSION['user_role'] != 1 ? " <li><a class='dropdown-item' href='/admin/index.php'> Trang quản trị</a></li>" : ''; ?>


                                <li><a class="dropdown-item" href="logout.php">Đăng xuất</a></li>


                            </ul>
                        </div>


                        <?php } else {?>

                        <a class="nav-link" href="/login.php">Đăng nhập</a>

                        <?php }?>



                    </li>
                    <li id="search" class="nav-item">
                        <form action="search.php" method="post">
                            <input name="search" class="input-group" type="text">
                            <button name="search_submit"> <i class="fa-solid fa-magnifying-glass"></i></button>
                        </form>


                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading"></div>
            <div class="masthead-heading text-uppercase"></div>
        </div>
    </header> -->

    <?php include './include/nav_profile.php'?>

    <?php updateProfile()?>


    <?php showProfile()?>
    <div class="bg-light ">
        <div class="container mt-5 shadow  bg-body rounded">
            <header class="pt-4">
                <h4>Hồ sơ của tôi</h4>
                <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
            </header>

            <hr>
            <section class="">

                <form action="#" enctype="multipart/form-data" method="POST">

                    <div id="profile">
                        <div>

                            <?php foreach ($dataProfile as $profile) {?>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Tên đăng nhập</label> <input name="userName"
                                    value="<?php echo $profile['user_name'] ?>" type="text">
                            </div>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Họ và tên </label> <input name="fullName"
                                    value="<?php echo $profile['user_fullName'] ?>" type="text">
                            </div>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Email</label> <input
                                    value="<?php echo $profile['user_email'] ?>" name="email" type="text">
                            </div>
                            <div class="mb-5 form-group">
                                <label class="lable" for="">Số điện thoại</label> <input
                                    value="<?php echo $profile['phone'] ?>" name="phone" type="text">
                            </div>

                            <input value="SAVE" class="btn btn-danger " name="save" type="submit">

                        </div>
                        <div id="avatar">
                            <!-- <img width='130' src='/assets//img//portfolio//avatardefault_92824.webp' alt=''> -->

                            <?php echo empty($profile['user_img']) ? "<img id='img' width='130' src='/assets//img//portfolio//avatardefault_92824.webp' alt=''>" : "<img id='img' height='150' width='130' src='/uploads//$profile[user_img]' alt=''>"; ?>
                            <input name="avtUser" hidden id="file" type="file">
                            <label class="border p-2 px-3" for="file">Chọn ảnh</label>



                        </div>
                        <?php }?>
                    </div>



                </form>


            </section>
        </div>





    </div>


    <!-- Clients-->
    <?php include './include/clients.php'?>






    <?php include './include/footer.php'?>