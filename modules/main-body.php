<?php
session_start();
if(isset($_SESSION['login'])){

} else {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản Lý Đất</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
    <!-- endinject -->
    <link rel="stylesheet" href="node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css" />
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="node_modules/jquery-toast-plugin/dist/jquery.toast.min.css">
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="stylesheet" href="node_modules/owl-carousel-2/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="node_modules/owl-carousel-2/assets/owl.theme.default.min.css" />

    <link rel="shortcut icon" href="images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    <?php include('modules/header.php') ?>
    <div class="container-fluid page-body-wrapper">
        <div class="row row-offcanvas row-offcanvas-right">
            <?php
            include('modules/left/left-content.php');
            ?>
            <div class="content-wrapper">
                <div class="card">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- plugins:js -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!-- endinject -->
<script src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Plugin js for this page-->
<script src="node_modules/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="node_modules/raphael/raphael.min.js"></script>
<script src="node_modules/morris.js/morris.min.js"></script>
<script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- End plugin js for this page-->
<script src="node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/misc.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- End custom js for this page-->
<script src="node_modules/owl-carousel-2/owl.carousel.min.js"></script>
<script src="js/owl-carousel.js"></script>
<script src="js/toastDemo.js"></script>
<script src="js/data-table.js"></script>

<script>
</script>
<?php
include 'modules/flash/Flash.php';
$flash = new flash();
$flash->login();
unset($_SESSION['flash']);
?>

</body>

</html>
