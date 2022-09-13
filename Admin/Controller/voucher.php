<?php
    $action = 'voucher';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'insert':
            include 'View/editVoucher.php';
            break;
        case 'insert_action':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $voucher_code = $_POST['voucher_code'];
                $voucher_name = $_POST['voucher_name'];
                $voucher_start = $_POST['voucher_start'];
                $voucher_end = $_POST['voucher_end'];
                $voucher_sale = $_POST['voucher_sale'];
                $voucher_count = $_POST['voucher_count'];
                $voucher_status = $_POST['voucher_status'];
                $voucher = new Voucher();
                $isStatus = $voucher -> insertVoucher($voucher_code, $voucher_name, $voucher_start, $voucher_end, $voucher_sale, $voucher_count, $voucher_status);
                if($isStatus == true) {
                    echo "<script>alert('Thêm thành công')</script>";
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher"/>';
                } else {
                    echo "<script>alert('Thêm thất bại')</script>";
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=insert"/>';
                }
            }
            break;
        case 'update':
            include 'View/editVoucher.php';
            break;
        case 'update_action':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $voucher_id = $_POST['voucher_id'];
                $voucher_code = $_POST['voucher_code'];
                $voucher_name = $_POST['voucher_name'];
                $voucher_start = $_POST['voucher_start'];
                $voucher_end = $_POST['voucher_end'];
                $voucher_sale = $_POST['voucher_sale'];
                $voucher_count = $_POST['voucher_count'];
                $voucher_status = $_POST['voucher_status'];
                $voucher = new Voucher();
                $isStatus = $voucher -> updateVoucher($voucher_id, $voucher_code, $voucher_name, $voucher_start, $voucher_end, $voucher_sale, $voucher_count, $voucher_status);
                if($isStatus) {
                    echo "<script>alert('Cập nhật thành công')</script>";
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher"/>';
                }
            }
            break;
        case 'delete':
            if(isset($_GET['id'])) {
                $voucher_id = $_GET['id'];
                $voucher = new Voucher();
                $isStatus = $voucher->deleteVoucher($voucher_id);
                if($isStatus == true) {
                    echo "<script>alert('Xóa thành công thành công')</script>";
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher"/>';
                }
            }
            break;
        case 'restore':
            include 'View/restoreVoucher.php';
            break;
        case 'restore_action':
            if(isset($_GET['id'])) {
                $voucher_id = $_GET['id'];
                $voucher = new Voucher();
                $isStatus = $voucher->restoreVoucher($voucher_id);
                if($isStatus == true) {
                    echo "<script>alert('Xóa thành công thành công')</script>";
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=voucher&act=restore"/>';
                }
            }
            break;
        default:
            include 'View/voucher.php';
            break;
    }
?>