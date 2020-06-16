<?php
require $_SERVER['DOCUMENT_ROOT'] . "/config/main.php";
require ROOT_DIR . "services/Autoloader.php";

spl_autoload_register([new app\services\Autoloader(), 'loadClass']);

// $product = new app\models\Product();
// var_dump($product);
// var_dump($product->getOne(1));
// var_dump($product->getALl());
//
// $cart = new app\models\Cart();
// var_dump($cart);
// var_dump($product->getALl());

$controllerName = $_GET['c'] ?: "Auth";

$actionName = $_GET['a']  ?: "Login";;

$controllerClass = CONTROLLERS_NAMESPACE . ucfirst($controllerName) . "Controller.php";

$controller = new $controllerClass();

$controller->run($actionName);
