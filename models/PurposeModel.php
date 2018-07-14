<?php
include_once('models/Model.php');

class PurposeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function hasOne($id)
    {
        $purpose = parent::$db_driver->get_row('purpose_use', 'purpose_use_id=' . $id);

        return $purpose[0];
    }

    public function hasMany()
    {
        $purposes = parent::$db_driver->get_data('purpose_use');

        return $purposes;
    }

    public function search($name)
    {
        $owner = parent::$db_driver->get_row('purpose_use', 'purpose_use_name="' . $name . '"');

        if ($owner != null) {
            return $owner[0];
        } else return null;
    }
}

?>