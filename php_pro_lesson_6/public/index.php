<?php
use app\engine\Autoload;
use app\models\{Product, User, News, Basket};
use app\engine\Render;
use app\engine\TwigRender;
use app\engine\Request;

require_once '../vendor/autoload.php';
include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$session = new \app\engine\Session();
$session->sessionStart();

$request = new Request();

$controllerName = $request->getControllerName() ?: 'product';
$actionName = $request->getActionName();

$controllerClass =  CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    $controller->runAction($actionName);
}


/** @var Product $product */