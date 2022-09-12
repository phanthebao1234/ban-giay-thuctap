<?php
    class Customers {
        public function __construct() {}

        // Lấy tất cả customer
        public function getListCustomers() {
            $db = new connect();
            $query = "select * from customers";
            $result = $db->getList($query);
            return $result;
        }

        // Lấy 1 customer
        public function getCustomer($customer_id) {
            $db = new connect();
            $query = "select * from customers where customer_id=$customer_id";
            $result = $db->getInstance($query);
            return $result;
        }

        // Thêm dữ liệu vào customer
        public function insertCustomers($firstname, $lastname, $render, $birthday, $phone, $email, $password, $address, $image) {
            $db = new connect();
            $query = "insert into customers (customer_id, customer_firstname, customer_lastname, customer_render,customer_birthday, customer_phonenumber, customer_email, customer_password, customer_address, customer_image) 
            values(Null, '$firstname', '$lastname', '$render', '$birthday', $phone, '$email', '$password', '$address', '$image')";
            $db -> exec($query);
        }

        // Cập nhật dữ liệu
        public function updateCustomer($customer_id, $customer_firstname, $customer_lastname, $customer_render, $customer_birthday, $customer_phonenumber, $customer_email, $customer_password, $customer_address, $customer_image) {
            $db = new connect();
            $query = "update customers set 
            customer_id=$customer_id,
            customer_firstname='$customer_firstname',
            customer_lastname='$customer_lastname',
            customer_render='$customer_render',
            customer_birthday='$customer_birthday',
            customer_phonenumber='$customer_phonenumber',
            customer_email='$customer_email',
            customer_password='$customer_password',
            customer_address='$customer_address',
            customer_image='$customer_image'
            where customer_id='$customer_id'";
            $db->exec($query);
        }

        // Xóa 1 trường
        public function deleteCustomer($customer_id) {
            $db = new connect();
            $query = "delete from customers where customer_id=$customer_id";
            $db->exec($query);
        }

        // Xóa tất cả
        public function deleteAllCustomer() {
            $db = new connect();
            $query = "DELETE FROM customers";
            $db->exec($query);
        }
    }
?>