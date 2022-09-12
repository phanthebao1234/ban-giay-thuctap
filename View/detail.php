<?php
    if(isset($_GET['id_product'])) {
        $id_sanpham = $_GET['id_product'];
        $sanpham = new Products();
        $result = $sanpham -> getDetailProducts($id_sanpham);
        $tensanpham = $result['TenSanPham'];
        $giasanpham = $result['GiaSanPham'];
        $hinhsanpham = $result['HinhSanPham'];
        $mota = $result['MoTa'];
        $size = $result['Size'];
        $tonkho = $result['TonKho'];
        $thuonghieu = $result['ThuongHieu'];
    }
?>

<div class="container" style="margin-top: 100px">
    <h1>Danh sách sản phẩm</h1>
    <div class="detail d-flex my-5">
        <div class="detail_image">
            <img src="../Content/images/<?php echo $hinhsanpham ?>" style="width:100%" alt="">
        </div>
        <div class="detail_info ms-3">
            <h1 class="text-danger fw-bold" style="font-style: italic;">
                <?php echo $tensanpham ?>
            </h1>
            <h4>Thương hiệu: <?php
                echo $thuonghieu;
            ?></h4>
            <h4>Kích thước: <?php
                echo $size;
            ?></h4>
            <h4>Tồn kho: <?php
                echo $tonkho;
            ?></h4>


            <h3 class="text-danger fw-bold my-3" style="text-decoration: underline">
                Giá: <?php echo $giasanpham ?> đ
            </h3>
            
            <button class="btn btn-danger btn-lg mt-2" type="submit">Thêm vào giỏ hàng</button>
        </div>
    </div>
    <div class="description w-50">
        <p><span style="font-weight: bold; font-size 16px;">Mô tả: </span><?php
            echo $mota
        ?></p>
    </div>
</div>