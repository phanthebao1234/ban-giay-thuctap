<div class="container">
    <?php 
        if(!isset($_SESSION['cart'])  || count($_SESSION['cart']) == 0) {
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
            $i= 0;
                foreach($_SESSION['cart'] as $key => $item):
                    $i++;
            ?>
            <tr>
                <form action="index.php?action=cart&act=update&id=<?php echo $item['product_id']?>" method="POST">
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
                        <input type="number" name="newqty[<?php echo $item['product_id']?>]" value="<?php echo $item['product_quantity'] ?>">
                    </td>
                    <td>
                        <button class="btn btn-primary"type="submit" name="submit">Cập nhật</button>
                    </td>
                    <td>
                        <a href="index.php?action=cart&act=delete&id=<?php echo $item['product_id'] ?>">Xóa</a>
                    </td>
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h3 class="">Tổng tiền: 
        <?php 
            echo getTotal();
        ?>
    </h3>
    <?php 
        if(isset($_SESSION['customer_id'])) {
            echo '<a href="index.php?action=order&act=order_detail">Thanh toán</a>';
        } else {
            echo '<a href="index.php?action=auth&act=login">Vui lòng đăng nhập trước khi thanh toán</a>';
        }
    ?>
</div>