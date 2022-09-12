<?php
    class Products
    {
        function getListProducts() {
            $db = new connect();
            $query = "SELECT * FROM sanpham";
            $result = $db -> getList($query);
            return $result;
        }

        function getDetailProducts($id) {
            $db = new connect();
            $query = "select * from sanpham where id_sanpham = $id";
            $result = $db->getInstance($query);
            return $result;
        }
    }
?>