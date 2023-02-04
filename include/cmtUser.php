<div class="bg-bg-light container" id="product">

    <?php showProductsOnly()?>
    <?php foreach ($dataProductsOnly as $product) {?>

    <?php showCmts($product['id'])?>


    <div>
        <img width="400" src="/uploads///<?php echo $product['prod_img'] ?>" alt="">
    </div>
    <div>

        <h1 class=""> <?php echo $product['prod_name'] ?> </h1><br>

        <?php echo !empty($product['prod_price_old']) ? "<h2> Giá cũ $product[prod_price_old] </h2>" : ''; ?>

        <h2 class="text-danger">Giá <?php echo $product['prod_price'] ?>đ <span id="sale">Sale
                <?php echo $product['prod_sale'] ?> %</span>
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


<?php sendCmt()?>

<div id="commnets" class="bg-bg-light container">
    <?php if (isset($_SESSION['userId'])) {?>
    <section>

        <form id="myForm" action="#" method="post" enctype="multipart/form-data">
            <div class="form-floating shadow  bg-body rounded ">
                <textarea name="textcmt" class="form-control" placeholder="Leave a comment here"
                    id="textcmt"></textarea>
                <label for="floatingTextarea">Comments</label>

            </div>


            <div class="d-flex flex-row justify-content-between mt-3">
                <div>
                    <input name="imgCmt" hidden id="imgCmt" type="file">
                    <label class="btn btn-primary" for="imgCmt">Thêm ảnh</label>
                </div>

                <button name="sendCmt" type="submit" class="btn btn-success">Gửi</button>


            </div>
        </form>

        <script>
        const form = document.querySelector('#myForm');
        form.addEventListener('submit', function(e) {


            const textcmt = document.querySelector('#textcmt');
            if (textcmt.value.length < 5) {
                e.preventDefault();
                return Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',


                });
            }


        });
        </script>

    </section>
    <?php } else {?>

    <p>
        <a class="text-black" href="">Đăng nhập </a> hoac
        <a href="">Dang ky</a>
        de binh luan
    </p>
    <?php }?>



</div>


<section id="cmtUsers" class="">
    <?php foreach ($dataShowCmts as $cmt) {?>
    <hr>

    <?php cmtAvt($cmt['id_user'])?>

    <?php foreach ($cmtAvt as $avt) {?>

    <img class="rounded-circle" width="50" src="/uploads//<?php echo $avt['user_img'] ?>" alt="">



    <span class="pl-1"><?php echo $avt['user_name'] ?></span>
    <?php }?>

    <p><?php echo $cmt['cmt_time'] ?> </p>

    <p><?php echo $cmt['cmt_content'] ?></p>


    <img width="35" src="/uploads//<?php echo $cmt['img'] ?>" alt="">

    <?php }?>

</section>