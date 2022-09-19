<?php
$act = '';
$title = '';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    if ($act == 'insert') {
        $title = 'Thêm mới danh mục';
    } else if ($act == 'update') {
        $title = 'Cập nhật danh mục';
        if (isset($_GET['menu_id'])) {
            $menu_id = $_GET['menu_id'];
            $menu = new Menu();
            $result = $menu-> getDetailMenu($menu_id);
            $menu_name = $result['menu_name'];
            $menu_status = $result['menu_status'];
        }
    } else {
    }
}

?>

<div class="container mt-3">
    <h1 class="">
        <?php
            echo $title;
        ?>
    </h1>
    <?php
    if ($act == 'insert') {
        echo '<form action="index.php?action=menu&act=insert_action" method="POST" enctype="multiple/form-data">';
    } else if ($act == 'update') {
        echo '<form action="index.php?action=menu&act=update_action" method="POST" enctype="multiple/form-data">';
    }
    ?>
    <form>
        <div class="row">
            <input type="hidden" class="form-control" name="id" value="<?php if (isset($menu_id)) echo $menu_id ?>">
            <div class="col-12">
                <label for="phone" class="form-label">Menu Name</label>
                <input type="text" class="form-control" name="menu_name" value="<?php if (isset($menu_id)) echo $menu_name ?>">
            </div>
            <div class="col-md-3 my-4">
                <select class=""  name="menu_status" value="<?php if(isset($menu_id)) echo $menu_status ?>">
                    <option selected value="0">Select Status:</option>
                    <option value="1">Active</option>
                    <option value="0">No Active</option>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary btn-lg" type="submit" class="form-control">
                <?php
                    if ($act == 'insert') {
                        echo 'Thêm';
                    } else if ($act == 'update') {
                        echo 'Cập nhật';
                    } else {
                        echo '';
                    }
                    ?>
                </button>
            </div>
        </div>
    </form>
</div>
