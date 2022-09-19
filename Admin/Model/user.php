<?php
    class User {
        public function __construct() {}

        // Lấy tất cả user
        public function getListUsers() {
            $db = new connect();
            $query = "select * from users";
            $result = $db->getList($query);
            return $result;
        }

        // Thêm dữ liệu
        public function insertUsers($user_firstname, $user_lastname, $user_render, $user_birthday, $user_phonenumber, $user_email, $user_password, $user_address, $user_status, $user_roll, $user_number_home) {
            $db = new connect();
            $query = "insert into users (user_id, user_firstname, user_lastname, user_render, user_birthday, user_phonenumber, user_email, user_password, user_address, user_status, user_roll, user_number_home)
            values (Null, '$user_firstname', '$user_lastname', '$user_render', '$user_birthday', '$user_phonenumber', '$user_email', '$user_password', '$user_address', '$user_status', '$user_roll', '$user_number_home')";
            $db -> exec($query);
        }

        // Cập nhật dữ liệu
        public function updateUser($user_id, $user_firstname, $user_lastname, $user_render, $user_birthday, $user_phonenumber, $user_email, $user_password, $user_address, $user_status, $user_roll, $user_number_home) {
            $db = new connect();
            $query = "update users set
            user_id='$user_id',
            user_firstname='$user_firstname',
            user_lastname='$user_lastname',
            user_render='$user_render',
            user_birthday='$user_birthday',
            user_phonenumber='$user_phonenumber',
            user_email='$user_email',
            user_password='$user_password',
            user_address='$user_address',
            user_status='$user_status',
            user_roll='$user_roll',
            user_number_home='$user_number_home'
            where user_id='$user_id'";
            $db -> exec($query);
        }

        // Xóa 1 trường
        public function deleteUser($user_id) {
            $db = new connect();
            $query = "delete from users where user_id='$user_id'";
            $db->exec($query);
        }

        // Xóa tất cả
        public function deleteAllUser() {
            $db = new connect();
            $query = "DELETE FROM customers";
            $db->exec($query);
        }

        // Lấy 1 trường
        public function getUser($user_id) {
            $db = new connect();
            $query = "select * from users where user_id='$user_id'";
            $result = $db->getInstance($query);
            return $result;
        }

        // Login

        public function loginUser($user_email='', $user_password='', $user_phonenumber) {
            $db = new connect();
            $query = "select * from users where (user_email='$user_email' and user_password='$user_password')
            or (user_phonenumber='$user_phonenumber' and user_password='$user_password')";
            $result = $db->getInstance($query);
            return $result;
        }

        public function deleteConfirmUser($user_id) {
            $db = new connect();
            $query = "update users 
            set user_status = 0
            where user_id = '$user_id'";
            $db -> exec($query);
        }
    }
?>