<?php
    $action = 'order2';
    if(!isset($_SESSION['bill']) || count($_SESSION['bill'])) {
        $_SESSION['bill'] = array();
    }

    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'order2':
            include 'View/order2.php';
            break;
        case 'order_action':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Tạo ra SESSION('hóa đơn') = [Tên người dùng, địa chỉ, số điện thoại, id người dùng, ]
            }
            break;
        case 'update_address':
            echo 'hello';
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $customer_id = $_POST['customer_id'];
                $customer_address = $_POST['customer_address'];
                $customer_phone = $_POST['customer_phone'];
                echo $customer_address;
                echo $customer_phone;
                $customer = new Customer();
                $isStatus = $customer -> updateCustomerAdressPhone($customer_id, $customer_address, $customer_phone);
                if($isStatus == true) {
                    echo "<script>alert('Cập nhật thành công')</script>";
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order2"/>';
                } else {
                    echo '<script>alert("Cập nhật thất bại")</script>';
                }
            }
            break;
        case 'order_detail':
            include 'View/order_detail.php';
            break;
        case 'order_detail_action': 
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $pttt = 0;
                if(isset($_POST['phuongthuc'])) {
                    $pttt = $_POST['phuongthuc'];
                }
                $voucher_sale = 0;
                if(isset($_POST['voucher_code'])) {
                    $voucher_code = $_POST['voucher_code'];
                }
                $voucher = new Voucher();
                $result = $voucher-> getVoucher($voucher_code);
                if(isset($reuslt)) {
                    echo '<script>alert("Mã voucher không chính xác")</script>';
                }
                if(isset($_POST['phuongthuc'])) {
                    if($pttt == 'nganhang') {
                        $giamtt = 0.1;
                    } else if ($pttt == 'momo') {
                        $giamtt = 0.05;
                    } else if ($pttt == 'tructiep') {
                        $giamtt = 0;
                    }
                }

                if(isset($result)) {
                    $voucher_sale = $result['voucher_sale'];
                    $_SESSION['total'] = getTotal($voucher_sale, $giamtt);
                }
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order2&act=pay"/>';
                // echo getTotal($voucher_sale, $giamtt);
            }
            break;
        case 'pay':
            if(isset($_SESSION['customer_id'])){
                $customer_id = $_SESSION['customer_id'];
                $bill = new HoaDon();
                $product = new Products();
                $bill_id = $bill -> insertBill($customer_id);
                $_SESSION['bill_id'] = $bill_id;

                $total = (int) $_SESSION['total'] + 0;
                foreach($_SESSION['cart'] as $key=>$item) {
                    $bill->insertOrderDetail($bill_id,$item['product_id'],$item['product_quantity'],$item['total']);
                    $product -> updateProductAfterPay($item['product_id'], $item['product_quantity']);
                }
                $bill -> updateOrderTotal($bill_id, $total);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order"/>';
                    
            }
            break;
            // include 'View/order.php';
            // break;
        case 'pay_action':
            unset($_SESSION['cart']);
            $_SESSION['total'] = 0;
            getTotal();
            echo '<script>alert("Thanh toán thành công")</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order"/>';
            break;
        default:
            break;
    }
?>