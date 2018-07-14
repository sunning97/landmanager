<?php
session_start();

class UserController
{

    public function index()
    {
        include_once('models/UserModel.php');

        $userModel = new UserModel();

        $users = $userModel->getAllUser();

        include_once('views/UserView.php');

        $userView = new UserView();

        $userView->viewIndex($users);
    }

    public function logout()
    {
        if (isset($_SESSION['login'])) {
            unset($_SESSION['login']);
        }
        header('location:index.php?ctl=User&act=login');
    }

    public function login()
    {
        include_once('views/UserView.php');
        $userView = new UserView();
        $userView->viewLogin();
    }

    public function doLogin()
    {
        if (isset($_POST['login'])) {

            $email = $_POST['email'];
            $pass = $_POST['password'];

            $pass_md5 = md5($_POST['password']);

            include_once('models/UserModel.php');
            $user = new UserModel();
            $user = $user->hasEmail($email);

            if ($user != null && $user['user_password'] === $pass_md5) {

                $_SESSION['login']['user'] = $user;

                $_SESSION['flash']['title'] = 'Đăng nhập thành công!';
                $_SESSION['flash']['mess'] = 'Chào mừng quay trở lại';
                $_SESSION['flash']['type'] = 'success';
                header('location:index.php');
            } else {

                $_SESSION['flash']['title'] = 'Đăng nhập không thành công!';
                $_SESSION['flash']['mess'] = 'Email/mật khẩu không đúng';
                $_SESSION['flash']['type'] = 'failure';
                header('location:index.php?ctl=User&act=login');
            }

        }
    }

}

?>