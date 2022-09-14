<?php
    $action = 'customer';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'customer':
            include 'View/customers.php';
            break;
        case 'insert':
            include 'View/editCustomer.php';
            break;
        case 'update':
            include 'View/editCustomer.php';
            break;
        case 'delete':
            if(isset($_GET['customer_id'])) {
                $customer_id = $_GET['customer_id'];
                $customer = new Customers();
                $customer->deleteCustomer($customer_id);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
                echo '<script>alert("Xóa thành công")</script>!';
            }
            else {
                echo '<script>alert("Xóa không thành công! Vui lòng thực hiện lại")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
            }
            break;
        case 'insert_action':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $render = $_POST['render'];
                $birthday = $_POST['birthday'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $image = $_POST['image'];
                $customer = new Customers();
                $customer->insertCustomers($firstname, $lastname, $render, $birthday, $phone, $email, $password, $address, $image);
                echo '<script>alert("Thêm khách hàng thành công!")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
            }
            break;
        case 'update_action':
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $id = $_POST['id'];
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $render = $_POST['render'];
                $birthday = $_POST['birthday'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $image = $_POST['image'];
                $customer = new Customers();
                $isStatus = $customer->updateCustomer($id, $firstname, $lastname, $render, $birthday, $phone, $email, $password, $address, $image);
                echo $isStatus;
                header("Location: ./index.php?action=customer");
                echo '<script>alert("Cập nhật khách hàng thành công!")</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
            }

            break;
        
        default:
            # code...
            break;
    }

?>