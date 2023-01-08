<?php include './include/admin_header.php'?>

<?php include './include/admin_function.php'?>

<?php updateCategory()?>
<?php addCategories()?>
<?php deleteCategory()?>

<body id="page-top" class="">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include './include/admin_sidebar.php'?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="">
            <!-- Main Content -->
            <div id="content" class="">
                <!-- Topbar -->
                <?php include './include/admin_nav.php'?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div id="big_cat">
                    <div class="cat_child">
                        <form action="#" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1"></label>
                                <input type="text" class="form-control" name="category" aria-describedby="emailHelp"
                                    placeholder="">

                                <h3 id="errCat">
                                    <?php echo isset($errCategory['category']) ? $errCategory['category'] : ''; ?>
                                </h3>
                            </div>

                            <button type="submit" name="submit" id="add_category" class="btn btn-primary">Them loai san
                                pham</button>
                        </form>
                    </div>

                    <div class="cat_child_2">
                        <table class="  table  table-bordered ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Chức năng</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php showCategories()?>

                                <?php foreach ($dataCategories as $category) {?>
                                <tr>
                                    <td><?php echo $category['id_cat'] ?></td>
                                    <td><?php echo $category['name_cat'] ?></td>
                                    <td><a class=" btn btn-success"
                                            href="/admin/cat_product.php?updateCat=<?php echo $category['id_cat'] ?>">Update</a>
                                        <a class=" btn btn-danger "
                                            href="/admin/cat_product.php?deleteCat=<?php echo $category['id_cat'] ?>">Delete</a>
                                    </td>

                                </tr>
                                <?php }?>
                            </tbody>

                        </table>
                    </div>

                </div>



                <?php if (isset($_GET['updateCat'])) {?>
                <?php showCatDelete()?>

                <div class="cat_child_update">
                    <form action="#" method="post">
                        <div class="form-group">
                            <?php foreach ($dataShowcatDelete as $value) {?>

                            <label for="exampleInputEmail1"></label>
                            <input type="text" value="<?php echo $value['name_cat'] ?>" class="form-control"
                                name="categoryUpdate" aria-describedby="emailHelp" placeholder="">

                        </div>
                        <button type="submit" name="update" id="add_category" class="btn btn-primary">Sửa loại sản
                            phẩm
                        </button>
                        <?php }?>
                        <button type="submit" name="cancel" id="add_category" class="btn btn-danger">Hủy
                        </button>
                    </form>
                </div>
                <?php } else {
    echo "";
}?>




                <?php include './include/admin_footer.php'?>