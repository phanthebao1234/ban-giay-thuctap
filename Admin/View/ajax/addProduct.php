<?php
    include '../../Model/connect.php';
    include '../../Model/products.php';

    $tensanpham = htmlspecialchars(trim($_POST['tensanpham']));
    $thuonghieu = htmlspecialchars(trim($_POST['thuonghieu']));
    $giasanpham = htmlspecialchars(trim($_POST['giasanpham']));
    $hinh = $_FILES['files']['name'];
    $images = implode(';', $hinh);
    $size = htmlspecialchars(trim($_POST['size']));
    $tonkho = htmlspecialchars(trim($_POST['tonkho']));

    if(empty($tensanpham) || empty($thuonghieu) || empty($giasanpham) || empty($size) || empty($tonkho)) {
        echo '<script>console.log("err3")</script>';
        echo '<div class="alert alert-warning">Vui lòng nhập đầy đủ thông tin</div>';
    } else {
        $product = new Products();
        $product -> insertProduct($tensanpham, $giasanpham, $images, "", $size, $thuonghieu, $tonkho);
        echo '<script>alert("Thêm sản phẩm thành công")</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
    } 
?>