<?php

include '/xampp/htdocs/shop_x/include/database.php';

// category
function showProducts()
{
    global $conn;
    $sql = "SELECT * FROM prod ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataShowProducts;
    $dataShowProducts = $statement->fetchAll();
}

function showCategories()
{

    global $conn;
    $sql = " select * from prod_categories ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataCategories;
    $dataCategories = $statement->fetchAll();

}
function addCategories()
{
    global $conn;

    if (isset($_POST['submit'])) {

        $category = $_POST['category'];

        global $errCategory;
        $errCategory = [];

        if (empty($category)) {
            $errCategory['category'] = 'Bạn không được bỏ trống !!';

        }

        if (empty($errCategory)) {
            $sql = "Insert into prod_categories (name_cat) values ('$category') ";
            $statement = $conn->prepare($sql);
            $statement->execute();

        }
    }

}
function deleteCategory()
{
    global $conn;

    if (isset($_GET['deleteCat'])) {

        $id = $_GET['deleteCat'];
        $sql = "DELETE FROM prod_categories where id_cat = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();

    }

}

function showCatDelete()
{
    global $conn;

    if (isset($_GET['updateCat'])) {

        $id = $_GET['updateCat'];
        $sql = "SELECT * from prod_categories where id_cat = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataShowcatDelete;
        $dataShowcatDelete = $statement->fetchAll();

    }

}

function updateCategory()
{
    if (isset($_POST['update'])) {
        global $conn;
        $name = $_POST['categoryUpdate'];
        $id = $_GET['updateCat'];
        $sql = "UPDATE prod_categories set name_cat = '$name' where id_cat = $id";
        $statement = $conn->prepare($sql);
        if ($statement->execute()) {
            header('location: /admin/cat_product.php ');

        }

    }

    if (isset($_POST['cancel'])) {
        header('location: /admin/cat_product.php ');

    }

}

/// product

function addProduct()
{
    if (isset($_POST['addProd'])) {
        global $conn;
        $prod_name = $_POST['prod_name'];
        $prod_category = $_POST['prod_category'];
        $prod_tag = $_POST['prod_tag'];

        // convert string to number
        $prod_price = $_POST['prod_price'];

        $prod_status = $_POST['prod_status'];
        $prod_img = $_FILES['prod_img']['name'];
        $prod_image_tmp = $_FILES['prod_img']['tmp_name'];
        $targe_dir = '../uploads//';
        $target_file = $targe_dir . $prod_img;
        move_uploaded_file($prod_image_tmp, $target_file);
        $prod_sale = $_POST['prod_sale'];
        $prod_content = $_POST['prod_content'];
        $name = $_POST['prod_name'];
        global $errProduct;
        $errProduct = [];

        if (empty($prod_name)) {
            $errProduct['prod_name'] = 'Bạn  phải nhập tên sản phẩm';
        }
        if ($prod_category == 'default') {
            $errProduct['prod_category'] = 'Bạn  phải chọn loại sản phẩm';
        }
        if (empty($prod_price) && is_numeric($prod_price)) {
            $errProduct['prod_price'] = 'Bạn  phải nhập đúng';
        }

        if (empty($prod_img)) {
            $errProduct['prod_img'] = 'Bạn  phải nhập hình ảnh sản phẩm';
        }

        if (empty($prod_tag)) {
            $errProduct['prod_tag'] = 'Bạn  phải nhập  tag sản phẩm';
        }

        if (empty($prod_status)) {
            $errProduct['prod_status'] = 'Bạn  phải nhập trạng thái sản phẩm';
        }
        if (empty($prod_content)) {
            $errProduct['prod_content'] = 'Bạn  phải nhập nội dung sản phẩm';
        }

        if (empty($errProduct)) {
            $sql = "insert into prod ( prod_name  , prod_cat , prod_price , prod_img ,  prod_tag ,  prod_content,   prod_status , prod_sale )";
            $sql .= " values ('$prod_name' , '$prod_category', '$prod_price', '$prod_img', '$prod_tag', '$prod_content', '$prod_status', '$prod_sale') ";
            $statement = $conn->prepare($sql);
            $statement->execute();

        }

    }

}