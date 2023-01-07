<table class="table  table-condensed table-bordered">
    <thead class="">
        <tr>
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
            <td> <?php echo $product['id'] ?></td>
            <td> <?php echo $product['prod_name'] ?></td>
            <td> <?php echo $product['prod_cat'] ?></td>
            <td> <?php echo $product['prod_price'] ?></td>
            <td> <?php echo $product['prod_img'] ?></td>
            <td> <?php echo $product['prod_content'] ?></td>
            <td> <?php echo $product['prod_status'] ?></td>
            <td> <?php echo $product['prod_sale'] ?></td>
            <td> <a class="btn btn-success" href="">UPDATE</a>
                <a class="btn btn-danger" href="">DELETE</a>
            </td>





        </tr>
        <?php }?>

    </tbody>

</table>