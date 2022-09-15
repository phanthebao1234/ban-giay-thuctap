<div class="container">
    <h2 class="text-center text-danger fw-bold text-capitalize">Đăng nhập với vai trò quản trị viên</h2>
    <form action="index.php?action=auth&act=login_action" method="POST" class="my-3" >
        <div class="mb-3">
            <label for="name" class="form-label">Email address or Phone Number</label>
            <input type="text" class="form-control" id="name" name="name" required>
            <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-lg" name="submit">Login</button>
    </form>
    <a href="index.php?action=auth&act=reset">Quên mật khẩu</a>
</div>