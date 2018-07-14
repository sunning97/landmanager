<?php
include_once('models/Model.php');

class OwnerModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public static function hasOne($id)
    {
        $owner = parent::$db_driver->get_row('land_owner', 'id_owner=' . $id);

        return $owner[0];
    }

    public function hasMany()
    {

        $owners = parent::$db_driver->get_data('land_owner');

        return $owners;
    }


    public function insert($data)
    {

        $result = parent::$db_driver->insert('land_owner', $data);

        if ($result == true) {
            $result = parent::$db_driver->get_laster('land_owner', 'id_owner');
            return $result;
        } else {
            return null;
        }

    }

    public function search($name, $email)
    {

        $owner = parent::$db_driver->get_row('land_owner', 'owner_name="' . $name . '" AND owner_email="' . $email . '"');

        if ($owner != null) {
            return $owner[0];
        } else return null;
    }

    public function searchh($name)
    {

        $owners = parent::$db_driver->get_row('land_owner', 'owner_name LIKE "%' . $name . '%"');

        if ($owners != null) {
            return $owners;
        } else return null;
    }


}


?>