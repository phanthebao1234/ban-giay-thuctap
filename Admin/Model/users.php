<?php
    class Users {
        public function __construct() {}

        // Lấy tất cả user
        function getListUsers() {
            $db = new connect();
            $query = "Select * from khachhang";
            $result = $db->getList($query);
            return $result;
        }

        // Thêm user 
        function insertUser($fristname, $lastname, $sodienthoai, $ngaysinh, $email, $matkhau, $vaitro) {
            $db = new connect();
            $query = "insert into khachhang (id_khachhang, Ho, Ten, SoDienThoai, NgaySinh, Email, MatKhau, VaiTro)
            values (Null, '$fristname', '$lastname', $sodienthoai, '$ngaysinh', '$email', '$matkhau', '$vaitro')";
            $db->exec($query);
        }

        // Update user 
        function updateUser($id, $firstname, $lastname, $sodienthoai, $ngaysinh, $email, $matkhau, $vaitro) {
            $db = new connect();
            $query = "update khachhang
            set Ho='$firstname',
            Ten='$lastname',
            SoDienThoai='$sodienthoai',
            NgaySinh='$ngaysinh',
            Email='$email',
            MatKhau='$matkhau';
            VaiTro='$vaitro'
            where id_khachhang=$id";
            $db -> exec($query);
        }

        // Delete User
        function deleteUser($id) {
            $db = new connect();
            $query = "delete from khachhang where id_khachhang=$id";
            $db->exec($query);
        }

        // lấy thông tin của 1 user
        function getUserId($id_khachhang)
        {
            $db=new connect();
            $select="select * from khachhang where id_khachhang=$id_khachhang";
            $result=$db->getInstance($select);
            return $result;
        }

        // filter vai trò user
        function getUserAdmin($vaitro) {
            $db = new connect();
            $query = "select * from khachhang where VaiTro='$vaitro'";
            $result = $db->getList($query);
            return $result;
        }

        // search email user
        function searchEmailUser($str_email) {
            $db = new connect();
            $query = "select * from khachhang where Email LIKE '%$str_email%'";
            $result = $db->getList($query);
            return $result;
        }

        // search phone user
        function searchPhoneUser($_phone) {
            $db = new connect();
            $query = "select * from khachhang where SoDienThoai LIKE '%$_phone%'";
            $result = $db->getList($query);
            return $result;
        }
    }
?>