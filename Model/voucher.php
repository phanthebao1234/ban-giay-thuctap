<?php 
    class Voucher {
        public function __construct() {}

        public function getAllVoucher() {
            $db = new connect();
            $query = "select * from voucher";
            $result = $db -> getList($query);
            return $result;
        }
        public function getVoucher($voucher_code) {
            $db = new connect();
            $query = "select voucher_sale from voucher where voucher_code='$voucher_code'";
            $result = $db->getInstance($query);
            return $result;
        }

    }
?>