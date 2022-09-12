<nav class="navbar navbar-expand-lg text-danger " style="height: 90px; margin-bottom: 40px">
  <div class="container-fluid">
    <a class="navbar-brand text-danger" href="#">GiàyShopVN</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php?action=home&act=home">Trang Chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=home&act=sanpham">Sản Phẩm</a>
        </li>
       
      </ul>
      <div class="d-flex">
        <?php
          if(isset($_SESSION['customer_id'])) {
            echo $_SESSION['customer_firstname'];
            echo '<a href="index.php?action=auth&act=logout_action">Logout</a>';
          } else {
            echo '<a class="btn btn-success " href="index.php?action=auth">Login</a>';
          }
        ?>
        
      </div>
    </div>
  </div>
</nav>