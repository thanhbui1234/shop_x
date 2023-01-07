<?php

include '/xampp/htdocs/shop_x/include/database.php';

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

    }

}