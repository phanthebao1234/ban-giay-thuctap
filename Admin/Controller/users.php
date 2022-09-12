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
                $user_address = $_POST['address'];
                $user_status = 'active';
                $user_roll = $_POST['roll'];
                $user = new User();
                $user->insertUsers($user_firstname, $user_lastname, $user_render, $user_birthday, $user_phone, $user_email, $user_password, $user_address, $user_status, $user_roll);
                echo '<script>alert("Thêm thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
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
                $user_address = $_POST['address'];
                $user_status = 'active';
                $user_roll = $_POST['roll'];
                $user = new User();
                $user -> updateUser($user_id, $user_firstname, $user_lastname, $user_render, $user_birthday, $user_phone, $user_email, $user_password, $user_address, $user_status, $user_roll);
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
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=users"/>';
                echo '<script>alert("Xóa thành công")</script>!';
            } else {
                echo '<script>alert("Xoá thất bại, vui lòng xóa lại")</script>';
            }
            break;
        default:
            # code...
            break;
    }
?>