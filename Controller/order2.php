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
        default:
            break;
    }
?>