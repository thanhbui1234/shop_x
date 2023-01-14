

3


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







    <?php include './include/footer.php'?>