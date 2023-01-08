<?php
include './include/database.php';

function showProducts()
{
    global $conn;
    $sql = " SELECT * FROM prod ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataProducts;
    $dataProducts = $statement->fetchAll();
}
function showProductsOnly()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        global $conn;
        $sql = " SELECT * FROM prod where id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataProductsOnly;
        $dataProductsOnly = $statement->fetchAll();

    }
}