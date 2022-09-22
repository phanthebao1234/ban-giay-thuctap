<?php
    $action = 'users';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        
        case 'insert':
            if($_SESSION['roll'] == 'admin') {
                include 'View/editUsers.php';
            } else {
                echo '<script>alert("vui lòng đăng nhập bằng tài khoản admin")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=profile"/>';
            }
            break;
        case 'insert_action': 
            if ($_SESSION['roll'] == 'admin') {   
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $user_firstname = $_POST['firstname'];
                    $user_lastname = $_POST['lastname'];
                    $user_render = $_POST['render'];
                    $user_birthday = $_POST['birthday'];
                    $user_phone = $_POST['phone'];
                    $user_email = $_POST['email'];
                    $user_password = $_POST['password'];
                    $user_number_home = $_POST['diachi'];
                    $ward_code = $_POST['xa'];
                    $user_status = 'active';
                    $user_roll = $_POST['roll'];
                    $user_image = $_POST['file'];
                    
                    $code_address = $_POST['tinh'].';'.$_POST['thanhpho'].';'.$_POST['xa'];
                    
                    if(isset($ward_code)) {
                        $address = new Address();
                        $result = $address->getDetailAddress($ward_code);
                        $user_address = $result['address'];
                        $user = new User();
                        $user->insertUsers($user_firstname, $user_lastname, $user_render, $user_birthday, $user_phone, $user_email, $user_password, $ward_code, $user_image, $user_status, $user_roll, $user_number_home);
                        echo '<script>alert("Thêm thành công")</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
                    }
                }   
            } else {
                echo '<script>alert("Vui lòng truy cập bằng tài khoản admin")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=profile"/>';
            }
            break;
        
        case 'update_action':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user_id = $_POST['user_id'];
                $user_firstname = $_POST['firstname'];
                $user_lastname = $_POST['lastname'];
                $user_render = $_POST['render'];
                $user_birthday = $_POST['birthday'];
                $user_phone = $_POST['phone'];
                $user_email = $_POST['email'];
                $user_password = $_POST['password'];
                $user_number_home = $_POST['diachi'];
                $ward_code = $_POST['xa'];
                $user_status = 'active';
                $user_roll = $_POST['roll'];
                $user_image = $_POST['file'];
                $user = new User();
                $user -> updateUser($user_id, $user_firstname, $user_lastname, $user_render, $user_birthday, $user_phone, $user_email, $user_password, $ward_code, $user_image, $user_status, $user_roll, $user_number_home);
                echo '<script>alert("Cập nhật thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
            }
            break;
        case 'edit':
            if ($_SESSION['roll'] == 'admin') {
                include 'View/editUsers.php';
            } else {
                echo '<script>alert("Vui lòng truy cập bằng tài khoản admin")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=profile"/>';
            }
            
            break;
        case 'delete':
            if ($_SESSION['roll'] == 'admin') {
                if (isset($_GET['user_id'])) {
                    $user_id = $_GET['user_id'];
                    $user = new User();
                    $user->deleteUser($user_id);
                    if($user) {
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
                        echo '<script>alert("Xóa thành công")</script>!';
                    }
                } else {
                    echo '<script>alert("Xoá thất bại, vui lòng xóa lại")</script>';
                }
            } else {
                echo '<script>alert("Vui lòng truy cập bằng tài khoản admin")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=profile"/>';
            }
            break;
        case 'restore' :
            if ($_SESSION['roll'] == 'admin') {
                include 'View/restoreUser.php';
            } else {
                echo '<script>alert("Vui lòng truy cập bằng tài khoản admin")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=profile"/>';
            }
            
            break;
        case 'restore_action':
            if ($_SESSION['roll'] == 'admin') {
                $user_id = $_GET['id'];
                $user = new User();
                $user -> restoreUser($user_id);
                if($user) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
                    echo '<script>alert("Khôi phục thành công")</script>!';
                } else {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
                    echo '<script>alert("Xóa thành công")</script>!';
                }
            } else {
                echo '<script>alert("Vui lòng truy cập bằng tài khoản admin")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=profile"/>';
            }
            break;
        case 'delete_confirm':
            if ($_SESSION['roll'] == 'admin') {
                $user_id = $_GET['user_id'];
                $user = new User();
                $user -> deleteConfirmUser($user_id);
                if($user) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
                    echo '<script>alert("Xóa người dùng thành công")</script>!';
                } else {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
                    echo '<script>alert("Xóa người dùng không thành công")</script>!';
                }
            } else {
                echo '<script>alert("Vui lòng truy cập bằng tài khoản admin")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=profile"/>';
            }
            
            break;
        default:
            if ($_SESSION['roll'] == 'admin') {
                include 'View/user.php';
            } else {
                echo '<script>alert("Vui lòng truy cập bằng tài khoản admin")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=auth&act=profile"/>';
            }
            break;
    }
