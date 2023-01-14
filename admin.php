<?php
include './include/header.php'
?>
<?php include "./include/functions.php"?>

<body id="page-top">
    <!-- Navigation-->
    <?php include './include/nav.php'?>



    <div class="container">

        <?php echo $_SESSION['userId'] ?>
        <form action="" method="post">
            <div class="row align-items-stretch mb-5">
                <label for="">Bạn cần thêm một vài thông tin trước khi trở thành một admin</label>

                <div class="form-group">
                    <input name="name" class="form-control " id="name" type="text" placeholder="Họ và tên *"
                        data-sb-validations="required" />

                    <h4 class='err_user'><?php echo isset($errUser['fullName']) ? $errUser['fullName'] : ''; ?>
                    </h4>

                </div>


                <div class="form-group">
                    <input name="name" class="form-control " id="name" type="text"
                        placeholder="Lý do bạn muốn trở thành admin *" data-sb-validations="required" />

                    <h4 class='err_user'><?php echo isset($errUser['fullName']) ? $errUser['fullName'] : ''; ?>
                    </h4>

                </div>

            </div>



        </form>

    </div>


    <!-- Clients-->
    <?php include './include/clients.php'?>


    <!-- Contact-->
    <?php include './include/contact.php'?>




    <?php include './include/footer.php'?>