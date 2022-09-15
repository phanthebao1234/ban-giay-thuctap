<div class="container">
    <form action="index.php?action=auth&act=login_action" method="POST" >
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" class="form-control" id="email" name="name" required>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>
    </form>
    <a href="index.php?action=auth&act=reset">Quên mật khẩu</a>
</div>