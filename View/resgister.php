<div class="container border border-1 border-danger shadow-lg p-3 mb-5 bg-body rounded">
    <h1 class="text-danger fw-bold text-capitalize text-center">Tạo tài khoản</h1>
    <div class="container">
        <form class="row g-3 my-4" action="index.php?action=auth&act=resgister_action" method="POST" enctype="multipart/form-data">
            <div class="col-md-6">
                <label for="customer_firstname" class="form-label">Họ & Tên Đệm<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="customer_firstname" name="customer_firstname">
            </div>
            <div class="col-md-6">
                <label for="customer_lastname" class="form-label">Tên<span class="text-danger">*</span></label>
                <input type="customer_lastname" class="form-control" id="customer_lastname" name="customer_lastname">
            </div>
            <div class="col-md-6">
                <label for="customer_email" class="form-label">Tài khoản email<span class="text-danger">*</span></label>
                <input type="customer_email" class="form-control" id="customer_email" name="customer_email">
            </div>
            <div class="col-md-6">
                <label for="customer_password" class="form-label">Mật khẩu<span class="text-danger">*</span></label>
                <input type="customer_password" class="form-control" id="customer_password" name="customer_password">
            </div>
            <div class="col-md-4">
                <label for="country" class="form-label">Tỉnh<span class="text-danger">*</span></label>
                <select class="form-select" id="country-dropdown" name="tinh">
                    <option value="">Chọn Tỉnh</option>
                    <?php
                    $provinces = new Address();
                    $result = $provinces->getListProvince();
                    while ($set = $result->fetch()) :

                    ?>
                        <option value="<?php echo $set['code']; ?>"><?php echo $set["name"]; ?></option>
                    <?php
                    endwhile;
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">Thành phố <span class="text-danger">*</span></label>
                <select class="form-select" id="state-dropdown" name="thanhpho"></select>
            </div>
            <div class="col-md-3">
                <label for="city" class="form-label">Quận, Huyện, Xã <span class="text-danger">*</span></label>
                <select class="form-select" id="city-dropdown" name="xa"></select>
            </div>
            <div class="col-md-3">
                <label for="" class="form-label">Địa chỉ nhà<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="diachi" id="diachi">
            </div>
            <div class="col-md-6">
                <label for="customer_phone" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="customer_phone" name="customer_phone">
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">Giới tính</label>
                <select id="inputState" class="form-select" name="customer_render">
                    <option value="0" selected>Lựa chọn</option>
                    <option value="0">Nam</option>
                    <option value="1">Nữ</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="customer_birthday" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="customer_birthday" name="customer_birthday">
            </div>
            <div class="col-sm-3">
                <label for="customer_image" class="form-label">Ảnh cá nhân</label>
                <input type="file" class="form-control" id="customer_image" name="customer_image" placeholder="1234 Main St">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary text-capitalize" name="submit">Tạo tài khoản</button>
                <p><a href="index.php?action=auth&act=login" class="fst-italic">Đã có tài khoản</a></p>
            </div>
        </form>
    </div>
</div>

<script>
        $(document).ready(function() {
            $('#country-dropdown').on('change', function() {
                var province_id = this.value;
                $.ajax({
                    url: "View/districts.php",
                    type: "POST",
                    data: {
                        province_id: province_id
                    },
                    cache: false,
                    success: function(result){
                        $("#state-dropdown").html(result);
                        $('#city-dropdown').html('<option value="">Chọn quận, huyện, xã</option>'); 
                    }
                });
            });

            $('#state-dropdown').on('change', function() {
                var state_id = this.value;
                $.ajax({
                    url: "View/wards.php",
                    type: "POST",
                    data: {
                        state_id: state_id
                    },
                    cache: false,
                    success: function(result){
                        $("#city-dropdown").html(result);
                    }
                });
            });
        });
    </script>