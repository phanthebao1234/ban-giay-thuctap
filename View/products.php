<div class="container-fluid my-3">
    <div class="row text-center">
    <?php
        $sanpham = new Products();
        $results = $sanpham->getListProducts();
        while($set = $results->fetch()):
    ?>
      <div class="col-sm-4">
        <div class="thumbnail">
          <img src="../Content/images/<?php echo $set['HinhSanPham']?>" alt="Paris" width="400" height="300">
          <p><strong><?php echo $set['ThuongHieu']?></strong></p>
          <p><a href="index.php?action=home&act=detail&id_product=<?php echo $set['id_sanpham']?>">
            <?php echo $set['TenSanPham'] ?>
          </a> </p>
          <button class="btn" data-toggle="modal" data-target="#myModal">Giá: <?php echo number_format($set['GiaSanPham']);?>đ</button>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
</div>