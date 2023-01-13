    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase"></h2>

            </div>

            <?php search()?>


            <div class="row">

                <?php if (empty($dataSearch)) {?>


                <h2 class="text-center text-danger">Không có thông tin mà bạn cần tìm <i class="fa-solid fa-bomb"></i>
                </h2>

                <?php } else {?>

                <?php foreach ($dataSearch as $prod) {?>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" href="about_product.php?id=<?php echo $prod['id'] ?>">

                            <img class="img-fluid" src="../uploads//<?php echo $prod['prod_img'] ?>"
                                alt="<?php echo $prod['prod_name'] ?>" />
                        </a>
                        <div class="portfolio-caption">

                            <a class="text-decoration-none" href="about_product.php?id=<?php echo $prod['id'] ?>">
                                <div class="portfolio-caption-heading"><?php echo $prod['prod_name'] ?>
                                </div>
                            </a>
                            <div class="portfolio-caption-subheading text-muted">
                                <?php echo $prod['prod_price'] ?> VND
                            </div>
                        </div>
                    </div>
                </div>

                <?php }}?>

            </div>
        </div>
    </section>