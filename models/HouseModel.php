<?php
include_once('models/Model.php');

class HouseModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hasOne($id)
    {
        $house = parent::$db_driver->get_row('house_type', 'house_type_id=' . $id);

        return $house[0];
    }

    public function hasMany()
    {

        $houses = parent::$db_driver->get_data('house_type');

        return $houses;
    }

    public function search($name)
    {
        $owner = parent::$db_driver->get_row('house_type', 'house_type_name="' . $name . '"');

        if ($owner != null) {
            return $owner[0];
        } else return null;
    }
}

?>