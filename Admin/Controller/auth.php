<?php
    $action = 'auth';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'auth':
            include 'View/loginAdmin.php';
            break;
        case 'login':
            include 'View/loginAdmin.php';
            break;
        case 'login_action':
            echo 'Heloooooo';
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $account_name = $_POST['name'];
                $account_password = $_POST['password'];
                $user = new User();
                $isLogin = $user -> loginUser($account_name, $account_password, $account_name);
                if($isLogin==true) {
                    // Khoi tao session
                    $_SESSION['id'] = $isLogin['user_id'];
                    $_SESSION['firstname'] = $isLogin['user_firstname'];
                    $_SESSION['lastname'] = $isLogin['user_lastname'];
                    $_SESSION['email'] = $isLogin['user_email'];
                    $_SESSION['phone'] = $isLogin['user_phonenumber'];
                    $_SESSION['render'] = $isLogin['user_render'];
                    $_SESSION['birthday'] = $isLogin['user_birthday'];
                    $_SESSION['status'] = $isLogin['user_status'];
                    $_SESSION['roll'] = $isLogin['user_roll'];
                    $_SESSION['address'] = $isLogin['user_address'];
                    $_SESSION['password'] = $isLogin['user_password'];
                    echo '<script>alert("Đăng nhập thành công!")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php"/>';
                } else {
                    echo '<script>alert("Đăng nhập không thành công!")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
                }
            }
            break;
        case 'logout_action':
            unset($_SESSION['id']);
            unset($_SESSION['firstname']);
            unset($_SESSION['lastname']);
            unset($_SESSION['email']);
            unset($_SESSION['phone']);
            unset($_SESSION['render']);
            unset($_SESSION['birthday']);
            unset($_SESSION['status']);
            unset($_SESSION['roll']);
            unset($_SESSION['password']);
            unset($_SESSION['address']);
            echo '<script>alert("Đăng xuất thành công!")</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=login"/>';
            break;
        case 'profile':
            include 'View/myUser.php';
            break;
        default:
            # code...
            break;
    }
?>