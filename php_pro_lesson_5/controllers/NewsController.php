<?php

namespace app\controllers;

use app\models\News;

class NewsController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionNews() {
        isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
        $news = News::getLimit($page * PRODUCT_PER_PAGE);

        echo $this->render('news', [
            'news' => $news,
            'page' => ++$page
        ]);
    }

    public function actionNewsItem() {
        $id = (int)$_GET['id'];
        echo $this->render('NewsItem', [
            'news' => News::getOne($id)
        ]);
    }

}