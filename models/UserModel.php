<?php
include_once('models/Model.php');

class UserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllUser()
    {
        $users = parent::$db_driver->get_data('users');

        return $users;
    }

    public function hasEmail($email)
    {

        $user = parent::$db_driver->get_row('users', 'user_email="' . $email . '"');

        return $user[0];
    }
}

?>