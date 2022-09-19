<div class="container-fluid">
    <h1 class="text-capitalize">Danh sách người dùng</h1>
    <div class="d-flex justify-content-between flex-row mt-3">
        <div>
            <?php 
                if($_SESSION['roll'] == 'admin'){
                    echo '<a class="btn btn-success" href="index.php?action=users&act=insert">Thêm Mới</a>
                        <a href="index.php?action=user&act=import" class="btn btn-info me-3">&uArr; Nhập CSV</a>
                        <a href="index.php?action=user&act=export" class="btn btn-success">&dArr; Xuất file Excel</a>';
                } else {
                    echo '<a href="#" onclick="myAlertRoll()" class="btn btn-success">Thêm Mới</a>
                    <a href="#" onclick="myAlertRoll()" class="btn btn-info">&uArr; Nhập CSV</a>
                    <a href="#" onclick="myAlertRoll()" class="btn btn-success">&dArr; Xuất file Excel</a>';
                }
            ?>
            <!-- <a href="index.php?action=users&act=insert" class="btn btn-primary me-3">&plus; Thêm mới</a>
            <a href="index.php?action=user&act=import" class="btn btn-info me-3">&uArr; Nhập CSV</a>
            <a href="index.php?action=user&act=export" class="btn btn-success">&dArr; Xuất file Excel</a> -->
        </div>
        <a class="text-decoration-underline fst-italic" href="index.php?action=users&act=restore">Các người dùng đã xóa <i class="fas fa-lg fa-trash-alt"></i></a>
    </div>
    <table class="table table-bordered table-hover my-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Render</th>
                <th>Birth Date</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Password</th>
                <th>Address</th>
                <th>Status</th>
                <th>Roll</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $users = new User();
                $results = $users->getListUsers();
                while($set = $results->fetch()):
            ?>
            <tr class="
                    <?php if(isset($_SESSION['id'])) {
                        if($_SESSION['id'] == $set['user_id']) {
                            echo 'table-success';
                        }
                    } ?>
                ">
                <td>
                    <?php echo $set['user_id']; ?>
                </td>
                <td><?php echo $set['user_firstname']; ?></td>
                <td><?php echo $set['user_lastname']; ?></td>
                <td>
                    <?php 
                        if($set['user_render'] == 0){
                            echo 'Nam';
                        } else {
                            echo 'Nữ';
                        }
                    ?>
                </td>
                <td><?php echo $set['user_birthday']; ?></td>
                <td><?php echo $set['user_phonenumber']; ?></td>
                <td><?php echo $set['user_email']; ?></td>
                <td><?php echo $set['user_password']; ?></td>
                <td>
                    <?php 
                        $address = new Address();
                        $result = $address-> getDetailAddress($set['user_address']);
                        echo $result['address'];
                    ?>
                </td>
                <td>
                    <?php 
                        if($set['user_status'] == 1) {
                            echo '<button class="btn btn-success">Active</button>';
                        } else {
                            echo '<button class="btn btn-danger">Active</button>';
                        }

                    ?>
                </td>
                
                <td><?php echo $set['user_roll']; ?></td>
                <td>
                    <a href="index.php?action=users&act=edit&id=<?php echo $set['user_id']; ?>" class="btn btn-warning">Sửa</a>
                </td>
                <td>
                    <?php 
                        if(isset($_SESSION['id'])) {
                            if($_SESSION['roll'] == 'user' ) {
                                echo '<a href="#" onclick="myAlertRoll()" class="btn btn-secondary">Xóa</a>';
                            }
                            else  if($_SESSION['id'] == $set['user_id']) {
                                echo '<a href="#" onclick="myAlertDele()" class="btn btn-secondary">Xóa</a>';
                            }
                            else {
                                echo '<a href="index.php?action=users&act=delete_confirm&id='.$set['user_id'].'" class="btn btn-danger">Xóa</a>';
                            }
                        }
                    ?>
                </td>
            </tr>
            <?php
                endwhile;
            ?>
        </tbody>
    </table>
</div>

<script>
    function myAlertRoll() {
        alert("Bạn không có quyền thực hiện điều này!")
    }

    function myAlertDele() {
        alert("Bạn không thể xóa tài khoản của bạn!")
    }
</script>