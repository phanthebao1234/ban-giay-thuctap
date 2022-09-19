<div class="container">
    <h1>Danh sách khách hàng</h1>
    <div class="d-flex justify-content-between flex-row mt-3">
        <div>
            <?php 
                if($_SESSION['roll'] == 'admin'){
                    echo '<a class="btn btn-success" href="index.php?action=user&act=user_insert">Thêm Mới</a>';
                } else {
                    echo '<btn class="btn btn-secondary" onclick>Thêm Mới</btn>';
                }
            ?>
            <a class="btn btn-success" href="index.php?action=user&act=user_insert">Thêm Mới</a>
            <a class="btn btn-primary mx-3" href="index.php?action=user&act=user_export">Export Excel</a>
        </div>
        <a class="text-decoration-underline fst-italic" href="index.php?action=voucher&act=restore">Các Voucher đã xóa <i class="fas fa-lg fa-trash-alt"></i></a>
        <!-- <a class="btn btn-info" href="index.php?action=user$act=user_export">Import CSV</a> -->
    </div>
    <div class="my-3 d-flex">
        <div class="edit_product my-3 me-3 w-25">
            <form action="index.php?action=user&act=import_action" method="post" enctype="multipart/form-data">
                <!-- <input type="file" name="file" id="file">
                <input type="submit" value="Thêm dữ liệu từ file excel" name="submit"> -->
                <div class="input-group">
                    <input type="file" class="form-control" id="inputGroupFile04" name="file" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04" name="submit">Thêm</button>
                </div>
            </form>
        </div>
        <form method="post" action="">
            <select name="filter" id="">
                <option value="all">Lựa chọn phân quyền:</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
                <option value="all">All</option>
            </select>
            <input type="submit" name="submit" value="Lọc">
        </form>

        <form class="mx-3" action="index.php?action=user&act=user_search" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search-email" placeholder="Tìm Email">
                <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Button</button>
            </div>
        </form>

        <form class="mx-3" action="index.php?action=user&act=user_search" method="post">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search-sodienthoai" placeholder="Tìm số điện thoại">
                <button class="btn btn-outline-secondary" type="submit" name="submit" id="button-addon2">Button</button>
            </div>
        </form>
    </div>
    <?php

    $filter = "all";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['filter'])) {
            $filter = $_POST['filter'];
        }
    }
    ?>

    <table class="table align-middle table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ & Tên Đệm</th>
                <th>Tên</th>
                <th>Số Điện Thoại</th>
                <th>Ngày Sinh</th>
                <th>Email</th>
                <th>Mật Khẩu</th>
                <th>Vai Trò</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $khachhang = new Users();
            if (isset($_GET['act']) == 'search_user') {
                if (isset($_POST['search-email'])) {
                    $str = trim($_POST['search-email']);
                    // echo $str;
                    $result = $khachhang->searchEmailUser($str);
                    if (!$result) {
                        echo 'Không tim thấy';
                    }
                } else if (isset($_POST['search-sodienthoai'])) {
                    $str = trim($_POST['search-sodienthoai']);
                    $result = $khachhang->searchPhoneUser($str);
                } else {
                    $result = $khachhang->getUserAdmin($filter);
                }
            } else {
                $result = $khachhang->getUserAdmin($filter);

                if ($filter == 'all') {
                    $khachhang = new Users();
                    $result = $khachhang->getListUsers();
                }
            }

            while ($set = $result->fetch()) :
            ?>
                <tr class="
                    <?php if(isset($_SESSION['id'])) {
                        if($_SESSION['id'] == $set['customer_id']) {
                            echo 'table-success';
                        }
                    } ?>
                ">
                    <td><?php echo $set['id_khachhang'] ?></td>
                    <td><?php echo $set['Ho'] ?></td>
                    <td><?php echo $set['Ten'] ?></td>
                    <td><?php echo $set['SoDienThoai'] ?></td>
                    <td><?php echo $set['NgaySinh'] ?></td>
                    <td><?php echo $set['Email'] ?></td>
                    <td><?php echo $set['MatKhau'] ?></td>
                    <td><?php echo $set['VaiTro'] ?></td>
                    <td>
                        <a class="btn btn-warning" href="index.php?action=user&act=user_update&id_user=<?php echo $set['id_khachhang'] ?>">
                            Sửa
                        </a>
                    </td>
                    <td>
                        <?php 
                            if(isset($_SESSION['roll']) && $_SESSION['roll'] == 'admin'):
                        ?>
                            <a class="btn btn-danger" href="index.php?action=user&act=delete_action&id_user=<?php echo $set['id_khachhang'] ?>" onclick="return confirm('Bạn có muốn xóa <?php echo $set['Ho'] . ' ' . $set['Ten'] ?> ?')">
                            Xóa
                        </a>        
                        <?php 
                            else:
                        ?>
                        <a class="btn btn-secondary" href="#" onclick="alert('Bạn không có quyền xóa')">
                            Xóa
                        <?php
                            endif;
                        ?>
                    </td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>