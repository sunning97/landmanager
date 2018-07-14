<?php
include_once('models/Model.php');

class LandAddressModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hasOne($id)
    {
        $landaddress = parent::$db_driver->get_row('land_address', 'land_id=' . $id);

        return $landaddress[0];
    }

    public function insert($data)
    {
        $result = parent::$db_driver->insert('land_address', $data);

        if ($result == true) {
            $result = parent::$db_driver->get_laster('land_address', 'land_address_id');

            return $result;
        } else {
            return null;
        }
    }
}

?>