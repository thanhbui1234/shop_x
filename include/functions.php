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