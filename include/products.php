 <!-- Products-->

 <section class="page-section bg-light" id="portfolio">
     <div class="container">
         <div class="text-center">
             <h2 class="section-heading text-uppercase"></h2>

         </div>

         <?php showProducts()?>


         <div class="row">
             <?php foreach ($dataProducts as $prod) {?>
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

             <?php }?>

         </div>
     </div>
     <div id="paging" class=" mt-5">

         <?php for ($i = 1; $i <= $countPage; $i++) {?>
         <li class="pageation"><a href="index.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
         <?php }?>

     </div>

 </section>