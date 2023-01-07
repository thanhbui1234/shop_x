<?php include './include/admin_header.php'?>

<?php include './include/admin_function.php'?>


<?php addCategories()?>

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
                        <table class=" table   table-bordered ">
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
                                    <td><a class="text-success" href="">Update</a>
                                        <a class="text-danger " href="">Delete</a>
                                    </td>

                                </tr>
                                <?php }?>
                            </tbody>

                        </table>
                    </div>

                </div>




                <?php include './include/admin_footer.php'?>