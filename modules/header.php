<?php
if (isset($_GET['act']) && $_GET['act'] == 'logout') {
    unset($_SESSION['login']);
    header('location:login.php');
}
?>


<!-- partial:partials/_navbar.html -->
<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.svg" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>


        <ul class="navbar-nav">
            <li class="nav-item dropdown d-none d-lg-flex">
                <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="#" data-toggle="dropdown">
                    <span class="btn">+ Tạo Mới</span>
                </a>


                <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">
                    <a class="dropdown-item" href="?ctl=Land&act=create">
                        <i class="icon-pie-chart text-primary"></i>
                        Đất
                    </a>

            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                data-toggle="offcanvas">
            <span class="icon-menu"></span>
        </button>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item nav-settings d-none d-lg-block">
                <a class="nav-link" href="?ctl=User&act=logout" title="Đăng Xuất">
                    <i class="icon-logout"></i>
                </a>

            </li>
        </ul>
    </div>
</nav>
<!-- partial -->