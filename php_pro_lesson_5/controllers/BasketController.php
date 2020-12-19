<?php


namespace app\controllers;


use app\engine\Request;
use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {

        echo $this->render('basket', [
            'basket' => Basket::getBasket(session_id())
        ]);
    }

    public function actionAdd() {
        //$id = json_decode(file_get_contents('php://input'))->id;
        $id = (new Request())->getParams()['id'];

        (new Basket(session_id(), $id))->save();

        $response = [
            'count' => Basket::getCountWhere('session_id', session_id())
        ];

        echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    }
}