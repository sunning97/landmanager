<?php
class LandView{

    public function viewIndex($data){
        include_once ('modules/land/land.php');
    }

    public function viewOne($data){

        include_once ('modules/land/show.php');
    }

    public function viewCreate(){

        include_once ('modules/land/create.php');
    }

    public function viewInput(){
        include_once ('modules/land/input.php');
    }

    public function viewSearch()
    {
        include_once ('modules/land/search.php');
    }

    public function viewError($data){
        include_once ('modules/land/error.php');
    }

    public function viewMerge()
    {
        include_once ('modules/land/merge.php');
    }
}
?>