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
    <title>Tạo mới Đất</title>
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
    <!-- End plugin css for this page -->
    <link rel="stylesheet" href="node_modules/jquery-toast-plugin/dist/jquery.toast.min.css">
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
                            <div class="col-12" id="app">
                                <form id="edit_user" action="?ctl=Land&act=add" method="post">
                                    <h6 class="card-title">Thông tin chủ sở hữu</h6>
                                    <?php
                                    include_once('models/OwnerModel.php');
                                    $owners = new OwnerModel();
                                    $owners = $owners->hasMany();
                                    if ($owners) {
                                        ?>
                                        <div class="form-group">
                                            <div class="form-check form-check-flat">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" v-model="isUse">
                                                    Chọn chủ sở hữu đã có
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="form-group">
                                        <div class="form-group" v-if="!isUse">
                                            <div class="form-group">
                                                <label for="owner_name" class="col-form-label">Tên chủ sở hữu</label>
                                                <input type="text" class="form-control" id="owner_name" value=""
                                                       name="owner_name" required>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="owner_email" class="col-form-label">Email</label>
                                                        <input type="text" class="form-control" id="owner_email"
                                                               name="owner_email" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="owner_phone" class="col-form-label">Số điện
                                                            thoại</label>
                                                        <input type="text" class="form-control" id="owner_phone"
                                                               name="owner_phone" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" v-if="isUse">
                                            <select class="form-control" id="id_owner" name="id_owner">
                                                <?php
                                                foreach ($owners as $item) {
                                                    echo '<option value="' . $item['id_owner'] . '">' . $item['owner_name'] . ' - ' . $item['owner_email'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h6 class="card-title">Thông tin đát</h6>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="land_acreage" class="col-form-label">Diện tích</label>
                                                    <input type="text" class="form-control" id="land_acreage"
                                                           name="land_acreage" required>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="land_price" class="col-form-label">Giá đất</label>
                                                    <input type="text" class="form-control" id="land_price"
                                                           name="land_price" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="house_type_id" class="col-form-label">Loại nhà</label>
                                                    <select class="form-control" id="house_type_id"
                                                            name="house_type_id">
                                                        <?php
                                                        include_once('models/HouseModel.php');
                                                        $houses = new HouseModel();
                                                        $houses = $houses->hasMany();
                                                        foreach ($houses as $item) {
                                                            echo '<option value="' . $item['house_type_id'] . '">' . $item['house_type_name'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="purpose_use" class="col-form-label">Mục đích sử
                                                        dụng</label>
                                                    <select class="form-control" id="purpose_use" name="purpose_use">
                                                        <?php
                                                        include_once('models/PurposeModel.php');
                                                        $purposes = new PurposeModel();
                                                        $purposes =$purposes->hasMany();
                                                        foreach ($purposes as $item) {
                                                            echo '<option value="' . $item['purpose_use_id'] . '">' . $item['purpose_use_name'] . '</option>';
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <label for="house_type_id" class="col-form-label">Quận</label>
                                                <select class="form-control" id="district" name="district"
                                                        v-model="isDistrict">
                                                    <?php
                                                    include_once('models/DistrictModel.php');
                                                    $districts = new DistrictModel();
                                                    $districts = $districts->hasMany();
                                                    foreach ($districts as $item) {
                                                        echo '<option value="' . $item['id'] . '">' . $item['name'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="ward" class="col-form-label">Phường</label>
                                                <select class="form-control" id="ward" name="ward"
                                                        :disabled="!isDistrict" v-model="isWard">

                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label for="street_house" class="col-form-label">Tên đường,số
                                                    nhà</label>
                                                <input type="text" class="form-control" id="street_house"
                                                       name="street_house" required :disabled="!isWard">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="add" class="btn btn-success">Thêm</button>
                                    </div>
                                </form>
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
    let app = new Vue({
        el: '#app',
        data: {
            isUse: false,
            isDistrict: false,
            isWard: false
        }
    });

    $('#district').change(function () {
        let id = $(this).val();

        $.ajax({
            url: '?ctl=Ward&act=getWards',
            type: 'post',
            data: {idDistrict: id},
            dataType: 'json',
            success: function (resultt) {
                let output = '';
                $.each(resultt, function (k, i) {
                    output += '<option value="' + i.id + '">' + i.name + '</option>';
                })

                $('#ward').html(output);
            }
        });
    })
</script>
<?php
include 'modules/flash/Flash.php';
$flash = new flash();
$flash->show();
?>
</body>

</html>
