<?php
require('core/core.php');
$view = isset($_GET['view']) ? $_GET['view'] : 'index';
$ruta = 'core/controllers/'. strtolower($view) .'Controller.php';

if(file_exists('core/controllers/'.strtolower($view).'Controller.php')){
    include('core/controllers/'.strtolower($view).'Controller.php');
}else {
    include('core/controllers/errorController.php');
}
 ?>
