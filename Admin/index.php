<?php 
    // include "Model/connect.php";
    // include "Model/products.php";
    // include "Model/users.php";
    // include "Model/uploadImage.php";
    set_include_path(get_include_path().PATH_SEPARATOR.'Model/');
    spl_autoload_extensions('.php');// phần mở rộng
    spl_autoload_register();
    session_start();
    include 'Model/uploadImage.php';
    // include 'Content/PHPExcel';
    // include 'Model/export.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Shop Bán Giày</title>
    <link
      rel="stylesheet"
      href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css"
    />
    <!-- GetBootstrap Link -->
    <link rel="stylesheet" href="../Content/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Content/js/bootstrap.bundle.min.js">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- link jquery -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!-- link jquery -->
    

    <!-- <link rel="stylesheet" href="Content/css/all.min.css"> -->
    <!-- <link rel="stylesheet" href="Content/css/all.css"> -->
    <link rel="stylesheet" href="Content/css/sb-admin-2.min.css">

</head>
<body>
<!-- <i class="fas fa-wrench"></i> -->
    <?php 
        include 'View/header2.php';

        $ctrl = 'home';
        if(isset($_GET['action'])) {
            $ctrl = $_GET['action'];
        }
        include 'Controller/'. $ctrl. '.php';

        include 'View/footer.php';
    ?> 
    <scirpt src="Content/js/main.js"></scirpt>
    <script src="Content/js/sb-admin-2.min.js"></script>
    <script src="Content/js/bootstrap.bundle.min.js"></script>
    <script src="Content/js/jquery.easing.min.js"></script>
    <!-- Page level plugins -->
    <!-- <script src="Content/js/Chart.min.js"></script> -->

    <!-- Page level custom scripts -->
    <!-- <script src="Content/js/chart-area-demo.js"></script>
    <script src="Content/js/chart-pie-demo.js"></script> -->
</body>
</html>