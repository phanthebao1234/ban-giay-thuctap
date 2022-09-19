<div class="container border border-1 border-danger shadow-lg p-3 mb-5 bg-body rounded">
    <h1 class="text-danger fw-bold text-capitalize text-center">Đăng nhập</h1>
    <form class="row g-3 my-4" action="index.php?action=auth&act=login_action" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="email" class="form-label">Tài khoản email hoặc số điện thoại</label>
            <input type="text" class="form-control" id="email" name="name" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary text-capitalize" name="submit">Đăng nhập</button>
            <p class="fst-italic mt-3">
                <a href="index.php?action=auth&act=reset">Quên mật khẩu</a> |
                <a href="index.php?action=auth&act=resgister">Tạo tài khoản</a>
            </p>
        </div>
    </form>
    
</div>