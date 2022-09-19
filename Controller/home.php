<?php 
    $action = 'home';
    if(isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'home':
            include 'View/home.php';
            break;
        case 'sanpham':
            include 'View/products.php';
            break;
        case 'detail':
            include 'View/detail.php';
            break;
        case 'input_address':
            include 'View/inputAddress.php';
            break;
    }
?>