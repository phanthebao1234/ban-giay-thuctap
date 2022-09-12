<?php
    $action = 'user';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'user':
            include 'View/users.php';
            break;
        case 'user_insert':
            include 'View/edituser.php';
            break;
        case 'insert_action': 
            if ($_POST['submit']) {
                $ho = $_POST['ho'];
                $ten = $_POST['ten'];
                $sodienthoai = $_POST['sodienthoai'];
                $ngaysinh = $_POST['ngaysinh'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $encodePW = md5($matkhau);
                $vaitro = $_POST['vaitro'];
                $user = new Users();
                $user->insertUser($ho, $ten, $sodienthoai, $ngaysinh, $email, $matkhau, $vaitro);
                echo '<script>alert("Tạo tài khoản thành công!")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
            }
            include 'View/users.php';
            break;
        case 'delete_action':
            if(isset($_GET['id_user'])) {
                $id_user = $_GET['id_user'];
                echo $id_user;
                $user = new Users();
                $user -> deleteUser($id_user);
                echo '<script>alert("Xóa người dùng thành công!")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
            }
            break;
        case 'user_update':
            include 'View/edituser.php';
            break;
        case 'update_action':
            if(isset($_POST['submit'])) {
                $id_khachhang = $_POST['id_khachhang'];
                $ho = $_POST['ho'];
                $ten = $_POST['ten'];
                $sodienthoai = $_POST['sodienthoai'];
                $ngaysinh = $_POST['ngaysinh'];
                $email = $_POST['email'];
                $matkhau = $_POST['matkhau'];
                $vaitro = $_POST['vaitro'];
                $khachhang = new Users();
                $khachhang -> updateUser($id_khachhang, $ho, $ten, $sodienthoai, $ngaysinh, $email, $matkhau, $vaitro);
                echo '<script>alert("Cập nhật thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
            }
        case 'user_search':
            include 'View/users.php';
            break;
        case 'import_action':
            if (isset($_POST['submit'])) {
                // Bưới 1: lấy 1 file từ server  về, mà file up lên nó lưu trong $_FILES
                $file = $_FILES["file"]["tmp_name"];
                // khi lấy về thì phải xóa những signature 
                file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
                // Bước 2: mở file ra fopen r,w
                $file_open = fopen($file, "r");
                // Bước 3:đọc nội dung của file
                $khachhang = new Users();
                while (($csv = fgetcsv($file_open, 1000, ',')) !== false) {
                    $firstname = $csv['0'];
                    $lastname = $csv['1'];
                    $sodienthoai = $csv['2'];
                    $ngaysinh = $csv['3'];
                    $email = $csv['4'];
                    $matkhau = $csv['5'];
                    $vaitro = $csv['6'];
                    $khachhang->insertUser($firstname, $lastname, $sodienthoai, $ngaysinh, $email, $matkhau, $vaitro);
                }
                
                echo '<script> alert("Import thành công")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=user"/>';
                break;
            }
            break;
        default:
            # code...
            break;
    }
?>