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
    $result = $sanpham->getProductID($id_sanpham);
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
    <a class="btn btn-info" href="index.php?action=voucher">Hủy</a>
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
        <div id="message"></div>
        <div class="edit_form">
            <?php
            if ($ac == 'insert') {
                echo '<form id="form" action="#" method="POST" enctype="multipart/form-data" class="row g-3">';
            } else if ($ac == 'update') {
                echo '<form id="form" action="#" method="POST" enctype="multipart/form-data" class="row g-3">';
            }
            ?>
            <form>
                <input type="hidden" class="form-control" id="id_sanpham" name="id_sanpham" value="<?php if (isset($id_sanpham)) echo $id_sanpham; ?>">
                <div class="col-12">
                    <label for="tensanpham" class="form-label">Tên Sản Phẩm<span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="tensanpham" name="tensanpham" value="<?php if (isset($id_sanpham)) echo $tensanpham; ?>">
                    <span id="tensanpham_err" class="text-danger"></span>
                </div>
                <div class="col-md-3">
                    <label for="thuonghieu" class="form-label">Thương Hiệu<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="thuonghieu" name="thuonghieu" value="<?php if (isset($id_sanpham)) echo $thuonghieu; ?>">
                    <span id="thuonghieu_err" class="text-danger"></span>
                </div>
                <div class="col-md-3">
                    <label for="giasanpham" class="form-label">Giá Sản Phẩm<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="giasanpham" name="giasanpham" value="<?php if (isset($id_sanpham)) echo $giasanpham; ?>">
                    <span id="giasanpham_err" class="text-danger"></span>
                </div>
                <div class="col-md-3">
                    <label for="size" class="form-label">Size<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="size" name="size" value="<?php if (isset($id_sanpham)) echo $size; ?>">
                    <span id="size_err" class="text-danger"></span>
                </div>
                <div class="col-md-3">
                    <label for="tonkho" class="form-label">Tồn Kho<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tonkho" name="tonkho" value="<?php if (isset($id_sanpham)) echo $tonkho; ?>">
                    <span id="tonkho_err" class="text-danger"></span>
                </div>
                <div class="col-12">
                    <h5>Hình sản phẩm</h5>
                    <div class="d-flex justify-content-between">
                        <?php if (isset($id_sanpham)) :
                            $arrayImg = explode(';', $hinh_sanpham);
                            foreach ($arrayImg as $key => $value) :
                        ?>
                                <img src="../../Content/images/<?php echo $value; ?>" alt="" width="20%" id="showImage"><br>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <!-- <label for="image" class="form-label">Chọn file để upload</label>
                    <input class="form-control form-control-lg" id="image" name="image[]" multiple type="file" onchange="readURL(this);" value="<?php if (isset($id_sanpham)) echo $hinh_sanpham ?>"> -->
                    <input type="file" id='files' name="files[]" multiple><br>
                    <input type="button" id="submit" value='Upload'>
                    <div id='preview'></div>
                </div>
                <div class="col-md-12">
                    <label for="">Mô tả<span class="text-danger">*</span></label>
                    <textarea id="editor" name="mota">
                        <?php if (isset($id_sanpham)) echo $mota; ?>
                    </textarea>
                    <span id="mota_err" class="text-danger"></span>
                </div>
                <?php
                if ($ac == 'insert') {
                    echo '<input id="submit_create" type="button" name="submit" value="Thêm sản phẩm" class="btn btn-primary">';
                } else if ($ac == 'update') {
                    echo '<input id="submit_update" type="button" name="submit" value="Cập nhật" class="btn btn-primary">';
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
    $(document).ready(function() {
        $('#tensanpham').on('input', function() {
            checktensanpham();
        })

        $('#thuonghieu').on('input', function() {
            checkthuonghieu();
        })

        $('#giasanpham').on('input', function() {
            checkgiasanpham();
        })

        $('#size').on('input', function() {
            checksize();
        })

        $('#tonkho').on('input', function() {
            checktonkho();
        })

        $('#submit_create').click(function () {
            if(!checktensanpham() && !checkthuonghieu() && !checkgiasanpham() && !checksize() && !checktonkho()) {
                console.log('err1');
                $('#message').html('<div class="alert alert-warning">Vui lòng nhập đầy đủ thông tin sản phẩm</div>');
            } else if(!checktensanpham() || !checkthuonghieu() || !checkgiasanpham() || !checksize() || !checktonkho()) {
                console.log('err2');
                $('#message').html('<div class="alert alert-warning">Vui lòng nhập đầy đủ thông tin sản phẩm</div>');
            } else {
                console.log('ok');
                $('#message').html('');
                var form = $('#form')[0];
                var data = new FormData(form);
                $.ajax({
                    type: 'POST',
                    url: 'View/ajax/addProduct.php',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        $('#message').html(data);
                    },
                    complete: function() {
                        setTimeout(function() {
                            $('#form').trigger("reset");
                            $('#submitbtn').html('Submit');
                            $('#submitbtn').attr("disabled", false);
                            $('#submitbtn').css({
                                "border-radius": "4px"
                            });
                        }, 50000);
                    }
                })
            }
        })

        // $('#files').on('change', function() {
        //     upload();
        // })

        $('#submit_update').click(function () {
            if(!checktensanpham() && !checkthuonghieu() && !checkgiasanpham() && !checksize() && !checktonkho()) {
                console.log('err1');
                $('#message').html('<div class="alert alert-warning">Vui lòng nhập đầy đủ thông tin sản phẩm</div>');
            } else if(!checktensanpham() || !checkthuonghieu() || !checkgiasanpham() || !checksize() || !checktonkho()) {
                console.log('err2');
                $('#message').html('<div class="alert alert-warning">Vui lòng nhập đầy đủ thông tin sản phẩm</div>');
            } else {
                console.log('ok');
                $('#message').html('');
                var form = $('#form')[0];
                var data = new FormData(form);
                $.ajax({
                    type: 'POST',
                    url: 'View/ajax/updateProduct.php',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        $('#message').html(data);
                    },
                    complete: function() {
                        setTimeout(function() {
                            $('#form').trigger("reset");
                            $('#submitbtn').html('Submit');
                            $('#submitbtn').attr("disabled", false);
                            $('#submitbtn').css({
                                "border-radius": "4px"
                            });
                        }, 50000);
                    }
                })
            }
        })


        $('#submit').click(function() {
            var form_data = new FormData();
            /* Read selected files */
            var totalfiles = document.getElementById('files').files.length;
            for (var index = 0; index < totalfiles; index++) {
                form_data.append("files[]", document.getElementById('files').files[index]);
            }

            /* AJAX request */
            $.ajax({
                url: 'View/ajax/ajaxfile.php',
                type: 'post',
                data: form_data,
                dataType: 'json',
                contentType: false,
                processData: false,
                success: function(response) {

                    for (var index = 0; index < response.length; index++) {
                        var src = response[index];

                        /* Thêm 1 element là img vào trong div có id là preview */
                        $('#preview').append('<img src="' + src + '" width="200px;" height="200px">');
                    }

                }
            });

        });

        function checktensanpham() {
            var tensanpham = $('#tensanpham').val();
            if(tensanpham == "") {
                $('#tensanpham_err').html('Vui lòng nhập tên sản phẩm');
                return false;
            } else if(tensanpham.length <= 3) {
                $('#tensanpham_err').html('Tên sản phẩm quá ngắn')
                return false;
            } else {
                $('#tensanpham_err').html('');
                return true;
            }
        }

        function checkthuonghieu() {
            var thuonghieu = $('#thuonghieu').val();
            if(thuonghieu == "") {
                $('#thuonghieu_err').html('Vui lòng nhập thương hiệu sản phẩm');
                return false;
            } else if(thuonghieu.length <= 3) {
                $('#thuonghieu_err').html('Tên thương hiệu quá ngắn')
                return false;
            } else {
                $('#thuonghieu_err').html('');
                return true;
            }
        }

        function checkgiasanpham() {
            var floatValues =  /[+-]?([0-9]*[.])?[0-9]+/;
            var regex = /^(\$|)([1-9]\d{0,2}(\,\d{3})*|([1-9]\d*))(\.\d{2})?$/;
            var giasanpham = $('#giasanpham').val();
            var giaValid = regex.test(giasanpham);
            // var giavalid2 = floatValues.test(giasanpham);
            if(giasanpham == '') {
                $('#giasanpham_err').html('Giá sản phẩm không được để trống')
                return false;
            } else if (!giaValid) {
                $('#giasanpham_err').html('Giá sản phẩm chỉ chứ số');
                return false;
            } else {
                $('#giasanpham_err').html('')
                return true;
            }
        }

        function checksize() {
            var regex = /^(\$|)([1-9]\d{0,2}(\,\d{3})*|([1-9]\d*))(\.\d{2})?$/;
            var size = $('#size').val();
            var sizeValid = regex.test(size);
            if(size == '') {
                $('#size_err').html('Vui lòng nhập size');
                return false;
            } else if(!sizeValid) {
                $('#size_err').html('Size chỉ được nhập số')
                return false;
            } else {
                $('#size_err').html('')
                return true;
            }
        }

        function checktonkho() {
            var regex = /^(\$|)([1-9]\d{0,2}(\,\d{3})*|([1-9]\d*))(\.\d{2})?$/;
            var tonkho = $('#tonkho').val();
            var sizeValid = regex.test(tonkho);
            if(tonkho == '') {
                $('#tonkho_err').html('Vui lòng nhập số lượng tồn kho');
                return false;
            } else if(!sizeValid) {
                $('#tonkho').html('Số lượng chỉ được nhập số')
                return false;
            } else {
                $('#tonkho').html('')
                return true;
            }
        }
    });

    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    function readURL(input) {
        if (input.files && input.files[0]) {
            const arrayInput = Array.from(input.files)
            console.log(arrayInput);
            arrayInput.forEach((image, index) => {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result).width(150).height(200);
                };
                reader.readAsDataURL(arrayInput[index]);
            });

        }
    }
</script>