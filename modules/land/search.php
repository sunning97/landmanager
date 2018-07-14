<?php
if (isset($_SESSION['login'])) {

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
    <title>Tìm kiếm</title>
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
                <div class="card" id="app">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <select class="form-control" id="search_type" name="search_type" @change="setType">
                                    <option value="owner">Chủ sở hữu</option>
                                    <option value="address">Địa chỉ</option>
                                    <option value="acreage">Điện tích</option>
                                    <option value="price">Giá</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <div class="form-group" v-if="searchType == 'owner'">
                                    <input type="text" class="form-control" id="owner" name="owner"
                                           placeholder="Tên chủ sở hữu" required>
                                </div>
                                <div class="form-group" v-if="searchType == 'address'">
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="Địa chỉ" required>
                                </div>
                                <div class="form-group" v-if="searchType == 'acreage'">
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="acreage_min"
                                                   name="acreage_min" placeholder="từ...(m²)" required>
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="acreage_max"
                                                   name="acreage_max" placeholder="đến...(m²)" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" v-if="searchType == 'price'">
                                    <div class="row">
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="price_min"
                                                   name="price_min" placeholder="từ...(VNĐ)" required>
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="price_max"
                                                   name="price_max" placeholder="đến...(VNĐ)" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="from-group text-center">
                                    <button type="button" class="btn btn-dark btn-xs" id="_search" @click="search">Tìm
                                        kiếm
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div id="displaytable"></div>
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
<script src="js/vue.min.js"></script>
<!-- endinject -->
<script src="node_modules/datatables.net/js/jquery.dataTables.js"></script>
<script src="node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Plugin js for this page-->
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
<script src="js/data-table.js"></script>

<script>
    var app = new Vue({
        el: '#app',
        data: {
            searchType: 'owner'
        },
        methods: {
            setType() {
                let type = $('#search_type').val();
                this.searchType = type;
                $('#displaytable').empty();
                $('#owner').val('');
                $('#address').val('');
            },
            search() {
                if (this.searchType === 'owner') {
                    let name = $('#owner').val();
                    if(name.length == 0){
                        swal(
                            'Ô tìm kiếm không được để trống'
                        )
                    } else {
                        let data = {name: name};
                        $.ajax({
                            url: '?ctl=Land&act=getSearch',
                            type: 'post',
                            data: {type: this.searchType, data: data},
                            dataType: 'json',
                            success: function (resultt) {
                                $('#displaytable').html(resultt.result);
                            }
                        });
                    }
                }
                else if (this.searchType === 'address') {
                    let address = $('#address').val();
                    if(address.length == 0){
                        swal(
                            'Ô tìm kiếm không được để trống'
                        )
                    } else {
                        let data = {address: address};

                        $.ajax({
                            url: '?ctl=Land&act=getSearch',
                            type: 'post',
                            data: {type: this.searchType, data: data},
                            dataType: 'json',
                            success: function (resultt) {
                                $('#displaytable').html(resultt.result);
                            }
                        });
                    }
                }
                else if (this.searchType === 'acreage') {
                    let max = $('#acreage_max').val();
                    let min = $('#acreage_min').val();

                    if(max.length == 0 || min.length == 0){
                        swal(
                            'Ô tìm kiếm không được để trống'
                        )
                    } else {
                        let data = {max: max, min: min};

                        $.ajax({
                            url: '?ctl=Land&act=getSearch',
                            type: 'post',
                            data: {type: this.searchType, data: data},
                            dataType: 'json',
                            success: function (resultt) {
                                $('#displaytable').html(resultt.result);
                            }
                        });
                    }

                }
                else if (this.searchType === 'price') {
                    let max = $('#price_max').val();
                    let min = $('#price_min').val();
                    if(max.length == 0 || min.length == 0){
                        swal(
                            'Ô tìm kiếm không được để trống'
                        )
                    } else {
                        let data = {max: max, min: min};

                        $.ajax({
                            url: '?ctl=Land&act=getSearch',
                            type: 'post',
                            data: {type: this.searchType, data: data},
                            dataType: 'json',
                            success: function (resultt) {
                                $('#displaytable').html(resultt.result);
                            }
                        });
                    }
                }
            }
        },
    });

    $(document).on('click', '#_show', function (event) {
        let id = $(this).data('id');
        window.open('?ctl=Land&act=show&id=' + id, '_blank');
    });

    $(document).on('click', '#_delete', function (event) {
        let id = $(this).data('id');

        swal({
            title: 'Ban có chắc chắn xóa?',
            text: "Bại sẽ không quy lại được !",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xoá'
        }).then(function () {

            $.ajax({
                url: '?ctl=Land&act=del',
                type: 'post',
                data: {land_id:id},
                dataType: 'text',
                success: function (result) {
                    if(result === 'ok'){
                        if (app.$data['searchType'] === 'owner') {
                            let name = $('#owner').val();
                            let data = {name: name};
                            $.ajax({
                                url: '?ctl=Land&act=getSearch',
                                type: 'post',
                                data: {type: app.$data['searchType'], data: data},
                                dataType: 'json',
                                success: function (resultt) {
                                    $('#displaytable').html(resultt.result);
                                }
                            });
                        }
                        else if (app.$data['searchType'] === 'address') {
                            let address = $('#address').val();
                            let data = {address: address};

                            $.ajax({
                                url: '?ctl=Land&act=getSearch',
                                type: 'post',
                                data: {type: app.$data['searchType'], data: data},
                                dataType: 'json',
                                success: function (resultt) {
                                    $('#displaytable').html(resultt.result);
                                }
                            });
                        }
                        else if (app.$data['searchType'] === 'acreage') {
                            let max = $('#acreage_max').val();
                            let min = $('#acreage_min').val();
                            let data = {max: max, min: min};

                            $.ajax({
                                url: '?ctl=Land&act=getSearch',
                                type: 'post',
                                data: {type: app.$data['searchType'], data: data},
                                dataType: 'json',
                                success: function (resultt) {
                                    $('#displaytable').html(resultt.result);
                                }
                            });
                        }
                        else if (app.$data['searchType'] === 'price') {
                            let max = $('#price_max').val();
                            let min = $('#price_min').val();

                            let data = {max: max, min: min};

                            $.ajax({
                                url: '?ctl=Land&act=getSearch',
                                type: 'post',
                                data: {type: app.$data['searchType'], data: data},
                                dataType: 'json',
                                success: function (resultt) {
                                    $('#displaytable').html(resultt.result);
                                }
                            });
                        }

                        swal(
                            'Đã xóa!',
                            'Dữ liệu đã được xóa',
                            'success'
                        )
                    } else {

                    }
                }
            });
        })
    });
</script>

<?php
include 'modules/flash/Flash.php';
$flash = new flash();
$flash->show();
?>

</body>

</html>
