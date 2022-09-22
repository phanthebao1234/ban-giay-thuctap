<?php
    include '../../Model/connect.php';
    include '../../Model/products.php';
    $id_sanpham = htmlspecialchars(trim($_POST['id_sanpham']));
    $tensanpham = htmlspecialchars(trim($_POST['tensanpham']));
    $thuonghieu = htmlspecialchars(trim($_POST['thuonghieu']));
    $hinh = $_FILES['files']['name'];
    $images = implode(';', $hinh);
    $giasanpham = htmlspecialchars(trim($_POST['giasanpham']));
    $size = htmlspecialchars(trim($_POST['size']));
    $tonkho = htmlspecialchars(trim($_POST['tonkho']));

    if(empty($tensanpham) || empty($thuonghieu) || empty($giasanpham) || empty($size) || empty($tonkho)) {
        echo '<script>console.log("err3")</script>';
        echo '<div class="alert alert-warning">Vui lòng nhập đầy đủ thông tin</div>';
    } else {
        $product = new Products();
        $product -> updateProduct($id_sanpham, $tensanpham, $giasanpham, $images, "", $size, $thuonghieu, $tonkho);
        echo '<script>alert("Cập nhật sản phẩm thành công")</script>';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
    } 
?>