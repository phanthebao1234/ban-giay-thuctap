<?php 
    $action = 'customer';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'update_address':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $customer_id = $_POST['customer_id'];
                $customer_address = $_POST['customer_address'];
                $customer_phone = $_POST['customer_phone'];
                $customer = new Customer();
                $customer -> updateCustomerAdressPhone($customer_id, $customer_address, $customer_phone);
                if(isset($customer)) {
                    echo "<script>alert('Cập nhật thành công')</script>";
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order2"/>';
                } else {
                    echo '<script>alert("Cập nhật thất bại")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order2"/>';
                }
            }
            break;
        
        default:
            include 'View/profile.php';
            break;
    }
?>