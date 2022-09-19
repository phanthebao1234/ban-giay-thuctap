<?php
    $action = 'users';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'users':
            include 'View/user.php';
            break;
        case 'insert':
            include 'View/editUsers.php';
            break;
        case 'insert_action': 
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
                
                $code_address = $_POST['tinh'].';'.$_POST['thanhpho'].';'.$_POST['xa'];
                
                if(isset($ward_code)) {
                    $address = new Address();
                    $result = $address->getDetailAddress($ward_code);
                    $user_address = $result['address'];
                    $user = new User();
                    $user->insertUsers($user_firstname, $user_lastname, $user_render, $user_birthday, $user_phone, $user_email, $user_password, $ward_code, $user_status, $user_roll, $user_number_home);
                    echo '<script>alert("Thêm thành công")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
                }
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
                $user = new User();
                $user -> updateUser($user_id, $user_firstname, $user_lastname, $user_render, $user_birthday, $user_phone, $user_email, $user_password, $ward_code, $user_status, $user_roll, $user_number_home);
                echo '<script>alert("Cập nhật thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
            }
            break;
        case 'edit':
            include 'View/editUsers.php';
            break;
        case 'delete':
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
            break;
        case 'restore' :
            include 'View/restoreUser.php';
            break;
        case 'delete_confirm':
            
            break;
        default:
            # code...
            break;
    }
?>