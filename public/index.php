<pre>
<?php
require $_SERVER['DOCUMENT_ROOT'] . "/services/Autoloader.php";

spl_autoload_register([new Autoloader(), 'loadClass']);

$product = new Product();
$product->setCategoryId()
    ->setDescription();

function foo(ModelInterface $object){
    var_dump($object->getById());
}

var_dump($product);
