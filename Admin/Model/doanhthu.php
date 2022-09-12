<?php
    class DoanhThu {
        public function __construct() {}

        public function getTotalAll() {
            $db = new connect();
            $db = "select sum(total) from bill_detail";
        } 
    }
?>