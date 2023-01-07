<?php include './include/admin_header.php'?>


<?php include './include/admin_function.php'?>


<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include './include/admin_sidebar.php'?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include './include/admin_nav.php'?>




                <?php

(isset($_GET['product'])) ? $product = $_GET['product'] : $product = false;
switch ($product) {

    case 'addProd':
        include './include/add_product.php';

        break;

    default:
        include './include/view_all_products.php';
        break;

}

?>


                <?php include './include/admin_footer.php'?>