<?php
require('core/core.php');
$view = isset($_GET['view']) ? $_GET['view'] : 'index';
$ruta = 'core/controllers/'. strtolower($view) .'Controller.php';

if(file_exists($ruta)){
    include($ruta);
}else {
    include('core/controllers/errorController.php');
}
?>
