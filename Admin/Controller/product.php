<?php
$action = "products";
if (isset($_GET['act'])) {
    $action = $_GET['act'];
}
switch ($action) {
    case "products":
        include 'View/products.php';
        break;
    case "insert_product":
        include 'View/editsanpham.php';
        break;
    case "insert_action":
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $tensanpham = $_POST['tensanpham'];
            $giasanpham = $_POST['giasanpham'];
            $hinh = $_FILES['image']['name'];
            // echo var_dump($hinh);
            $images = implode(';', $hinh);
            $mota = $_POST['mota'];
            $size = $_POST['size'];
            $thuonghieu = $_POST['thuonghieu'];
            $tonkho = $_POST['tonkho'];
        }
        $sanpham = new Products();
        $sanpham->insertProduct($tensanpham, $giasanpham, $images, $mota, $size, $thuonghieu, $tonkho);
        if (isset($sanpham)) {
            echo 'Hello';
            uploadImage();
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
        }
        include 'View/products.php';
        break;
    case "update_product":
        include 'View/editsanpham.php';
        break;
    case 'update_action':
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_sanpham = $_POST['id_sanpham'];
            $tensanpham = $_POST['tensanpham'];
            $giasanpham = $_POST['giasanpham'];
            $hinh = $_FILES['image']['name'];
            $images = implode(';', $hinh);
            $mota = $_POST['mota'];
            $size = $_POST['size'];
            $thuonghieu = $_POST['thuonghieu'];
            $tonkho = $_POST['tonkho'];
            $sanpham = new Products();
            $sanpham->updateProduct($id_sanpham, $tensanpham, $giasanpham, $images, $mota, $size, $thuonghieu, $tonkho);
            if (isset($sanpham)) {
                uploadImage();
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
            echo 'Cập nhật thành công';
        }
        include 'View/products.php';
        break;
    case 'delete_action':
        if (isset($_GET['id_sanpham'])) {
            $id_sanpham = $_GET['id_sanpham'];
            $sanpham = new Products();
            $sanpham->deleteProduct($id_sanpham);
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
            echo '<script>alert("Xóa thành công")</script>!';
        }
        include 'View/products.php';
        break;
    case 'import_action':
        if (isset($_POST['submit'])) {
            // Bưới 1: lấy 1 file từ server  về, mà file up lên nó lưu trong $_FILES
            $file = $_FILES["file"]["tmp_name"];
            // khi lấy về thì phải xóa những signature 
            file_put_contents($file, str_replace("\xEF\xBB\xBF", "", file_get_contents($file)));
            // Bước 2: mở file ra fopen r,w
            $file_open = fopen($file, "r");
            // Bước 3:đọc nội dung của file
            $sanpham = new Products();
            while (($csv = fgetcsv($file_open, 1000, ',')) !== false) {
                $tensanpham = $csv['0'];
                $giasanpham = $csv['1'];
                $hinhsanpham = $csv['2'];
                $motasanpham = $csv['3'];
                $size = $csv['4'];
                $thuonghieu = $csv['5'];
                $tonkho = $csv['6'];
                $sanpham->insertProduct($tensanpham, $giasanpham, $hinhsanpham, $motasanpham, $size, $thuonghieu, $tonkho);
            }
            
            echo '<script> alert("Import thành công")</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
            break;
        }
    case 'export_action':
        include 'Model/export.php';
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=product"/>';
        // include 'View/export.php';
        break;
    case 'search_action':
        include 'View/products.php';
        break;
}
