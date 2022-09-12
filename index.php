<?php
    set_include_path(get_include_path().PATH_SEPARATOR.'Model/');
    spl_autoload_extensions('.php');// phần mở rộng
    spl_autoload_register();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bán Giày</title>
    <link
      rel="stylesheet"
      href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css"
    />
    <!-- GetBootstrap Link -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="Content/css/bootstrap.min.css">
    <link rel="stylesheet" href="Content/js/bootstrap.bundle.min.js">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

    <!-- reset css  -->
    <!-- <link rel="stylesheet" href="Content/css/reset.css"> -->

    <!-- link code css -->
    <link rel="stylesheet" href="Content/css/style.css">
    <link rel="stylesheet" href="Content/css/home.css">

     <!-- link jquery -->
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>

    
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div class="container">
    <i class="fas fa-wrench"></i>
        <!-- header -->
        <?php
            include "View/header.php";
        ?>

        <!-- main -->
        <?php
            $ctrl = 'home';
            if(isset($_GET['action'])) {
                $ctrl = $_GET['action'];
            }
            include 'Controller/'. $ctrl. '.php';
        ?>

        <!-- footer -->
        <?php
            // include 'View/footer.php';
        ?>
    </div>
    <script scr=""></script>
</body>
</html>