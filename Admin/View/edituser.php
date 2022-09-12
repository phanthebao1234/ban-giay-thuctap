<?php
if (isset($_GET['act'])) {
    if ($_GET['act'] == 'user_insert') {
        $ac = 'insert';
    } else if ($_GET['act'] == 'user_update') {
        $ac = 'update';
    } else {
        $ac = null;
    }
}

if (isset($_GET['id_user'])) {
    // $id_random = uniqid();
    // echo $id_random;
    // printf("uniqid(): %s\r\n", uniqid());
    $id_khachhang = $_GET['id_user'];
    $khachhang = new Users();
    $result = $khachhang->getUserId($id_khachhang);
    $ho = $result['Ho'];
    $ten = $result['Ten'];
    $sodienthoai = $result['SoDienThoai'];
    $ngaysinh = $result['NgaySinh'];
    $email = $result['Email'];
    $matkhau = $result['MatKhau'];
    $vaitro = $result['VaiTro'];
}
?>

<div class="container">

    <div class="edit">
        <div class="edit_title">
            <?php
            if ($ac == 'insert') {
                echo '<h1>Thêm người dùng mới</h1>';
            } else if ($ac == 'update') {
                echo '<h1>Cập nhật người dùng</h1>';
            }
            ?>
        </div>
        <div class="edit_form">
            <?php
            if ($ac == 'insert') {
                echo '<form method="post" action="index.php?action=user&act=insert_action">';
            } else if ($ac == 'update') {
                echo '<form method="post" action="index.php?action=user&act=update_action">';
            }
            ?>

            <div class="col-md-6">
                <label for="ho">ID khách hàng</label>
                <input type="text" class="form-control" id="ho" name="id_khachhang" value='<?php if (isset($id_khachhang)) echo $id_khachhang?>' readonly>
            </div>
            <div class="col-md-6">
                <label for="ho">Họ & Tên Đệm</label>
                <input type="text" class="form-control" id="ho" name="ho" value='<?php if (isset($id_khachhang)) echo $ho ?>'>
            </div>
            <div class="col-md-6">
                <label for="ten">Tên</label>
                <input type="text" class="form-control" id="ten" name="ten" value='<?php if (isset($id_khachhang)) echo $ten ?>'>
            </div>
            <div class="col-md-6">
                <label for="sodienthoai">Số điện thoại</label>
                <input type="number" class="form-control" id="sodienthoai" name="sodienthoai" value='<?php if (isset($id_khachhang)) echo $sodienthoai ?>'>
            </div>
            <div class="col-md-3">
                <label for="date">Ngày sinh</label>
                <input type="date" class="form-control" id="date" name="ngaysinh" value='<?php if (isset($id_khachhang)) echo $ngaysinh ?>'>
            </div>
            <div class="col-md-6">
                <label for="email">Địa chỉ email</label>
                <input type="email" class="form-control" id="email" name="email" value='<?php if (isset($id_khachhang)) echo $email ?>'>
            </div>
            <div class="col-md-6">
                <label for="matkhau">Mật Khẩu</label>
                <input type="text" class="form-control" id="matkhau" name="matkhau" value='<?php if (isset($id_khachhang)) echo $matkhau ?>'>
            </div>
            <div class="col-md-6">
                <select class="form-select" name="vaitro" aria-label="Default select example">
                    <option selected>Phân quyền</option>
                    <option value="user">Người dùng</option>
                    <option value="admin">Quản trị</option>
                </select>
            </div>
            <?php
            if ($ac == 'insert') {
                echo '<input type="submit" name="submit" value="Thêm người dùng" class="btn btn-primary">';
            } else if ($ac == 'update') {
                echo '<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">';
            } else {
                echo '<div class=""><h3> KHÔNG CÓ TRANG NÀO</h3></div>';
            }
            ?>
            </form>
        </div>
    </div>
</div>