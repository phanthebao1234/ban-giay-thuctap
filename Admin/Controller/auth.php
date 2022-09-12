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
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo 'Login';
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
                    echo '<script>alert("Login thanh cong!")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
                } else {
                    echo '<script>alert("Login khong thanh cong!")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth"/>';
                }
            }
            break;
        case 'logout_action':
            session_destroy();
            echo '<script>alert("Logout thanh cong!")</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=login"/>';
            break;
        default:
            # code...
            break;
    }
?>