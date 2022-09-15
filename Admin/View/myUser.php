<div class="container">
    <h3 class="my-3 text-capitalize fw-bold text-danger">Thông tin của bạn</h3>
    <h5 class="form-label text-success fw-bold">Phân quyền: <?php if(isset($_SESSION['roll'])) {
                if($_SESSION['roll'] == 'admin') {
                    echo 'Amin';
                } else {
                    echo 'User';
                }
            } ?></h5>
    <form class="row g-3 my-3" action="index.php?action=auth&act=update_action" method="POST">
        <div class="col-md-6">
            <label for="firstname" class="form-label">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php if(isset($_SESSION['firstname'])) echo $_SESSION['firstname']; ?>">
        </div>
        <div class="col-md-6">
            <label for="lastname" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php if(isset($_SESSION['lastname'])) echo $_SESSION['lastname']; ?>">
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="<?php if(isset($_SESSION['email'])) echo $_SESSION['email'] ?>">
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" value="<?php if(isset($_SESSION['password'])) echo $_SESSION['password'] ?>">
        </div>
        <div class="col-12">
            <label for="address" class="form-label">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="<?php if(isset($_SESSION['address'])) echo $_SESSION['address'] ?>">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php if(isset($_SESSION['phone'])) echo $_SESSION['phone'] ?>">
        </div>
        <div class="col-md-4">
            <label for="render" class="form-label">Render</label>
            <input type="text" class="form-control" id="render" name="render" value="<?php if(isset($_SESSION['render'])) {
                if($_SESSION['render'] == 1) {
                    echo 'Nam';
                } else {
                    echo 'Nữ';
                }
            }?>">
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-lg">Cập nhật thông tin</button>
        </div>
    </form>
</div>