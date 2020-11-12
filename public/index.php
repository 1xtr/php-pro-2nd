<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
require SERVICES_DIR . "Autoloader.php";

use \services\Autoloader;
use \models\Product;

spl_autoload_register([new Autoloader(), 'loadClass']);

$a = new Product();

//var_dump($a);