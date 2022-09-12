<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">GiàyShop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?action=product">Quản lý sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?action=user">Quản lý khách hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?action=customer">Quản lý Customer</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?action=users">Quản lý User</a>
        </li>
      </ul>
    </div>
    <div class="auth">
      <?php
        
        if(isset($_SESSION['id'])) {
          echo 'Thông tin cá nhân '.$_SESSION['lastname'];
          echo '<a href="index.php?action=auth&act=logout_action">Logout</a>';
        } else {
          echo '<a href="index.php?action=auth&act=login">Đăng nhập</a>';
        }
      ?>
    </div>
  </div>
</nav>