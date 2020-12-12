<?php

namespace app\controllers;

use app\models\Product;

class ProductController extends Controller
{


    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
        $catalog = Product::getLimit($page * PRODUCT_PER_PAGE);

        echo $this->render('catalog', [
            'catalog' => $catalog,
            'page' => ++$page
        ]);
    }

    public function actionCard() {
        $id = (int)$_GET['id'];
        echo $this->render('card', [
            'product' => Product::getOne($id)
        ]);
    }



}