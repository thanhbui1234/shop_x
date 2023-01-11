    <div class="page-section  " id="categories_nav">
        <div class="container bg-bg-light">
            <h3 class="mb-5">Danh mục</h3>
            <?php showCategoriesHome()?>


            <ul id="categories" class="d-flex flex-row flex-wrap  ">

                <?php foreach ($dataCategoriesHome as $category) {?>
                <li class="flex-item"> <a
                        href="cat.php?id=<?php echo $category['id_cat'] ?>"><?php echo $category['name_cat'] ?>
                    </a></li>
                <?php }?>
            </ul>
        </div>


    </div>