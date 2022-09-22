<?php 
    class Products {
        public function __construct() {}

        // Lấy tất cả sản phẩm
        function getListProducts() {
            $db = new connect();
            $query = "Select * from sanpham";
            $result = $db->getList($query);
            return $result;
        }

        // Thêm sản phẩm
        function insertProduct($tensanpham, $giasanpham, $hinhsanpham="", $mota="", $size, $thuonghieu, $tonkho) {
            $db = new connect();
            $query = "insert into sanpham (id_sanpham, TenSanPham, GiaSanPham, HinhSanPham, MoTa, Size, ThuongHieu, TonKho) 
            values (Null, '$tensanpham', '$giasanpham', '$hinhsanpham', '$mota', '$size', '$thuonghieu', '$tonkho')";
            $db->exec($query);
        }

        // Cập Nhật sản phẩm
        function updateProduct($id_sanpham, $tensanpham, $giasanpham, $hinhsanpham="", $mota="", $size, $thuonghieu, $tonkho) {
            $db = new connect();
            $query = "update sanpham 
            set TenSanPham='$tensanpham',
            GiaSanPham='$giasanpham',
            HinhSanPham='$hinhsanpham',
            MoTa='$mota',
            Size='$size',
            ThuongHieu='$thuonghieu',
            TonKho='$tonkho'
            where id_sanpham=$id_sanpham";
            $db->exec($query); 
        }

        // Xóa sản phẩm
        function deleteProduct($id) {
            $db = new connect();
            $query = "delete from sanpham where id_sanpham=$id";
            $db->exec($query);
        }

        // lấy thông tin của 1 sản phẩm
        function getProductID($id)
        {
            $db=new connect();
            $select="select * from sanpham where id_sanpham=$id";
            $result=$db->getInstance($select);
            return $result;
        }

        // Exports product
        function exportData() {
            $db = new connect();
            $query = "select * from sanpham order by id_sanpham ASC";
            $result = $db->getList($query);
            return $result;
        }

        // search
        function searchNameProduct($_name) {
            $db = new connect();
            $query = "select * from sanpham where TenSanPham LIKE '%$_name%'";
            $result = $db->getList($query);
            return $result;
        }
        
        // // output count 
        // function countProducts(){
        //     $db = new connect();
        //     $query = "SELECT COUNT(TenSanPham) AS 'total' FROM sanpham;";
        //     $result = $db->getList($query);
        //     return $result;
        // }
        function searchIDProduct($id) {
            $db = new connect();
            $query = "select * from sanpham where id_sanpham like '%$id%'";
            $results= $db->getList($query);
            return $results;
        }
    }
?>