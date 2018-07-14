<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản Lý Tài Khoản</title>
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
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
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
                        <h4 class="card-title">Quản Lý Tài Khoản</h4>
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#add_user"
                                data-whatever="@mdo" name="edit">Thêm tài khoản
                        </button>
                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                        <tr>
                                            <th style="text-align:center">#</th>
                                            <th style="text-align:center">Tên</th>
                                            <th style="text-align:center">Email</th>
                                            <th style="text-align:center">Số điện thoại</th>
                                            <th style="text-align:center">Giới tính</th>
                                            <th style="text-align:center">Avatar</th>
                                            <th style="text-align:center">Quản Lý</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        for ($i = 0; $i < count($data); $i++) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $i + 1 ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[$i]['user_name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[$i]['user_email'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $data[$i]['user_phone'] ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $sex = $data[$i]['user_sex'];
                                                    if ($sex == 1) {
                                                        echo('Nam');
                                                    } else {
                                                        echo('Nữ');
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <img src="uploads/user-avatar/<?php if ($data[$i]['user_avatar'] == null) {
                                                        echo 'user-default.png';
                                                    } else {
                                                        echo $data[$i]['user_avatar'];
                                                    } ?>" alt="">
                                                </td>
                                                <td>
                                                    <a class="badge badge-danger view_data" data-toggle="modal"
                                                       data-target="#view_user" data-whatever="@mdo"
                                                       id="<?php echo $data[$i]['user_id'] ?>" name="view"
                                                       style="color:white;cursor:pointer"><i class="fa fa-eye"></i></a>
                                                    <a class="badge badge-success edit_data" data-toggle="modal"
                                                       data-target="#edit_user" data-whatever="@mdo"
                                                       id="<?php echo $data[$i]['user_id'] ?>" name="edit"
                                                       style="color:white;cursor:pointer"><i class="fa fa-pencil-square"></i></a>
                                                    <a class="badge badge-primary delete_data" data-toggle="modal"
                                                       data-target="#delete_user" data-whatever="@mdo"
                                                       id="<?php echo $data[$i]['user_id'] ?>" name="delete"
                                                       style="color:white;cursor:pointer"><i class="fa fa-times-circle"></i></a>

                                                </td>

                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
                include('modules/footer.php');
            ?>
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
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/misc.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/data-table.js"></script>
<!-- End custom js for this page-->
<script src="js/user.js"></script>
</body>

</html>
