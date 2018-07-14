<?php
class DistrictController{
    public function getDistricts(){

        include_once('modules/db-driver/DB_driver.php');

        $db_driver = new DB_driver();

        $districts = $db_driver->get_data('district');

        echo json_encode($districts);
    }
}
?>