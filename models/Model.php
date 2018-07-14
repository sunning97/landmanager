<?php
    include_once ('modules/db-driver/DB_driver.php');

    class Model{
        static $db_driver;

        public function __construct()
        {
            Model::$db_driver = new DB_driver();
}
}
?>