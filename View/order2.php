<div class="container">
    <div class="d-flex justify-content-between">
        <div>
            <h3>Chọn sản phẩm</h3>
        </div>
        <div class="progress" style="width: 60%">
            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div>
            <h3>Hoàn thành</h3>
        </div>
    </div>

    <div class="check_info">
        <form action="index.php?action=order2&act=order_action" method="POST">
            <div class="row">
                <div class="col-md-3">
                    <label for="voucher_code" class="form-label">Voucher Code</label>
                    <input type="text" class="form-control" name="voucher_code" value="<?php  ?>">
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Tạo form nhập thông tin: số điện thoại, địa chỉ, xem lại danh sách sản phẩm đã đặt ( nếu trong db có rồi thì đưa ra form check lại ) 
-> nhập mã giảm giá và tính lại tổng tiền
-> chọn phương thức thanh toán 
-> thanh toán thành công -->