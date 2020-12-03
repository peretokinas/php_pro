<?php
define('DOCROOT', __DIR__ . '/../');

use app\models\example\{PhysicalProduct, WeightProduct, DigitalProduct};
use app\models\{Product, User, Basket, Order};
use app\engine\Db;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

// Первое и второе задания

$product = new Product(new Db());
$user = new User(new Db());

$user->id = 1;  
$user->name = "Vasya";
$user->surname = "Pupkin";

$basket = new Basket(new Db());
$order = new Order(new Db());

// var_dump($user);
// var_dump($basket->getTtlQty()); 
// var_dump($order->getUser($user)); 

// Третье задание*
$physicalProduct = new PhysicalProduct();
$digitalProduct = new DigitalProduct();
$weightProduct = new WeightProduct();

echo("Доход физического товара: ".$physicalProduct->getProfit()." у.е.<br>");
echo("Доход цифрового товара: ".$digitalProduct->getProfit()." у.е.<br>");
echo("Доход весового товара: ".$weightProduct->getProfit()." у.е.<br>");



