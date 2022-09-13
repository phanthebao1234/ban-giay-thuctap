<?php 
    class Voucher {
        public function __construct() {}

        public function getAllVoucher() {
            $db = new connect();
            $query = "select * from voucher";
            $result = $db -> getList($query);
            return $result;
        }

        

    }
?>