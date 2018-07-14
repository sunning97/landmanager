<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Đăng Nhập Trang Quản Lý</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="node_modules/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="node_modules/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="node_modules/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="node_modules/jquery-toast-plugin/dist/jquery.toast.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="images/favicon.png"/>
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
        <div class="row">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-full-bg">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-dark text-left p-5">
                            <h2>Đăng Nhập</h2>
                            <form action="index.php?ctl=User&act=doLogin" method="post" enctype="multipart/form-data" class="pt-5">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email đăng nhập</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder=""
                                           name="email">
                                    <i class="mdi mdi-account"></i>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mật khẩu</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1"
                                           placeholder="" name="password">
                                    <i class="mdi mdi-eye"></i>
                                </div>
                                <div class="mt-5">
                                    <button type="submit" class="btn btn-block btn-warning btn-lg font-weight-medium"
                                            name="login">Đăng Nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<script src="node_modules/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="node_modules/raphael/raphael.min.js"></script>
<script src="node_modules/morris.js/morris.min.js"></script>
<script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/misc.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/toastDemo.js"></script>
<!-- End custom js for this page-->
<?php
include_once ('modules/flash/Flash.php');
$flash = new Flash();
$flash->show();
?>
</body>

</html>