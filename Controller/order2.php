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
        default:
            break;
    }
?>