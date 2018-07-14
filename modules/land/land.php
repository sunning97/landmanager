<?php
    session_start();
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
    <link rel="stylesheet" href="node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css"/>
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="node_modules/jquery-toast-plugin/dist/jquery.toast.min.css">
    <link rel="stylesheet" href="node_modules/sweetalert2/dist/sweetalert2.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <link rel="stylesheet" href="node_modules/owl-carousel-2/assets/owl.carousel.min.css"/>
    <link rel="stylesheet" href="node_modules/owl-carousel-2/assets/owl.theme.default.min.css"/>

    <link rel="shortcut icon" href="images/favicon.png"/>
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
                        <div class="row">
                            <div class="col-sm-12 col-md-8">
                                <h4 class="card-title">Quản Lý Đất</h4>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="row">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning btn-xs" id="sort-lands" href="#"
                                           style="color:white;cursor:pointer;height: 25px;line-height: 10px">Sắp xếp</a>
                                        <a class="btn btn-danger btn-xs" href="?ctl=Land&act=search"
                                           style="color:white;cursor:pointer;height: 25px;line-height: 10px">Tìm
                                            kiếm</a>
                                        <a class="btn btn-primary btn-xs" href="?ctl=Land&act=input"
                                           style="color:white;cursor:pointer;height: 25px;line-height: 10px">Nhập dữ
                                            liệu</a>
                                        <a class="btn btn-success btn-xs" href="?ctl=Land&act=output"
                                           style="color:white;cursor:pointer;height: 25px;line-height: 10px"
                                           id="_output-data">Xuất dữ liệu</a>
                                        <a class="btn btn-info btn-xs" href="?ctl=Land&act=merge"
                                           style="color:white;cursor:pointer;height: 25px;line-height: 10px">Merge</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="display_lands">
                                    <div class="table-responsive">
                                        <table id="order-listing" class="table">
                                            <thead>
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Chủ sở hữu</th>
                                                <th>Diện tích</th>
                                                <th>Giá</th>
                                                <th>Địa chỉ</th>
                                                <th>Quản Lý</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if (is_array($data)) {

                                                for ($i = 0; $i < count($data); $i++) {
                                                    ?>
                                                    <tr class="text-center">
                                                        <td>
                                                            <?= $i + 1 ?>
                                                        </td>
                                                        <td>
                                                            <?php
                                                            include_once('models/OwnerModel.php');
                                                            $owner = OwnerModel::hasOne($data[$i]['land_owner']);
                                                            echo $owner['owner_name'];
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= $data[$i]['land_acreage'] ?> m²
                                                        </td>
                                                        <td>
                                                            <?= number_format($data[$i]['land_price']) ?> VNĐ
                                                        </td>
                                                        <td>
                                                            <?= $data[$i]['address'] ?>
                                                        </td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <a class="btn btn-danger btn-xs" href="?ctl=Land&act=show&id=<?= $data[$i]['land_id'] ?>" id="show_land"><i class="fa fa-eye"></i> Xem</a>
                                                                <a class="btn btn-primary btn-xs delete_land" href="#" id="<?= $data[$i]['land_id'] ?>"><i class="fa fa-times-circle"></i> Xóa</a>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                    <?php
                                                }
                                            } else {
                                                echo '<tr><td colspan="5" class="text-center"> Không có dữ liệu</td></tr>';
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

<!-- Plugin js for this page-->
<script src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<script src="node_modules/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="node_modules/raphael/raphael.min.js"></script>
<script src="node_modules/morris.js/morris.min.js"></script>
<script src="node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
<script src="node_modules/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
<script src="node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/misc.js"></script>
<script src="js/settings.js"></script>
<script src="js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
<script src="node_modules/owl-carousel-2/owl.carousel.min.js"></script>
<script src="js/owl-carousel.js"></script>
<script src="js/toastDemo.js"></script>

<script>
    $('.delete_land').on('click', function () {
        let id = $(this).attr('id');
        swal({
            title: 'Ban có chắc chắn xóa?',
            text: "Dữ liệu xóa sẽ không quay lại được !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xoá'
        }).then(function () {

            $.ajax({
                url: '?ctl=Land&act=del',
                type: 'post',
                data: {land_id: id},
                dataType: 'text',
                success: function (result) {
                    if (result === 'ok') {

                        swal(
                            'Đã xóa!',
                            'Dữ liệu đã được xóa',
                            'success'
                        )
                        location.reload();
                    } else {
                        swal('Không thể xóa<br>Có lỗi trong quá trình xử lý');
                    }
                }
            });
        });
    });

    $('#_output-data').on('click', () => {
        setTimeout(() => {
            swal(
                'Thành công!',
                'Đã xuất dữ liệu sang file Excel!',
                'success'
            );
        }, 1000);
    });

    $('#sort-lands').on('click', function (event) {
        event.preventDefault();
        $.ajax({
            url: "?ctl=Land&act=sort",
            method: "POST",
            dataType: 'json',
            success: function (data) {
                if (data.state === 'ok') {
                    $('#display_lands').html(data.content);
                    swal(
                        'Đã sắp xếp!',
                        'Dữ liệu đã được sắp xếp',
                        'success'
                    )
                } else {
                    swal('Vui lòng nhập thêm dữ liệu<br>trước khi sắp xếp');
                    $('#display_lands').html('<br><h5 class="mb-8 text-center">Không có dữ liệu</h5>');
                }

            }
        })
    });
    $(document).on('click', '#_show', function (event) {
        let id = $(this).data('id');
        window.open('?ctl=Land&act=show&id=' + id, '_blank');
    });
    $(document).on('click', '#_delete', function (event) {
        let id = $(this).data('id');

        swal({
            title: 'Ban có chắc chắn xóa?',
            text: "Dữ liệu xóa sẽ không quay lại được !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xoá'
        }).then(function () {

            $.ajax({
                url: '?ctl=Land&act=del',
                type: 'post',
                data: {land_id: id},
                dataType: 'text',
                success: function (result) {
                    if (result === 'ok') {
                        $.ajax({
                            url: "?ctl=Land&act=sort",
                            method: "POST",
                            dataType: 'json',
                            success: function (data) {
                                if (data.state === 'ok') {
                                    $('#display_lands').html(data.content);
                                } else {
                                    swal('Vui lòng nhập thêm dữ liệu<br>trước khi sắp xếp');
                                    $('#display_lands').html('<br><h5 class="mb-8 text-center">Không có dữ liệu</h5>');
                                }

                            }
                        })
                        swal(
                            'Đã xóa!',
                            'Dữ liệu đã được xóa',
                            'success'
                        )
                    } else {
                        swal('Không thể xóa<br>Có lỗi trong quá trình xử lý');
                    }
                }
            });
        })
    });
    $(document).on('click', '#show_land', function (event) {
        event.preventDefault();
        let url = $(this).attr('href');
        window.open(url, '_blank');
    });
</script>
<?php
include_once ('modules/flash/Flash.php');
$flash = new Flash();
$flash->show();
?>
</body>

</html>
