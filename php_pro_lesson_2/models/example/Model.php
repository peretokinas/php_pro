<?php

namespace app\models\example;

abstract class Model {
    public $id;
    public $name;
    public $description;
    public $firstPrice = 12; //Закупка
    public $price = 50; //Продажа
    public $profit;

    abstract protected function getProfit();
}
