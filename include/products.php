 <!-- Products-->


 <section class="page-section bg-light" id="portfolio">
     <div class="container">
         <div class="text-center">
             <h2 class="section-heading text-uppercase"></h2>
             <h3 class="section-subheading text-muted">
                 Lorem ipsum dolor sit amet consectetur.
             </h3>
         </div>

         <?php showProducts()?>


         <div class="row">
             <?php foreach ($dataProducts as $prod) {?>
             <div class="col-lg-4 col-sm-6 mb-4">
                 <!-- Portfolio item 1-->
                 <div class="portfolio-item">
                     <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                         <div class="portfolio-hover">
                             <div class="portfolio-hover-content">
                                 <i class="fas fa-plus fa-3x"></i>
                             </div>
                         </div>
                         <img class="img-fluid" src="assets/img/portfolio/111.jpg" alt="..." />
                     </a>
                     <div class="portfolio-caption">
                         <div class="portfolio-caption-heading"><?php echo $prod['prod_name'] ?>
                         </div>
                         <div class="portfolio-caption-subheading text-muted">
                             <?php echo $prod['prod_price'] ?> VND

                         </div>
                     </div>
                 </div>
             </div>

             <?php }?>

         </div>
     </div>
 </section>




 <?php foreach ($dataProducts as $prod) {?>
 <!-- Portfolio item 1 modal popup-->
 <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog">
         <div class="modal-content">
             <div class="close-modal" data-bs-dismiss="modal">
                 <img src="assets/img/close-icon.svg" alt="Close modal" />
             </div>
             <div class="container">
                 <div class="row justify-content-center">
                     <div class="col-lg-8">
                         <div class="modal-body">
                             <!-- Project details-->
                             <h2 class="text-uppercase"><?php echo $prod['prod_name'] ?>
                             </h2>
                             <p class="item-intro text-muted">
                                 <?php echo $prod['prod_price'] ?> VND

                             </p>
                             <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/11.jpg" alt="..." />
                             <p>
                                 <?php echo $prod['prod_content'] ?>

                             </p>
                             <ul class="list-inline">
                                 <li>
                                     <strong>Client:</strong>
                                     Threads
                                 </li>
                                 <li>
                                     <strong>Category:</strong>
                                     Illustration
                                 </li>
                             </ul>
                             <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal"
                                 type="button">
                                 <i class="fas fa-xmark me-1"></i>
                                 Close
                             </button>
                         </div>
                     </div>
                 </div>
                </div>
            </div>
        </div>
    </div>
    <?php }?>
