<?php

//use app\models\{Product, User};
//use app\engine\Db;

include "../config/config.php";
include "../engine/Autoload.php";

use app\engine\Autoload;
use app\models\{Product, User};
use app\engine\Db;

spl_autoload_register([new Autoload(), 'loadClass']);


$controllerName = $_GET['c'] ?: 'product';
$actionName = $_GET['a'];

$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
}

/** @var Product $product */
/** @var News $news */


// $news = News::getOne(2);
// var_dump($news);
// // $product = new Product();
// // $product = $product->getOne(4);

// // $product->name = "Чай2";
// // //$product->update();
// // var_dump($product);

// // //CREATE
// // $product = new Product("Абрикос", "На юге рос", 11);
// // var_dump($product);
// // $product->name = "Бухгалер";
// $product->price = 125;

// // var_dump($product);     

// $product->save();

// var_dump($product);


// //DELETE

// $product->delete();

// //UPDATE
// $product = new Product();
// $product = $product->getOne(5);
// $product->name = "Чай2";
// $product->save();


