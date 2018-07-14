<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image">
                    <a href="profile.php"><img src="uploads/user-avatar/<?=$_SESSION['login']['user']['user_avatar']?>"
                                               alt="image"/></a>
                    <span class="online-status online"></span>
                    <!--change class online to offline or busy as needed-->
                </div>
                <div class="profile-name">
                    <p class="name">
                        <?=$_SESSION['login']['user']['user_name']?>
                    </p>
                    <p class="designation">
                        Super Admin
                    </p>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="?ctl=Land&act=index">
                <i class="icon-pie-chart menu-icon"></i>
                <span class="menu-title">Quản lý đất</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->