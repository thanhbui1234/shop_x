<?php
include './include/database.php';

function showProducts()
{
    global $conn;
    $sql = " SELECT * FROM prod where prod_status = 'public' ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataProducts;
    $dataProducts = $statement->fetchAll();
    $page = count($dataProducts);

    // mỗi trang sẽ show 9 sản phẩm
    $eachPage = 9;

    echo $countPage = ceil($page / $eachPage);

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
        unset($conn);

    }
}

function register()
{
    if (isset($_POST['register'])) {
        global $conn;

        $fullName = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        $userName = htmlspecialchars($_POST['userName']);
        $password = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);

        global $errUser;

        $errUser = [];

        if (empty($fullName)) {

            $errUser['fullName'] = 'Bạn phải nhập họ tên';
        }
        if (empty($email)) {

            $errUser['email'] = 'Bạn phải nhập  email';
        }
        if (empty($phone)) {

            $errUser['phone'] = 'Bạn phải nhập  số điện thoại';
        }

        if (!preg_match('/^[0-9]{10}+$/', $phone)) {
            $errUser['phonetext'] = 'Bạn phải nhập đúng ';

        }

        if (empty($userName)) {

            $errUser['userName'] = 'Bạn phải nhập  tên đăng nhập';
        }
        if (empty($password)) {

            $errUser['password'] = 'Bạn phải nhập  mật khẩu';
        }
        if (empty($password2)) {

            $errUser['password2'] = 'Bạn phải nhập lại mật khẩu';
        }

        if ($password2 !== $password) {

            $errUser['errpass'] = ' Bạn phải nhập đúng mật khẩu';
        }

        if (empty($errUser)) {
            $arr = ['cost' => 12];
            echo $phone;
            $password = password_hash($password, PASSWORD_BCRYPT, $arr);

            // $sql = " insert into prod  () "

        }

    }
}
function search()
{

    if (isset($_POST['search_submit'])) {
        global $conn;
        $search = $_POST['search'];

        if (strlen($search) < 2 || ($search == " ,")) {
            header('location: index.php');
        }

        $sql = "SELECT * FROM prod where prod_tag like '%$search%' and  prod_tag not like ' ,'  ";
        $statement = $conn->query($sql);
        $statement->execute();
        global $dataSearch;
        $dataSearch = $statement->fetchAll();

    }

}