<div class="container-fluid">
    <h1 class="text-capitalize">Danh sách người dùng</h1>
    <div class="d-flex justify-content-between flex-row mt-3">
        <div>
            <a href="index.php?action=users&act=insert" class="btn btn-primary me-3">&plus; Thêm mới</a>
            <a href="index.php?action=user&act=import" class="btn btn-info me-3">&uArr; Nhập CSV</a>
            <a href="index.php?action=user&act=export" class="btn btn-success">&dArr; Xuất file Excel</a>
        </div>
        <a class="text-decoration-underline fst-italic" href="index.php?action=users&act=restore">Các người dùng đã xóa <i class="fas fa-lg fa-trash-alt"></i></a>
    </div>
    <table class="table table-striped table-bordered table-hover my-3">
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
            <tr>
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
                <td><?php echo $set['user_address']; ?></td>
                <td>
                    <?php 
                        if($set['user_status'] == 0) {
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
                    <a href="index.php?action=users&act=delete" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa User có ID: <?php echo $set['user_id']?>')">Xóa</a>
                </td>
            </tr>
            <?php
                endwhile;
            ?>
        </tbody>
    </table>
</div>