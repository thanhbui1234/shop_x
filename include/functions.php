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

function showCategoriesHome()
{

    global $conn;
    $sql = " select * from prod_categories ";
    $statement = $conn->prepare($sql);
    $statement->execute();
    global $dataCategoriesHome;
    $dataCategoriesHome = $statement->fetchAll();

}

function linkCategories()
{

    if (isset($_GET['id'])) {
        global $conn;

        $id = $_GET['id'];

        $sql = " select * from prod where prod_cat = $id ";
        $statement = $conn->prepare($sql);
        $statement->execute();
        global $dataLinkCat;
        $dataLinkCat = $statement->fetchAll();

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

        if (empty($userName)) {

            $errUser['userName'] = 'Bạn phải nhập  tên đăng nhập';
        }

        //  can gioi han mat khau

        if (empty($password)) {

            $errUser['password'] = 'Bạn phải nhập  mật khẩu';
        }

        if (empty($password2)) {

            $errUser['password2'] = 'Bạn phải nhập lại mật khẩu';
        } else if ($password2 !== $password) {

            $errUser['errpass'] = ' Bạn phải nhập đúng mật khẩu';
        }

        try {
            if (empty($phone)) {
                $errUser['phone'] = 'Bạn phải nhập  số điện thoại';

            } else if (!preg_match('/^[0-9]/', $phone)) {
                $errUser['phonetext'] = 'Bạn phải nhập đúng ';

            } else if (strlen($phone) <= 9) {
                $errUser['phoneCount'] = "Sdt có vấn đề !!";
            }

        } catch (Exception $e) {
            echo ': ' . $e->getMessage();

        }

        try {
            if (empty($password2)) {
                $errUser['password2'] = 'Bạn phải nhập lại mật khẩu';

            } else if ($password2 !== $password) {
                $errUser['errpass'] = ' Bạn phải nhập đúng mật khẩu';

            }

        } catch (Exception $e) {
            echo ': ' . $e->getMessage();

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