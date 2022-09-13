<div class="container-fluid">
    <?php
    if (!isset($_SESSION['cart'])  || count($_SESSION['cart']) == 0) {
        echo '<p class="text-danger">Bạn chưa có sản phẩm nào trong giỏ hàng</p>';
    }
    ?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Hinh sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng sản phẩm</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($_SESSION['cart'] as $key => $item) :
                $i++;
            ?>
                <tr>
                    <form action="index.php?action=cart&act=update&id=<?php echo $item['product_id'] ?>" method="POST">
                        <td>
                            <?php echo $i ?>
                        </td>
                        <td>
                            <?php echo $item['product_name'] ?>
                        </td>
                        <td>
                            <img src="Content/images/<?php echo $item['product_image'] ?>" alt="" style="width: 40%" rowspan="2">
                        </td>
                        <td>
                            <?php echo  number_format($item['product_price']) ?>
                        </td>
                        <td>
                            <input type="number" name="newqty[<?php echo $item['product_id'] ?>]" value="<?php echo $item['product_quantity'] ?>">
                        </td>
                        <td>
                            <button class="btn btn-primary" type="submit" name="submit">Cập nhật</button>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="index.php?action=cart&act=delete&id=<?php echo $item['product_id'] ?>" onclick="return confirm('Bạn có chắc chắn xóa')">Xóa</a>
                        </td>
                    </form>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="d-flex">
        <h3 class="">Tổng tiền:
            <?php
            echo getTotal();
            ?>
        </h3>
        <div class="voucher">
            <form method="get" action="index.php?action=voucher&act=voucher_action" id="voucher-form">
                <div class="input-group flex-nowrap">
                    <input type="text" class="form-control" placeholder="Nhập mã giảm giá" name="voucher_code" id="voucher_code">
                    <button type="submit" class="btn btn-danger" id="submit" name="submit">Nhập voucher</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    if (isset($_SESSION['customer_id'])) {
        echo '<a class="btn btn-danger" href="index.php?action=order&act=order_detail">Tiến hành thanh toán</a>';
    } else {
        echo '<a class="btn btn-warning" href="index.php?action=auth&act=login">Vui lòng đăng nhập trước khi thanh toán</a>';
    }
    ?>
</div>

<script>
    $('#voucher-form').submit(function(e) {
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');
        console.log(actionUrl);
        $.ajax({
            method: "get",
            url: actionUrl,
            data: form.serialize(),
            
            // serializes the form's elements.
            // success: function(data) {
            //     alert(data); // show response from the php script.
            // }
        });
    })
   
</script>