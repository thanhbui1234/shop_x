<?php include './include/admin_header.php'?>

<?php include './include/admin_function.php'?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include './include/admin_sidebar.php'?>

        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include './include/admin_nav.php'?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <?php countAll()?>
                <?php include './include/admin_dasbord.php'?>

                <!-- End of Main Content -->



                <?php include './include/admin_footer.php'?>