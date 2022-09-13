<?php 
    $action = 'auth';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'auth':
            include 'View/login.php';
            break;
        case 'login':
            include 'View/login.php';
            break;
        case 'login_action':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $account_name = $_POST['name'];
                $account_password = $_POST['password'];
                $auth = new Customer();
                $result = $auth->loginCustomer($account_name, $account_password);
                if($result == true) {
                    $_SESSION['customer_id'] = $result['customer_id'];
                    $_SESSION['customer_firstname'] = $result['customer_firstname'];
                    $_SESSION['customer_lastname'] = $result['customer_lastname'];
                    echo $_SESSION['customer_firstname'];
                    echo '<script>alert("Đăng nhập thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                } else {
                    echo '<script>alert("Sai thong tin")</script>';
                }
            }
            break;
        case 'resgister':
            include 'View/resgister.php';
            break;
        case 'resgister_action':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $customer_firstname = $_POST['customer_firstname'];
                $customer_lastname = $_POST['customer_lastname'];
                $customer_render = $_POST['customer_render'];
                $customer_birthday = $_POST['customer_birthday'];
                $customer_phone = $_POST['customer_phone'];
                $customer_email = $_POST['customer_email'];
                $customer_password = $_POST['customer_password'];
                $customer_address = $_POST['customer_address'];
                $customer_image = $_POST['customer_image'];
                $customer = new Customer();
                $isStatus = $customer->regristerCustomer($customer_firstname, $customer_lastname, $customer_render, $customer_birthday, $customer_phone, $customer_email, $customer_password, $customer_address, $customer_image);
                if($isStatus) {
                    echo '<script>alert("Tao tai khoan thanh cong")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                }
            }
            break;
        case 'update':
            include 'View/update.php';
            break;
        case 'logout_action':
            $_SESSION['customer_id'] = null;
            $_SESSION['firstname'] = null;
            $_SESSION['lastname'] = null;
            // session_destroy();
            echo '<script>alert("Dang xuat thanh cong")</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            break;
        default:
            # code...
            break;
    }
    
?>