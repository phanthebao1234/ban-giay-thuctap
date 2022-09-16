<?php
    $action = 'order';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'order':
            include 'View/orders.php';
            break;
        
        default:
            # code...
            break;
    }
?>