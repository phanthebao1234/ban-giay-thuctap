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
            $query = "select voucher_sale, voucher_count from voucher where voucher_code='$voucher_code'";
            $result = $db->getInstance($query);
            return $result;
        }
        public function updateCountVoucher($voucher_code) {
            $db = new connect();
            $query = "update voucher set voucher_count=voucher_count-1 where voucher_code='$voucher_code'";
            $db -> exec($query);
        }
        
    }
?>