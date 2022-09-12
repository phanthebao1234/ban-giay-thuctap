<?php 
    $action = 'order';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];

    }

    switch ($action) {
        case 'order':
            include 'View/order.php';
            break;
        case 'order_detail':
            if(isset($_SESSION['customer_id'])){
                $customer_id = $_SESSION['customer_id'];
                $bill = new HoaDon();
                $bill_id = $bill -> insertBill($customer_id);
                $_SESSION['bill_id'] = $bill_id;

                $total = 0;
                foreach($_SESSION['cart'] as $key=>$item) {
                    $bill->insertOrderDetail($bill_id,$item['product_id'],$item['product_quantity'],$item['total']);
                    // chèn vào đc bảng chi tiết hóa đơn
                    //tính tổng tiền trên hóa đơn của bảng chi tiết hóa đơn
                    $total+=$item['total'];
                }
                $bill -> updateOrderTotal($bill_id, $total);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order"/>';

            }
            break;
        default:
            # code...
            break;
    }
?>