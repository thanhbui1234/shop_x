<table class="table table-bordered shadow  bg-body rounded  container ">

    <?php duyet()?>
    <?php deleteCmt()?>


    <thead>
        <tr>
            <th><input type="checkbox"></th>
            <th>ID</th>
            <th> Sản phảm</th>
            <th>ID Người dùng</th>
            <th>Nội Dung</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th>Duyệt</th>
            <th>Chức năng</th>
        </tr>

    </thead>

    <tbody>
        <?php showCmts()?>
        <?php foreach ($dataCmts as $cmt) {?>
        <tr>

            <td><input type="checkbox"></td>
            <td><?php echo $cmt['id'] ?></td>


            <!-- link name product cmt -->
            <?php linkProduct($cmt['cmt_prod_id'])?>
            <?php foreach ($dataLinkProd as $nameprod) {?>
            <td><a
                    href="/about_product.php?id=<?php echo $cmt['cmt_prod_id'] ?>"><?php echo $nameprod['prod_name'] ?></a>
            </td>
            <?php }?>
            <td><?php echo $cmt['id_user'] ?></td>
            <td><?php echo $cmt['cmt_content'] ?></td>
            <td><img width="50" src="/uploads//11.jpg" alt=""></td>
            <td>
                <?php echo $cmt['DUYET'] == 0 ?
    '<span class="text-danger">  <i  class="fa-regular  fa-circle-xmark"></i> Chưa duyệt </span>' :
    " <span class='text-success' > <i  class='fa-solid fa-check text'></i> Đã duyệt </span>" ?>

            </td>
            <td><a class="btn btn-facebook" href="commnets.php?duyet=<?php echo $cmt['id'] ?>">Phê duyệt</a></td>
            <td>
                <a class="btn btn-danger" href="commnets.php?deleteCmt=<?php echo $cmt['id'] ?>">Xóa</a>
            </td>

        </tr>
        <?php }?>

    </tbody>
</table>