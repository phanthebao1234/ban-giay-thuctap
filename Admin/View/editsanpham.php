<?php
if (isset($_GET['act'])) {
    
    if ($_GET['act'] == 'insert_product') {
        $ac = 'insert';
    } elseif ($_GET['act'] == 'update_product') {
        $ac = 'update';
    } else {
        $ac = null;
    }

    
}

if (isset($_GET['id_sanpham'])) {
    $id_sanpham = $_GET['id_sanpham'];
    $sanpham = new Products();
    $result = $sanpham -> getProductID($id_sanpham);
    $tensanpham = $result['TenSanPham'];
    $giasanpham = $result['GiaSanPham'];
    $hinh_sanpham = $result['HinhSanPham'];
    $mota = $result['MoTa'];
    $size = $result['Size'];
    $thuonghieu = $result['ThuongHieu'];
    $tonkho = $result['TonKho'];
}
?>

<div class="container">
    <div class="edit">
        <div class="edit_title">
            <h1>
                <?php
                    if ($ac == 'insert') {
                        echo 'Thêm sản phẩm mới';
                    } else if ($ac == 'update') {
                        echo 'Cập nhật sản phẩm';
                    } else {
                        echo 'Not Found';
                    }
                ?>
            </h1>
        </div>
        <div class="edit_form">
            <?php
                if ($ac == 'insert') {
                    echo '<form action="index.php?action=product&act=insert_action" method="POST" enctype="multipart/form-data" class="row g-3">';
                }
                else if ($ac == 'update') {
                    echo '<form action="index.php?action=product&act=update_action" method="POST" enctype="multipart/form-data" class="row g-3">';
                }
            ?>
            <form>
                <div class="col-md-3">
                    <label for="id_sanpham" class="form-label">ID</label>
                    <input type="text" class="form-control"  id="id_sanpham" name="id_sanpham" value="<?php if(isset($id_sanpham)) echo $id_sanpham; ?>" readonly>
                </div>
                <div class="col-12">
                    <label for="tensanpham" class="form-label">Tên Sản Phẩm</label>
                    <input type="text" class="form-control " id="tensanpham" name="tensanpham" value="<?php if(isset($id_sanpham)) echo $tensanpham; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="thuonghieu" class="form-label">Thương Hiệu</label>
                    <input type="text" class="form-control" id="thuonghieu" name="thuonghieu" value="<?php if(isset($id_sanpham)) echo $thuonghieu; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="giasanpham" class="form-label">Giá Sản Phẩm</label>
                    <input type="text" class="form-control" id="giasanpham" name="giasanpham" value="<?php if(isset($id_sanpham)) echo $giasanpham; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="size" class="form-label">Size</label>
                    <input type="text" class="form-control" id="size" name="size" value="<?php if(isset($id_sanpham)) echo $size; ?>" required>
                </div>
                <div class="col-md-3">
                    <label for="tonkho" class="form-label">Tồn Kho</label>
                    <input type="text" class="form-control" id="tonkho" name="tonkho" value="<?php if(isset($id_sanpham)) echo $tonkho; ?>" required>
                </div>
                <div class="col-12">
                    <h5>Hình sản phẩm</h5>
                    <div class="d-flex justify-content-between">
                        <?php if (isset($id_sanpham)): 
                            $arrayImg = explode(';', $hinh_sanpham);
                            foreach ($arrayImg as $key => $value):

                            
                        ?>
                        <img src="../../Content/images/<?php echo $value; ?>" alt="" width="20%" id="showImage"><br>
                        <?php 
                            endforeach;
                            endif; 
                        ?>
                    </div>
                    <label for="image" class="form-label">Chọn file để upload</label>
                    <input class="form-control form-control-lg" id="image" name="image[]" multiple type="file" onchange="readURL(this);" value="<?php if(isset($id_sanpham)) echo $hinh_sanpham ?>">
                </div>
               <div class="col-md-12">
                <label for="">Mô tả</label>
                <textarea id="editor" name="mota">
                    <?php if(isset($id_sanpham)) echo $mota; ?>
                </textarea>
               </div>
                <?php
                if ($ac == 'insert') {
                    echo '<input type="submit" name="submit" value="Thêm sản phẩm" class="btn btn-primary">';
                } else if ($ac == 'update') {
                    echo '<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">';
                } else {
                    echo '<div class=""><h3> KHÔNG CÓ TRANG NÀO</h3></div>';
                }
                ?>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );

    function readURL(input) {
    if (input.files && input.files[0]) {
        const arrayInput = Array.from(input.files)
        console.log(arrayInput);
        arrayInput.forEach((image, index) => {
            var reader = new FileReader();
                
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result).width(150).height(200);
            };
            reader.readAsDataURL(arrayInput[index]);
        });

    }
  }
  
</script>