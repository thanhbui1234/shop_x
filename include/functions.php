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
        $dateRegister = date("Y-m-d H:i a ");

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

        try {
            if (empty($password)) {

                $errUser['password'] = 'Bạn phải nhập  mật khẩu';

            } else if (strlen($password) <= 5) {
                $errUser['passwordLength'] = 'Mật khẩu phải dài hơn 5 ký tự ';

            }
        } catch (\Throwable$th) {
            //throw $th;
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
            $phone;
            $password = password_hash($password, PASSWORD_BCRYPT, $arr);

            $sql = " insert into user (user_fullName , user_email ,user_name ,user_password ,phone ,date_register ) ";
            $sql .= " values ( '$fullName','$email','$userName','$password','$phone', '$dateRegister' ) ";
            $statement = $conn->prepare($sql);

            if ($statement->execute()) {
                echo "<script>Swal.fire(
  'Good job!',
  'You clicked the button!',
  'success'
)</script>";
            }

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
function login()
{
    if (isset($_POST['login'])) {

        global $conn;

        $userName = htmlspecialchars($_POST['userName']);
        $password = htmlspecialchars($_POST['password']);
        global $errLogin;
        $errLogin = [];

        if (empty($userName)) {
            return $errLogin['userName'] = 'Bạn phải nhập tài khoản đăng nhập';

        }

        if (empty($password)) {
            $errLogin['password'] = 'Bạn phải nhập mật khẩu';

        }

        $sql = "select * from user where user_name = '$userName' ";
        $statement = $conn->prepare($sql);
        $statement->execute();

        $dataLogin = $statement->fetchAll();
        if (empty($dataLogin)) {
            return $errLogin['falseUserName'] = 'Tai khoan sai';
        }
        foreach ($dataLogin as $user) {

            $userId = $user['user_id'];
            $userName = $user['user_name'];
            $userFullName = $user['user_fullName'];
            $userPassword = $user['user_password'];
        }

        if ((password_verify($password, $userPassword))) {
            $_SESSION['userId'] = $user['user_id'];
            $_SESSION['user_fullName'] = $user['user_fullName'];
            $_SESSION['user_name'] = $user['user_name'];

            header('location: /index.php');

        } else {

            return $errLogin['falsePassword'] = 'Mat khau sai';

        }

    }

}
