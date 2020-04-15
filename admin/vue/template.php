<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - Maxime Isambert</title>
    <link href="./dist/css/styles.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">


<?php
require 'navbar.php';
?>

<div id="layoutSidenav">

    <?php
    require 'sideNavbar.php';
    ?>
    
    
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                
                <?php
                    echo $content;
                ?>

            </div>
        </main>
        <?php
        require 'footerView.php';
        ?>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/pkcb2owexbjw04wblka9y74zkcd23llt331bvyv4wbjusnp1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="./dist/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="./dist/assets/demo/chart-area-demo.js"></script>
<script src="./dist/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>

<script src="./dist/assets/demo/datatables-demo.js"></script>
<script src="./assets/js/main.js"></script>
</body>
</html>
