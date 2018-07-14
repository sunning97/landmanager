<?php
include_once('models/Model.php');

class DistrictModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hasOne($id)
    {
        $district = parent::$db_driver->get_row('district', 'id=' . $id);

        return $district[0];
    }

    public function hasMany()
    {

        $districts = parent::$db_driver->get_data('district');

        return $districts;
    }
}

?>