<?php
    class UserView{

        public function viewIndex($data){
            include_once ('modules/user/users.php');
        }

        public function viewLogin(){
            include_once ('modules/login/login.php');
        }
    }
?>