<div class="container-fluid table-responsive">
    <h1>Danh sách sản phẩm</h1>
    <div class="d-flex justify-content-between flex-row mt-3">
        <div>
            <a href="index.php?action=product&act=insert_product" class="btn btn-primary me-3">&plus; Thêm mới</a>
            <a href="index.php?action=voucher&act=import" class="btn btn-info me-3">&uArr; Nhập CSV</a>
            <a href="index.php?action=product&act=export_action" class="btn btn-success">&dArr; Xuất file Excel</a>
        </div>
        <a class="text-decoration-underline fst-italic" href="index.php?action=sanpham&act=restore">Các sản phẩm đã xóa <i class="fas fa-lg fa-trash-alt"></i></a>
    </div>
    <div class="d-flex">
        <div class="edit_product my-3 me-3 w-25">
            <form action="index.php?action=product&act=import_action" method="post" enctype="multipart/form-data">
                <!-- <input type="file" name="file" id="file">
                <input type="submit" value="Thêm dữ liệu từ file excel" name="submit"> -->
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile04" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload" placeholder="Import file CSV">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="submit">Thêm</button>
                </div>
            </form>
        </div>
        <div class="edit_search">
            <div class="edit_product my-3 w-100">
                <form action="index.php?action=product&act=search_action" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm tên sản phẩm" aria-label="Recipient's username" aria-describedby="button-addon2" name="txtsearch">
                        <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Tìm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="edit_search mx-3">
            <div class="edit_product my-3 w-100">
                <form action="index.php?action=product&act=search_action" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Tìm kiếm ID sản phẩm" aria-label="Recipient's username" aria-describedby="button-addon2" name="idsearch">
                        <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Tìm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        $sp = new Products();
            
        if(isset($_GET['act'])=='search_action') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['txtsearch'])) {
                    $str = trim($_POST['txtsearch']);
                    $results = $sp->searchNameProduct($str);
                    echo 'Tìm kiếm cho sản phẩm '. $str. '...';
                } else if(isset($_POST['idsearch'])) {
                    $id = trim($_POST['idsearch']);
                    $results = $sp->searchIDProduct($id);
                    echo 'Tìm kiếm cho sản phẩm '. $id. '...';
                }
            }
        }
        else {
            $results = $sp->getListProducts();
        }

        // $countProducts = $sp->countProducts();
        // echo "Số lượng sản phẩm: ". $countProducts['total'];
    ?>

    <table class="table align-middle table-bordered table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sản Phẩm</th>
                <th>Giá Sản Phẩm</th>
                <th>Hình Sản Phẩm</th>
                <th>Size</th>
                <th>Thương Hiệu</th>
                <th>Mô Tả</th>
                <th>Tồn Kho</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $i= 0;
                while ($set = $results->fetch()) :
                $i++;
            ?>
                <tr class="align-middle <?php if ($set['TonKho'] <= 5 && $set['TonKho'] >= 0) {
                     echo 'table-warning';
                } ?>">
                    <th><?php echo $i ?></th>
                    <th><?php echo $set['TenSanPham'] ?></th>
                    <th><?php echo number_format($set['GiaSanPham']); ?></th>
                    <th><img src="../../Content/images/<?php echo $set['HinhSanPham'] ?>" width="50%" alt=""></th>
                    <th><?php echo $set['Size'] ?></th>
                    <th><?php echo $set['ThuongHieu'] ?></th>
                    <th><?php echo $set['MoTa'] ?></th>
                    <th><?php echo $set['TonKho'] ?></th>
                    <th>
                        <a class="btn btn-warning" href="index.php?action=product&act=update_product&id_sanpham=<?php echo $set['id_sanpham'] ?>">Sửa</a>
                    </th>
                    <th>
                        <a class="btn btn-danger" href="index.php?action=product&act=delete_action&id_sanpham=<?php echo $set['id_sanpham'] ?>" onclick="return confirm('Bạn có muốn xóa <?php echo $set['id_sanpham'] . '-' . $set['TenSanPham'] ?> ?')">
                            Xóa
                        </a>
                    </th>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>