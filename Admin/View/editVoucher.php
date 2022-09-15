<?php 
    $act = '';
    $title = '';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
        if($act == 'insert') {
            $title = 'Thêm Voucher';
        } else if($act == 'update') {
            $title = 'Cập nhật Voucher';
            if(isset($_GET['id'])) {
                $voucher_id = $_GET['id'];
                echo $voucher_id;
                $voucher = new Voucher();
                $result = $voucher-> getDetailVoucher($voucher_id);
                $voucher_code = $result['voucher_code'];
                $voucher_name = $result['voucher_name'];
                $voucher_start = $result['voucher_start'];
                $voucher_end = $result['voucher_end'];
                $voucher_sale = $result['voucher_sale'];
                $voucher_count = $result['voucher_count'];
            }
        } else {
            $title = 'Không tìm thấy trang';
        }
    }
?>

<div class="container">
    <a class="btn btn-info" href="index.php?action=voucher">Hủy</a>
    <h1 class="text-center text-primary text-capitalize">
        <?php echo $title;?>
    </h1>
    <?php 
        if($act == 'insert') {
            echo '<form method="POST" action="index.php?action=voucher&act=insert_action" >';
        } else if($act == 'update') {
            echo '<form method="POST" action="index.php?action=voucher&act=update_action">';
        } else {
            echo '<form>';
        }
    ?>
    <form>
        <div class="row">
            <input type="hidden" name="voucher_id" value="<?php if(isset($voucher_id)) echo $voucher_id;?>">
            <div class="col-md-3">
                <label for="voucher_code" class="form-label">Voucher Code</label>
                <input type="text" class="form-control" name="voucher_code" value="<?php if (isset($voucher_id)) echo $voucher_code ?>">
            </div>
            <div class="col-md-9">
                <label for="voucher_name" class="form-label">Voucher Name</label>
                <input type="text" class="form-control" name="voucher_name" value="<?php if (isset($voucher_id)) echo $voucher_name ?>">
            </div>
            <div class="col-md-3">
                <label for="voucher_start" class="form-label">Voucher Start Date</label>
                <input type="date" class="form-control" name="voucher_start" value="<?php if (isset($voucher_id)) echo $voucher_start ?>">
            </div>
            <div class="col-md-3">
                <label for="voucher_end" class="form-label">Voucher End Date</label>
                <input type="date" class="form-control" name="voucher_end" value="<?php if (isset($voucher_id)) echo $voucher_end ?>">
            </div>
            <div class="col-md-3">
                <label for="voucher_sale" class="form-label">Voucher Sale (%)</label>
                <input type="number" step="0.1" class="form-control" name="voucher_sale" value="<?php if (isset($voucher_id)) echo $voucher_sale ?>">
            </div>
            <div class="col-md-3">
                <label for="voucher_count" class="form-label">Voucher Count</label>
                <input type="number" class="form-control" name="voucher_count" value="<?php if (isset($voucher_id)) echo $voucher_count ?>">
            </div>
            <div class="col-md-3">
                <label for="voucher_status" class="form-label">Voucher Status</label>
                <select class="form-select" aria-label="Default select example" name="voucher_status">
                    <option selected>Open this select status</option>
                    <option value="1">Active</option>
                    <option value="0">No Active</option>
                </select>
            </div>
            <div class="col-md-12 d-flex justify-content-center my-3">
                <?php 
                    if($act == 'insert') {
                        echo '<button type="submit" class="btn btn-primary">Thêm voucher</button>';
                    } else if($act == 'update') {
                        echo '<button type="submit" class="btn btn-primary">Cập nhật voucher</button>';
                    }
                ?>
            </div>
        </div>
       
    </form>
</div>