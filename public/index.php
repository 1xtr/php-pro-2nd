<?php
require $_SERVER['DOCUMENT_ROOT'] . "/../config/config.php";
require SERVICES_DIR . "Autoloader.php";

use app\services\Autoloader;
use app\models\Product;

spl_autoload_register([new Autoloader(), 'loadClass']);

//$products = (new Product())->getAll();
//$product = (new Product())->getById(4);

//var_dump($products);

//$user = (new \app\models\User())->getById(1);
//var_dump($user);


$product = new Product();
$product->setName("test prod");
$product->setFullDesc("blahblahblah");
$product->setPrice(100500);
$product->setQuantity(44);
var_dump($product->create());
//var_dump($product);