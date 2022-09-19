<?php
$act = '';
$title = '';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == 'insert') {
        $title = 'Thêm mới khách hàng';
    } else if ($act == 'update') {
        $title = 'Cập nhật khách hàng';
        if (isset($_GET['customer_id'])) {
            $customer_id = $_GET['customer_id'];
            $customer = new Customers();
            $result = $customer->getCustomer($customer_id);
            $customer_firstname = $result['customer_firstname'];
            $customer_lastname = $result['customer_lastname'];
            $customer_render = $result['customer_render'];
            $customer_email = $result['customer_email'];
            $customer_phone = $result['customer_phonenumber'];
            $customer_password = $result['customer_password'];
            $customer_birthday = $result['customer_birthday'];
            $customer_address = $result['customer_address'];
            $customer_image = $result['customer_image'];
        }
    } else {
    }
}

?>

<div class="container mt-3">
    <h1 class="">
        <?php
            echo $title;
        ?>
    </h1>
    <?php
    if ($act == 'insert') {
        echo '<form action="index.php?action=customer&act=insert_action" method="POST" enctype="multiple/form-data">';
    } else if ($act == 'update') {
        echo '<form action="index.php?action=customer&act=update_action" method="POST" enctype="multiple/form-data">';
    }
    ?>
    <form>
        <div class="row">
            <input type="hidden" class="form-control" name="id" value="<?php if (isset($customer_id)) echo $customer_id ?>">
            <div class="col-md-3">
                <label for="phone" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" value="<?php if (isset($customer_id)) echo $customer_firstname ?>">
            </div>
            <div class="col-md-7">
                <label for="phone" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" value="<?php if (isset($customer_id)) echo $customer_lastname ?>">
            </div>
            <div class="col-md-3 mt-4">
                <select class=""  name="render" value="<?php if(isset($customer_id)) echo $customer_render ?>">
                    <option selected value="0">Select Render:</option>
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" name="phone" value="<?php if (isset($customer_id)) echo $customer_phone ?>">
            </div>
            <div class="col-md-3">
                <label for="phone" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" name="birthday" value="<?php if (isset($customer_id)) echo $customer_birthday ?>">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php if (isset($customer_id)) echo $customer_email ?>">
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" value="<?php if (isset($customer_id)) echo $customer_password ?>">
            </div>
            <div class="col-md-12">
                <label for="phone" class="form-label">Address</label>
                <input type="text" class="form-control" id="đia chỉ " name="address" value="<?php if (isset($customer_id)) echo $customer_address ?>">
            </div>
            <div class="col-md-6">
                <label for="" class="form-label">Image</label>
                <div class="d-block">
                    <img src="../../Content/images/<?php if (isset($customer_id)) echo $customer_image ?>" alt="" id="showImage" width="30%              ">
                </div>
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

<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        console.log(input.files[0]);
        var reader = new FileReader();
            
        reader.onload = function (e) {
            $('#showImage').attr('src', e.target.result).width(150).height(200);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
  
</script>