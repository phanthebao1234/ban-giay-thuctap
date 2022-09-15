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
        function updateProductAfterPay($product_id, $product_quantity) {
            $db = new connect();
            $query = "update sanpham
            set TonKho = TonKho - $product_quantity
            where id_sanpham = $product_id";
            $db -> exec($query);
        }
    }
?>