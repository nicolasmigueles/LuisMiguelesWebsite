<?php
require('bin/core.php');
if (isset($_GET['view'])) {
  include('bin/controllers/'.$_GET['view'].'Controller.php');
}else{
  include('bin/controllers/indexController.php');
}
 ?>
