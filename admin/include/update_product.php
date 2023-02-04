<?php updateProduct()?>
<form class="container" enctype="multipart/form-data" method="POST">

    <?php showUpdateProduct()?>

    <?php foreach ($dataShowUpdateProd as $product) {?>



    <div class="form-group">
        <label for="exampleInputEmail1">Tên sản phẩm</label>
        <input type="text" name="prod_name" value="<?php echo $product['prod_name'] ?>" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>



    <br>
    <div class="form-group">
        <select name="prod_category" id="select" class="form-select" aria-label="Default select example">

            <?php showNameCate($product['prod_cat'])?>
            <?php foreach ($dataNameCat as $cate) {}?>


            <option value="<?php echo $cate['name_cat'] ?>"> <?php echo $cate['name_cat'] ?></option>

            <?php selectshowUpdateProduct($cate['name_cat'])?>

            <?php foreach ($dataShowSelect as $select) {?>
            <option value="<?php echo $select['name_cat'] ?>"><?php echo $select['name_cat'] ?>
            </option>
            <?php }?>

        </select>


    </div>

    <br>
    <div class="form-group">
        <label for="exampleInputPassword1">Giá</label>
        <input value="<?php echo $product['prod_price'] ?>" name="prod_price" type="text" class="form-control"
            id="exampleInputPassword1">
    </div>
    <br>

    <div class="form-group">
        <label for="exampleInputPassword1">Hình ảnh</label> <br>
        <input name="prod_img" type="file" id="exampleInputPassword1">
        <img width="150" src="/uploads//<?php echo $product['prod_img'] ?>" alt="">
    </div>
    <br>

    <div class="form-group">
        <label for="exampleInputPassword1">Trạng thái</label> <br>
        <select name="prod_status" id="selectStatus" class="form-select" aria-label="Default select example">
            <option value="<?php echo $product['prod_status'] ?>">
                <?php echo $product['prod_status'] ?>
            </option>

            <?php echo $product['prod_status'] == 'public' ? "<option value='private' > private </option> " : "<option value='public' > public </option>"; ?>


        </select>
    </div>
    <br>


    <div class="form-group">
        <label for="exampleInputPassword1">Giảm giá</label>
        <input name="prod_sale" type="number" min="0" max="100" step="10" value="<?php echo $product['prod_sale'] ?>"
            class="form-control" id="exampleInputPassword1">
        <span id="percent">%</span>

    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Tag sản phẩm ( tìm kiếm )</label>
        <input type="text" value="<?php echo $product['prod_tag'] ?>" name="prod_tag" class="form-control"
            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
    </div>
    <br>



    <div class="form-group">
        <label for="exampleInputPassword1">Nội Dung</label>
        <textarea class="form-control" name="prod_content" id="" cols="30" rows="10"><?php echo $product['prod_content'] ?>
</textarea>

    </div>
    <br>
    <?php }?>





    <br> <button type="submit" name="updateProd" class="btn btn-primary">Thêm sản phẩm</button>
</form>