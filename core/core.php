<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_TABLE','admin_panel');
define('DB_CHARSET','utf-8');
define('PUNTO_REPOSICION_STOCK', '5');

require('core/models/conn.Class.php');
require('core/models/Taller.Class.php');
require('core/models/Shop.Class.php');
require('core/models/Carrito.Class.php');
require('core/models/Producto.Class.php');
require('core/bin/functions/functions.php');
 ?>
