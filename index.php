<?php
$ctl = null;
$act = null;

if (isset($_GET['ctl'])) {
    $ctl = $_GET['ctl'];
}
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}


if ($ctl && $act) {

    $controllerName = $ctl . 'Controller';

    require_once('controllers/' . $controllerName . '.php');

    $ctll = new $controllerName();

    $ctll->$act();
} else{
    header('location:index.php?ctl=Land&act=index');
}

?>