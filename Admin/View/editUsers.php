<?php
$act = '';
$title = '';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == 'insert') {
        $title = 'Thêm người dùng mới';
    } else if ($act == 'edit') {
        $title = 'Cập nhật người dùng';
        if(isset($_GET['id'])) {
            $user_id = $_GET['id'];
            $user = new User();
            $result = $user->getUser($user_id);
            $user_firstname = $result['user_firstname'];
            $user_lastname = $result['user_lastname'];
            $user_render = $result['user_render'];
            $user_birthday = $result['user_birthday'];
            $user_phone = $result['user_phonenumber'];
            $user_email = $result['user_email'];
            $user_password = $result['user_password'];
            $user_address = $result['user_address'];
            $user_status = $result['user_status'];
            $user_roll = $result['user_roll'];  
        }
    } else {
        echo 'Không tìm thấy id !';
    }
} else {
    echo 'Không tìm thấy trang !';
}


?>

<div class="container">
    <h1 class="text-center text-primary text-capitalize">
        <?php if (strlen($title) > 0) echo $title; ?>
    </h1>
    <?php
    if ($act == 'insert') {
        echo '<form action="index.php?action=users&act=insert_action" method="POST" enctype="multiple/form-data">';
    } else if ($act == 'edit') {
        echo '<form action="index.php?action=users&act=update_action" method="POST" enctype="multiple/form-data">';
    }
    ?>
    <form>
            <div class="row">
            <input type="hidden" class="form-control" name="user_id" value="<?php if (isset($user_id)) echo $user_id ?>">
            <div class="col-md-3">
                <label for="phone" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" value="<?php if (isset($user_id)) echo $user_firstname ?>">
            </div>
            <div class="col-md-7">
                <label for="phone" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" value="<?php if (isset($user_id)) echo $user_lastname ?>">
            </div>
            <div class="col-md-3 mt-4">
                <select class="" name="render" value="<?php if (isset($user_id)) echo $user_render ?>">
                    <option selected value="0">Select Render:</option>
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </div>
            <div class="col-md-2 mt-4">
                <select class="" name="roll" value="<?php if (isset($user_id)) echo $user_roll ?>">
                    <option selected value="0">Select Roll:</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php if (isset($user_id)) echo $user_phone ?>">
            </div>
            <div class="col-md-3">
                <label for="phone" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" name="birthday" value="<?php if (isset($user_id)) echo $user_birthday ?>">
            </div>
            
            <div class="col-md-6">
                <label for="phone" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php if (isset($user_id)) echo $user_email ?>">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" value="<?php if (isset($user_id)) echo $user_password ?>">
            </div>
            <div class="col-md-12">
                <label for="phone" class="form-label">Address</label>
                <input type="text" class="form-control" id="đia chỉ " name="address" value="<?php if (isset($user_id)) echo $user_address ?>">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Image</label>
                <img src="../../Content/images/<?php if (isset($user_id)) echo $user_image ?>" alt="">
                <!-- <input type="file" class="form-control" name="image"> -->
                <input class="form-control form-control-lg" id="image" name="image" type="file" onchange="readURL(this);">
            </div>
            <div class="col-md-12">
                <input class="btn btn-primary" type="submit" class="form-control" name="<?php
                                                                                        if ($act == 'insert') {
                                                                                            echo 'Thêm';
                                                                                        } else if ($act == 'update') {
                                                                                            echo 'Cập nhật';
                                                                                        } else {
                                                                                            echo '';
                                                                                        }
                                                                                        ?>">
            </div>
        </div>
    </form>
</div>