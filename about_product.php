<?php
include './include/header.php'
?>
<?php include "./include/functions.php"?>

<body id="page-top">
    <!-- Navigation-->
    <?php include './include/nav.php'?>


    <div class="bg-bg-light container" id="product">
        <?php showProductsOnly()?>
        <?php foreach ($dataProductsOnly as $product) {?>

        <div>
            <img width="400" src="/uploads///<?php echo $product['prod_img'] ?>" alt="">
        </div>
        <div>

            <h1 class=""> <?php echo $product['prod_name'] ?> </h1><br>
            <h2 class="text-danger">Giá <?php echo $product['prod_price'] ?>đ
            </h2>

            <p class="mt-4"><?php echo $product['prod_content'] ?></p>

            <div class="buy">
                <h5>
                    <i class="fa-solid fa-cart-shopping"></i> Thêm vào giỏ hàng
                </h5>
                <button>Mua ngay</button>

            </div>

        </div>


        <?php }?>
    </div>



    <div id="commnets" class="bg-bg-light container">
        <?php if (isset($_SESSION['userId'])) {?>
        <section>
            <div class="form-floating shadow  bg-body rounded ">
                <textarea class="form-control" placeholder="Leave a comment here" id="textcmt"></textarea>
                <label for="floatingTextarea">Comments</label>
            </div>


            <div class="d-flex flex-row justify-content-between mt-3">
                <div>
                    <input hidden id="imgCmt" type="file">
                    <label class="btn btn-primary" for="imgCmt">Thêm ảnh</label>
                </div>

                <button name="sendCmt" type="submit" class="btn btn-success">Gửi</button>


            </div>
        </section>
        <?php } else {?>

        <a href="">Đăng nhập để bình luận</a>

        <?php }?>



    </div>


    <section id="cmtUsers" class="">

        <hr>

        <img width="50" src="/uploads//11.jpg" alt=""> <span>Bui Chi Thanh</span>

        <p>2023-01-09 14:56 </p>

        <p>Angelababy xác nhận yêu đương với bạn trai cũ Đàm Tùng Vận: Đẹp đôi đấy nhưng có gì đó sai sai
            Anh Tú</p>


        <img width="35" src="/uploads//111.jpg" alt="">

        <hr>



    </section>


    <?php include './include/footer.php'?>