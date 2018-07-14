<?php
    class WardController{
        public function getWards(){

            include_once('models/WardModel.php');
            $idDistrict = $_POST['idDistrict'];
            $wardModel = new WardModel();

            $result = $wardModel->hasMany($idDistrict);

            echo json_encode($result);
        }
    }
?>