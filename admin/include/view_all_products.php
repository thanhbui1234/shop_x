<?php deleteProduct()?>
<?php apply()?>

<form action="#" method="post">
    <div class="d-flex flex-row gap-2">
        <select name="option" class="form-select form-select-sm form-control w-25 mb-4" id="selectAllprod"
            aria-label="Default select example">
            <option selected>Chức năng</option>
            <option value="public">Public</option>
            <option value="private">Private</option>
            <option value="clone">Tạo bản sao</option>
            <option value="delete">Xóa</option>

        </select>

        <button id="apply_prod" type="submit" name="apply" class="btn btn-google "> Apply </button>


    </div>
    <table class="table   table-condensed table-bordered  ">
        <thead class="">
            <tr>
                <th> <input id="selectAllBoxes" type="checkbox"></th>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Loại sản phẩm</th>
                <th>Gía</th>
                <th>Hỉnh ảnh</th>
                <th>Nội Dung</th>
                <th>Trạng thái</th>
                <th>Giảm giá </th>
                <th>Action </th>

            </tr>

        </thead>
        <tbody>
            <?php showProducts()?>
            <?php foreach ($dataShowProducts as $product) {?>
            <tr>
                <td><input class="selectAllBoxesChild" name="checkBoxArr[]" value="<?php echo $product['id'] ?>"
                        type="checkbox"> </td>
                <td> <?php echo $product['id'] ?></td>
                <td> <?php echo $product['prod_name'] ?></td>
                <td> <?php echo $product['prod_cat'] ?></td>
                <td> <?php echo $product['prod_price'] ?></td>
                <td><img width="90" src="/uploads//<?php echo $product['prod_img'] ?>" alt=""></td>

                <td class="content"> <?php echo substr($product['prod_content'], 0, 30) . '.......' ?></td>
                <td> <?php echo $product['prod_status'] ?></td>
                <td> <?php echo $product['prod_sale'] ?></td>
                <td class="action_prod"> <a class="btn btn-success"
                        href="?product=update_product&id=<?php echo $product['id'] ?>">UPDATE</a>
                    <a class="btn btn-danger" href="?product=deleteProd&id=<?php echo $product['id'] ?>">DELETE</a>
                </td>






            </tr>
            <?php }?>

        </tbody>

    </table>
</form>