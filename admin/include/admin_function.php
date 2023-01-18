<?php

include '/xampp/htdocs/shop_x/include/database.php';

// category
function showProducts()
{
    global $conn;
    // select sản phẩm mới nhất
    $sql = "SELECT * FROM prod order by id  desc ";
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

function showNameCat($value)
{
    if (isset($value)) {
        global $conn;
        $sql = " select name_cat from prod_categories where id_cat = $value";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataNameCat;
        $dataNameCat = $statement->fetchAll();

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
function showUpdateProduct()
{
    if (isset($_GET['id'])) {
        global $conn;
        $id = $_GET['id'];
        $sql = "SELECT * FROM prod where id = $id";
        $statement = $conn->prepare($sql);
        global $dataShowUpdateProd;
        $statement->execute();
        $dataShowUpdateProd = $statement->fetchAll();
    }

}

function selectshowUpdateProduct($value)
{
    global $conn;
    $sql = "SELECT name_cat FROM prod_categories where name_cat != '$value' ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataShowSelect;
    $dataShowSelect = $statement->fetchAll();
}

function updateProduct()
{
    if (isset($_POST['updateProd'])) {

        $id = $_GET['id'];

        global $conn;
        $prod_name = $_POST['prod_name'];
        $prod_category = $_POST['prod_category'];
        $prod_tag = $_POST['prod_tag'];
// convert string to number
        $prod_price = $_POST['prod_price'];
        $prod_status = $_POST['prod_status'];
        // nếu user k nhập ảnh mà muốn sử dụng ảnh cũ
        $prod_img = $_FILES['prod_img']['name'];
        if (empty($prod_img)) {
            $sqlimg = "select prod_img from prod where id = $id";
            $statementimg = $conn->prepare($sqlimg);
            $statementimg->execute();
            $dataImg = $statementimg->fetchAll();
            foreach ($dataImg as $img) {
                $prod_img = $img['prod_img'];
            }

        }

        $prod_image_tmp = $_FILES['prod_img']['tmp_name'];
        $targe_dir = '../uploads//';
        $target_file = $targe_dir . $prod_img;
        move_uploaded_file($prod_image_tmp, $target_file);
        $prod_sale = $_POST['prod_sale'];
        $prod_content = $_POST['prod_content'];

        $sql = " update prod set prod_name = '$prod_name' , prod_cat = '$prod_category'  ,prod_tag = '$prod_tag'  ";
        $sql .= ", prod_price = '$prod_price', prod_status = '$prod_status ' , prod_img = '$prod_img' , prod_sale  = '$prod_sale' , prod_content = '$prod_content' ";
        $sql .= " where id = $id";
        $statement = $conn->prepare($sql);

        if ($statement->execute()) {
            echo "<script> Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Bạn đã cập nhật thành công',
  showConfirmButton: false,
  timer: 1500
}) </script>";

        }

    }

}

function deleteProduct()
{

    if (isset($_GET['product'])) {
        global $conn;

        $id = $_GET['id'];
        $sql = " DELETE FROM  prod WHERE id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
    }
}

function apply()
{

    if (isset($_POST['apply'])) {
        global $conn;

        if (!empty($_POST['checkBoxArr'])) {

            $checkBoxall = $_POST['checkBoxArr'];

            foreach ($checkBoxall as $checkBox) {

                $option = $_POST['option'];

                switch ($option) {
                    case "public";

                        $sql = " update prod set prod_status = 'public' where id = $checkBox";
                        $statement = $conn->prepare($sql);
                        $statement->execute();

                        break;

                    case "private";

                        $sql = " update prod set prod_status = 'private' where id = $checkBox";
                        $statement = $conn->prepare($sql);
                        $statement->execute();

                        break;

                    case "delete";
                        $sql = " delete from prod where id = $checkBox";
                        $statement = $conn->prepare($sql);
                        $statement->execute();

                        break;

                    case 'clone';

                        $sqlSelect = "select * from prod where id = $checkBox";
                        $statementSelect = $conn->prepare($sqlSelect);
                        $statementSelect->execute();

                        $dataClone = $statementSelect->fetchAll();

                        foreach ($dataClone as $clone) {

                            $sql = "insert into prod ( prod_name  , prod_cat , prod_price , prod_img ,  prod_tag ,  prod_content,   prod_status , prod_sale )";
                            $sql .= " values ('$clone[prod_name]' , '$clone[prod_cat]', '$clone[prod_price]' , ";
                            $sql .= " '$clone[prod_img]' , '$clone[prod_tag]' , '$clone[prod_content]' , '$clone[prod_status]' , '$clone[prod_sale]' )  ";
                            $statement = $conn->prepare($sql);
                            $statement->execute();

                        }

                        break;

                    case "";

                        echo " bạn phải chọn chức năng";
                        break;

                }

            }
        }

    }}

function showUsers()
{

    global $conn;
    $sql = "SELECT * FROM user where user_role =1 or user_role = 2";

    $statement = $conn->prepare($sql);
    $statement->execute();
    global $users;
    $users = $statement->fetchAll();
}

function normalUsers()
{

    global $conn;
    if (isset($_GET['normalUser'])) {
        $id = $_GET['normalUser'];
        $sql = " update user set user_role = '1' where user_id = $id";
        $statement = $conn->prepare($sql);

        if ($statement->execute()) {
            header('location : ./user.php ');
        }

    }
}

function adminUsers()
{

    global $conn;
    if (isset($_GET['adminUser'])) {
        $id = $_GET['adminUser'];
        $sql = " update user set user_role = '2' where user_id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();

    }
}

function deleteUsers()
{

    if (isset($_GET['deleteUser'])) {
        global $conn;

        $id = $_GET['deleteUser'];

        $sql = "DELETE FROM user WHERE user_id = $id";
        $statement = $conn->prepare($sql);
        $statement->execute();
        header("location: ./user.php");

    }
}

function request()
{

    global $conn;
    $sql = "select * from requests_admin ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataRequests;
    $dataRequests = $statement->fetchAll();

}

function accept()
{

    if (isset($_GET['accept'])) {
        global $conn;
        $id_user = $_GET['accept'];
        $id = $_GET['id'];
        $sql = "update user set  user_role = 2  where user_id  = $id_user ";
        $statement = $conn->prepare($sql);
        $statement->execute();

        $sqlDelete = "delete from requests_admin where id = $id";
        $delete = $conn->prepare($sqlDelete);
        if ($delete->execute()) {
            header('location: /admin/user.php?user=request');
        }

    }
}

function deleteRequest()
{
    if (isset($_GET['cancel'])) {
        global $conn;
        $id = $_GET['cancel'];
        $sqlDelete = "delete from requests_admin where id = $id";
        $delete = $conn->prepare($sqlDelete);
        if ($delete->execute()) {

            header('location: /admin/user.php?user=request');
        }
        ;

    }

}