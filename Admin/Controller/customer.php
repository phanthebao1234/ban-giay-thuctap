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
                if(isset($customer)) {
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
                    echo '<script>alert("Xóa thành công")</script>!';
                }
            }
            else {
                if (isset($customer)) {
                    echo '<script>alert("Xóa không thành công! Vui lòng thực hiện lại")</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
                }
                
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
                $image = $_FILES['image']['name'];
                $customer = new Customers();
                $customer->insertCustomers($firstname, $lastname, $render, $birthday, $phone, $email, $password, $address, $image);
                if(isset($customer)) {
                    echo '<script>alert("Thêm khách hàng thành công!")</script>';
                    // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
                }
                uploadImage();
                
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
                // $image = $_FILES['image']['name'];
                $image = $_POST['image'];
                $customer = new Customers();
                $customer->updateCustomer($id, $firstname, $lastname, $render, $birthday, $phone, $email, $password, $address, $image);
                if(isset($customer)) {
                    echo '<script>alert("Cập nhật khách hàng thành công!")</script>';
                    // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=customer"/>';
                    $target_dir = "../../Content/images/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["image"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["image"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    }
                }
            }

            break;
        
        default:
            # code...
            break;
    }
