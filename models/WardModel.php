<?php
include_once('models/Model.php');

class WardModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hasMany($id)
    {
        $wards = parent::$db_driver->get_row('wards', 'district_id=' . $id);

        return $wards;
    }

    public function hasOne($id)
    {
        $ward = parent::$db_driver->get_row('wards', 'id=' . $id);

        return $ward[0];
    }
}

?>