<?php
include_once('models/Model.php');

class LandModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAllLand()
    {
        $lands = parent::$db_driver->get_data('land');
        return $lands;
    }

    public function getLast()
    {
        $land = parent::$db_driver->get_laster('land', 'land_id');

        return $land;
    }

    public function hasOne($id)
    {

        $land = parent::$db_driver->get_row('land', 'land_id=' . $id);

        return $land[0];
    }

    public function hasOwner($id)
    {

        $lands = parent::$db_driver->get_row('land', 'land_owner=' . $id);

        return $lands;
    }

    public function hasAddress($address)
    {
        $lands = parent::$db_driver->get_row('land', 'address LIKE "%' . $address . '%"');
        if ($lands != null) {
            return $lands;
        } else {
            return null;
        }
    }

    public function hasAcreage($max, $min)
    {

        $lands = parent::$db_driver->get_row('land', 'land_acreage <= ' . $max . ' AND land_acreage >= ' . $min);

        return $lands;
    }

    public function hasPrice($max, $min)
    {

        $lands = parent::$db_driver->get_row('land', 'land_price <= ' . $max . ' AND land_price >= ' . $min);

        return $lands;
    }

    public function insert($data)
    {

        $result = parent::$db_driver->insert('land', $data);

        if ($result == true) {
            $result = parent::$db_driver->get_laster('land', 'land_id');

            return $result;
        } else {
            return null;
        }
    }

    public function destroy($id)
    {
        $result = parent::$db_driver->delete('land', 'land_id=' . $id);
        return $result;
    }
}

?>